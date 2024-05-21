<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Flight Schedule - Bookings</title>
<link rel="stylesheet" href="styles.css"> 
</head>
<body>
  <header>
    <div class="container">
      <h1>Manajemen Jadwal Penerbangan</h1>
    </div>
  </header>
  
  <nav>
    <div class="container">
      <ul>
        <li><a href="admin.php">Dashboard</a></li>
        <li><a href="flights.php">Flights</a></li>
        <li><a href="bookings.php" class="active">Bookings</a></li>
      </ul>
    </div>
  </nav>
  
  <main>
    <div class="container">
      <h2>Daftar Pemesanan</h2>
      <table border="1">
        <thead>
          <tr>
            <th>Booking ID</th>
            <th>Nomor Penerbangan</th>
            <th>Nama Penumpang</th>
            <th>Nomor Kursi</th>
            <th>Status</th>
            <th>gambar-penerbangan</th>
          </tr>
        </thead>
        <tbody>
          <!-- Data booking akan dimasukkan di sini -->
          <tr>
            <td>123456</td>
            <td>FL123</td>
            <td>Novalin </td>
            <td>12A</td>
            <td>Di Konfirmasi</td>
            <td><img src="gambar_penerbangan.jpg" alt="gambar_penerbangan" width="200px"></td>
          </tr>
          <tr>
            <td>789012</td>
            <td>FL456</td>
            <td>Ester </td>
            <td>7B</td>
            <td>Tertunda</td>
            <td><img src="gambar_penerbangan.jpg" alt="gambar_penerbangan" width="200px"></td>
          </tr>
          <tr>
            <td>789021</td>
            <td>FL456</td>
            <td>Intan </td>
            <td>8B</td>
            <td>Tertunda</td>
            <td><img src="gambar_penerbangan.jpg" alt="gambar_penerbangan" width="200px"></td>
          </tr>
          <tr>
            <td>909012</td>
            <td>FL456</td>
            <td>Siska </td>
            <td>6B</td>
            <td>Di Konfirmasi</td>
            <td><img src="gambar_penerbangan.jpg" alt="gambar_penerbangan" width="200px"></td>
          </tr>
          <!-- Anda dapat menambahkan lebih banyak data booking di sini -->
        </tbody>
      </table>
    </div>
  </main>
</body>
</html>
