<?php 
require_once '../../library/config.php';

$id_g = $_GET['id'];
$SQL = $mysqli->query("SELECT * FROM nilai_gerakan WHERE id_g='$id_g'");
$data = mysqli_fetch_assoc($SQL);

$dataIdPeserta = isset($_POST['id_peserta'])?$_POST['id_peserta']:$data['id_peserta'];
$hormat_dj 	= isset($_POST['hormat_dj'])?$_POST['']:$data['hormat_dj'];
$laporan_dj = isset($_POST['laporan_dj'])?$_POST['laporan_dj']:$data['laporan_dj'];
$istirahat 	= isset($_POST['istirahat'])?$_POST['istirahat']:$data['istirahat'];
$periksa_kerapian 	= isset($_POST['periksa_kerapian'])?$_POST['periksa_kerapian']:$data['periksa_kerapian'];
$hormat 	= isset($_POST['hormat'])?$_POST['hormat']:$data['hormat'];
$berhitung 	= isset($_POST['berhitung'])?$_POST['berhitung']:$data['berhitung'];
$set_lencang_kanan 	= isset($_POST['set_lencang_kanan'])?$_POST['set_lencang_kanan']:$data['set_lencang_kanan'];
$lencang_kanan 	= isset($_POST['lencang_kanan'])?$_POST['lencang_kanan']:$data['lencang_kanan'];
$hadap_kanan 	= isset($_POST['hadap_kanan'])?$_POST['hadap_kanan']:$data['hadap_kanan'];
$haluan_kanan 	= isset($_POST['haluan_kanan'])?$_POST['haluan_kanan']:$data['haluan_kanan'];
$hadap_kiri 	= isset($_POST['hadap_kiri'])?$_POST['hadap_kiri']:$data['hadap_kiri'];
$serong_kanan 	= isset($_POST['serong_kanan'])?$_POST['serong_kanan']:$data['serong_kanan'];
$serong_kiri 	= isset($_POST['serong_kiri'])?$_POST['serong_kiri']:$data['serong_kiri'];
$balik_kanan 	= isset($_POST['balik_kanan'])?$_POST['balik_kanan']:$data['balik_kanan'];
$jalan_ditempat 	= isset($_POST['jalan_ditempat'])?$_POST['jalan_ditempat']:$data['jalan_ditempat'];
$hadap_kiri_henti 	= isset($_POST['hadap_kiri_henti'])?$_POST['hadap_kiri_henti']:$data['hadap_kiri_henti'];
$lencang_depan 	= isset($_POST['lencang_depan'])?$_POST['lencang_depan']:$data['lencang_depan'];
$buka_barisan 	= isset($_POST['buka_barisan'])?$_POST['buka_barisan']:$data['buka_barisan'];
$tutup_barisan 	= isset($_POST['tutup_barisan'])?$_POST['tutup_barisan']:$data['tutup_barisan'];
$empat_langkah_kekanan 	= isset($_POST['empat_langkah_kekanan'])?$_POST['empat_langkah_kekanan']:$data['empat_langkah_kekanan'];
$tiga_langkah_kebelakang 	= isset($_POST['tiga_langkah_kebelakang'])?$_POST['tiga_langkah_kebelakang']:$data['tiga_langkah_kebelakang'];
$empat_langkah_kekiri 	= isset($_POST['empat_langkah_kekiri'])?$_POST['empat_langkah_kekiri']:$data['empat_langkah_kekiri'];
$tiga_langkah_kedepan 	= isset($_POST['tiga_langkah_kedepan'])?$_POST['tiga_langkah_kedepan']:$data['tiga_langkah_kedepan'];
$melintang_kanan 	= isset($_POST['melintang_kanan'])?$_POST['melintang_kanan']:$data['melintang_kanan'];
$henti 	= isset($_POST['henti'])?$_POST['henti']:$data['henti'];
$balik_kanan2 	= isset($_POST['balik_kanan2'])?$_POST['balik_kanan2']:$data['balik_kanan2'];
$haluan_kanan 	= isset($_POST['haluan_kanan'])?$_POST['haluan_kanan']:$data['haluan_kanan'];
$hadap_kanan_henti 	= isset($_POST['hadap_kanan_henti'])?$_POST['hadap_kanan_henti']:$data['hadap_kanan_henti'];
$langkah_tegap 	= isset($_POST['langkah_tegap'])?$_POST['langkah_tegap']:$data['langkah_tegap'];
$langkah_biasa 	= isset($_POST['langkah_biasa'])?$_POST['langkah_biasa']:$data['langkah_biasa'];
$dua_kali_belok_kanan 	= isset($_POST['dua_kali_belok_kanan'])?$_POST['dua_kali_belok_kanan']:$data['dua_kali_belok_kanan'];
$langkah_tegap2 	= isset($_POST['langkah_tegap2'])?$_POST['langkah_tegap2']:$data['langkah_tegap2'];
$hormat_kanan 	= isset($_POST['hormat_kanan'])?$_POST['hormat_kanan']:$data['hormat_kanan'];
$langkah_biasa2 	= isset($_POST['langkah_biasa2'])?$_POST['langkah_biasa2']:$data['langkah_biasa2'];
$tiap_tiap_banjar 	= isset($_POST['tiap_tiap_banjar'])?$_POST['tiap_tiap_banjar']:$data['tiap_tiap_banjar'];
$ganti_langkah 	= isset($_POST['ganti_langkah'])?$_POST['ganti_langkah']:$data['ganti_langkah'];
$langkah_perlahan 	= isset($_POST['langkah_perlahan'])?$_POST['langkah_perlahan']:$data['langkah_perlahan'];
$langkah_biasa3 	= isset($_POST['langkah_biasa3'])?$_POST['langkah_biasa3']:$data['langkah_biasa3'];
$tiap_tiap_banjar2 	= isset($_POST['tiap_tiap_banjar2'])?$_POST['tiap_tiap_banjar2']:$data['tiap_tiap_banjar2'];
$lari 	= isset($_POST['lari'])?$_POST['lari']:$data['lari'];
$langkah_biasa4 	= isset($_POST['langkah_biasa4'])?$_POST['langkah_biasa4']:$data['langkah_biasa4'];
$tiap_tiap_banjar3 	= isset($_POST['tiap_tiap_banjar3'])?$_POST['tiap_tiap_banjar3']:$data['tiap_tiap_banjar3'];
$hadap_kiri_henti2 	= isset($_POST['hadap_kiri_henti2'])?$_POST['hadap_kiri_henti2']:$data['hadap_kiri_henti2'];
$bubar 	= isset($_POST['bubar'])?$_POST['bubar']:$data['bubar'];

