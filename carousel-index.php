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

        .carousel {
            overflow: hidden;
            position: relative;
            margin-top: 20px;
        }
 .carousel ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 300%;
            transition: transform 0.5s ease;
        }

        .carousel li {
            float: left;
            width: 33.333%;
            box-sizing: border-box;
        }

        .carousel img {
            width: 100%;
            height: auto;
        }

        .cta-button {
            display: inline-block;
            background-color: #4CAF50;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .carousel ul {
            list-style: none;
            padding: 0;
            margin: 0;
            width: 300%;
            transition: transform 0.5s ease;
        }

        .carousel li {
            float: left;
            width: 33.333%;
            box-sizing: border-box;
        }

        .carousel img {
            width: 100%;
            height: auto;
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

        img {
    max-width: 100%;
    height: auto;
    display: block;
    margin-left: auto;
    margin-right: auto;
}
    </style>

    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Selamat Datang di Penjadwalan Rute Penerbangan</h1>
        <img src="gambar-penerbangan/logo.png" alt="gambar-penerbangan" width="600"/>
    </header>
    <main>
        <section id="flight-carousel">
            <div class="carousel-slide">
                <img src="Flights/gambar-penerbangan/Flight_map.jpg" alt="Penerbangan 1"/>
            </div>
            <div class="carousel-slide">
                <img src="gambar-penerbangan/pesawat.jpg" alt="Penerbangan 2">
            </div>
            <div class="carousel-slide">
                <img src="gambar-penerbangan/flight.jpg" alt="Penerbangan 3">
            </div>
            <button id="prevBtn">Prev</button>
            <button id="nextBtn">Next</button>
        </section>
    </main>
    <script src="script.js"></script>
</body>
</html>
