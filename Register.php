<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register - Penjadwalan Rute Penerbangan</title>
</head>
<body>
    <header>
        <h1>Register</h1>
    </header>

    <form action="process_register.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <label for="confirm_password">Konfirmasi Password:</label>
        <input type="password" id="confirm_password" name="confirm_password" required>

        <button type="submit">Daftar</button>
        </form>

    <p>Sudah punya akun? <a href="login.html">Login disini</a></p>
</body>
</html>
