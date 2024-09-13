# TUGAS 2 PRAKTEK WEB 2
## HALO
### Nama  : Tika Kuswardani
### Kelas  : TI 2B
### NPM    : 230102046

<BR>

### 1. Membuat file koneksi
- class Database: Kelas ini bertugas untuk mengatur koneksi ke database. membuat atribut seperti db_host, db_user, db_pass, dan db_name berisi informasi untuk mengakses database.
```php
class Database {
    private $db_host = "localhost"; // Host database
    private $db_user = "root"; // Username database
    private $db_pass = ""; // Password database
    private $db_name = "pweb"; // Nama database
    public $connection; // Koneksi database yang akan digunakan di kelas lain
```
- public function __construct(): Fungsi ini otomatis dipanggil ketika kelas diinstansiasi, dan mencoba membuat koneksi ke database menggunakan mysqli_connect. Jika koneksi berhasil, pesan "Koneksi database berhasil" ditampilkan, jika tidak, pesan "Koneksi gagal" ditampilkan.
```php
// Konstruktor untuk membuat koneksi ke database
    public function __construct() {
        // Menghubungkan ke database menggunakan mysqli_connect()
        $this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        // Mengecek apakah koneksi berhasil
        if ($this->connection) {
            echo ("Koneksi database berhasil"); // Jika berhasil, menampilkan pesan
        } else {
            echo "Koneksi gagal"; // Jika gagal, menampilkan pesan error
        }
    }
}
```
- class Lecturers extends Database: Kelas ini adalah turunan dari kelas Database, sehingga mewarisi koneksi ke database dari kelas induk.
```php
// Kelas Lecturers untuk mengelola data dari tabel lecturers
class Lecturers extends Database {
```
- public function tampilkanData(): Fungsi ini digunakan untuk mengambil seluruh data dari tabel lecturers di database. Hasil query SQL dimasukkan ke dalam array $array yang kemudian dikembalikan sebagai hasil dari fungsi.
```php
// Fungsi untuk menampilkan semua data dari tabel lecturers
    public function tampilkanData() {
        $query = "SELECT * FROM lecturers"; // Query SQL untuk mengambil semua data dari tabel lecturers
        $result = mysqli_query($this->connection, $query); // Menjalankan query dengan mysqli_query() menggunakan koneksi yang diwarisi
        $array = array(); // Array untuk menyimpan hasil query
        // Mengambil hasil query dan memasukkannya ke array
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}
```
- class Course_Lecturers extends Database: Kelas ini juga mewarisi koneksi database dari kelas Database.
```php
/ Fungsi untuk menampilkan semua data dari tabel course_lecturers
    public function tampilkanData() {
        $query = "SELECT * FROM course_lecturers"; // Query SQL untuk mengambil semua data dari tabel course_lecturers
        $result = mysqli_query($this->connection, $query); // Menjalankan query dengan mysqli_query()
        $array = array(); // Array untuk menyimpan hasil query
        // Mengambil hasil query dan memasukkannya ke array
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}
```
- class Sumingkir extends Database: Kelas ini juga mewarisi koneksi dari kelas Database dan membuat public function tampilkanData(): Fungsi ini mengambil data dari tabel lecturers di mana kolom name memiliki nilai "Sumingkir". Hasilnya disimpan dalam array dan dikembalikan sebagai output.
```php
// Kelas Sumingkir untuk mengelola data dari tabel lecturers dengan nama 'Sumingkir'
class Sumingkir extends Database {
    // Fungsi untuk menampilkan data dari tabel lecturers dengan nama 'Sumingkir'
    public function tampilkanData() {
        $query = "SELECT * FROM lecturers WHERE name = 'Sumingkir'"; // Query SQL untuk mengambil data dari tabel lecturers di mana nama adalah 'Sumingkir'
        $result = mysqli_query($this->connection, $query); // Menjalankan query
        $array = array(); // Array untuk menyimpan hasil query
        // Mengambil hasil query dan memasukkannya ke array
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}
```
- class Kalisabuk extends Database: Kelas ini mengambil data dengan nama "Kalisabuk" dari tabel lecturers, mewarisi koneksi dari kelas Database dan membuat public function tampilkanData(): Sama seperti kelas Sumingkir, tetapi untuk data di mana name adalah "Kalisabuk".
```php
// Kelas Kalisabuk untuk mengelola data dari tabel lecturers dengan nama 'Kalisabuk'
class Kalisabuk extends Database {
    // Fungsi untuk menampilkan data dari tabel lecturers dengan nama 'Kalisabuk'
    public function tampilkanData() {
        $query = "SELECT * FROM lecturers WHERE name = 'Kalisabuk'"; // Query SQL untuk mengambil data dari tabel lecturers di mana nama adalah 'Kalisabuk'
        $result = mysqli_query($this->connection, $query); // Menjalankan query
        $array = array(); // Array untuk menyimpan hasil query
        // Mengambil hasil query dan memasukkannya ke array
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}
```
- OUTPUT<BR>

