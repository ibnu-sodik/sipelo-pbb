<?php 
// grafik danton
require_once '../../library/config.php';
$sql_danton = $mysqli->query("SELECT nilai_gerakan.*, tb_peserta.* FROM nilai_gerakan LEFT JOIN tb_peserta ON nilai_gerakan.id_peserta = tb_peserta.id");

$nama_peserta = array();
$total_nilai = array();
while ($data_danton = mysqli_fetch_assoc($sql_danton)) {
	$nama_peserta[] = $data_danton['nama_peserta'];
	$total_nilai[] = intval($data_danton['total_nilai']);
}

?>
<style type="text/css">
	#container {
		height: 400px;
	}

	.highcharts-figure, .highcharts-data-table table {
		min-width: 310px;
		max-width: 800px;
		margin: 1em auto;
	}

	#sliders td input[type=range] {
		display: inline;
	}
	#sliders td {
		padding-right: 1em;
		white-space: nowrap;
	}
</style>
<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai PBB Murni
		</div>
		<div class="card-body">
			<div id="container"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container',
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
			text: 'Grafik Nilai PBB Murni'
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
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});

</script>