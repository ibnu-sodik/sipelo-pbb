<?php 
// grafik danton
require_once '../../library/config.php';
$sql_danton = $mysqli->query("SELECT nilai_danton.*, tb_peserta.* FROM nilai_danton LEFT JOIN tb_peserta ON nilai_danton.id_peserta = tb_peserta.id");

$nama_peserta = array();
$suara = array();
$artikulasi = array();
$urutan_aba = array();
$expresi = array();
$total_nilai = array();
while ($data_danton = mysqli_fetch_assoc($sql_danton)) {
	$nama_peserta[] = $data_danton['nama_peserta'];
	$suara[] 		= intval($data_danton['suara']);
	$artikulasi[] = intval($data_danton['artikulasi']);
	$urutan_aba[] = intval($data_danton['urutan_aba']);
	$expresi[] = intval($data_danton['expresi']);
	$total_nilai[] = intval($data_danton['total_nilai']);
}

?>

<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai Danton
		</div>
		<div class="card-body">
			<div id="container5"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'container5',
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
			text: 'Grafik Nilai Danton'
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
			name: 'Suara',
			data: <?= json_encode($suara) ?>
		},{
			name: 'Artikulasi',
			data: <?= json_encode($artikulasi) ?>
		},{
			name: 'Urutan Aba Aba',
			data: <?= json_encode($urutan_aba) ?>
		},{
			name: 'Expresi',
			data: <?= json_encode($expresi) ?>
		},{
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});

</script>