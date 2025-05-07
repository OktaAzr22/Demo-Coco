@extends('layouts.app')

@section('content')
    <h2>Buat Pesanan Baru</h2>
    
    <form action="{{ route('pesanan.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="produk_id" class="form-label">Produk</label>
            <select class="form-select" id="produk_id" name="produk_id" required>
                <option value="">Pilih Produk</option>
                @foreach($produks as $produk)
                    <option value="{{ $produk->id }}" data-harga="{{ $produk->harga }}" data-stok="{{ $produk->stok }}">
                        {{ $produk->nama }} (Rp {{ number_format($produk->harga, 0, ',', '.') }}) - Stok: {{ $produk->stok }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="jumlah" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="jumlah" name="jumlah" min="1" required>
            <small id="stokInfo" class="form-text text-muted"></small>
        </div>
        <div class="mb-3">
            <label for="nama_pemesan" class="form-label">Nama Pemesan</label>
            <input type="text" class="form-control" id="nama_pemesan" name="nama_pemesan" required>
        </div>
        <div class="mb-3">
            <label for="alamat" class="form-label">Alamat</label>
            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
        </div>
        <div class="mb-3">
            <label for="telepon" class="form-label">Telepon</label>
            <input type="text" class="form-control" id="telepon" name="telepon" required>
        </div>
        <div class="mb-3">
            <label class="form-label">Total Harga</label>
            <div id="totalHarga" class="form-control-plaintext">Rp 0</div>
        </div>
        <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        <a href="{{ route('pesanan.index') }}" class="btn btn-secondary">Batal</a>
    </form>

    <script>
        document.getElementById('produk_id').addEventListener('change', function() {
            updateStokInfo();
            calculateTotal();
        });

        document.getElementById('jumlah').addEventListener('input', function() {
            updateStokInfo();
            calculateTotal();
        });

        function updateStokInfo() {
            const produkSelect = document.getElementById('produk_id');
            const jumlahInput = document.getElementById('jumlah');
            const stokInfo = document.getElementById('stokInfo');
            
            if (produkSelect.selectedIndex > 0) {
                const selectedOption = produkSelect.options[produkSelect.selectedIndex];
                const stok = parseInt(selectedOption.getAttribute('data-stok'));
                
                stokInfo.textContent = `Stok tersedia: ${stok}`;
                
                if (parseInt(jumlahInput.value) > stok) {
                    stokInfo.classList.remove('text-muted');
                    stokInfo.classList.add('text-danger');
                } else {
                    stokInfo.classList.remove('text-danger');
                    stokInfo.classList.add('text-muted');
                }
            } else {
                stokInfo.textContent = '';
            }
        }

        function calculateTotal() {
            const produkSelect = document.getElementById('produk_id');
            const jumlahInput = document.getElementById('jumlah');
            const totalHarga = document.getElementById('totalHarga');
            
            if (produkSelect.selectedIndex > 0 && jumlahInput.value) {
                const selectedOption = produkSelect.options[produkSelect.selectedIndex];
                const harga = parseInt(selectedOption.getAttribute('data-harga'));
                const jumlah = parseInt(jumlahInput.value);
                const total = harga * jumlah;
                
                totalHarga.textContent = `Rp ${total.toLocaleString('id-ID')}`;
            } else {
                totalHarga.textContent = 'Rp 0';
            }
        }
    </script>
@endsection