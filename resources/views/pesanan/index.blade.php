@extends('layouts.app')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Daftar Pesanan</h2>
        <a href="{{ route('pesanan.create') }}" class="btn btn-primary">Buat Pesanan Baru</a>
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th>No. Pesanan</th>
                <th>Produk</th>
                <th>Jumlah</th>
                <th>Total Harga</th>
                <th>Pemesan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pesanans as $pesanan)
                <tr>
                    <td>{{ $pesanan->nomor_pesanan }}</td>
                    <td>{{ $pesanan->produk->nama }}</td>
                    <td>{{ $pesanan->jumlah }}</td>
                    <td>Rp {{ number_format($pesanan->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $pesanan->nama_pemesan }}</td>
                    <td>
                        <span class="badge bg-{{ 
                            $pesanan->status == 'pending' ? 'warning' : 
                            ($pesanan->status == 'processing' ? 'info' : 
                            ($pesanan->status == 'completed' ? 'success' : 'danger')) 
                        }}">
                            {{ ucfirst($pesanan->status) }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('pesanan.show', $pesanan->id) }}" class="btn btn-info btn-sm">Lihat</a>
                        <a href="{{ route('pesanan.edit', $pesanan->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="button" onclick="confirmDelete(event)" class="btn btn-danger btn-sm">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection