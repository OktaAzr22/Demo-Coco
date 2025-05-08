# Demo Coco

Projek Laravel untuk manajemen produk, kategori, keranjang, dan pemesanan.

## 📦 Fitur

- Manajemen **Kategori**
- Manajemen **Produk**
- Manajemen **Keranjang**
- Manajemen **Pesanan**
- Halaman Home menampilkan produk dalam bentuk kartu
- Checkbox & tombol "Buat Pesanan" pada halaman Keranjang

---

## ⚙️ Cara Menjalankan di Lokal

### 1. Clone Project
```bash
git clone https://github.com/OktaAzr22/Demo-Coco.git
cd demo-coco
```

### 2. Install Dependency
```bash
composer install
npm install
npm run dev
```

### 3. Konfigurasi Environment
- Salin file `.env.example` menjadi `.env`
- Sesuaikan konfigurasi database (default: MySQL)
- Generate APP_KEY:
```bash
php artisan key:generate
```

### 4. Migrasi Database
```bash
php artisan migrate
```

### 5. Jalankan Server
```bash
php artisan serve
```

> 💡 Pastikan **XAMPP aktif** dan database sudah disiapkan sesuai `.env`

---

## 💡 Panduan untuk Github Codespaces

> Untuk pengguna yang ingin melanjutkan projek ini lewat GitHub Codespaces:

### 1. Buat File/Model/Controller Sekaligus:
```bash
php artisan make:model NamaModel -mcr
```
Contoh:
```bash
php artisan make:model Produk -mcr
```

### 2. Lanjutkan dengan isi kode sesuai struktur projek ini.

### 3. Jalankan:
```bash
php artisan migrate
php artisan serve
```

---

## 🤝 Kontribusi

Silakan fork repository ini dan pull request jika ingin menambahkan fitur atau perbaikan.  

---

## 📝 Catatan

- Frontend masih menggunakan struktur dasar (belum menggunakan framework UI)
- Halaman produk ditampilkan dalam bentuk **card**, dilengkapi:
  - Gambar produk (full fit)
  - Nama kategori
  - Tombol tambah ke keranjang
- Halaman keranjang dilengkapi:
  - Checkbox untuk memilih produk yang ingin dipesan
  - Tombol "Buat Pesanan"
  - Form nama pemesan muncul saat konfirmasi

---