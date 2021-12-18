<?php 
// grafik variasi
require_once '../../library/config.php';
$sql_variasi = $mysqli->query("SELECT nilai_variasi.*, tb_peserta.* FROM nilai_variasi LEFT JOIN tb_peserta ON nilai_variasi.id_peserta = tb_peserta.id");

$nama_peserta = array();
$kompak_gerakan = array();
$kompak_suara = array();
$indah_gerakan = array();
$rumit_gerakan = array();
$total_nilai = array();
while ($data_variasi = mysqli_fetch_assoc($sql_variasi)) {
	$nama_peserta[] = $data_variasi['nama_peserta'];
	$kompak_gerakan[] 		= intval($data_variasi['kompak_gerakan']);
	$kompak_suara[] = intval($data_variasi['kompak_suara']);
	$indah_gerakan[] = intval($data_variasi['indah_gerakan']);
	$rumit_gerakan[] = intval($data_variasi['rumit_gerakan']);
	$total_nilai[] = intval($data_variasi['total_nilai']);
}

?>

<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai PBB Variasi
		</div>
		<div class="card-body">
			<div id="container4"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container4',
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
			text: 'Grafik Nilai PBB Variasi'
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
			name: 'Kekompakan Gerakan',
			data: <?= json_encode($kompak_gerakan) ?>
		},{
			name: 'Kekompakan Suara',
			data: <?= json_encode($kompak_suara) ?>
		},{
			name: 'Keindahan Gerakan',
			data: <?= json_encode($indah_gerakan) ?>
		},{
			name: 'Kerumitan Gerakan',
			data: <?= json_encode($rumit_gerakan) ?>
		},{
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});
</script>