?>
<div class="modal-dialog modal-xl modal-dialog-centered">
	<div class="modal-content">
		<div class="modal-header">
			<h4 class="modal-title" id="myModalEdit">Edit Nilai PBB Murni</h4>
			<button class="close" type="button" data-dismiss="modal" aria-hidden="true">&times;</button>
		</div>

		<form method="POST" action="nilai_gerakan/proses_edit.php">
			<div class="modal-body">
				<input type="hidden" name="id_g" value="<?=$id_g?>">
				<div class="row">
					<div class="col-md-12 mb-4">
						<label for="id_peserta">Pilih Peserta</label>
						<select name="id_peserta" id="id_peserta" class="form-control select2">
							<option value="">----- PIlih Peserta -----</option>
							<?php 
							$SQL = $mysqli->query("SELECT * FROM tb_peserta ORDER BY nama_peserta ASC");
							while ($data2 = mysqli_fetch_assoc($SQL)) {
								if ($data2['id']==$dataIdPeserta) {
									$cek = " selected";
								}else{$cek='';}
								echo "<option value='$data2[id]' $cek>$data2[nama_peserta]</option>";
							}
							?>
						</select>
					</div>
					<div class="col-md-3">
						<label for="hormat_dj">Hormat (Dewan Juri)</label>
						<input type="number" name="hormat_dj" id="hormat_dj" class="form-control" value="<?=$hormat_dj?>" placeholder="Hormat (Dewan Juri)">
					</div>
					<div class="col-md-3">
						<label for="laporan_dj">Laporan (Dewan Juri)</label>
						<input type="number" name="laporan_dj" id="laporan_dj" class="form-control" value="<?=$laporan_dj?>" placeholder="Laporan (Dewan Juri)">
					</div>
					<div class="col-md-3">
						<label for="istirahat">Istirahat</label>
						<input type="number" name="istirahat" id="istirahat" class="form-control" value="<?=$istirahat?>" placeholder="Istirahat">
					</div>
					<div class="col-md-3">
						<label for="periksa_kerapian">Periksa Kerapihan</label>
						<input type="number" name="periksa_kerapian" id="periksa_kerapian" class="form-control" value="<?=$periksa_kerapian?>" placeholder="Periksa Kerapihan">
					</div>

					<div class="col-md-3">
						<label for="hormat">Hormat</label>
						<input type="number" name="hormat" id="hormat" class="form-control" value="<?=$hormat?>" placeholder="Hormat">
					</div>
					<div class="col-md-3">
						<label for="berhitung">Berhitung</label>
						<input type="number" name="berhitung" id="berhitung" class="form-control" value="<?=$berhitung?>" placeholder="Berhitung">
					</div>
					<div class="col-md-3">
						<label for="set_lencang_kanan">1/2 Lencang Kanan</label>
						<input type="number" name="set_lencang_kanan" id="set_lencang_kanan" class="form-control" value="<?=$set_lencang_kanan?>" placeholder="1/2 Lencang Kanan">
					</div>
					<div class="col-md-3">
						<label for="lencang_kanan">Lencang Kanan</label>
						<input type="number" name="lencang_kanan" id="lencang_kanan" class="form-control" value="<?=$lencang_kanan?>" placeholder="Lencang Kanan">
					</div>

					<div class="col-md-3">
						<label for="hadap_kanan">Hadap Kanan</label>
						<input type="number" name="hadap_kanan" id="hadap_kanan" class="form-control" value="<?=$hadap_kanan?>" placeholder="Hadap Kanan">
					</div>
					<div class="col-md-3">
						<label for="hadap_kiri">Hadap Kiri</label>
						<input type="number" name="hadap_kiri" id="hadap_kiri" class="form-control" value="<?=$hadap_kiri?>" placeholder="Hadap Kiri">
					</div>
					<div class="col-md-3">
						<label for="serong_kanan">Serong Kanan</label>
						<input type="number" name="serong_kanan" id="serong_kanan" class="form-control" value="<?=$serong_kanan?>" placeholder="Serong Kanan">
					</div>
					<div class="col-md-3">
						<label for="serong_kiri">Serong Kiri</label>
						<input type="number" name="serong_kiri" id="serong_kiri" class="form-control" value="<?=$serong_kiri?>" placeholder="Serong Kiri">
					</div>

					<div class="col-md-3">
						<label for="balik_kanan">Balik Kanan</label>
						<input type="number" name="balik_kanan" id="balik_kanan" class="form-control" value="<?=$balik_kanan?>" placeholder="Balik Kanan">
					</div>
					<div class="col-md-3">
						<label for="jalan_ditempat">Jalan Ditempat</label>
						<input type="number" name="jalan_ditempat" id="jalan_ditempat" class="form-control" value="<?=$jalan_ditempat?>" placeholder="Jalan Ditempat">
					</div>
					<div class="col-md-3">
						<label for="hadap_kiri_henti">Hadap Kiri Henti</label>
						<input type="number" name="hadap_kiri_henti" id="hadap_kiri_henti" class="form-control" value="<?=$hadap_kiri?>" placeholder="Hadap Kiri Henti">
					</div>
					<div class="col-md-3">
						<label for="lencang_depan">Lencang Depan</label>
						<input type="number" name="lencang_depan" id="lencang_depan" class="form-control" value="<?=$lencang_depan?>" placeholder="Lencang Depan">
					</div>

					<div class="col-md-3">
						<label for="buka_barisan">Buka Barisan</label>
						<input type="number" name="buka_barisan" id="buka_barisan" class="form-control" value="<?=$buka_barisan?>" placeholder="Buka Barisan">
					</div>
					<div class="col-md-3">
						<label for="tutup_barisan">Tutup Barisan</label>
						<input type="number" name="tutup_barisan" id="tutup_barisan" class="form-control" value="<?=$tutup_barisan?>" placeholder="Tutup Barisan">
					</div>
					<div class="col-md-3">
						<label for="empat_langkah_kekanan">4 Langkah Kanan</label>
						<input type="number" name="empat_langkah_kekanan" id="empat_langkah_kekanan" class="form-control" value="<?=$empat_langkah_kekanan?>" placeholder="4 Langkah Kanan">
					</div>
					<div class="col-md-3">
						<label for="tiga_langkah_kebelakang">3 Langkah Belakang</label>
						<input type="number" name="tiga_langkah_kebelakang" id="tiga_langkah_kebelakang" class="form-control" value="<?=$tiga_langkah_kebelakang?>" placeholder="3 Langkah Belakang">
					</div>

					<div class="col-md-3">
						<label for="empat_langkah_kekiri">4 Langkah Kiri</label>
						<input type="number" name="empat_langkah_kekiri" id="empat_langkah_kekiri" class="form-control" value="<?=$empat_langkah_kekiri?>" placeholder="4 Langkah Kiri">
					</div>
					<div class="col-md-3">
						<label for="tiga_langkah_kedepan">3 Langkah Depan</label>
						<input type="number" name="tiga_langkah_kedepan" id="tiga_langkah_kedepan" class="form-control" value="<?=$tiga_langkah_kedepan?>" placeholder="3 Langkah Depan">
					</div>
					<div class="col-md-3">
						<label for="melintang_kanan">Melintang Kanan</label>
						<input type="number" name="melintang_kanan" id="melintang_kanan" class="form-control" value="<?=$melintang_kanan?>" placeholder="Melintang Kanan">
					</div>
					<div class="col-md-3">
						<label for="henti">Henti</label>
						<input type="number" name="henti" id="henti" class="form-control" value="<?=$henti?>" placeholder="Henti">
					</div>

					<div class="col-md-3">
						<label for="balik_kanan2">Balik Kanan-2</label>
						<input type="number" name="balik_kanan2" id="balik_kanan2" class="form-control" value="<?=$balik_kanan2?>" placeholder="Balik Kanan-2">
					</div>
					<div class="col-md-3">
						<label for="haluan_kanan">Haluan Kanan</label>
						<input type="number" name="haluan_kanan" id="haluan_kanan" class="form-control" value="<?=$haluan_kanan?>" placeholder="Haluan Kanan">
					</div>
					<div class="col-md-3">
						<label for="hadap_kanan_henti">Hadap Kanan Henti</label>
						<input type="number" name="hadap_kanan_henti" id="hadap_kanan_henti" class="form-control" value="<?=$hadap_kanan_henti?>" placeholder="Hadap Kanan Henti">
					</div>
					<div class="col-md-3">
						<label for="langkah_tegap">Langkah Tegap</label>
						<input type="number" name="langkah_tegap" id="langkah_tegap" class="form-control" value="<?=$langkah_tegap?>" placeholder="Langkah Tegap">
					</div>

					<div class="col-md-3">
						<label for="langkah_biasa">Langkah Biasa</label>
						<input type="number" name="langkah_biasa" id="langkah_biasa" class="form-control" value="<?=$langkah_biasa?>" placeholder="Langkah Biasa">
					</div>
					<div class="col-md-3">
						<label for="dua_kali_belok_kanan">2x Belok Kanan</label>
						<input type="number" name="dua_kali_belok_kanan" id="dua_kali_belok_kanan" class="form-control" value="<?=$dua_kali_belok_kanan?>" placeholder="2x Belok Kanan">
					</div>
					<div class="col-md-3">
						<label for="langkah_tegap2">Langkah Tegap-2</label>
						<input type="number" name="langkah_tegap2" id="langkah_tegap2" class="form-control" value="<?=$langkah_tegap2?>" placeholder="Langkah Tegap-2">
					</div>
					<div class="col-md-3">
						<label for="hormat_kanan">Hormat Kanan</label>
						<input type="number" name="hormat_kanan" id="hormat_kanan" class="form-control" value="<?=$hormat_kanan?>" placeholder="Hormat Kanan">
					</div>

					<div class="col-md-3">
						<label for="langkah_biasa2">Langkah Biasa-2</label>
						<input type="number" name="langkah_biasa2" id="langkah_biasa2" class="form-control" value="<?=$langkah_biasa2?>" placeholder="Langkah Biasa-2">
					</div>
					<div class="col-md-3">
						<label for="tiap_tiap_banjar">Tiap Tiap Banjar</label>
						<input type="number" name="tiap_tiap_banjar" id="tiap_tiap_banjar" class="form-control" value="<?=$tiap_tiap_banjar?>" placeholder="Tiap Tiap Banjar">
					</div>
					<div class="col-md-3">
						<label for="ganti_langkah">Ganti Langkah</label>
						<input type="number" name="ganti_langkah" id="ganti_langkah" class="form-control" value="<?=$ganti_langkah?>" placeholder="Ganti Langkah">
					</div>
					<div class="col-md-3">
						<label for="langkah_perlahan">Langkah Perlahan</label>
						<input type="number" name="langkah_perlahan" id="langkah_perlahan" class="form-control" value="<?=$langkah_perlahan?>" placeholder="Langkah Perlahan">
					</div>

					<div class="col-md-3">
						<label for="langkah_biasa3">Langkah Biasa-3</label>
						<input type="number" name="langkah_biasa3" id="langkah_biasa3" class="form-control" value="<?=$langkah_biasa3?>" placeholder="Langkah Biasa-3">
					</div>
					<div class="col-md-3">
						<label for="tiap_tiap_banjar2">Tiap Tiap Banjar-2</label>
						<input type="number" name="tiap_tiap_banjar2" id="tiap_tiap_banjar2" class="form-control" value="<?=$tiap_tiap_banjar2?>" placeholder="Tiap Tiap Banjar-2">
					</div>
					<div class="col-md-3">
						<label for="lari">Lari</label>
						<input type="number" name="lari" id="lari" class="form-control" value="<?=$lari?>" placeholder="Lari">
					</div>
					<div class="col-md-3">
						<label for="langkah_biasa4">Langkah Biasa-4</label>
						<input type="number" name="langkah_biasa4" id="langkah_biasa4" class="form-control" value="<?=$langkah_biasa4?>" placeholder="Langkah Biasa-4">
					</div>

					<div class="col-md-4">
						<label for="tiap_tiap_banjar3">Tiap Tiap Banjar-3</label>
						<input type="number" name="tiap_tiap_banjar3" id="tiap_tiap_banjar3" class="form-control" value="<?=$tiap_tiap_banjar3?>" placeholder="Tiap Tiap Banjar-3">
					</div>
					<div class="col-md-4">
						<label for="hadap_kiri_henti2">Hadap Kiri Henti-2</label>
						<input type="number" name="hadap_kiri_henti2" id="hadap_kiri_henti2" class="form-control" value="<?=$hadap_kiri?>" placeholder="Hadap Kiri Henti-2">
					</div>
					<div class="col-md-4">
						<label for="bubar">Bubar</label>
						<input type="number" name="bubar" id="bubar" class="form-control" value="<?=$bubar?>" placeholder="Bubar">
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