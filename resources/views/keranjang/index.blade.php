@extends('layouts.app')

@section('content')
<h2 class="mb-4">Keranjang Belanja</h2>

@if($keranjangs->isEmpty())
    <p>Keranjang  kosong.</p>
@else
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Produk</th>
                <th>Harga</th>
                <th>Jumlah</th>
                <th>Total</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @php $grandTotal = 0; @endphp
            @foreach($keranjangs as $item)
                @php $total = $item->produk->harga * $item->jumlah; $grandTotal += $total; @endphp
                <tr>
                    <td>{{ $item->produk->nama }}</td>
                    <td>Rp {{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                    <td>{{ $item->jumlah }}</td>
                    <td>Rp {{ number_format($total, 0, ',', '.') }}</td>
                    <td>
                        <form action="{{ route('keranjang.hapus', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus item ini?')">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            <tr>
                <td colspan="3"><strong>Total</strong></td>
                <td colspan="2"><strong>Rp {{ number_format($grandTotal, 0, ',', '.') }}</strong></td>
            </tr>
        </tbody>
    </table>
    <form action="{{ route('pesanan.proses') }}" method="POST">
      @csrf
  
      <div class="mb-3">
          <label>Nama Pemesan</label>
          <input type="text" name="nama_pemesan" class="form-control" required>
      </div>
      <div class="mb-3">
          <label>Alamat</label>
          <textarea name="alamat" class="form-control" required></textarea>
      </div>
      <div class="mb-3">
          <label>No. Telepon</label>
          <input type="text" name="telepon" class="form-control" required>
      </div>
  
      <table class="table">
          <thead>
              <tr>
                  <th>Pilih</th>
                  <th>Produk</th>
                  <th>Jumlah</th>
                  <th>Harga</th>
              </tr>
          </thead>
          <tbody>
              @foreach ($keranjangs as $item)
                  <tr>
                      <td>
                          <input type="checkbox" name="selected[]" value="{{ $item->id }}">
                      </td>
                      <td>{{ $item->produk->nama }}</td>
                      <td>{{ $item->jumlah }}</td>
                      <td>Rp{{ number_format($item->produk->harga, 0, ',', '.') }}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
  
      <button type="submit" class="btn btn-success">Buat Pesanan</button>
  </form>
  
@endif
@endsection
