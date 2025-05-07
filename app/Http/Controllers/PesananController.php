<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;
use App\Models\Produk;
use Illuminate\Http\Request;


class PesananController extends Controller
{
    public function index()
    {
        $pesanans = Pesanan::with('produk')->get();
        return view('pesanan.index', compact('pesanans'));
    }

    public function create()
    {
        $produks = Produk::all();
        return view('pesanan.create', compact('produks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'produk_id' => 'required|exists:produks,id',
            'jumlah' => 'required|integer|min:1',
            'nama_pemesan' => 'required|string|max:255',
            'alamat' => 'required|string',
            'telepon' => 'required|string',
        ]);
    
        $produk = Produk::findOrFail($request->produk_id);
    
        if ($produk->stok < $request->jumlah) {
            return back()->with('error', 'Stok produk tidak mencukupi');
        }
    
        $produk->decrement('stok', $request->jumlah);
    
        Pesanan::create([
            'produk_id' => $request->produk_id,
            'jumlah' => $request->jumlah,
            'nama_pemesan' => $request->nama_pemesan,
            'alamat' => $request->alamat,
            'telepon' => $request->telepon,
            'status' => 'pending',
        ]);
    
        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dibuat!');
    }

    public function show(Pesanan $pesanan)
    {
        return view('pesanan.show', compact('pesanan'));
    }

    public function edit(Pesanan $pesanan)
    {
        $produks = Produk::all();
        return view('pesanan.edit', compact('pesanan', 'produks'));
    }

    public function update(Request $request, Pesanan $pesanan)
    {
        $request->validate([
            'status' => 'required|in:pending,processing,completed,cancelled',
        ]);
    
        $pesanan->update(['status' => $request->status]);
    
        return redirect()->route('pesanan.index')
            ->with('success', 'Status pesanan berhasil diperbarui!');
    }

    public function destroy(Pesanan $pesanan)
    {
        $produk = $pesanan->produk;
        $produk->increment('stok', $pesanan->jumlah);

        $pesanan->delete();

        return redirect()->route('pesanan.index')
            ->with('success', 'Pesanan berhasil dihapus!');
    }

    public function riwayat(Request $request)
{
    $query = Pesanan::with('produk')
        ->orderBy('created_at', 'desc');

    // Filter berdasarkan status
    if ($request->has('status') && $request->status != '') {
        $query->where('status', $request->status);
    }

    // Filter berdasarkan tanggal
    if ($request->has('tanggal') && $request->tanggal != '') {
        $query->whereDate('created_at', $request->tanggal);
    }

    // Pencarian
    if ($request->has('search') && $request->search != '') {
        $search = $request->search;
        $query->where(function($q) use ($search) {
            $q->where('nomor_pesanan', 'like', "%$search%")
              ->orWhere('nama_pemesan', 'like', "%$search%")
              ->orWhere('alamat', 'like', "%$search%")
              ->orWhere('telepon', 'like', "%$search%")
              ->orWhereHas('produk', function($q) use ($search) {
                  $q->where('nama', 'like', "%$search%");
              });
        });
    }

    $pesanans = $query->paginate(10);
    $statuses = ['pending', 'processing', 'completed', 'cancelled'];

    return view('pesanan.riwayat', compact('pesanans', 'statuses'));
}
}