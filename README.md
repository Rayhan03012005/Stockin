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

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT). -->

<h1 align="center">Stockin</h1>
<br>
<h3 align="center">Bukti Digital Peminjaman Barang</h3>
<p align="center">
  <img src="https://github.com /user-attachments/assets/3e809a21-1b25-4ef9-8e78-3bc97377b749" alt="Logo unsulbar" width="200"/>
</p>

<p align="center">
  <strong>Rayhan Demas Fernanda</strong><br/><br/>
  <strong>D0223527</strong><br/><br/>
  <strong>Framework Web Based</strong><br/><br/>
  <strong>2025</strong>
</p>


<h1>Role dan Fitur</h1>


### fitur Admin

| **Fitur**              | **Deskripsi**                                                                  |
|------------------------|--------------------------------------------------------------------------------|
| Kelola Data Akun       | Menambah, mengubah, dan menghapus Akun.                                        |
| Melihat Barang         | Melihat informasi barang yang tersedia                                         |    
| Kelola Transaksi       | Melihat dan mengelola data Transaksi Barang                                    |

### Fitur Owner

| **Fitur**                       | **Deskripsi**                                                         |
|---------------------------------|-----------------------------------------------------------------------|
| Melihat Daftar Dipinjam         | Menampilkan daftar barang yang di pinjam.                             |
| mengelola daftar barang pribadi | Menambah, mengedit, menghapus barang pribadi                          |

### Fitur Peminjam

| **Fitur**                          | **Deskripsi**                                                      |
----------------------------------------------------------------------------------------------------------|
| Melihat & Memilih Barang | Menampilkan daftar barang yang tersedia untuk dipinjam.                      |
| Meminjam Barang          | Memijam barang yang di inginkan.                                             |
| Mengembalikan Barang     | Mengembalikan barang sesuai tanggal pengembalian.                            |


### Tabel-tabel database beserta field dan tipe datanya

### 1. Tabel: users

| **Field**     | **Tipe Data**                    | **Keterangan**                                                 |
|---------------|----------------------------------|----------------------------------------------------------------|
| id            | BIGINT UNSIGNED AI               | Primary key                                                    |
| name          | VARCHAR(100)                     | Nama lengkap user                                              |
| email         | VARCHAR(150) UNIQUE              | Email user (unik)                                              |
| password      | VARCHAR(255)                     | Password (dihash)                                              |
| role          | ENUM('admin','owner','peminjam') | Jenis peran pengguna dalam sistem Repairin                     |
| created_at    | TIMESTAMP                        | Waktu data dibuat                                              |
| updated_at    | TIMESTAMP                        | Waktu terakhir data diperbarui                                 |

### 2. Tabel: Profiles

| **Field**     | **Tipe Data**        | **Keterangan**                           |
|---------------|----------------------|------------------------------------------|
| id            | BIGINT UNSIGNED AI   | Primary key                              |
| user_id       | BIGINT               | ID                                       |
| phone         | VARCHAR              | Alamat lengkap cabang                    |
| addres        | TEXT                 |                                          |
| created_at    | TIMESTAMP            | Waktu data dibuat                        |
| updated_at    | TIMESTAMP            | Waktu terakhir data diperbarui           |


### 3. Tabel: Items

| **Field**     | **Tipe Data**        | **Keterangan**                                       |
|---------------|----------------------|------------------------------------------------------|
| id            | BIGINT UNSIGNED AI   | Primary key                                          |
| user id       | BIGINT               | id user                                              |
| nama          | vARCHAR              | nama barang                                          |
| deskripsi     | TEXT NULL            | Deskripsi barang                                     |
| pasword       | INT                  | pasword barang                                       |
| created_at    | TIMESTAMP            | Waktu data dibuat                                    |
| updated_at    | TIMESTAMP            | Waktu terakhir data diperbarui                       |


### 4. Tabel: Transaction

| **Field**         | **Tipe Data**              | **Keterangan**                                       |
|-------------------|----------------------------|------------------------------------------------------|
| id                | BIGINT UNSIGNED AI         | Primary key                                          |
| item_id           | BIGINT UNSIGNED            |                                                      |
| peminjam_id       | BIGINT UNSIGNED            |                                                      |
| owner_id          | BIGINT UNSIGNED            |                                                      |
| borrow_date       | DATE                       | Tanggal dan waktu borrow                             |
| return_date       | DATE                       | Tanggal dan waktu return                             |
| satatus           | ENUM                       | Stasus                                               |
| created_at        | TIMESTAMP                  | Waktu data dibuat                                    |
| updated_at        | TIMESTAMP                  | Waktu terakhir data diperbarui                       |

### 5. Tabel: item_peminjam

| **Field**           | **Tipe Data**                  | **Keterangan**                                       |
|---------------------|--------------------------------|------------------------------------------------------|
| item_id             | BIGINT UNSIGNED AI             | Primary key                                          |
| peminjam_id         | BIGINT UNSIGNED                |                                                      |
| created_at          | TIMESTAMP                      | Waktu data dibuat                                    |
| updated_at          | TIMESTAMP                      | Waktu terakhir data diperbarui                       |
