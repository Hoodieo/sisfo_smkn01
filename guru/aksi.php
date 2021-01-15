<?php 
session_start();
require_once'../includes/functions.php';


// EDIT DATA NILAI MAPEL
if ($mod=='nilai_mapel_edit') {
	$id = $_GET['id'];
	$nilai_harian = $_POST['nilai_harian'];
	$uts = $_POST['uts'];
	$uas = $_POST['uas'];
	$keterampilan = $_POST['keterampilan'];

	if (empty($nilai_harian) || empty($uts) || empty($uas) || empty($keterampilan)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=nilai_mapel_edit&id=$id");
	}else{
		$db->query("UPDATE tbl_nilai SET nilai_harian=$nilai_harian, uts=$uts, uas=$uas, keterampilan=$keterampilan, status='belum diverifikasi' WHERE id_nilai=$id");
		echo "<script>alert('Nilai telah diupdate')</script>";
		redirect_js("index?m=nilai");
	}	
}


?>