<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

# Class Task Tracker API

Class Task Tracker adalah aplikasi backend berbasis Laravel yang dirancang untuk mengelola tugas kelas antara Guru dan Siswa. Aplikasi ini menggunakan autentikasi Laravel Sanctum dan memisahkan hak akses berdasarkan role (Guru dan Siswa).

---

## 🚀 Cara Menjalankan Aplikasi dari Nol (Langkah Demi Langkah)

Ikuti langkah-langkah berikut untuk menjalankan project ini di komputer lokal Anda:

1. **Clone Repository**
   ```bash
   git clone <https://github.com/mohardianmaulana/class_task_tracker1.git>
   cd class-task-tracker

2. composer install
    ```bash
    composer install

3. Salin File Konfigurasi Environment
    ```bash
    cp .env.example .env

4. Generate App Key
    ```bash
    php artisan key:generate

5. Konfigurasi Database
    Buka file .env, lalu sesuaikan bagian koneksi database dengan database lokal Anda (misalnya menggunakan MySQL/MariaDB)

6. Jalankan Migrasi Database
    ```bash
    php artisan migrate --seed

7. Jalankan Server Lokal
    ```bash
    php artisan serve

Akun contoh untuk login
* **Role Guru:**
  * **Email:** `guru1@gmail.com`
  * **Password:** `password123`

* **Role Siswa:**
  * **Email:** `siswa1@gmail.com`
  * **Password:** `password123`

Daftar Endpoint API
1. Register
    http://127.0.0.1:8000/api/register
2. Login
    http://127.0.0.1:8000/api/login
3. Logout
    http://127.0.0.1:8000/api/logout
4. Get task
    http://127.0.0.1:8000/api/tasks
5. Store task
    http://127.0.0.1:8000/api/tasks/{id}
6. Update task
    http://127.0.0.1:8000/api/tasks/{id}
7. Delete task
    http://127.0.0.1:8000/api/tasks/{id}
8. Accept task
    http://127.0.0.1:8000/api/tasks/{id}/complete

* **Keputusan desain yang diambil**
* **Penggunaan Laravel Sanctum: Dipilih karena ringan dan sangat ideal untuk autentikasi berbasis API (Token-based authentication) pada aplikasi SPA atau Mobile.**

* **Pemisahan Validasi dengan Form Request: Menggunakan kelas TaskRequest dan UserRequest terpisah agar controller tetap bersih (clean code) dan logika validasi serta pesan error terpusat dengan rapi.**

* **Otorisasi Berbasis Role: Menerapkan pembatasan rute menggunakan middleware berdasarkan role (guru dan siswa) untuk memastikan keamanan data sesuai hak akses masing-masing pengguna.**

* **Sebenarnya ingin menerapkan Service-repository pattern, tapi dikarenakan waktu yang kurang, akhirnya tidak jadi menggunakan**

* **Bagian yang belum selesai**
* Fitur-fitur berikut belum sempat diselesaikan pada tahap ini dan akan dikerjakan jika ada waktu tambahan:

* Fitur Lanjutan pada Daftar Tugas (GET /api/tasks): Pencarian tugas berdasarkan judul, filter berdasarkan status (selesai atau belum), serta penerapan paginasi data.

* Frontend Antarmuka Web: Pembuatan tampilan antarmuka web interaktif yang mencakup seluruh alur kerja (dari login, manajemen tugas, hingga status loading dan pesan error yang jelas bagi pengguna).
