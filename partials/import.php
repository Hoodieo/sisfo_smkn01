<?php
require_once '../includes/functions.php';
error_reporting(0);

$berhasil = 0;
$numrow = 0;

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
	$nama_file_baru = 'dataNilai.xlsx';

	// Load librari PHPExcel nya
	require_once '../plugins/PHPExcel/PHPExcel.php';

	$excelreader = new PHPExcel_Reader_Excel2007();
	$loadexcel = $excelreader->load('../tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
	$sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);

	$numrow = 1;
	foreach($sheet as $row){
		// Ambil data pada excel sesuai Kolom
		$mapel = $row['A']; // Ambil data kode mapel
        $thn_pel = $row['B']; // Ambil data tahun ajaran
        $smt = $row['C']; // Ambil data semester (ganjil/genap)
        $nama_siswa = $row['D']; // Ambil data nama siswa
        $nis = $row['E']; // Ambil data nis
        $kelas = $row['F']; //Ambil data id kelas
        $nilai_harian = $row['G']; //Ambil data nilai harian
        $uts = $row['H']; //Ambil data nilai UTS
        $uas = $row['I']; //Ambil data nilai UAS
        $keterampilan = $row['J']; //Ambil data keterampilan

		// Cek jika semua data tidak diisi
		if(empty($mapel) && empty($thn_pel) && empty($smt) && empty($nama_siswa) && empty($nis) && empty($kelas) && empty($nilai_harian) && empty($uts) && empty($uas) && empty($keterampilan))
			continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)

		// Cek $numrow apakah lebih dari 1
		// Artinya karena baris pertama adalah nama-nama kolom
		// Jadi dilewat saja, tidak usah diimport
		if($numrow > 1){
			$nilai_harian = ($nilai_harian) ? $nilai_harian : 0;
			$uts = ($uts) ? $uts : 0;
			$uas = ($uas) ? $uas : 0;
			$keterampilan = ($keterampilan) ? $keterampilan : 0;

			$nilai_pengetahuan = ($nilai_harian + $uts + $uas) / 3;
			$nilai_akhir = ($nilai_pengetahuan + $nilai_keterampilan) / 2;
			$status = 'belum diverifikasi';

			$check_nilai = $db->get_row("SELECT nis, semester, tahun_ajar, kode_mapel, id_kelas FROM tbl_nilai WHERE nis='$nis' AND semester='$smt' AND tahun_ajar='$thn_pel' AND kode_mapel='$mapel' AND id_kelas=$kelas");

			if ($check_nilai) {
				// update nilai jika data nilai sudah ada sebelumnya
				$db->query("UPDATE tbl_nilai SET nilai_harian=$nilai_harian, uts=$uts, uas=$uas, keterampilan=$keterampilan WHERE nis='$nis' AND semester='$smt' AND tahun_ajar='$thn_pel' AND kode_mapel='$mapel' AND id_kelas=$kelas ");
			}else{
				// insert data ke tabel
				$db->query("INSERT INTO tbl_nilai(id_nilai, nis, nilai_harian, uts, uas, keterampilan, semester, tahun_ajar, kode_mapel, id_kelas, status) VALUES (NULL,'$nis',$nilai_harian,$uts,$uas,$keterampilan,'$smt','$thn_pel','$mapel',$kelas,'$status')");
			}

            $berhasil++;
		}
		$numrow++; // Tambah 1 setiap kali looping
	}
}

$numrow = $numrow - 2;
echo "<script> alert('Import selesai! $berhasil dari $numrow data berhasil diimport.') </script>";

if ($_SESSION['status'] == 'guru mapel') {
	$status = 'guru';
}elseif ($_SESSION['status'] == 'wali kelas') {
	$status = 'walikelas';
}else{
	$status = 'admin';
}

redirect_js('../'.$status.'/index?m=nilai'); // Redirect ke halaman awal
?>
