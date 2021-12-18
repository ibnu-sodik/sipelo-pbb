// function showValues() {
// 	$('#alpha-value').html(chart.options.chart.options3d.alpha);
// 	$('#beta-value').html(chart.options.chart.options3d.beta);
// 	$('#depth-value').html(chart.options.chart.options3d.depth);
// }
// $('#sliders input').on('input change', function () {
// 	chart.options.chart.options3d[this.id] = parseFloat(this.value);
// 	showValues();
// 	chart.redraw(false);
// });
// showValues();

// Call the dataTables jQuery plugin
$(document).ready(function() {
	$('#dataTable').DataTable({
		responsive: {
			details: false
		}
	});
});

// peserta
jQuery(function($) {
	$("#dataTable").on('click', '.modal_edit', function() {
		var id = $(this).data('id');
		var nopes = $(this).data('nopes');
		var nama = $(this).data('nama');
		var kelas = $(this).data('kelas');

		$('[name="id"]').val(id);
		$('[name="no_peserta2"]').val(nopes);
		$('[name="nama_peserta2"]').val(nama);
		$('[name="kelas2"]').val(kelas);
		$('#ModalEdit').modal('show');
	});
});

// edit nilai juri
jQuery(function($) {
	$("#dataTable").on('click', '.modal_edit_nilai_juri', function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_juri/modal_edit_nilai_juri.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiJuri").html(ajaxData);
				$("#ModalEditNilaiJuri").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai gerakan
jQuery(function($) {
	$(".modal_edit_nilai_gerakan").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_gerakan/modal_edit_nilai_gerakan.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiGerakan").html(ajaxData);
				$("#ModalEditNilaiGerakan").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai danton
jQuery(function($) {
	$(".modal_edit_nilai_danton").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_danton/modal_edit_nilai_danton.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiDanton").html(ajaxData);
				$("#ModalEditNilaiDanton").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai formasi
jQuery(function($) {
	$(".modal_edit_nilai_formasi").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_formasi/modal_edit_nilai_formasi.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiFormasi").html(ajaxData);
				$("#ModalEditNilaiFormasi").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai kreasi
jQuery(function($) {
	$(".modal_edit_nilai_kreasi").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_kreasi/modal_edit_nilai_kreasi.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiKreasi").html(ajaxData);
				$("#ModalEditNilaiKreasi").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai variasi
jQuery(function($) {
	$(".modal_edit_nilai_variasi").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_variasi/modal_edit_nilai_variasi.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiVariasi").html(ajaxData);
				$("#ModalEditNilaiVariasi").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai supporter
jQuery(function($) {
	$(".modal_edit_nilai_supporter").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_supporter/modal_edit_nilai_supporter.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiSupporter").html(ajaxData);
				$("#ModalEditNilaiSupporter").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai minus
jQuery(function($) {
	$(".modal_edit_nilai_minus").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_minus/modal_edit_nilai_minus.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiMinus").html(ajaxData);
				$("#ModalEditNilaiMinus").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit nilai final
jQuery(function($) {
	$(".modal_edit_nilai_final").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "nilai_final/modal_edit_nilai_final.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditNilaiFinal").html(ajaxData);
				$("#ModalEditNilaiFinal").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// edit user
jQuery(function($) {
	$(".modal_edit_user").click(function(e) {
		var m = $(this).attr("id");
		$.ajax({
			url: "user/modal_edit_user.php",
			type: "GET",
			data: {id: m,},
			success: function(ajaxData){
				$("#ModalEditUser").html(ajaxData);
				$("#ModalEditUser").modal('show', {backdrop: 'static'});
			}
		});
	});
});

// modal hapus gerakan
function konfir_hapus(delete_url){
	$('#ModalDeleteNilaiGerakan').modal('show', {backdrop: 'static'});
	document.getElementById('delete_link').setAttribute('href' , delete_url);
}

function konfir_hapus_nj(delete_url){
	$('#ModalDeleteNilaiJuri').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_nj').setAttribute('href' , delete_url);
}

function konfir_hapus_peserta(delete_url){
	$('#ModalDeletePeserta').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_peserta').setAttribute('href' , delete_url);
}

function konfir_hapus_danton(delete_url){
	$('#ModalDeleteNilaiDanton').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_danton').setAttribute('href' , delete_url);
}

function konfir_hapus_formasi(delete_url){
	$('#ModalDeleteNilaiFormasi').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_formasi').setAttribute('href' , delete_url);
}

function konfir_hapus_kreasi(delete_url){
	$('#ModalDeleteNilaiKreasi').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_kreasi').setAttribute('href' , delete_url);
}

function konfir_hapus_variasi(delete_url){
	$('#ModalDeleteNilaiVariasi').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_variasi').setAttribute('href' , delete_url);
}

function konfir_hapus_supporter(delete_url){
	$('#ModalDeleteNilaiSupporter').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_supporter').setAttribute('href' , delete_url);
}

function konfir_hapus_minus(delete_url){
	$('#ModalDeleteNilaiMinus').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_minus').setAttribute('href' , delete_url);
}

function konfir_hapus_final(delete_url){
	$('#ModalDeleteNilaiFinal').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_final').setAttribute('href' , delete_url);
}

function konfir_hapus_user(delete_url){
	$('#ModalDeleteUser').modal('show', {backdrop: 'static'});
	document.getElementById('link_hapus_user').setAttribute('href' , delete_url);
}