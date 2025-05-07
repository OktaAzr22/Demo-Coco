@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Riwayat Pesanan</h1>

    <!-- Filter dan Pencarian -->
    <div class="card mb-4">
        <div class="card-body">
            <form action="{{ route('pesanan.riwayat') }}" method="GET">
                <div class="row">
                    <div class="col-md-3">
                        <label for="status" class="form-label">Status</label>
                        <select name="status" id="status" class="form-select">
                            <option value="">Semua Status</option>
                            @foreach($statuses as $status)
                                <option value="{{ $status }}" {{ request('status') == $status ? 'selected' : '' }}>
                                    {{ ucfirst($status) }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal" id="tanggal" class="form-control" 
                               value="{{ request('tanggal') }}">
                    </div>
                    <div class="col-md-4">
                        <label for="search" class="form-label">Pencarian</label>
                        <input type="text" name="search" id="search" class="form-control" 
                               placeholder="Cari pesanan..." value="{{ request('search') }}">
                    </div>
                    <div class="col-md-2 d-flex align-items-end">
                        <button type="submit" class="btn btn-primary me-2">Filter</button>
                        <a href="{{ route('pesanan.riwayat') }}" class="btn btn-secondary">Reset</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Tabel Riwayat -->
    <div class="card">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No. Pesanan</th>
                            <th>Produk</th>
                            <th>Jumlah</th>
                            <th>Total</th>
                            <th>Pemesan</th>
                            <th>Status</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pesanans as $pesanan)
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
                                <td>{{ $pesanan->created_at->format('d/m/Y H:i') }}</td>
                                <td>
                                    <a href="{{ route('pesanan.show', $pesanan->id) }}" 
                                       class="btn btn-sm btn-info">Detail</a>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center">Tidak ada data pesanan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="mt-4">
                {{ $pesanans->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>
@endsection