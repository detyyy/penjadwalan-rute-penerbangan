<?php
include '../koneksi.php';

if (isset($_POST['simpan'])) {
    $nama = $_POST['detail-nama'];
    $asal = $_POST['detail-asal'];
    $tujuan = $_POST['detail-tujuan'];
    $rute = $_POST['detail-rute'];
    // $status = $_POST['detail-status'];
    

    $sql = "INSERT INTO tb_schedule VALUES(null, '$nama','$asal','$tujuan', '$Rute')";

    if (empty($nama) || empty($asal) || empty($tujuan) ||  empty($rute)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = '../index.php';
            </script>
        ";
    } elseif (mysqli_query($koneksi, $sql)) {
        echo "  
            <script>
                alert('Schedule Berhasil');
                window.location = '../index.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = '../index.php';
            </script>
        ";
    }
} else {
    header('location: ../index.php');
}