<img width="629" alt="KONEKSI" src="https://github.com/user-attachments/assets/77453a0a-8d77-437d-85d2-faf8d5794383">
  
### 2. Membuat file tampil data
file ini berguna untuk menampilkan data apa yang telah kita buat di database dan membuat fungsi atau metode lainnya.

- membuat Struktur HTML dan CSS
- Bootstrap digunakan untuk membuat desain yang rapi dan responsif.
- DataTables digunakan untuk membuat tabel interaktif
- Custom CSS diterapkan pada body, card, dan tabel agar tampil lebih menarik.
```html
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
  <title>DATABASE</title>
  <style>
```
```css
    body {
      background-color: #f4f6f9;
    }
    .card {
      border-radius: 10px;
    }
    .card-header {
      background-color: #343a40;
      color: #fff;
      border-bottom: 2px solid #007bff;
      padding: 15px;
    }
    .card-body {
      padding: 20px;
    }
    table thead {
      background-color: #007bff;
      color: white;
    }
    table td, table th {
      text-align: center;
      vertical-align: middle;
    }
    .btn-group {
      margin-bottom: 20px;
    }
  </style>
</head>
```
- Tombol filter untuk memilih tampilan data berdasarkan lecturers, course_lecturers, Sumingkir, atau Kalisabuk dan tombol ini akan mengirimkan data melalui metode GET ke URL, dan hasilnya diambil menggunakan variabel filter.
```html
<body>
  <div class="container mt-5">
    <div class="col-lg-12">
      <div class="btn-group d-flex justify-content-center mb-4">
        <form method="get" action="">
          <button class="btn btn-primary" name="filter" value="all">Tabel Lecturers</button>
          <button class="btn btn-warning" name="filter" value="course_lecturers">Tabel Course Lecturers</button>
          <button class="btn btn-info" name="filter" value="sumingkir">Sumingkir</button>
          <button class="btn btn-success" name="filter" value="kalisabuk">Kalisabuk</button>
        </form>
      </div>
```
- Judul tabel berubah berdasarkan pilihan filter yang diambil dari URL (GET) dan Jika filter adalah course_lecturers, maka judulnya adalah "Course Lecturers List", jika tidak, "Lecturers List".
```php
<h4 class="mb-0">
  <?php
    $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
    if ($filter === 'course_lecturers') {
      echo 'Course Lecturers List';
    } else {
      echo 'Lecturers List';
    }
  ?>
```
- Tabel ini dinamis, header-nya berubah sesuai dengan filter yang dipilih.
- Jika course_lecturers dipilih, header tabel akan sesuai dengan kolom pada tabel course_lecturers. Jika tidak, maka akan menampilkan kolom dari tabel lecturers.
```php
<thead>
  <tr>
    <?php
      if ($filter === 'course_lecturers') {
        echo '<th>ID</th><th>Lecturers ID</th><th>Course ID</th><th>Deleted At</th><th>Created At</th><th>Updated At</th>';
      } else {
        echo '<th>ID</th><th>Name</th><th>Phone Number</th><th>Address</th><th>NIDN</th><th>NIP</th><th>User ID</th><th>Created At</th><th>Updated At</th>';
      }
    ?>
  </tr>
</thead>
```
- Berdasarkan filter yang dipilih, query SQL yang sesuai akan dijalankan untuk mengambil data dari tabel lecturers atau course_lecturers.
- Data yang diambil dimasukkan ke dalam array $data.
```php
<?php
  include('koneksi.php');
  $lecturers = new Lecturers();
  $data = [];

  switch (strtolower($filter)) {
    case 'sumingkir':
      $query = "SELECT * FROM lecturers WHERE address = 'Sumingkir'";
      break;
    case 'kalisabuk':
      $query = "SELECT * FROM lecturers WHERE address = 'Kalisabuk'";
      break;
    case 'course_lecturers':
      $query = "SELECT * FROM course_lecturers";
      break;
    case 'all':
    default:
      $query = "SELECT * FROM lecturers";
      break;
  }

  $result = mysqli_query($lecturers->connection, $query);
  while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
  }
?>
```
- Data dari array $data ditampilkan dalam bentuk tabel.
- Jika filter adalah course_lecturers, maka kolom yang sesuai dengan tabel course_lecturers akan ditampilkan. Jika tidak, data dari tabel lecturers akan ditampilkan.
```php
<tbody>
  <?php
    foreach ($data as $row) {
      if ($filter === 'course_lecturers') {
  ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['lecturers_id']; ?></td>
    <td><?php echo $row['course_id']; ?></td>
    <td><?php echo $row['deleted_at']; ?></td>
    <td><?php echo $row['created_at']; ?></td>
    <td><?php echo $row['updated_at']; ?></td>
  </tr>
  <?php } else { ?>
  <tr>
    <td><?php echo $row['id']; ?></td>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $row['number_phone']; ?></td>
    <td><?php echo $row['address']; ?></td>
    <td><?php echo $row['nidn']; ?></td>
    <td><?php echo $row['nip']; ?></td>
    <td><?php echo $row['user_id']; ?></td>
    <td><?php echo $row['created_at']; ?></td>
    <td><?php echo $row['updated_at']; ?></td>
  </tr>
  <?php } ?>
  <?php } ?>
</tbody>
```
- Ini adalah penutup dari struktur HTML.
```html
</div>
</div>
</div>
</div>
</body>
</html>
```
- OUTPUT TABEL LECTURERS<BR>

