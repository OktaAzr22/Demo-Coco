<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesanan extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomor_pesanan',
        'produk_id',
        'jumlah',
        'total_harga',
        'nama_pemesan',
        'alamat',
        'telepon',
        'status'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($pesanan) {
            $pesanan->nomor_pesanan = 'ORD-' . strtoupper(uniqid());
            $pesanan->total_harga = $pesanan->produk->harga * $pesanan->jumlah;
        });
    }

    public function produk()
    {
        return $this->belongsTo(Produk::class);
    }
}