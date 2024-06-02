<?php
include 'koneksi.php';

if (isset($_GET['id'])) {
    $flightId = $_GET['id'];

    $sql = "SELECT * FROM tb_flight WHERE id = $flightid";
    $result = mysqli_query($koneksi, $sql);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        echo json_encode($data);
    } else {
        echo json_encode(['error' => 'Failed to retrieve Flight data.']);
    }
} else {
    echo json_encode(['error' => 'Flight ID not provided.']);
}
?>
