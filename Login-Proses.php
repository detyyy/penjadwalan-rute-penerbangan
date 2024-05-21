<?php 

include 'koneksi.php';
if(isset($_POST['login'])) {
  $requestEmail = $_POST['email'];
  $requestPassword = $_POST['password'];
  $requestUsername = $_POST['username'];

  $sql = "SELECT * FROM tb_admin WHERE username = '$requestUsername'";
  list($id, $email, $password,  $username) = mysqli_fetch_row(mysqli_query($koneksi, $sql));
  $result = mysqli_query($koneksi, $sql);
  
  if(mysqli_num_rows($result) > 0) {
    if (password_verify($requestPassword, $password)) {
        while($row = mysqli_fetch_assoc($result)) {
            session_start();
            $_SESSION['email'] = $row['email'];
            $_SESSION['username'] = $row['username'];
            header('location:Admin.php');
        }
      } else { 
          echo "
          <script>
            alert('email atau password anda salah, Silahkan coba lagi');
            window.location = 'Login.php';
          </script>
          ";
      }
    } else { 
        echo "
        <script>
          alert('email atau password anda salah, Silahkan coba lagi');
          window.location = 'Login.php';
        </script>
        ";
    }
}
?>
