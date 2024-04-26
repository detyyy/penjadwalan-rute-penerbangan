<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Penjadwalan Rute Penerbangan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 0 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #333;
            color: #fff;
        }

        .cta-button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }

        .cta-button:hover {
            background-color: #45a049;
        }
    </style>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Penjadwalan Rute Penerbangan</h1>
        <img src="gambar-penerbangan/logo.png" alt="gambar-penerbangan" width="500"/>
    </header>
    <main>
        <section id="flight-results">
            <div class="container">
                <section id="schedule">
                    <h2>Jadwal Penerbangan</h2> 
                    <table>
                        <thead>
                            <tr>
                                <th>Nomor penerbangan</th>
                                <th>Keberangkatan</th>
                                <th>Tujuan</th>
                                <th>Waktu keberangkatan</th>
                                <th>Jam kedatangan</th>
                            </tr>
                        </thead>
                        <tbody id="schedule-body">
                            <!-- Data akan diisi secara dinamis -->
                        </tbody>
                    </table>
                </section>
            </div>

            <script>
                // Simulasi data jadwal penerbangan
                const flights = [
                    { flightNumber: 'ABC123', departure: 'Malang', destination: 'Bali', departureTime: '09:00', arrivalTime: '10:00' },
                    { flightNumber: 'DEF456', departure: 'Bali', destination: 'Malang', departureTime: '10:30', arrivalTime: '11:30' },
                    { flightNumber: 'GHI789', departure: 'Kalimantan', destination: 'Malang', departureTime: '11:45', arrivalTime: '13:15' }
                ];
        
                // Berfungsi untuk mengisi tabel jadwal penerbangan
                function populateSchedule() {
                    const scheduleBody = document.getElementById('schedule-body');
                    flights.forEach(flight => {
                        const row = document.createElement('tr');
                        row.innerHTML = `
                            <td>${flight.flightNumber}</td>
                            <td>${flight.departure}</td>
                            <td>${flight.destination}</td>
                            <td>${flight.departureTime}</td>
                            <td>${flight.arrivalTime}</td>
                        `;
                        scheduleBody.appendChild(row);
                    });
                }
 // Isi jadwal penerbangan saat halaman dimuat
 populateSchedule();
    </script>        
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>



<!-- unk javaScript 2 -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Rute Penerbangan</title>
<style>
    body {
        font-family: Arial, sans-serif;
    }
</style>
</head>
<body>

<h1>Pencarian Rute Penerbangan</h1>

<label for="from">Dari:</label>
<input type="text" id="from">
<br><br>
<label for="to">Ke:</label>
<input type="text" id="to">
<br><br>
<button onclick="searchFlights()">Cari Rute</button>

<script>
    function searchFlights() {
        const from = document.getElementById('from').value;
        const to = document.getElementById('to').value;

        // Memeriksa jika input kosong
        if (!from || !to) {
            alert('Silakan masukkan kota asal dan tujuan!');
            return;
        }

        // Simulasi proses pencarian rute penerbangan secara asynchronous (promise)
        findFlight(from, to)
            .then(result => {
                if (result) {
                    alert(`Rute ditemukan!\nHarga: $${result.price}`);
                } else {
                    alert('Maaf, rute tidak ditemukan.');
                }
            })
            .catch(error => {
                console.error('Terjadi kesalahan:', error);
                alert('Terjadi kesalahan saat mencari rute penerbangan.');
            });
    }

    function findFlight(from, to) {
        return new Promise((resolve, reject) => {
            setTimeout(() => {
                const flight = flights.find(f => f.from === from && f.to === to);
                if (flight) {
                    resolve(flight);
                } else {
                    reject('Rute tidak ditemukan.');
                }
            }, 1000); // Simulasi waktu pencarian
        });
    }
</script>
</body>
</html>
