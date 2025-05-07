<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama', 
        'kategori_id', 
        'deskripsi', 
        'harga', 
        'stok', 
        'gambar'
    ];

    public function kategori()
    {
        return $this->belongsTo(Kategori::class);
    }

    public function pesanans()
    {
        return $this->hasMany(Pesanan::class);
    }
}