<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Penjualan;
use App\Models\Pelanggan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualans = Penjualan::with('pelanggan')->get();
        return view('penjualans.index', compact('penjualans'));
    }

    public function create()
    {
        $pelanggans = Pelanggan::all(); // Ambil semua data pelanggan
        return view('penjualans.create', compact('pelanggans'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggans,id',
        ]);

        // Buat penjualan baru dengan total_harga default 0
        $penjualan = Penjualan::create([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'pelanggan_id' => $request->pelanggan_id,
            'total_harga' => 0, // Default, akan dihitung berdasarkan detail_penjualans
        ]);

        return redirect()->route('penjualans.index')
            ->with('success', 'Penjualan berhasil ditambahkan.');
    }

    public function show(Penjualan $penjualan)
    {
        return view('penjualans.show', compact('penjualan'));
    }

    public function edit(Penjualan $penjualan)
    {
        $pelanggans = Pelanggan::all();
        return view('penjualans.edit', compact('penjualan', 'pelanggans'));
    }

    public function update(Request $request, Penjualan $penjualan)
    {
        $request->validate([
            'tanggal_penjualan' => 'required|date',
            'pelanggan_id' => 'required|exists:pelanggans,id',
        ]);

        $penjualan->update([
            'tanggal_penjualan' => $request->tanggal_penjualan,
            'pelanggan_id' => $request->pelanggan_id,
        ]);

        return redirect()->route('penjualans.index')->with('success', 'Penjualan berhasil diperbarui.');
    }

    public function destroy(Penjualan $penjualan)
    {
        // Cek apakah ada detail penjualan terkait
        if ($penjualan->detailPenjualans()->exists()) {
            return redirect()->route('penjualans.index')->with('error', 'Penjualan tidak dapat dihapus karena memiliki detail penjualan.');
        }

        $penjualan->delete();
        return redirect()->route('penjualans.index')->with('success', 'Penjualan berhasil dihapus.');
    }
}
