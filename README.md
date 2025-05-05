<!-- <p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

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

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development/)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->

<p align="center">
  <b>Stokin</b><br>
  <i>(Pengelolaan dan Peminjaman Barang Pribadi)</i><br><br>
  <img src="images/logoUnsulbar.jpg" width="150"><br><br>
  <b>Rayhan Demas Fernanda</b><br>
  <b>D0223527</b><br><br>
  Framework Web Based<br>
  2025
</p>

---

## Role dan Fitur-fiturnya

| Role  | Fitur                                                                                                                                   |
| ----- | --------------------------------------------------------------------------------------------------------------------------------------- |
| Admin | -Mengelola semua data barang (tambah, edit, hapus).
- Mengelola data peminjaman (mencatat siapa yang pinjam, tanggal, status).
-Melihat semua riwayat barang & peminjaman.
-Bisa approve/konfirmasi pengembalian barang. |
| Owner  | -Mendaftarkan barang milik pribadinya.
-Melihat daftar barang milik sendiri.
-Mengelola status peminjaman hanya untuk barang milik sendiri (tidak semua barang).
-Melihat riwayat peminjaman barang yang dia miliki.|
| Borrower | -Melihat daftar barang yang tersedia untuk dipinjam (opsional, bisa disetting kalau mau).
-Mengajukan permintaan peminjaman barang.
-Melihat status pinjamannya sendiri (apakah masih dipinjam atau harus dikembalikan).
-Mengkonfirmasi jika sudah mengembalikan barang. |

---

## Struktur Tabel Database

### Tabel 1: [users]

| Nama Field | Tipe Data    | Keterangan                            |
| ---------- | ------------ | ------------------------------------- |
| id         | INT          | Primary key                           |
| name       | VARCHAR(255) | Nama lengkap pengguna                 |
| email      | VARCHAR(255) | Email unik untuk login                |
| password   | VARCHAR(255) | Password terenkripsi                  |
| role       | ENUM         | Role pengguna: admin, Owner, Borrower |
| 
| created_at | TIMESTAMP    | Waktu dibuat                          |
| updated_at | TIMESTAMP    | Waktu diperbarui                      |

---

### Tabel 2: [Owner]

| Nama Field  | Tipe Data    | Keterangan                                                |
| ----------- | ------------ | --------------------------------------------------------- |
| id          | INT          | Primary key                                               |
| name        | VARCHAR(255) | Nama Owner                                                |
| description | text         | Deskripsi owner (opsional)                                |
| owner_id    | INT          | Merujuk ke id di table user                               |
| is_available| Boolean      | Status ketersediaan dengan default true                   |
| created_at  | TIMESTAMP    | Waktu dibuat                                              |
| updated_at  | TIMESTAMP    | Waktu diperbarui                                          |

---

### Tabel 3: [Borrower]

| Nama Field    | Tipe Data | Keterangan                                               |
| ------------- | --------- | -------------------------------------------------------- |
| id            | INT       | Primary key, auto increment                              |
| item_id       | INT       | merujuk ke id item yang dipinjam                         |
| borrower_id   | INT       | ID orang yang mendaftar barang                           |
| borrower_date | date      | Tanggal peminjaman                                       |
| return_date   | date      | Tanggal pengembalian(opsional)                           |
| Status        | enum      | Status peminjaman                                        |
| created_at    | TIMESTAMP | Waktu pendaftaran                                        |
| updated_at    | TIMESTAMP | Waktu pembaruan (jika ada)                               |

---

## Relasi Antar Tabel

-    Tabel [users] memiliki relasi one-to-many dengan tabel [borrowers].
    - Foreign key: borrower_id di [borrowers] merujuk ke id di [users].
    - Penjelasan: 1 pengguna (dengan role borrower) bisa melakukan banyak peminjaman.

-   Tabel [owners] memiliki relasi one-to-many dengan tabel [items].
    - Foreign key: owner_id di [items] merujuk ke id di [owners].
    - Penjelasan: 1 owner bisa memiliki banyak item.

-   Tabel [items] memiliki relasi one-to-many dengan tabel [borrowers].
    - Foreign key: item_id di [borrowers] merujuk ke id di [items].
    - Penjelasan: 1 item bisa dipinjam banyak kali (oleh borrower berbeda).

---
