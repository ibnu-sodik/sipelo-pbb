<link href="<?= base_url() ?>/assets/css/select2.min.css" rel="stylesheet" />
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>/assets/css/select2-bootstrap.min.css">
<script src="<?= base_url() ?>/assets/js/select2.min.js"></script>

<h1 class="mt-4">Nilai PBB Murni</h1>
<ol class="breadcrumb mb-4">
	<li class="breadcrumb-item active">Data Nilai PBB Murni</li>
</ol>

<a href="#" class="btn btn-primary mb-2" data-target="#ModalAddNilaiGerakan" data-toggle="modal" title="Tambah NilaiGerakan">
	<i class="fa fa-plus mr-1"></i> Tambah Nilai PBB Murni
</a>

<div class="card-body">
	<div class="table-responsive">
		<table class="table table-hover table-bordered" id="dataTable">
			<thead>
				<tr>
					<th class="text-center">No</th>

					<!-- <th class="text-center">Nomor Peserta</th> -->
					<th class="text-center">Nama Peserta</th>

					<th class="text-center">Kelas</th>
					<th class="text-center">Sub Nilai Hadap</th>

					<th class="text-center">Sub Nilai Lencang</th>
					<th class="text-center">Sub Nilai Gerakan</th>

					<th class="text-center">Sub Nilai Langkah</th>
					<th class="text-center">Total Nilai</th>

					<th class="text-center">Opsi</th>
				</tr>
			</thead>
			<tfoot>
				<tr>
					<th class="text-center">No</th>

					<!-- <th class="text-center">Nomor Peserta</th> -->
					<th class="text-center">Nama Peserta</th>

					<th class="text-center">Kelas</th>
					<th class="text-center">Sub Nilai Hadap</th>

					<th class="text-center">Sub Nilai Lencang</th>
					<th class="text-center">Sub Nilai Gerakan</th>

					<th class="text-center">Sub Nilai Langkah</th>
					<th class="text-center">Total Nilai</th>

					<th class="text-center">Opsi</th>
				</tr>
			</tfoot>
			<tbody>
				<?php 
				error_reporting(0);
				$no=0;
				$SQL = $mysqli->query("SELECT nilai_gerakan.*, tb_peserta.* FROM nilai_gerakan LEFT JOIN tb_peserta ON nilai_gerakan.id_peserta = tb_peserta.id ORDER BY nama_peserta ASC");
				while($data=mysqli_fetch_assoc($SQL)):
					$no++;
					$sub_nilai_hadap = ($data['hadap_kanan']+$data['hadap_kiri']+$data['hadap_kiri_henti']+$data['hadap_kanan_henti']+$data['hadap_kiri_henti2']+$data['serong_kanan']+$data['serong_kiri']+$data['balik_kanan']+$data['balik_kanan2']);

					$sub_nilai_lencang = ($data['set_lencang_kanan']+$data['lencang_kanan']+$data['lencang_depan']);
					$sub_nilai_gerak = (
						$data['hormat_dj']+
						$data['laporan_dj']+
						$data['istirahat']+
						$data['periksa_kerapian']+
						$data['hormat']+
						$data['berhitung']+
						$data['melintang_kanan']+
						$data['henti']+
						$data['haluan_kanan']+
						$data['dua_kali_belok_kanan']+
						$data['hormat_kanan']+
						$data['tiap_tiap_banjar']+
						$data['tiap_tiap_banjar2']+
						$data['lari']+
						$data['tiap_tiap_banjar3']+
						$data['bubar']
					);
					$sub_nilai_langkah = (
						$data['jalan_ditempat']+
						$data['buka_barisan']+
						$data['tutup_barisan']+
						$data['empat_langkah_kekanan']+
						$data['tiga_langkah_kebelakang']+
						$data['empat_langkah_kekiri']+
						$data['tiga_langkah_kedepan']+
						$data['langkah_tegap']+
						$data['langkah_biasa']+
						$data['langkah_tegap2']+
						$data['langkah_biasa2']+
						$data['ganti_langkah']+
						$data['langkah_perlahan']+
						$data['langkah_biasa3']+
						$data['langkah_biasa4']
					);
					// $nilai_total = ($sub_nilai_hadap+$sub_nilai_lencang+$sub_nilai_gerak+$sub_nilai_langkah);
					?>
					<tr>
						<td class="text-center"><?=$no?></td>
						<!-- <td class="text-center"><?=$data['no_peserta'];?></td> -->
						<td class="text-left"><?=$data['nama_peserta'];?></td>
						<td class="text-left"><?=$data['kelas'];?></td>
						<td class="text-center"><?=$sub_nilai_hadap;?></td>
						<td class="text-center"><?=$sub_nilai_lencang;?></td>
						<td class="text-center"><?=$sub_nilai_gerak;?></td>
						<td class="text-center"><?=$sub_nilai_langkah;?></td>
						<td class="text-center"><?=$data['total_nilai'];?></td>
						<td class="text-center">
							<a href="javascript:void(0)" class="modal_edit_nilai_gerakan btn btn-warning btn-sm mb-1" data-target="#ModalEditNilaiGerakan" data-toggle="modal" id="<?=$data['id_g'];?>" title="Edit">
								<span class="fa fa-edit"></span>
							</a>

							<a href="javascript:void(0)" class="btn btn-danger btn-sm mb-1" data-target="#ModalDeleteNilaiGerakan" title="Hapus" onclick="konfir_hapus('nilai_gerakan/proses_hapus_nilai_gerakan.php?&id=<?php echo $data['id_g']; ?>');">
								<span class="fa fa-trash"></span>
							</a>
						</td>
					</tr>
				<?php endwhile; ?>
			</tbody>
		</table>
	</div>
