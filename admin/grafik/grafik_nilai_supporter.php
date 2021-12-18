<?php 
// grafik danton
require_once '../../library/config.php';
$sql_danton = $mysqli->query("SELECT nilai_supporter.*, tb_peserta.* FROM nilai_supporter LEFT JOIN tb_peserta ON nilai_supporter.id_peserta = tb_peserta.id");

$nama_peserta = array();
$kerumitan_gerakan = array();
$kekompakan_suara = array();
$kekompakan_gerakan = array();
$kesesuaian_kostum = array();
$total_nilai = array();
while ($data_sup = mysqli_fetch_assoc($sql_danton)) {
	$nama_peserta[] = $data_sup['nama_peserta'];
	$kerumitan_gerakan[] = intval(
		$data_sup['kerumitan_gerakan']+
		$data_sup['kerumitan_gerakan2']+
		$data_sup['kerumitan_gerakan3']+
		$data_sup['kerumitan_gerakan4']
	);
	$kekompakan_suara[] = intval(
		$data_sup['kekompakan_suara']+
		$data_sup['kekompakan_suara2']+
		$data_sup['kekompakan_suara3']+
		$data_sup['kekompakan_suara4']
	);
	$kekompakan_gerakan[] = intval(
		$data_sup['kekompakan_gerakan']+
		$data_sup['kekompakan_gerakan2']+
		$data_sup['kekompakan_gerakan3']+
		$data_sup['kekompakan_gerakan4']
	);
	$kesesuaian_kostum[] = intval(
		$data_sup['kesesuaian_kostum']+
		$data_sup['kesesuaian_kostum2']+
		$data_sup['kesesuaian_kostum3']+
		$data_sup['kesesuaian_kostum4']
	);

	$total_nilai[] = intval($data_sup['total_nilai']);
}

?>

<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai Supporter
		</div>
		<div class="card-body">
			<div id="container6"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container6',
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
			text: 'Grafik Nilai Supporter'
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
			name: 'Kerumitan Gerakan',
			data: <?= json_encode($kerumitan_gerakan) ?>
		},{
			name: 'Kekompakan Suara',
			data: <?= json_encode($kekompakan_suara) ?>
		},{
			name: 'Kekompakan Gerakan',
			data: <?= json_encode($kekompakan_gerakan) ?>
		},{
			name: 'Keseuaian Kostum',
			data: <?= json_encode($kesesuaian_kostum) ?>
		},{
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});
	
</script>