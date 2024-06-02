<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="icon" href="assets/icon.png" />
    <title>Home</title>
    <link rel="stylesheet" href="css/style.css" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;700&family=Roboto:wght@500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>

<body>
    <div class="container">
        <header>
            <nav>
                <div class="logo">
                    <img src="assets/logo.png" alt="Logo" width="100px"; />
                </div>
                <input type="checkbox" id="click" />
                <label for="click" class="menu-btn">
                    <i class="fas fa-bars"></i>
                </label>
                <ul>
                    <li><a href="#">Dashboard</a></li>
                    <li><a href="#">Schedule</a></li>
                    <li><a href="#">Flight</a></li>
                    <li><a href="Login.php" class="btn_login">Login</a></li>
                </ul>
            </nav>
        </header>
        <main>
            <div class="jumbotron">
                <div class="jumbotron-text">
                    <h1>Selamat Datang di Penjadwalan Rute Penerbangan</h1>
                    <p>Atur jadwal penerbangan Anda dengan mudah dan efisien</p>
                    <button type="button" class="btn_getStarted">Get Started</button>
                </div>  
                <div class="jumbotron-img">
                    <img src="assets/flight.jpg" alt="Jumbotron Image" />
                </div>
            </div>
            <div class="cards-schedule">
                <h2>Jadwal Penerbangan</h2>
                <div class="card-schedule">
                    <?php
                    include 'koneksi.php';
                    $sql = "SELECT * FROM tb_schedule";
                    $result = mysqli_query($koneksi, $sql);
                    if (mysqli_num_rows($result) == 0) {
                        echo "<h3 style='text-align: center; color: black;'>Data Penjadwalan</h3>";
                    }
                    while ($data = mysqli_fetch_assoc($result)) {
                        echo "
                        <div class='card'>
                            <div class='card-content'>
                                <h5>Hari: {$data['Hari']}</h5>
                                <p class='date'>Tanggal: {$data['Tanggal']}</p>
                                <p class='time'>Waktu: {$data['Waktu']}</p>
                                <p class='route'>Rute: {$data['Rute']}</p>
                                <button class='btn-edit' onclick='editSchedule({$data['id']})'>Edit</button>
                                <button class='btn-delete' onclick='deleteSchedule({$data['id']})'>Delete</button>
                            </div>
                        </div>
                        ";
                    }
                    ?>
                </div>
            </div>
            <!-- Modal -->
            <div id="scheduleModal" class="modal-container" onclick="closeModal()">
                <div class="modal-dialog" onclick="event.stopPropagation()">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title" style="color: #ffb72b;">Formulir Jadwal</h1>
                            <button type="button" class="btn-close" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <form id="scheduleForm">
                                <input type="hidden" name="schedule_id" id="schedule_id" value="">
                                <div class="form-group">
                                    <label class="labelmodal" for="hari">Hari:</label>
                                    <input class="inputdata" type="text" name="hari" id="hari">
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="tanggal">Tanggal:</label>
                                    <input class="inputdata" type="date" name="tanggal" id="tanggal">
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="waktu">Waktu:</label>
                                    <input class="inputdata" type="time" name="waktu" id="waktu">
                                </div>
                                <div class="form-group">
                                    <label class="labelmodal" for="rute">Rute:</label>
                                    <input class="inputdata" type="text" name="rute" id="rute">
                                </div>
                            </form>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" onclick="closeModal()">Keluar</button>
                            <button type="button" class="btn btn-yellow" onclick="submitSchedule()">Simpan</button>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script>
        // Fungsi Modal
        function openModal() {
            document.getElementById("scheduleModal").style.display = "flex";
        }

        function closeModal() {
            document.getElementById("scheduleModal").style.display = "none";
        }

        function editSchedule(scheduleId) {
            openModal();
            // Fetch data and populate the form for editing
            // Example:
            var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var scheduleData = JSON.parse(xhr.responseText);
                    document.getElementById('schedule_id').value = scheduleData.id;
                    document.getElementById('hari').value = scheduleData.Hari;
                    document.getElementById('tanggal').value = scheduleData.Tanggal;
                    document.getElementById('waktu').value = scheduleData.Waktu;
                    document.getElementById('rute').value = scheduleData.Rute;
                }
            };
            xhr.open("GET", "get_schedule.php?id=" + scheduleId, true);
            xhr.send();
        }

        function deleteSchedule(scheduleId) {
            if (confirm("Apakah Anda yakin ingin menghapus jadwal ini?")) {
                window.location.href = "delete_schedule.php?id=" + scheduleId;
            }
        }

        function submitSchedule() {
            var form = document.getElementById("scheduleForm");
            var formData = new FormData(form);

            var xhr = new XMLHttpRequest();
            xhr.open("POST", "save_schedule.php", true);
            xhr.onload = function() {
                if (xhr.status == 200) {
                    alert("Jadwal berhasil disimpan!");
                    closeModal();
                    location.reload(); // Reload halaman setelah menyimpan data
                } else {
                    alert("Terjadi kesalahan. Silakan coba lagi.");
                }
            };
            xhr.send(formData);
        }
    </script>
</body>

</html>
