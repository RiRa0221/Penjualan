<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenjualan extends Model
{
    use HasFactory;

    protected $table = 'detail_penjualans';
    protected $fillable = ['penjualan_id', 'produk_id', 'jumlah_produk', 'subtotal'];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }


    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }

    // Function untuk menghitung subtotal
    public function hitungSubtotal()
    {
        return $this->produk->harga * $this->jumlah_produk;
    }

    // Format currency
    public function getFormattedSubtotalAttribute()
    {
        return 'Rp ' . number_format($this->subtotal, 2, ',', '.');
    }
}
