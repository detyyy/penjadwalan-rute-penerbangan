<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="icon" href="assets/logo.png">
<link rel="stylesheet" href="css/admin.css">
<link 
href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
<title>Admin Penjadwalan </title>
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
<span 
class="links_name">Dashboard</span>
</a>
</li>
<li>
<a href="Schedules/Schedules.php">
<i class="bx bx-box"></i>
<span 
class="links_name">Schedules</span>
</a>
</li>
<li>
<a href="Flight/Flight.php">
<i class="bx bx-list-ul"></i>
<span 
class="links_name">Flight</span>
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
<span class="admin_name">Admin Penjadwalan </span>
</div>
</nav>
<div class="home-content">
<h1>Selamat Datang Admin Penjadwalan Rute</h1>
</div>
</section>
<script>
let sidebar = document.querySelector(".sidebar");
let sidebarBtn = 
document.querySelector(".sidebarBtn");
sidebarBtn.onclick = function () {
sidebar.classList.toggle("active");
if (sidebar.classList.contains("active")) {
sidebarBtn.classList.replace("bx-menu", "bx-menualt-right");
} else sidebarBtn.classList.replace("bx-menu-altright", "bx-menu");
};
</script>
</body>
</html>
