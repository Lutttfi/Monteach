<p align="center">
  <img src="public/storage/logo.png" width="200" alt="Logo SMKN 2 Bangkalan">
</p>

<h1 align="center">📚 Monteach - Aplikasi Absensi Guru Berbasis Web</h1>

<p align="center">
  Proyek Ujian Praktik Kejuruan RPL <br/>
  <strong>SMKN 2 Bangkalan</strong> | Tahun 2025
</p>

<p align="center">
  <a href="https://github.com/Lutttfi/Monteach"><img src="https://img.shields.io/github/stars/Lutttfi/Monteach?style=social" alt="GitHub stars"></a>
  <a href="https://github.com/Lutttfi/Monteach"><img src="https://img.shields.io/github/license/Lutttfi/Monteach" alt="License"></a>
  <a href="https://laravel.com"><img src="https://img.shields.io/badge/Built%20with-Laravel-red" alt="Laravel"></a>
</p>

---

## 📖 Tentang Monteach

**Monteach** adalah sebuah aplikasi berbasis web yang dirancang untuk mempermudah proses absensi guru di sekolah. Sistem ini menggantikan metode manual dengan pendekatan digital yang lebih efisien dan transparan.  

Sistem ini melibatkan **3 peran pengguna utama**:

- 👩‍💼 **Admin**: Menugaskan guru piket dan memantau rekap absensi.
- 👨‍🏫 **Guru Piket**: Mengisi data kehadiran guru berdasarkan tugas.
- 👨‍🎓 **Siswa**: Mengonfirmasi kehadiran guru di kelas.

Data yang tercatat akan secara otomatis direkap dan dapat diekspor dalam format Excel sebagai dokumentasi resmi sekolah.

---

## 🚀 Fitur Utama

- 🔐 Login berdasarkan peran (Admin, Guru Piket, Siswa)
- 📝 Penugasan piket guru oleh admin
- 📆 Absensi guru oleh guru piket
- ✅ Konfirmasi kehadiran oleh siswa
- 📊 Rekap otomatis kehadiran guru
- 📤 Ekspor data absensi ke format Excel
- 📱 Responsif, dapat diakses dari desktop & perangkat mobile

---

## 🛠️ Teknologi yang Digunakan

- **Laravel 11** – PHP Framework
- **MySQL** – Sistem Manajemen Basis Data
- **Blade** – Template Engine Laravel
- **Bootstrap** – Front-end Framework
- **JavaScript** – Interaktivitas Halaman

---

## 🖥️ Persyaratan Sistem

- PHP >= 8.1
- Composer
- MySQL
- Web Server (Artisan/XAMPP)

---

## ⚙️ Cara Instalasi

```bash
# 1. Clone repository ini
git clone https://github.com/Lutttfi/Monteach.git
cd Monteach

# 2. Install dependensi Laravel
composer install

# 3. Salin file konfigurasi .env
cp .env.example .env

# 4. Generate application key
php artisan key:generate

# 5. Lakukan migrasi dan seeder
php artisan migrate
php artisan db:seed --class=RoleSeeder
php artisan db:seed --class=UserSeeder

# 6. Jalankan server
php artisan serve