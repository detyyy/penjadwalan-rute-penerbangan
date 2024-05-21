<?php
  include '../koneksi.php';
  $id = $_GET['id'];
  if(!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'Flight.php';
      </script>
    ";
  }

  $sql = "SELECT * FROM tb_flight WHERE id = '$id'";
  $result = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($result);

	session_start();
	if($_SESSION['username'] == null) {
		header('location:../login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Penjadwalan | Flight Entry</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Flight</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../admin.php">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../Schedule/Schedule.php" class="active">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Schedule</span>
                </a>
            </li>
            <li>
                <a href="../Flght/Flight.php">
                    <i class="bx bx-list-ul"></i>
                    <span class="links_name">Flight</span>
                </a>
            </li>
            <li>
                <a href="../logout.php">
                    <i class="bx bx-log-out"></i>
                    <span class="links_name">Log out</span>
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
            <h3>Input Flight</h3>
            <div class="form-login">
                <form action="Flight-Proses.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id" value="<?= $data['id'] ?>">
                    <input type="hidden" name="photoLama" value="<?= $data['Photo'] ?>">
                    <label for="Nomor_Penerbangan">Nomor_Penerbangan</label>
                    <input class="input" type="text" name="Nomor_Penerbangan" id="Nomor_Penerbangan" placeholder="Nomor_Penerbangan"
                        value="<?= $data['Nomor_Penerbangan'] ?>" />
                    <label for="Nomor_Penerbangan">Maskapai</label>
                    <input class="input" type="text" name="Maskapai" id="Maskapai" placeholder="Maskapai"
                        value="<?= $data['Maskapai']?>" />
                    <label for="Nomor_Penerbangan">Asal</label>
                    <input class="input" type="text" name="Asal" id="Asal" placeholder="Asal"
                        value="<?= $data['Asal']?>" />
                    <label for="Nomor_Penerbangan">Tujuan</label>
                    <input class="input" type="text" name="Tujuan" id="Tujuan" placeholder="Tujuan"
                        value="<?= $data['Tujuan']?>" />
                    <label for="photo">Photo</label>
                    <img src="../img_pesawat/<?= $data['Photo'] ?>" alt="" width="200px">
                    <input type="file" name="Photo" id="photo" style="margin-bottom: 20px" />
                    <button type="submit" class="btn btn-simpan" name="edit">
                        Edit
                    </button>
                </form>
            </div>
        </div>
    </section>
    <script>
    let sidebar = document.querySelector(".sidebar");
    let sidebarBtn = document.querySelector(".sidebarBtn");
    sidebarBtn.onclick = function() {
        sidebar.classList.toggle("active");
        if (sidebar.classList.contains("active")) {
            sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
    };
    </script>
</body>

</html>