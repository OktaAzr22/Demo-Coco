@extends('layouts.app')

@section('content')
<h2 class="mb-4">Semua Produk</h2>

<div class="row row-cols-1 row-cols-md-4 g-4">
    @foreach($produks as $produk)
    <div class="col">
        <div class="card h-100">
            <div class="ratio ratio-1x1">
                @if($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}" class="card-img-top" alt="{{ $produk->nama }}" style="object-fit: cover;">
                @else
                    <img src="https://via.placeholder.com/300x300?text=No+Image" class="card-img-top" alt="No Image">
                @endif
            </div>
            <div class="card-body">
                <h5 class="card-title">{{ $produk->nama }}</h5>
                <p class="text-muted mb-1">Kategori: {{ $produk->kategori->nama ?? '-' }}</p>
                <p class="fw-bold">Rp {{ number_format($produk->harga, 0, ',', '.') }}</p>
                <form action="{{ route('keranjang.tambah', $produk->id) }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-sm btn-primary w-100">Tambah ke Keranjang</button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
@endsection
