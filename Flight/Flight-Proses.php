<?php 
include '../koneksi.php';

function upload() { 
    $namaFile = $_FILES['Photo']['name'];
    $error = $_FILES['Photo']['error'];
    $tmpName = $_FILES['Photo']['tmp_name'];

    // cek apakah tidak ada gambar yang diupload
    if($error === 4) {
        echo "
            <script>
                alert('Gambar Harus Diisi');
                window.location = 'Flight-Entry.php';
            </script>
        ";

        return false;
    }

    // cek apakah yang diupload adalah gambar
    $ekstensiGambarValid = ['jpg', 'jpeg', 'png'];
    $ekstensiGambar = explode('.', $namaFile);
    $ekstensiGambar = strtolower(end($ekstensiGambar));

    if(!in_array($ekstensiGambar, $ekstensiGambarValid)) {
        echo "
            <script>
                alert('File Harus Berupa Gambar');
                window.location = 'Flight-Entry.php';
            </script>
        ";

        return null;
    }

    // lolos pengecekan, upload gambar
    $namaFileBaru = uniqid();
    $namaFileBaru .= '.';
    $namaFileBaru .= $ekstensiGambar;

    move_uploaded_file($tmpName, '../img_pesawat/' . $namaFileBaru);
    return $namaFileBaru;
}

if(isset($_POST['simpan'])) {
    $Nomor_Penerbangan = $_POST['Nomor_Penerbangan'];
    $Maskapai = $_POST['Maskapai'];
    $Asal = $_POST['Asal'];
    $Tujuan = $_POST['Tujuan'];
    $Photo = upload();

    if(!$Photo) {
        return false;
    }

    $sql = "INSERT INTO tb_flight VALUES(NULL, '$Nomor_Penerbangan', '$Maskapai','$Asal', '$Tujuan','$Photo')";

    if(empty($Nomor_Penerbangan) || empty($Maskapai)|| empty($Asal) || empty($Tujuan)) {
        echo "
            <script>
                alert('Pastikan Anda Mengisi Semua Data');
                window.location = 'Flight-Entry.php';
            </script>
        ";
    } elseif(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Flight Berhasil Ditambahkan');
                window.location = 'Flight.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'Flight-Entry.php';
            </script>
        ";
    }
} elseif(isset($_POST['edit'])) {
    $id = $_POST['id'];
    $Nomor_Penerbangan = $_POST['Nomor_Penerbangan'];
    $Maskapai = $_POST['Maskapai'];
    $Asal = $_POST['Asal'];
    $Tujuan = $_POST['Tujuan'];
    $PhotoLama = $_POST['PhotoLama'];

    // cek apakah user pilih gambar atau tidak
    if($_FILES['Photo']['error'] === 4) {
        $Photo = $PhotoLama;
    } else {
        // foto lama akan dihapus dan diganti foto baru
        unlink('../img_pesawat/' . $PhotoLama);
        $Photo = upload();
        if(!$Photo) {
            return false;
        }
    }

    $sql = "UPDATE tb_flight SET 
            Nomor_Penerbangan = '$Nomor_Penerbangan',
            Maskapai = '$Maskapai',
            Asal = '$Asal',
            Tujuan = '$Tujuan',
            Photo = '$Photo'
            WHERE id = $id";

    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Flight Berhasil Diubah');
                window.location = 'Flight.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Terjadi Kesalahan');
                window.location = 'Flight-Edit.php';
            </script>
        ";
    }
} elseif(isset($_POST['hapus'])) {
    $id = $_POST['id'];

    // hapus gambar
    $sql = "SELECT * FROM tb_flight WHERE id = $id";
    $result = mysqli_query($koneksi, $sql);
    $row = mysqli_fetch_assoc($result);
    $Photo = $row['Photo'];
    unlink('../img_pesawat/' . $Photo);

    $sql = "DELETE FROM tb_flight WHERE id = $id";
    if(mysqli_query($koneksi, $sql)) {
        echo "
            <script>
                alert('Data Flight Berhasil Dihapus');
                window.location = 'Flight.php';
            </script>
        ";
    } else {
        echo "
            <script>
                alert('Data Flight Gagal Dihapus');
                window.location = 'Flight.php';
            </script>
        ";
    }
} else {
    header('location: Flight.php');
}
?>
