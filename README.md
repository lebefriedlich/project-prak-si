# Sistem Pendukung Keputusan Pemilihan Asisten Dosen Menggunakan Metode SAW

## Perangkat lunak yang saya gunakan
- Composer versi 2.6.6
- git versi 2.41.0
- Laravel versi 11.30.0
- PHP versi 8.2.21
- MySQL versi 8.0.31

## Instalasi
1. Buka terminal atau command prompt.
2. Clone repository ini ke dalam direktori yang anda inginkan:
   ```
   git clone https://github.com/lebefriedlich/spk_asdos_saw.git
   ```
3. Masuk ke direktori proyek:
   ```
   cd spk_asdos_saw
   ```
4. Install semua dependencies menggunakan Composer:
   ```
   composer install
   ```
5. Salin file `.env.example` kemudian rename menjadi `.env`:
6. Konfigurasi file `.env` dengan pengaturan database Anda. ada di baris 22 - 27.
7. Generate key aplikasi Laravel:
   ```
   php artisan key:generate
   ```
8. Jalankan migrasi dan seeder untuk membuat struktur database dan pengisian data awal:
   ```
   php artisan migrate --seed
   ```
   Jika Anda mendapatkan pesan error "The database 'nama-database' does not exist on the 'mysql' connection" itu muncul karena nama 
   databasenya masih belum tersedia, ketikkan `yes` untuk membuat database secara otomatis ketika diminta oleh perintah migrasi.
9. Pastikan migrasi selesai tanpa pesan error untuk memastikan struktur database terbuat dengan benar.
10. Jalankan server Laravel:
    ```
    php artisan serve
    ```
    Akses aplikasi melalui browser di `http://127.0.0.1:8000`.

## Daftar Akun
### Admin
- **Username**: admin
- **Password**: admin
