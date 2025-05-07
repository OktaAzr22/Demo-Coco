@extends('layouts.app')

@section('content')
    <h2>Edit Status Pesanan</h2>
    
    <div class="card mb-4">
        <div class="card-body">
            <h5 class="card-title">Detail Pesanan</h5>
            <p><strong>No. Pesanan:</strong> {{ $pesanan->nomor_pesanan }}</p>
            <p><strong>Produk:</strong> {{ $pesanan->produk->nama }}</p>
            <p><strong>Jumlah:</strong> {{ $pesanan->jumlah }}</p>
            <p><strong>Total Harga:</strong> Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</p>
            <p><strong>Pemesan:</strong> {{ $pesanan->nama_pemesan }}</p>
            <p><strong>Alamat:</strong> {{ $pesanan->alamat }}</p>
            <p><strong>Telepon:</strong> {{ $pesanan->telepon }}</p>
        </div>
    </div>
    
    <form id="formUpdate" action="{{ route('pesanan.update', $pesanan->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="status" class="form-label">Status Pesanan</label>
            <select class="form-select" id="status" name="status" required>
                <option value="pending" {{ $pesanan->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="processing" {{ $pesanan->status == 'processing' ? 'selected' : '' }}>Processing</option>
                <option value="completed" {{ $pesanan->status == 'completed' ? 'selected' : '' }}>Completed</option>
                <option value="cancelled" {{ $pesanan->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
            </select>
        </div>
        <button type="button" onclick="konfirmasiUpdate()" class="btn btn-primary">Update</button>
        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Batal</a>
    </form>
@endsection