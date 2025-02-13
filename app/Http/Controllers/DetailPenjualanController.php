<?php

namespace App\Http\Controllers;

use App\Models\DetailPenjualan;
use App\Models\Penjualan;
use App\Models\Produk;
use Illuminate\Http\Request;

class DetailPenjualanController extends Controller
{
    public function index()
    {
        $details = DetailPenjualan::with(['penjualan.pelanggan', 'produk'])->get();
        return view('detail_penjualans.index', compact('details'));
    }


    public function create()
    {
        $penjualans = Penjualan::all();
        $produks = Produk::all();
        return view('detail_penjualans.create', compact('penjualans', 'produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'penjualan_id' => 'required|exists:penjualans,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($request->produk_id);

        // Cek stok
        if ($produk->stok < $request->jumlah_produk) {
            return redirect()->back()->withErrors('Stok produk tidak mencukupi.');
        }

        // Kurangi stok produk
        $produk->stok -= $request->jumlah_produk;
        $produk->save();

        // Hitung subtotal
        $subtotal = $produk->harga * $request->jumlah_produk;

        // Simpan detail penjualan
        $detail = DetailPenjualan::create([
            'penjualan_id' => $request->penjualan_id,
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'subtotal' => $subtotal,
        ]);

        $detail->penjualan->updateTotalHarga();

        // Update total harga di Penjualan
        $this->updateTotalHarga($request->penjualan_id);

        return redirect()->route('detail_penjualans.index')->with('success', 'Detail Penjualan berhasil ditambahkan.');
    }

    public function edit(DetailPenjualan $detailPenjualan)
    {
        $penjualans = Penjualan::all();
        $produks = Produk::all();
        return view('detail_penjualans.edit', compact('detailPenjualan', 'penjualans', 'produks'));
    }

    public function update(Request $request, DetailPenjualan $detailPenjualan)
    {
        $request->validate([
            'penjualan_id' => 'required|exists:penjualans,id',
            'produk_id' => 'required|exists:produks,id',
            'jumlah_produk' => 'required|integer|min:1',
        ]);

        $produk = Produk::findOrFail($detailPenjualan->produk_id);

        // 🛠 1️⃣ Kembalikan stok produk ke jumlah sebelum diupdate
        $produk->stok += $detailPenjualan->jumlah_produk;

        // 🛠 2️⃣ Cek apakah stok cukup untuk jumlah baru
        if ($produk->stok < $request->jumlah_produk) {
            return redirect()->back()->withErrors('Stok produk tidak mencukupi.');
        }

        // 🛠 3️⃣ Kurangi stok dengan jumlah baru
        $produk->stok -= $request->jumlah_produk;
        $produk->save();

        // 🛠 4️⃣ Hitung subtotal baru
        $subtotal = $produk->harga * $request->jumlah_produk;

        // 🛠 5️⃣ Update detail penjualan
        $detailPenjualan->update([
            'penjualan_id' => $request->penjualan_id,
            'produk_id' => $request->produk_id,
            'jumlah_produk' => $request->jumlah_produk,
            'subtotal' => $subtotal,
        ]);

        $detailPenjualan->penjualan->updateTotalHarga();

        return redirect()->route('detail_penjualans.index')->with('success', 'Detail Penjualan berhasil diperbarui.');
    }

    public function show(DetailPenjualan $detailPenjualan)
    {
        return view('detail_penjualans.show', compact('detailPenjualan'));
    }

    public function destroy(DetailPenjualan $detailPenjualan)
    {
        $produk = Produk::find($detailPenjualan->produk_id);

        if ($produk) {
            // Kembalikan stok produk sebelum menghapus
            $produk->stok += $detailPenjualan->jumlah_produk;
            $produk->save();
        }

        $penjualan_id = $detailPenjualan->penjualan_id;
        $detailPenjualan->delete();

        // Update total harga di Penjualan
        $this->updateTotalHarga($penjualan_id);

        return redirect()->route('detail_penjualans.index')->with('success', 'Detail Penjualan berhasil dihapus.');
    }

    private function updateTotalHarga($penjualan_id)
    {
        $penjualan = Penjualan::findOrFail($penjualan_id);
        $totalHarga = DetailPenjualan::where('penjualan_id', $penjualan_id)->sum('subtotal');

        $penjualan->update(['total_harga' => $totalHarga]);
    }
}
