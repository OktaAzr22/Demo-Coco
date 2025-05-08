## Cara penggunaan:

A. Di lokal = bash salin -> git clone https://github.com/OktaAzr22/Demo-Coco.git
                         -> cd demo-coco
                         -> composer install
                         -> npm install
                         -> npm run dev
             buat migrasi -> env. "Buat scema migrasi sesuaikan dengan pemahaman  mysql or sqllite,   di              projek menggunakan mysql" sesuaikan 
                          -> file .env example diubah menjadi .env
                          -> APP_KEY cp +6282379610853   
                          -> jalankan migrasi -> php artisan migrate
                          -> jalankan server -> php artisan serv

   -> ## xampp wajib aktif
      ## Projek berhasil dijalankan di lokal
      ## Frontend masih struktur dasar perlu dikembangkan

B. Di repo github codespaces penggunaan masih manual penulisan syntak
      bash -> Buat controller php artisan make:model "nama_folder_controller" -mcr
           -> contoh syntak php artisan make:model abi -mcr
              dengan ini controller, model, migrations dengan nama abi sudah ada dengan satu prompt
           -> baru isi code" sesuaikan dengan isi repo ini untuk syntaknya
           -> jalankan migrasi php artisan migrate
           -> jalankan server php artisan serv
           -> selesai.

## Fitur 
kategori
produk
pesanan
keranjang
