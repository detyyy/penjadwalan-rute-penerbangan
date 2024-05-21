<?php 
include 'koneksi.php';

if(isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    $username = $_POST['username'];
    

    $sql = "INSERT INTO tb_admin VALUES(NULL, '$email', '$password', '$username')";

    if(empty($email) || empty($password) || empty($username)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'Register.php';
            </script>
        ";
    }elseif(mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Registrasi Berhasil Silahkan login');
                window.location = 'Login.php';
            </script>
        ";
    }else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'Register.php';
            </script>
        ";
    }
}

?>