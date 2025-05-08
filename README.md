# Demo-Coco

## 📦 Fitur
- ✅ Kategori
- ✅ Produk
- ✅ Keranjang
- ✅ Pesanan

---

## 🖥️ Cara Penggunaan

### A. Menjalankan Secara Lokal (XAMPP)
Pastikan XAMPP aktif dan database MySQL sudah tersedia.

1. Clone repository:
   ```bash
   git clone https://github.com/OktaAzr22/Demo-Coco.git
   cd demo-coco
   composer install
   npm install
   npm run dev

   ->buat migrasi
      -Konfigurasi .env = Buat scema migrasi sesuaikan dengan pemahaman  mysql or sqllite, di projek menggunakan mysql sesuaikan
      -file .env example diubah menjadi .env
      -APP_KEY cp +6282379610853 
      -jalankan migrasi -> php artisan migrate
      - jalankan server -> php artisan serv

 




