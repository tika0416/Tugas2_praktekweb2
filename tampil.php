<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Memuat Bootstrap untuk styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <!-- Memuat DataTables untuk membuat tabel interaktif -->
    <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <title>DATABASE</title>
    <style>
      /* Styling untuk body halaman */
      body {
        background-color: #f4f6f9;
      }
      /* Styling untuk card (kontainer utama) */
      .card {
        border-radius: 10px;
      }
      /* Styling untuk header dari card */
      .card-header {
        background-color: #343a40;
        color: #fff;
        border-bottom: 2px solid #007bff;
        padding: 15px;
      }
      /* Padding untuk isi dari card */
      .card-body {
        padding: 20px;
      }
      /* Styling untuk bagian header dari tabel */
      table thead {
        background-color: #007bff;
        color: white;
      }
      /* Menyelaraskan teks di tabel */
      table td, table th {
        text-align: center;
        vertical-align: middle;
      }
      /* Memberi margin pada group tombol */
      .btn-group {
        margin-bottom: 20px;
      }
    </style>
  </head>

  <body>
    <div class="container mt-5">
      <div class="col-lg-12">
        <!-- Tombol Filter untuk memilih tampilan data -->
        <div class="btn-group d-flex justify-content-center mb-4">
          <form method="get" action="">
            <button class="btn btn-primary" name="filter" value="all">Tabel Lecturers</button>
            <button class="btn btn-warning" name="filter" value="course_lecturers">Tabel Course Lecturers</button>
            <button class="btn btn-info" name="filter" value="sumingkir">Sumingkir</button>
            <button class="btn btn-success" name="filter" value="kalisabuk">Kalisabuk</button>
          </form>
        </div>

        <!-- Tampilan Tabel -->
        <div class="card shadow-lg">
          <div class="card-header">
            <h4 class="mb-0">
              <?php
                // Mendapatkan nilai filter dari URL atau default 'all'
                $filter = isset($_GET['filter']) ? $_GET['filter'] : 'all';
                // Menentukan judul tabel berdasarkan filter yang dipilih
                if ($filter === 'course_lecturers') {
                  echo 'Course Lecturers List';
                } else {
                  echo 'Lecturers List';
                }
              ?>
            </h4>
          </div>
          <div class="card-body">
            <!-- Tabel Data -->
            <table class="table table-bordered table-hover" id="myTable">
              <thead>
                <tr>
                  <?php
                    // Menentukan header tabel berdasarkan filter yang dipilih
                    if ($filter === 'course_lecturers') {
                      // Header untuk tabel course_lecturers
                      echo '<th>ID</th>
                            <th>Lecturers ID</th>
                            <th>Course ID</th>
                            <th>Deleted At</th>
                            <th>Created At</th>
                            <th>Updated At</th>';
                    } else {
                      // Header untuk tabel lecturers
                      echo '<th>ID</th>
                            <th>Name</th>
                            <th>Phone Number</th>
                            <th>Address</th>
                            <th>NIDN</th>
                            <th>NIP</th>
                            <th>User ID</th>
                            <th>Created At</th>
                            <th>Updated At</th>';
                    }
                  ?>
                </tr>
              </thead>
              <tbody>
                <?php
                  // Menyertakan koneksi database
                  include('koneksi.php');

                  // Membuat objek Lecturers
                  $lecturers = new Lecturers();

                  // Inisialisasi array untuk menampung data
                  $data = [];

                  // Menentukan query berdasarkan filter
                  switch (strtolower($filter)) {
                    case 'sumingkir':
                      // Query untuk filter Sumingkir
                      $query = "SELECT * FROM lecturers WHERE address = 'Sumingkir'";
                      break;
                    case 'kalisabuk':
                      // Query untuk filter Kalisabuk
                      $query = "SELECT * FROM lecturers WHERE address = 'Kalisabuk'";
                      break;
                    case 'course_lecturers':
                      // Query untuk tabel course_lecturers
                      $query = "SELECT * FROM course_lecturers";
                      break;
                    case 'all':
                    default:
                      // Query default untuk tabel lecturers
                      $query = "SELECT * FROM lecturers";
                      break;
                  }

                  // Menjalankan query
                  $result = mysqli_query($lecturers->connection, $query);

                  // Memasukkan data hasil query ke dalam array
                  while ($row = mysqli_fetch_assoc($result)) {
                      $data[] = $row;
                  }

                  // Menampilkan data dalam bentuk tabel
                  foreach ($data as $row) {
                    if ($filter === 'course_lecturers') {
                ?>
                <tr>
                  <!-- Menampilkan data dari tabel course_lecturers -->
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['lecturers_id']; ?></td>
                  <td><?php echo $row['course_id']; ?></td>
                  <td><?php echo $row['deleted_at']; ?></td>
                  <td><?php echo $row['created_at']; ?></td>
                  <td><?php echo $row['updated_at']; ?></td>
                </tr>
                <?php } else { ?>
                <tr>
                  <!-- Menampilkan data dari tabel lecturers -->
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
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  </script>
</body>
</html>
