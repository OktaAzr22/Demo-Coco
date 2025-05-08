# Demo Coco

## 📦 Fitur

- ✅ **Kategori**
- ✅ **Produk**
- ✅ **Keranjang**
- ✅ **Pesanan**
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

## 💡 Untuk Github Codespaces

>

### 1. Buat File/Model/Controller Sekaligus:
```bash
php artisan make:model NamaModel -mcr
```
Contoh:
```bash
php artisan make:model abi -mcr
dengan ini folder controller, migration, model dengan nama abi sudah ada siap ke step selanjutny
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

- frontend masih pakek struktur dasar
- coba fitur didalamnya baru muncul data" yang sudah di build di atas
- backend coco demo selesai

---