</div>

<div id="ModalAddNilaiGerakan" class="modal fade" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title" id="myModalLabel">Tambah Nilai PBB Murni</h4>
				<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>

			<form method="POST" action="">
				<div class="modal-body">

					<div class="row">
						<div class="col-md-12 mb-4">
							<label for="id_peserta">Pilih Peserta</label>
							<select name="id_peserta" id="id_peserta" class="form-control">
								<option value="">----- PIlih Peserta -----</option>
								<?php 
								$SQL = $mysqli->query("SELECT * FROM tb_peserta ORDER BY no_peserta ASC");
								while ($data = mysqli_fetch_assoc($SQL)) {
									if ($data['id']==$dataIdPeserta) {
										$cek = " selected";
									}else{
										echo "<option value='$data[id]' $cek>$data[nama_peserta]</option>";
									}
								}
								?>
							</select>
						</div>
						<div class="col-md-3">
							<label for="hormat_dj">Hormat (Dewan Juri)</label>
							<input type="number" name="hormat_dj" id="hormat_dj" class="form-control" placeholder="Hormat (Dewan Juri)">
						</div>
						<div class="col-md-3">
							<label for="laporan_dj">Laporan (Dewan Juri)</label>
							<input type="number" name="laporan_dj" id="laporan_dj" class="form-control" placeholder="Laporan (Dewan Juri)">
						</div>
						<div class="col-md-3">
							<label for="istirahat">Istirahat</label>
							<input type="number" name="istirahat" id="istirahat" class="form-control" placeholder="Istirahat">
						</div>
						<div class="col-md-3">
							<label for="periksa_kerapian">Periksa Kerapihan</label>
							<input type="number" name="periksa_kerapian" id="periksa_kerapian" class="form-control" placeholder="Periksa Kerapihan">
						</div>

						<div class="col-md-3">
							<label for="hormat">Hormat</label>
							<input type="number" name="hormat" id="hormat" class="form-control" placeholder="Hormat">
						</div>
						<div class="col-md-3">
							<label for="berhitung">Berhitung</label>
							<input type="number" name="berhitung" id="berhitung" class="form-control" placeholder="Berhitung">
						</div>
						<div class="col-md-3">
							<label for="set_lencang_kanan">1/2 Lencang Kanan</label>
							<input type="number" name="set_lencang_kanan" id="set_lencang_kanan" class="form-control" placeholder="1/2 Lencang Kanan">
						</div>
						<div class="col-md-3">
							<label for="lencang_kanan">Lencang Kanan</label>
							<input type="number" name="lencang_kanan" id="lencang_kanan" class="form-control" placeholder="Lencang Kanan">
						</div>

						<div class="col-md-3">
							<label for="hadap_kanan">Hadap Kanan</label>
							<input type="number" name="hadap_kanan" id="hadap_kanan" class="form-control" placeholder="Hadap Kanan">
						</div>
						<div class="col-md-3">
							<label for="hadap_kiri">Hadap Kiri</label>
							<input type="number" name="hadap_kiri" id="hadap_kiri" class="form-control" placeholder="Hadap Kiri">
						</div>
						<div class="col-md-3">
							<label for="serong_kanan">Serong Kanan</label>
							<input type="number" name="serong_kanan" id="serong_kanan" class="form-control" placeholder="Serong Kanan">
						</div>
						<div class="col-md-3">
							<label for="serong_kiri">Serong Kiri</label>
							<input type="number" name="serong_kiri" id="serong_kiri" class="form-control" placeholder="Serong Kiri">
						</div>

						<div class="col-md-3">
							<label for="balik_kanan">Balik Kanan</label>
							<input type="number" name="balik_kanan" id="balik_kanan" class="form-control" placeholder="Balik Kanan">
						</div>
						<div class="col-md-3">
							<label for="jalan_ditempat">Jalan Ditempat</label>
							<input type="number" name="jalan_ditempat" id="jalan_ditempat" class="form-control" placeholder="Jalan Ditempat">
						</div>
						<div class="col-md-3">
							<label for="hadap_kiri_henti">Hadap Kiri Henti</label>
							<input type="number" name="hadap_kiri_henti" id="hadap_kiri_henti" class="form-control" placeholder="Hadap Kiri Henti">
						</div>
						<div class="col-md-3">
							<label for="lencang_depan">Lencang Depan</label>
							<input type="number" name="lencang_depan" id="lencang_depan" class="form-control" placeholder="Lencang Depan">
						</div>

						<div class="col-md-3">
							<label for="buka_barisan">Buka Barisan</label>
							<input type="number" name="buka_barisan" id="buka_barisan" class="form-control" placeholder="Buka Barisan">
						</div>
						<div class="col-md-3">
							<label for="tutup_barisan">Tutup Barisan</label>
							<input type="number" name="tutup_barisan" id="tutup_barisan" class="form-control" placeholder="Tutup Barisan">
						</div>
						<div class="col-md-3">
							<label for="empat_langkah_kekanan">4 Langkah Kanan</label>
							<input type="number" name="empat_langkah_kekanan" id="empat_langkah_kekanan" class="form-control" placeholder="4 Langkah Kanan">
						</div>
						<div class="col-md-3">
							<label for="tiga_langkah_kebelakang">3 Langkah Belakang</label>
							<input type="number" name="tiga_langkah_kebelakang" id="tiga_langkah_kebelakang" class="form-control" placeholder="3 Langkah Belakang">
						</div>

						<div class="col-md-3">
							<label for="empat_langkah_kekiri">4 Langkah Kiri</label>
							<input type="number" name="empat_langkah_kekiri" id="empat_langkah_kekiri" class="form-control" placeholder="4 Langkah Kiri">
						</div>
						<div class="col-md-3">
							<label for="tiga_langkah_kedepan">3 Langkah Depan</label>
							<input type="number" name="tiga_langkah_kedepan" id="tiga_langkah_kedepan" class="form-control" placeholder="3 Langkah Depan">
						</div>
						<div class="col-md-3">
							<label for="melintang_kanan">Melintang Kanan</label>
							<input type="number" name="melintang_kanan" id="melintang_kanan" class="form-control" placeholder="Melintang Kanan">
						</div>
						<div class="col-md-3">
							<label for="henti">Henti</label>
							<input type="number" name="henti" id="henti" class="form-control" placeholder="Henti">
						</div>

						<div class="col-md-3">
							<label for="balik_kanan2">Balik Kanan</label>
							<input type="number" name="balik_kanan2" id="balik_kanan2" class="form-control" placeholder="Balik Kanan">
						</div>
						<div class="col-md-3">
							<label for="haluan_kanan">Haluan Kanan</label>
							<input type="number" name="haluan_kanan" id="haluan_kanan" class="form-control" placeholder="Haluan Kanan">
						</div>
						<div class="col-md-3">
							<label for="hadap_kanan_henti">Hadap Kanan Henti</label>
							<input type="number" name="hadap_kanan_henti" id="hadap_kanan_henti" class="form-control" placeholder="Hadap Kanan Henti">
						</div>
						<div class="col-md-3">
							<label for="langkah_tegap">Langkah Tegap</label>
							<input type="number" name="langkah_tegap" id="langkah_tegap" class="form-control" placeholder="Langkah Tegap">
						</div>

						<div class="col-md-3">
							<label for="langkah_biasa">Langkah Biasa</label>
							<input type="number" name="langkah_biasa" id="langkah_biasa" class="form-control" placeholder="Langkah Biasa">
						</div>
						<div class="col-md-3">
							<label for="dua_kali_belok_kanan">2x Belok Kanan</label>
							<input type="number" name="dua_kali_belok_kanan" id="dua_kali_belok_kanan" class="form-control" placeholder="2x Belok Kanan">
						</div>
						<div class="col-md-3">
							<label for="langkah_tegap2">Langkah Tegap-2</label>
							<input type="number" name="langkah_tegap2" id="langkah_tegap2" class="form-control" placeholder="Langkah Tegap-2">
						</div>
						<div class="col-md-3">
							<label for="hormat_kanan">Hormat Kanan</label>
							<input type="number" name="hormat_kanan" id="hormat_kanan" class="form-control" placeholder="Hormat Kanan">
						</div>

						<div class="col-md-3">
							<label for="langkah_biasa2">Langkah Biasa-2</label>
							<input type="number" name="langkah_biasa2" id="langkah_biasa2" class="form-control" placeholder="Langkah Biasa-2">
						</div>
						<div class="col-md-3">
							<label for="tiap_tiap_banjar">Tiap Tiap Banjar</label>
							<input type="number" name="tiap_tiap_banjar" id="tiap_tiap_banjar" class="form-control" placeholder="Tiap Tiap Banjar">
						</div>
						<div class="col-md-3">
							<label for="ganti_langkah">Ganti Langkah</label>
							<input type="number" name="ganti_langkah" id="ganti_langkah" class="form-control" placeholder="Ganti Langkah">
						</div>
						<div class="col-md-3">
							<label for="langkah_perlahan">Langkah Perlahan</label>
							<input type="number" name="langkah_perlahan" id="langkah_perlahan" class="form-control" placeholder="Langkah Perlahan">
						</div>

						<div class="col-md-3">
							<label for="langkah_biasa3">Langkah Biasa-3</label>
							<input type="number" name="langkah_biasa3" id="langkah_biasa3" class="form-control" placeholder="Langkah Biasa-3">
						</div>
						<div class="col-md-3">
							<label for="tiap_tiap_banjar2">Tiap Tiap Banjar-2</label>
							<input type="number" name="tiap_tiap_banjar2" id="tiap_tiap_banjar2" class="form-control" placeholder="Tiap Tiap Banjar-2">
						</div>
						<div class="col-md-3">
							<label for="lari">Lari</label>
							<input type="number" name="lari" id="lari" class="form-control" placeholder="Lari">
						</div>
						<div class="col-md-3">
							<label for="langkah_biasa4">Langkah Biasa-4</label>
							<input type="number" name="langkah_biasa4" id="langkah_biasa4" class="form-control" placeholder="Langkah Biasa-4">
						</div>

						<div class="col-md-4">
							<label for="tiap_tiap_banjar3">Tiap Tiap Banjar-3</label>
							<input type="number" name="tiap_tiap_banjar3" id="tiap_tiap_banjar3" class="form-control" placeholder="Tiap Tiap Banjar-3">
						</div>
						<div class="col-md-4">
							<label for="hadap_kiri_henti2">Hadap Kiri Henti-2</label>
							<input type="number" name="hadap_kiri_henti2" id="hadap_kiri_henti2" class="form-control" placeholder="Hadap Kiri Henti-2">
						</div>
						<div class="col-md-4">
							<label for="bubar">Bubar</label>
							<input type="number" name="bubar" id="bubar" class="form-control" placeholder="Bubar">
						</div>
					</div>

				</div>
				<div class="modal-footer">
					<button class="btn btn-md btn-success" type="submit" name="simpan"><span class="fa fa-save"></span> Simpan</button>

					<button type="reset" class="btn btn-md btn-danger"  data-dismiss="modal" aria-hidden="true"><span class="fa fa-exclamation"></span> Tutup</button>
				</div>
			</form>
		</div>
	</div>
