<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Keranjang;
use App\Models\Produk;

class KeranjangController extends Controller
{
    public function index()
    {
        $keranjangs = Keranjang::with('produk')->get();
        return view('keranjang.index', compact('keranjangs'));
    }

    public function tambah($id)
    {
        $item = Keranjang::where('produk_id', $id)->first();

        if ($item) {
            $item->jumlah += 1;
            $item->save();
        } else {
            Keranjang::create([
                'produk_id' => $id,
                'jumlah' => 1
            ]);
        }

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil ditambahkan ke keranjang!');
    }

    public function hapus($id)
    {
        $item = Keranjang::findOrFail($id);
        $item->delete();

        return redirect()->route('keranjang.index')->with('success', 'Produk berhasil dihapus dari keranjang!');
    }
}
