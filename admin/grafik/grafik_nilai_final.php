<?php 
// grafik variasi
require_once '../../library/config.php';
$sql_final = $mysqli->query("SELECT nilai_final.*, tb_peserta.* FROM nilai_final LEFT JOIN tb_peserta ON nilai_final.id_peserta = tb_peserta.id");

$nama_peserta = array();
$tn_murni = array();
$tn_kreasi = array();
$tn_formasi = array();
$tn_variasi = array();
$tn_pengurangan = array();
$total_nilai = array();
while ($data_variasi = mysqli_fetch_assoc($sql_final)) {
	$nama_peserta[] = $data_variasi['nama_peserta'];
	$tn_murni[] 		= intval($data_variasi['tn_murni']);
	$tn_kreasi[] = intval($data_variasi['tn_kreasi']);
	$tn_formasi[] = intval($data_variasi['tn_formasi']);
	$tn_variasi[] = intval($data_variasi['tn_variasi']);
	$tn_pengurangan[] = intval($data_variasi['tn_pengurangan']);
	$total_nilai[] = intval($data_variasi['total_nilai']);
}

?>

<div class="col-xl-12">
	<div class="card mb-4">
		<div class="card-header">
			<i class="fas fa-chart-bar mr-1"></i>
			Grafik Nilai PBB Final
		</div>
		<div class="card-body">
			<div id="containers"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	// Set up the chart
	var chart = new Highcharts.Chart({
		chart: {
			renderTo: 'containers',
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
			text: 'Grafik Ini Akumulasi Dari Total Nilai PBB Murni, Kreasi, Formasi, Varisi Kemudian Dikurangi Dengan Data Pengurangan Poin.!'
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
			name: 'Total PBB Murni',
			data: <?= json_encode($tn_murni) ?>
		},{
			name: 'Total PBB Kreasi',
			data: <?= json_encode($tn_kreasi) ?>
		},{
			name: 'Total PBB Formasi',
			data: <?= json_encode($tn_formasi) ?>
		},{
			name: 'Total PBB Varisi',
			data: <?= json_encode($tn_variasi) ?>
		},{
			name: 'Poin Kesalahan',
			data: <?= json_encode($tn_pengurangan) ?>
		},{
			name: 'Total Nilai',
			data: <?= json_encode($total_nilai) ?>
		}]
	});
</script>