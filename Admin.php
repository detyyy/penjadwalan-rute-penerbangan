<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="assets/logo.png">
    <link rel="stylesheet" href="css/admin.css">
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <title>Admin Penjadwalan</title>
    <style>
        .widget {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            padding: 20px;
            margin: 20px;
            text-align: center;
            display: inline-block;
            width: 200px;
        }

        .widget h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        .widget .count {
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
    </style>
</head>
<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Penjadwalan Rute</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="admin.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="Schedule/Schedule.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Schedule</span>
                </a>
            </li>
            <li>
                <a href="Flight/Flight.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Flight</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="sidebar-button">
                <i class="bx bx-menu sidebarBtn"></i>
            </div>
            <div class="profile-details">
                <span class="admin_name">Admin Penjadwalan</span>
            </div>
        </nav>
        <div class="home-content">
            <h1>Selamat Datang Admin Penjadwalan Rute</h1>
            <!-- <button type="button" class="btn btn-tambah">
                <a href="Schedule-Entry.php">Tambah Data</a>
            </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th scope="col" style="width: 30%">Hari</th>
                        <th scope="col" style="width: 30%">Tanggal</th>
                        <th scope="col" style="width: 15%">Waktu</th>
                        <th scope="col" style="width: 15%">Rute</th>
                        <th scope="col" style="width: 20%">Photo</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                </thead> -->
            <?php
            include 'koneksi.php'; // Menyertakan file koneksi database

            // Query untuk mendapatkan jumlah data dari tabel tb_schedule
            $sql = "SELECT COUNT(*) as count FROM tb_schedule";
            $result = mysqli_query($koneksi, $sql);
            $data = mysqli_fetch_assoc($result);
            $totalSchedule = $data['count'];
            ?>
            <div class="widget">
                <h3>Jumlah Rute Penerbangan Terjadwal</h3>
                <div class="count"><?php echo $totalSchedule; ?></div>
            </div>
        </div>
    </section>
    <script>
        let sidebar = document.querySelector(".sidebar");
        let sidebarBtn = document.querySelector(".sidebarBtn");
        sidebarBtn.onclick = function () {
            sidebar.classList.toggle("active");
            if (sidebar.classList.contains("active")) {
                sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
            } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        };
    </script>
</body>
</html>