<img width="959" alt="TABEL LECTURERS" src="https://github.com/user-attachments/assets/49a20cf1-30b6-4fde-8469-f6950d174439">
<br>


- OUTPUT TABEL COURSE LECTURERS <BR>

<img width="959" alt="TABEL COURSE LECTURERS" src="https://github.com/user-attachments/assets/2b2dfa49-d58e-4d89-b049-e97919f71338">
<br>


-  OUTPUT TABEL SUMINGKIR<BR>

<img width="959" alt="SUMINGKIR" src="https://github.com/user-attachments/assets/87644f38-fb8c-4c08-b305-11cfa6e605be">
<br>


- OUTPUT TABEL KALISABUK<BR>

<img width="959" alt="KALISABUK" src="https://github.com/user-attachments/assets/5cdba017-9378-4b2b-93f2-2fb2387fbe7b">
<br>

## DATABASE
- TABEL DATABASE LECTURERS<BR>

  <img width="801" alt="DATABASE LECTURERS" src="https://github.com/user-attachments/assets/22751309-1b7d-4992-a35a-c17c9041c1d0">

- TABEL DATABASE COURSE LECTURERS<BR>

  <img width="802" alt="DATABASE COURSE LECTURERS" src="https://github.com/user-attachments/assets/82d3559d-1499-4353-9df8-920d59049d39">

### Kontak Person  : tikakuswardani16@gmail.com
