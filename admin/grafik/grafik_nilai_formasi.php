<?php 
// grafik danton
require_once '../../library/config.php';
$sql_danton = $mysqli->query("SELECT nilai_formasi.*, tb_peserta.* FROM nilai_formasi LEFT JOIN tb_peserta ON nilai_formasi.id_peserta = tb_peserta.id");

$nama_peserta = array();
$gerakan = array();
$kekompakan = array();
$total_nilai = array();
while ($data_danton = mysqli_fetch_assoc($sql_danton)) {
	$nama_peserta[] = $data_danton['nama_peserta'];
	$gerakan[] 		= intval($data_danton['gerakan']);
	$kekompakan[] = intval($data_danton['kekompakan']);
	$total_nilai[] = intval($data_danton['total_nilai']);
}

?>

<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai PBB Formasi
		</div>
		<div class="card-body">
			<div id="container3"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container3',
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
			text: 'Grafik Nilai PBB Formasi'
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
			name: 'Gerakan',
			data: <?= json_encode($gerakan) ?>
		},{
			name: 'Kekompakan',
			data: <?= json_encode($kekompakan) ?>
		},{
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});
	
</script>