<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Penjadwalan Rute Penerbangan</title>
</head>
<body>
    <header>
        <h1>Login</h1>
    </header>

    <form action="process_login.php" method="post">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required>
        
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required>

        <button type="submit">Login</button>
    </form>

    <p>Belum punya akun? <a href="register.php">Daftar disini</a></p>
</body>
</html>



<!-- bagian php -->
<?php
session_start();

// Simulasi database pengguna
$users = [
    'user1' => 'password1',
    'user2' => 'password2',
];

// Fungsi untuk memeriksa apakah pengguna terautentikasi
function isAuthenticated($username, $password) {
    global $users;
    return isset($users[$username]) && $users[$username] === $password;
}

// Fungsi untuk mengatur cookie
function setLoginCookie($username) {
    setcookie('username', $username, time() + (86400 * 30), "/"); // Cookie berlaku selama 30 hari
}

// Fungsi untuk menghapus cookie
function deleteLoginCookie() {
    setcookie('username', '', time() - 3600, "/"); // Hapus cookie dengan membuat masa kedaluwarsa
}

// Fungsi untuk mengatur session
function setLoginSession($username) {
    $_SESSION['username'] = $username;
}

// Fungsi untuk menghapus session
function deleteLoginSession() {
    session_unset();
    session_destroy();
}

// Memeriksa apakah pengguna sudah login
function isLoggedIn() {
    return isset($_SESSION['username']) || isset($_COOKIE['username']);
}

// Memeriksa apakah pengguna sudah submit form login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Memeriksa kredensial login
    if (isAuthenticated($username, $password)) {
        // Atur session dan/atau cookie jika login berhasil
        setLoginSession($username);
        setLoginCookie($username);

        // Pengalihan ke halaman penjadwalan rute penerbangan
        header("Location: flight_schedule.php");
        exit;
    } else {
        $loginError = "Username atau password salah";
    }
}

// Jika pengguna sudah login, langsung Pengalihan ke halaman penjadwalan rute penerbangan
if (isLoggedIn()) {
    header("Location: flight_schedule.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <?php if(isset($loginError)) { ?>
        <p style="color:red;"><?php echo $loginError; ?></p>
    <?php } ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="username">Username:</label><br>
        <input type="text" id="username" name="username"><br>
        <label for="password">Password:</label><br>
        <input type="password" id="password" name="password"><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>


