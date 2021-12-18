<?php 
require_once '../../library/config.php';
require_once '../../library/f_baseUrl.php';
require_once '../../library/vendor/autoload.php';

use Spipu\Html2Pdf\Html2Pdf;
use Spipu\Html2Pdf\Exception\Html2PdfException;
use Spipu\Html2Pdf\Exception\ExceptionFormatter;

$path =  '../../assets/images/sma-pomosda.png';
$type = pathinfo($path, PATHINFO_EXTENSION);
$data = file_get_contents($path);
$base64 = 'data:image/' . $type . ';base64,' . base64_encode($data);

$content = '
<style>
 table {
 	border-collapse:collapse;
 	table-layout: fixed;
 	width: 100%;
 }
 table th {
 	width: 55px;
   	word-wrap:break-word;
 }
th, td {
  	border: 1px solid black;
   	word-wrap:break-word;
}
</style>
<div style="align-center">
	<h1 style="text-align:center;">Nilai Final</h1>
	<h3 style="text-align:center;">PBB GEMILANG</h3>
	<table>
		<tr>
			<th style="text-align:center;padding:2px;">No</th>
			<th style="text-align:center;padding:2px;">Nama Peserta</th>
			<th style="text-align:center;padding:2px;">Kelas</th>
			<th style="text-align:center;padding:2px;">PBB Murni</th>
			<th style="text-align:center;padding:2px;">PBB Kreasi</th>
			<th style="text-align:center;padding:2px;">PBB Formasi</th>
			<th style="text-align:center;padding:2px;">PBB Variasi</th>
			<th style="text-align:center;padding:2px;">Danton Terbaik</th>
			<th style="text-align:center;padding:2px;">Kostum Terbaik</th>
			<th style="text-align:center;padding:2px;">Nilai Minus</th>
			<th style="text-align:center;padding:2px;">Nilai Final</th>
		</tr>
';
$no=0;
$SQL = $mysqli->query("SELECT nilai_final.*, tb_peserta.* FROM nilai_final LEFT JOIN tb_peserta ON nilai_final.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
while($data=mysqli_fetch_assoc($SQL)):
	$no++;
	$content .= '
		<tr>
			<td style="text-align:center;padding:2px;">'.$no.'</td>
			<td style="text-align:center;padding:2px;">'.$data['nama_peserta'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['kelas'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['tn_murni'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['tn_kreasi'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['tn_formasi'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['tn_variasi'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['tn_danton'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['tn_kostum'].'</td>
			<td style="text-align:center;padding:2px;background-color:red;">'.$data['tn_pengurangan'].'</td>
			<td style="text-align:center;padding:2px;">'.$data['total_nilai'].'</td>
		</tr>
	';
endwhile;
$content .= '
	</table>
	<div style="position: relative; width: 100mm; height: 2mm; right: -16mm; font-style: italic; font-weight: normal; text-align: center; font-size: 12px;">
	Nganjuk, '.date('d, F Y').'<br>
	TTD
	<br>
	<br>
	<br>
	<br>
	<br>
	(..........................................)
    </div>
	<div style="position: relative; width: 100mm; height: 2mm; left: -16mm; bottom: -50mm; font-style: italic; font-weight: normal; text-align: center; font-size: 2.5mm;">
        Laporan Nilai Final Created By <a href="mailto:ibnusodik049@gmail.com" style="color: #222222; text-decoration: none;">ibnusodik049@gmail.com</a>
    </div>
</div>
';

$html2pdf = new HTML2PDF('P','A4','en');
$html2pdf->WriteHTML($content);
$pdfName = "nilai-final.pdf";
$html2pdf->output($pdfName, 'I');
?>