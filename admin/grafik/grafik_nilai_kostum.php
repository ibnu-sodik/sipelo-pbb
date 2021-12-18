<?php 
// grafik danton
require_once '../../library/config.php';
$sql_danton = $mysqli->query("SELECT nilai_juri.*, tb_peserta.* FROM nilai_juri LEFT JOIN tb_peserta ON nilai_juri.id_peserta = tb_peserta.id");

$nama_peserta = array();
$nilai_bahan_kostum = array();
$nilai_kerumitan_kostum = array();
$nilai_tema_kostum = array();
$nilai_selaras_kostum = array();
$total_nilai = array();
while ($data_danton = mysqli_fetch_assoc($sql_danton)) {
	$nama_peserta[] = $data_danton['nama_peserta'];
	$nilai_bahan_kostum[] 		= intval($data_danton['nilai_bahan_kostum']);
	$nilai_kerumitan_kostum[] = intval($data_danton['nilai_kerumitan_kostum']);
	$nilai_tema_kostum[] = intval($data_danton['nilai_tema_kostum']);
	$nilai_selaras_kostum[] = intval($data_danton['nilai_selaras_kostum']);
	$total_nilai[] = intval($data_danton['total_nilai']);
}

?>

<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai Kostum (PBB)
		</div>
		<div class="card-body">
			<div id="container7"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container7',
			type: 'column',
			options3d: {
				enabled: true,
				alpha: 15,
				beta: 15,
				depth: 50,
				viewDistance: 25
			}
		},
		title: {
			text: 'Grafik Nilai Kostum (PBB)'
		},
		xAxis: {
			categories: <?= json_encode($nama_peserta) ?>,
			tickmarkPlacement: 'on',
			title: {
				enabled: false
			}
		},
		yAxis: {
			title: {
				text: 'Jumlah Nilai'
			},
			labels: {
				formatter: function () {
					return this.value;
				}
			}
		},
		plotOptions: {
			column: {
				depth: 25
			}
		},
		series: [{
			name: 'Kualitas Bahan',
			data: <?= json_encode($nilai_bahan_kostum) ?>
		},{
			name: 'Tampilan Kostum',
			data: <?= json_encode($nilai_kerumitan_kostum) ?>
		},{
			name: 'Kesesuaian Kostum',
			data: <?= json_encode($nilai_tema_kostum) ?>
		},{
			name: 'Keselarasan Kostum',
			data: <?= json_encode($nilai_selaras_kostum) ?>
		},{
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});
	
</script>