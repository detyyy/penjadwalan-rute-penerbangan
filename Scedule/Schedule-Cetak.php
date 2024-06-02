<?php
include('../koneksi.php');
require_once("../dompdf_2-0-3/dompdf/autoload.inc.php");

use Dompdf\Dompdf;

$Dompdf = new Dompdf();
$query = mysqli_query($koneksi, "SELECT * FROM tb_schedule");
$html = '<center><h3>Data Schedule</h3></center><hr/><br>';
$html .= '<table border="1" width="100%">
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Asal</th>
                <th>Tujuan</th>
                <th>Rute</th>
            </tr>';
$no = 1;
while ($Schedule = mysqli_fetch_array($query)) {
    $html .= "<tr>
                <td>" . $no . "</td>
                <td>" . $Schedule['nama'] . "</td>
                <td>" . $Schedule['asal'] . "</td>
                <td>" . $Schedule['tujuan'] . "</td>
                <td>" . $Schedule['rute'] . "</td>
                </tr>";
    $no++;
}
$html .= "</table>";
$dompdf->loadHtml($html);
// Setting ukuran dan orientasi kertas
$dompdf->setPaper('A4', 'potrait');
// Rendering dari HTML Ke PDF
$dompdf->render();
// Melakukan output file Pdf
$dompdf->stream('laporan-schedule.pdf');
?>
