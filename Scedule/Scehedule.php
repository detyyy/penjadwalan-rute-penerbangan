<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="../css/admin.css" />
   <!-- Boxicons CDN Link -->
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Admin Penjadwalan | Schedule</title>
</head>

<body>
   <div class="sidebar">
      <div class="logo-details">
         <i class="bx bx-category"></i>
         <span class="logo_name">Schedule</span>
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
            <span class="admin_name">Admin </span>
         </div>
      </nav>
      <div class="home-content">
         <h3>Schedule</h3>
         <button type="button" class="btn btn-cetak">
                <a href="Schedule-Cetak.php">Cetak</a>
            </button>
         <table class="table-data">
            <thead>
               <tr>
                  <th>Nama</th>
                  <th>Asal</th>
                  <th>Tujuan</th>
                  <th>Rute</th>
                  <!-- <th>Status</th> -->
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <?php
               include '../koneksi.php';
               $sql = "SELECT * FROM tb_schedule";
               $result = mysqli_query($koneksi, $sql);
               if (mysqli_num_rows($result) == 0) {
                  echo "
                  <h3 style='text-align: center; color: red;'>Data Kosong</h3>
               ";
               } else {
                  while ($data = mysqli_fetch_assoc($result)) {
                     echo "
                     <tr>
                         <td>$data[nama]</td>
                         <td>$data[asal]</td>
                         <td>$data[tujuan]</td>
                         <td style='display: none;'>$data[rute]</td>
                         <td>
                         <button class='btn_detail' data-rute='$data[rute]' onclick='showDetails(\"$data[Nama]\", \"$data[Asal]\", \"$data[Tujuan]\")'>Detail</button>
                         </td>
                     </tr>
                     ";
                  }
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

      function showDetails(nama, asal, tujuan) {
         let rute = event.target.getAttribute('data-rute');
         alert(`Nama: ${nama}\nAsal: ${asal}\nTujuan: ${tujuan}\nRute: ${rute}`);
      }
   </script>


</body>

</html>
