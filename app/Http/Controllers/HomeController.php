<?php

namespace App\Http\Controllers;

use App\Models\Produk;

class HomeController extends Controller
{
   public function index()
   {
       $produks = Produk::with('kategori')->get();
       return view('home', compact('produks'));
   }
}
