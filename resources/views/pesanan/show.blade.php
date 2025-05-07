@extends('layouts.app')

@section('content')
    <div class="card">
        <div class="card-header">
            <h2>Detail Pesanan</h2>
        </div>
        <div class="card-body">
            <p><strong>No. Pesanan:</strong> {{ $pesanan->nomor_pesanan }}</p>
            <p><strong>Produk:</strong> {{ $pesanan->produk->nama }}</p>
            <p><strong>Jumlah:</strong> {{ $pesanan->jumlah }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
            <p><strong>Pemesan:</strong> {{ $pesanan->nama_pemesan }}</p>
            <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
            <p><strong>Telepon:</strong> {{ $pesanan->telepon }}</p>
            <p><strong>Status:</strong> 
                <span class="badge bg-{{ 
                    $pesanan->status == 'pending' ? 'warning' : 
                    ($pesanan->status == 'processing' ? 'info' : 
                    ($pesanan->status == 'completed' ? 'success' : 'danger')) 
                }}">
                    {{ ucfirst($pesanan->status) }}
                </span>
            </p>
            <p><strong>Tanggal Pesanan:</strong> {{ $pesanan->created_at->format('d/m/Y H:i') }}</p>
            
            <div class="mt-4">
                <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-warning">Edit Status</a>
                <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin?')">Hapus</button>
                </form>
                <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Kembali</a>
            </div>
        </div>
    </div>
@endsection