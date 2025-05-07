@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Detail Produk</h2>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-4">
                    @if($produk->gambar)
                        <img src="{{ asset('storage/' . $produk->gambar) }}" alt="{{ $produk->nama }}" class="img-fluid">
                    @else
                        <div class="text-center text-muted py-5">No image available</div>
                    @endif
                </div>
                <div class="col-md-8">
                    <h3>{{ $produk->nama }}</h3>
                    <p><strong>Kategori:</strong> {{ $produk->kategori->nama }}</p>
                    <p><strong>Harga:</strong> Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                    <p><strong>Stok:</strong> {{ $produk->stok }}</p>
                    <p><strong>Deskripsi:</strong></p>
                    <p>{{ $produk->deskripsi }}</p>
                    
                    <div class="mt-4">
                        <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning">Edit</a>
                        <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                        </form>
                        <a href="{{ route('produk.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection