# TP8DPBO2025C1

## Janji
Saya Varrell Rizky Irvanni Mahkota dengan NIM 2306245 mengerjakan TP8 dalam mata kuliah DPBO untuk keberkahan-Nya maka saya tidak melakukan kecurangan seperti yang telah dispesifikasikan. Aamiin.

## Dokumentasi

## Desain Program

### Struktur Database
Program ini menggunakan database MySQL dengan nama `tp_mvc` yang terdiri dari 2 tabel:

1. **Tabel `students`**
   - `id` (Primary Key, Auto Increment)
   - `name` (Nama mahasiswa)
   - `nim` (Nomor Induk Mahasiswa, Unique)
   - `phone` (Nomor telepon mahasiswa)
   - `join_date` (Tanggal bergabung)
   - `major_id` (Foreign Key, referensi ke tabel majors)

2. **Tabel `majors`**
   - `id` (Primary Key, Auto Increment)
   - `code` (Kode jurusan, Unique)
   - `name` (Nama jurusan)
   - `faculty` (Fakultas jurusan)

Relasi: Terdapat relasi one-to-many antara tabel `majors` dan `students`. Satu jurusan dapat memiliki banyak mahasiswa, tetapi satu mahasiswa hanya memiliki satu jurusan.

### Struktur Folder (MVC Architecture)
Program ini menerapkan arsitektur MVC (Model-View-Controller) dengan struktur folder sebagai berikut:

- **config/**
  - `connection.php` - Class untuk koneksi database
  
- **models/**  
  - `Student.php` - Model untuk operasi CRUD pada tabel students
  - `Major.php` - Model untuk operasi CRUD pada tabel majors
  
- **views/**
  - **students/**
    - `index.php` - Menampilkan daftar semua mahasiswa
    - `create.php` - Form untuk tambah mahasiswa baru
    - `edit.php` - Form untuk edit data mahasiswa
  - **majors/**
    - `index.php` - Menampilkan daftar semua jurusan
    - `create.php` - Form untuk tambah jurusan baru
    - `edit.php` - Form untuk edit data jurusan
  - **templates/**
    - `header.php` - Template header untuk semua halaman
    - `footer.php` - Template footer untuk semua halaman
    
- **controllers/**
  - `StudentController.php` - Controller untuk mengelola operasi terkait mahasiswa
  - `MajorController.php` - Controller untuk mengelola operasi terkait jurusan
  
- **assets/**
  - css/ - File CSS (Bootstrap)
  - js/ - File JavaScript (jQuery, Popper, Bootstrap)
  
- `index.php` - Entry point dan router aplikasi

## Alur Kerja
1. Semua request masuk melalui `index.php` yang berfungsi sebagai router
2. Router menentukan controller dan action yang akan dijalankan berdasarkan parameter URL
3. Controller memanggil model untuk mengambil atau memanipulasi data
4. Controller kemudian memanggil view untuk menampilkan data

### Contoh Alur:
1. **Index Mahasiswa**
   - Request: `index.php?page=students`
   - Router memanggil `StudentController->index()`
   - Controller meminta data dari `Student` model
   - Controller merender `views/students/index.php`

2. **Tambah Mahasiswa**
   - Request: `index.php?page=students&action=create` (GET)
   - Router memanggil `StudentController->create()`
   - Controller merender form `views/students/create.php`
   - User mengisi form dan submit (POST)
   - Controller memvalidasi data dan menyimpan ke database melalui model
   - Controller redirect ke halaman index

3. **Edit Mahasiswa**
   - Request: `index.php?page=students&action=edit&id=1` (GET)
   - Router memanggil `StudentController->edit(1)`
   - Controller meminta data dari model
   - Controller merender form `views/students/edit.php` dengan data yang ada
   - User mengubah data dan submit (POST)
   - Controller memvalidasi dan menyimpan perubahan melalui model
   - Controller redirect ke halaman index

4. **Hapus Mahasiswa**
   - Request: `index.php?page=students&action=delete&id=1`
   - Router memanggil `StudentController->delete(1)`
   - Controller meminta model untuk menghapus data
   - Controller redirect ke halaman index

Alur yang sama berlaku untuk manajemen data jurusan (majors).
