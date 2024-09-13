<?php
// Kelas Database untuk mengelola koneksi database
class Database {
    private $db_host = "localhost"; // Host database
    private $db_user = "root"; // Username database
    private $db_pass = ""; // Password database
    private $db_name = "pweb"; // Nama database
    public $connection; // Koneksi database yang akan digunakan di kelas lain

    // Konstruktor untuk membuat koneksi ke database
    public function __construct() {
        // Menghubungkan ke database
        $this->connection = mysqli_connect($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
        // Mengecek apakah koneksi berhasil
        if ($this->connection) {
            echo ("Koneksi database berhasil");
        } else {
            echo "Koneksi gagal"; // Menampilkan pesan jika koneksi gagal
        }
    }
}

// Kelas Lecturers untuk mengelola data dari tabel lecturers
class Lecturers extends Database {
    // Fungsi untuk menampilkan semua data dari tabel lecturers
    public function tampilkanData() {
        $query = "SELECT * FROM lecturers"; // Query untuk mengambil semua data
        $result = mysqli_query($this->connection, $query); // Menjalankan query
        $array = array(); // Array untuk menyimpan hasil data
        // Mengambil data dari hasil query
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}

// Kelas Course_Lecturers untuk mengelola data dari tabel course_lecturers
class Course_Lecturers extends Database {
    // Fungsi untuk menampilkan semua data dari tabel course_lecturers
    public function tampilkanData() {
        $query = "SELECT * FROM course_lecturers"; // Query untuk mengambil semua data
        $result = mysqli_query($this->connection, $query); // Menjalankan query
        $array = array(); // Array untuk menyimpan hasil data
        // Mengambil data dari hasil query
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}

// Kelas Sumingkir untuk mengelola data dari tabel lecturers dengan nama 'Sumingkir'
class Sumingkir extends Database {
    // Fungsi untuk menampilkan data dari tabel lecturers dengan nama 'Sumingkir'
    public function tampilkanData() {
        $query = "SELECT * FROM lecturers WHERE name = 'Sumingkir'"; // Query untuk mengambil data dengan nama 'Sumingkir'
        $result = mysqli_query($this->connection, $query); // Menjalankan query
        $array = array(); // Array untuk menyimpan hasil data
        // Mengambil data dari hasil query
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}

// Kelas Kalisabuk untuk mengelola data dari tabel lecturers dengan nama 'Kalisabuk'
class Kalisabuk extends Database {
    // Fungsi untuk menampilkan data dari tabel lecturers dengan nama 'Kalisabuk'
    public function tampilkanData() {
        $query = "SELECT * FROM lecturers WHERE name = 'Kalisabuk'"; // Query untuk mengambil data dengan nama 'Kalisabuk'
        $result = mysqli_query($this->connection, $query); // Menjalankan query
        $array = array(); // Array untuk menyimpan hasil data
        // Mengambil data dari hasil query
        while ($row = mysqli_fetch_array($result)) {
            $array[] = $row; // Menambahkan data ke array
        }
        return $array; // Mengembalikan array data
    }
}

// Membuat instance dari kelas Database untuk menghubungkan ke database
$connection = new Database();
?>
