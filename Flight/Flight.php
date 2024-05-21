<?php
session_start();
if ($_SESSION['username'] == null) {
	header('location:../login.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8" />
    <link rel="icon" href="../assets/icon.png" />
    <link rel="stylesheet" href="../css/admin.css" />
    <!-- Boxicons CDN Link -->
    <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Admin Penjadwalan| Flight</title>
</head>

<body>
    <div class="sidebar">
        <div class="logo-details">
            <i class="bx bx-category"></i>
            <span class="logo_name">Flight</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../admin.php" class="active">
                    <i class="bx bx-grid-alt"></i>
                    <span class="links_name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../Schedule/Schedule.php">
                    <i class="bx bx-box"></i>
                    <span class="links_name">Schedule</span>
                </a>
            </li>
            <li>
                <a href="../Flight/Flight.php">
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
            <h3>Flight</h3>
            <button type="button" class="btn btn-tambah">
                <a href="Flight-Entry.php">Tambah Data</a>
            </button>
            <table class="table-data">
                <thead>
                    <tr>
                        <th scope="col" style="width: 30%">no.penerbangan</th>
                        <th scope="col" style="width: 30%">Maskapai</th>
                        <th scope="col" style="width: 15%">Asal</th>
                        <th scope="col" style="width: 15%">Tujuan</th>
                        <th scope="col" style="width: 20%">Photo</th>
                        <th scope="col" style="width: 20%">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
					include '../koneksi.php';
					$sql = "SELECT * FROM tb_flight";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
			   <tr>
				<td colspan='5' align='center'>
                           Data Kosong
                        </td>
			   </tr>
				";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
                    <tr>
                    <td>$data[Nomor_Penerbangan]</td>
                    <td>$data[Maskapai]</td>
                    <td>$data[Asal]</td>
                    <td>$data[Tujuan]</td>
                    <td>
                      <img src='../img_pesawat/$data[Photo]'  width='200px'>
                    </td>
                      <td >
                        <a class='btn-edit' href=Flight-Edit.php?id=$data[id]>
                               Edit
                        </a> | 
                        <a class='btn-delete' href=Flight-Delete.php?id=$data[id]>
                            Delete
                        </a>
                      </td>
                    </tr>
                  ";
					}
					?>
                </tbody>
            </table>
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