</div>
<?php

if (isset($_POST['simpan'])) {
	$id_peserta = sanitize($_POST['id_peserta']);
	$hormat_dj 	= sanitize($_POST['hormat_dj']);
	$laporan_dj = sanitize($_POST['laporan_dj']);
	$istirahat 	= sanitize($_POST['istirahat']);
	$periksa_kerapian 	= sanitize($_POST['periksa_kerapian']);
	$hormat 	= sanitize($_POST['hormat']);
	$berhitung 	= sanitize($_POST['berhitung']);
	$set_lencang_kanan 	= sanitize($_POST['set_lencang_kanan']);
	$lencang_kanan 	= sanitize($_POST['lencang_kanan']);
	$hadap_kanan 	= sanitize($_POST['hadap_kanan']);
	$haluan_kanan 	= sanitize($_POST['haluan_kanan']);
	$hadap_kiri 	= sanitize($_POST['hadap_kiri']);
	$serong_kanan 	= sanitize($_POST['serong_kanan']);
	$serong_kiri 	= sanitize($_POST['serong_kiri']);
	$balik_kanan 	= sanitize($_POST['balik_kanan']);
	$jalan_ditempat 	= sanitize($_POST['jalan_ditempat']);
	$hadap_kiri_henti 	= sanitize($_POST['hadap_kiri_henti']);
	$lencang_depan 	= sanitize($_POST['lencang_depan']);
	$buka_barisan 	= sanitize($_POST['buka_barisan']);
	$tutup_barisan 	= sanitize($_POST['tutup_barisan']);
	$empat_langkah_kekanan 	= sanitize($_POST['empat_langkah_kekanan']);
	$tiga_langkah_kebelakang 	= sanitize($_POST['tiga_langkah_kebelakang']);
	$empat_langkah_kekiri 	= sanitize($_POST['empat_langkah_kekiri']);
	$tiga_langkah_kedepan 	= sanitize($_POST['tiga_langkah_kedepan']);
	$melintang_kanan 	= sanitize($_POST['melintang_kanan']);
	$henti 	= sanitize($_POST['henti']);
	$balik_kanan2 	= sanitize($_POST['balik_kanan2']);
	$haluan_kanan 	= sanitize($_POST['haluan_kanan']);
	$hadap_kanan_henti 	= sanitize($_POST['hadap_kanan_henti']);
	$langkah_tegap 	= sanitize($_POST['langkah_tegap']);
	$langkah_biasa 	= sanitize($_POST['langkah_biasa']);
	$dua_kali_belok_kanan 	= sanitize($_POST['dua_kali_belok_kanan']);
	$langkah_tegap2 	= sanitize($_POST['langkah_tegap2']);
	$hormat_kanan 	= sanitize($_POST['hormat_kanan']);
	$langkah_biasa2 	= sanitize($_POST['langkah_biasa2']);
	$tiap_tiap_banjar 	= sanitize($_POST['tiap_tiap_banjar']);
	$ganti_langkah 	= sanitize($_POST['ganti_langkah']);
	$langkah_perlahan 	= sanitize($_POST['langkah_perlahan']);
	$langkah_biasa3 	= sanitize($_POST['langkah_biasa3']);
	$tiap_tiap_banjar2 	= sanitize($_POST['tiap_tiap_banjar2']);
	$lari 	= sanitize($_POST['lari']);
	$langkah_biasa4 	= sanitize($_POST['langkah_biasa4']);
	$tiap_tiap_banjar3 	= sanitize($_POST['tiap_tiap_banjar3']);
	$hadap_kiri_henti2 	= sanitize($_POST['hadap_kiri_henti2']);
	$bubar 	= sanitize($_POST['bubar']);

	$errors = array();
	if (trim($id_peserta)=='') {
		$errors[] = "Mohon Pilih Peserta Terlebih Dahul.!";
	}

	$SQL2 = $mysqli->query("SELECT * FROM nilai_gerakan WHERE
		id_peserta = '$id_peserta'");		
	if (mysqli_num_rows($SQL2)==1) {
		$errors[] = "Maaf, Nilai Tersebut Sudah Ada.";
	}

	if (!empty($errors)) {
		echo display_errors($errors);
	}else{ 
		$sub_nilai_hadap = 	((float)$hadap_kanan+(float)$hadap_kiri+(float)$hadap_kiri_henti+(float)$hadap_kanan_henti+(float)$hadap_kiri_henti2+(float)$serong_kanan+(float)$serong_kiri+(float)$balik_kanan+(float)$balik_kanan2);
		$sub_nilai_lencang = ((float)$set_lencang_kanan+(float)$lencang_kanan+(float)$lencang_depan);
		$sub_nilai_gerak = ((float)$hormat_dj+(float)$laporan_dj+(float)$istirahat+(float)$periksa_kerapian+(float)$hormat+(float)$berhitung+(float)$melintang_kanan+(float)$henti+(float)$haluan_kanan+(float)$dua_kali_belok_kanan+(float)$hormat_kanan+(float)$tiap_tiap_banjar+(float)$tiap_tiap_banjar2+(float)$lari+(float)$tiap_tiap_banjar3+(float)$bubar);
		$sub_nilai_langkah = ((float)$jalan_ditempat+(float)$buka_barisan+(float)$tutup_barisan+(float)$empat_langkah_kekanan+(float)$tiga_langkah_kebelakang+(float)$empat_langkah_kekiri+(float)$tiga_langkah_kedepan+(float)$langkah_tegap+(float)$langkah_biasa+(float)$langkah_tegap2+(float)$langkah_biasa2+(float)$ganti_langkah+(float)$langkah_perlahan+(float)$langkah_biasa3+(float)$langkah_biasa4);

		$total_nilai = ($sub_nilai_hadap+$sub_nilai_lencang+$sub_nilai_gerak+$sub_nilai_langkah);
		$mysqli->query("INSERT INTO nilai_gerakan SET
			id_peserta 	= '$id_peserta',
			hormat_dj 	= '$hormat_dj',
			laporan_dj 	= '$laporan_dj',
			istirahat 	= '$istirahat',
			periksa_kerapian = '$periksa_kerapian',
			hormat 		= '$hormat',
			berhitung 	= '$berhitung',
			set_lencang_kanan = '$set_lencang_kanan',
			lencang_kanan 	= '$lencang_kanan',
			hadap_kanan 	= '$hadap_kanan',
			hadap_kiri 		= '$hadap_kiri',
			serong_kanan 	= '$serong_kanan',
			serong_kiri 	= '$serong_kiri',
			balik_kanan 	= '$balik_kanan',
			jalan_ditempat 	= '$jalan_ditempat',
			hadap_kiri_henti = '$hadap_kiri_henti',
			lencang_depan 	= '$lencang_depan',
			buka_barisan 	= '$buka_barisan',
			tutup_barisan 	= '$tutup_barisan',
			empat_langkah_kekanan = '$empat_langkah_kekanan',
			tiga_langkah_kebelakang = '$tiga_langkah_kebelakang',
			empat_langkah_kekiri = '$empat_langkah_kekiri',
			tiga_langkah_kedepan = '$tiga_langkah_kedepan',
			melintang_kanan 	= '$melintang_kanan',
			henti 				= '$henti',
			balik_kanan2 		= '$balik_kanan2',
			haluan_kanan 		= '$haluan_kanan',
			hadap_kanan_henti 	= '$hadap_kanan_henti',
			langkah_tegap 		= '$langkah_tegap',
			langkah_biasa 		= '$langkah_biasa',
			dua_kali_belok_kanan = '$dua_kali_belok_kanan',
			langkah_tegap2 		= '$langkah_tegap2',
			hormat_kanan 		= '$hormat_kanan',
			langkah_biasa2 		= '$langkah_biasa2',
			tiap_tiap_banjar 	= '$tiap_tiap_banjar',
			ganti_langkah 		= '$ganti_langkah',
			langkah_perlahan 	= '$langkah_perlahan',
			langkah_biasa3 		= '$langkah_biasa3',
			tiap_tiap_banjar2 	= '$tiap_tiap_banjar2',
			lari 				= '$lari',
			langkah_biasa4 		= '$langkah_biasa4',
			tiap_tiap_banjar3	= '$tiap_tiap_banjar3',
			hadap_kiri_henti2 	= '$hadap_kiri_henti2',
			bubar 				= '$bubar',
			total_nilai 		= '$total_nilai'
			");
		$text = "Berhasil Menambahkan Nilai.! ";
		echo sweetalert('Berhasil..!', $text, 'success', '3000', 'false', '');
	}
}
?>
<div id="ModalEditNilaiGerakan" class="modal fade" role="dialog" aria-labelledby="myModalEdit" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">

		</div>
	</div>
</div>
<!-- modal delete -->
<div class="modal fade" id="ModalDeleteNilaiGerakan">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Anda Yakin Ingin Mneghapus Data Ini</h4>
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
			</div>
			<div class="modal-footer text-center">
				<a href="#" class="btn btn-primary" id="delete_link">
					<span class="fa fa-check"></span> Ya
				</a>
				<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fa fa-minus-square"></span> Tidak</button>

			</div>
		</div>
	</div>
</div>

<script type="text/javascript">
	$(document).ready(function() {
		$('#dataTable').DataTable({
			responsive: {
				details: false
			}
		});

		$('#id_peserta').select2({
			theme: 'bootstrap',
			width: 'resolve'
		});

		$("#dataTable").on('click', '.modal_edit_nilai_gerakan', function() {
			var m = $(this).attr("id");
			$.ajax({
				url: "nilai_gerakan/modal_edit_nilai_gerakan.php",
				type: "GET",
				data: {id: m,},
				success: function(ajaxData){
					$("#ModalEditNilaiGerakan").html(ajaxData);
					$("#ModalEditNilaiGerakan").modal('show');
					$('.select2').select2({
						theme: 'bootstrap',
						dropdownParent: $('#ModalEditNilaiGerakan')
					});
				}
			});
		});
	});	
	function konfir_hapus(delete_url){
		$('#ModalDeleteNilaiGerakan').modal('show', {backdrop: 'static'});
		document.getElementById('delete_link').setAttribute('href' , delete_url);
	}
</script>