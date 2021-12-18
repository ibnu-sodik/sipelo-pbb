<?php 
// grafik danton
require_once '../../library/config.php';
$sql_danton = $mysqli->query("SELECT nilai_kreasi.*, tb_peserta.* FROM nilai_kreasi LEFT JOIN tb_peserta ON nilai_kreasi.id_peserta = tb_peserta.id");

$nama_peserta = array();
$gerakan_1 = array();
$gerakan_2 = array();
$gerakan_3 = array();
$gerakan_4 = array();
$gerakan_5 = array();
$total_nilai = array();
while ($data_danton = mysqli_fetch_assoc($sql_danton)) {
	$nama_peserta[] = $data_danton['nama_peserta'];
	$gerakan_1[] 		= intval($data_danton['gerakan_1']);
	$gerakan_2[] = intval($data_danton['gerakan_2']);
	$gerakan_3[] = intval($data_danton['gerakan_3']);
	$gerakan_4[] = intval($data_danton['gerakan_4']);
	$gerakan_5[] = intval($data_danton['gerakan_5']);
	$total_nilai[] = intval($data_danton['total_nilai']);
}

?>

<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai PBB Kreasi
		</div>
		<div class="card-body">
			<div id="container2"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container2',
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
			text: 'Grafik Nilai PBB Kreasi'
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
			name: 'Gerakan 1',
			data: <?= json_encode($gerakan_1) ?>
		},{
			name: 'Gerakan 2',
			data: <?= json_encode($gerakan_2) ?>
		},{
			name: 'Gerakan 3',
			data: <?= json_encode($gerakan_3) ?>
		},{
			name: 'Gerakan 4',
			data: <?= json_encode($gerakan_4) ?>
		},{
			name: 'Gerakan 5',
			data: <?= json_encode($gerakan_5) ?>
		},{
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});
	
</script>