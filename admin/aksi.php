<?php 
session_start();
require_once'../includes/functions.php';

// Profil - Ganti Password
if ($mod=='ganti_password'){
	$password = $_POST['password_old'];
	$password1 = $_POST['password_new'];
	$password2 = $_POST['password_confirm'];


	// Jika salah satu field kosong
	if (empty($password) || empty($password1) || empty($password2)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=ganti_password");
	}else{
		// jika semua field diisi -> cek user dan passnya
		$user = $db->get_row("SELECT * FROM tbl_pengguna WHERE id=$_SESSION[id_user]");
		// jika password cocok
		if ($user->password == $password) {
			// cek kesamaan password
			if ($password1 == $password2) {
				// update password
				$db->query("UPDATE tbl_pengguna SET password='$password1' WHERE id='$user->id'");
				echo "<script>alert('Password berhasil diubah!')</script>";
				redirect_js("index?m=ganti_password");
			}else{
				echo "<script>alert('Password tidak sama!')</script>";
				redirect_js("index?m=ganti_password");
			}
		}else{
			echo "<script>alert('Password salah! Gagal ganti password')</script>";
			redirect_js("index?m=ganti_password");
		}
	}
}

// RESET PASSWORD PENGGUNA
elseif ($act=='reset_password') {
		$db->query("UPDATE tbl_pengguna SET password='12345' WHERE id=$_GET[id]");
		echo "<script>alert('Password pengguna $_GET[id] berhasil direset!')</script>";
		redirect_js("index?m=pengguna");
}


// TAMBAH DATA MAPEL
elseif ($mod=='mapel_tambah') {
	$kode = strtoupper($_POST['kode']);
	$mapel = ucwords($_POST['mapel']);

	if (empty($kode) || empty($mapel)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=mapel");
	}else{

		// cek kode_mapel 
		$cek_kode_mapel = $db->get_row("SELECT * FROM tbl_mapel WHERE kode_mapel='$kode'");

		if ($cek_kode_mapel) {
			$pesan = 'Kode Mata Pelajaran ('.$kode.') tidak tersedia. Mohon menggunakan kode lain.';
			echo "<script>alert('".$pesan."')</script>";
			redirect_js("index?m=mapel_tambah");
			exit();
		}else{
			$db->query("INSERT INTO `tbl_mapel`(`id_mapel`, `kode_mapel`, `mata_pelajaran`) 
					VALUES (NULL,'$kode','$mapel')");

			$pesan = 'Mata pelajaran '.$mapel.' berhasil disimpan';
			echo "<script>alert('".$pesan."')</script>";
			redirect_js("index?m=mapel");
		}
	}	
}

// EDIT DATA MAPEL
elseif ($mod=='mapel_edit') {
	$id = $_GET['id'];
	$kode = strtoupper($_POST['kode']);
	$mapel = ucwords($_POST['mapel']);

	if (empty($kode) || empty($mapel)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=mapel_edit&id=$id");
	}else{
		$db->query("UPDATE tbl_mapel SET kode_mapel='$kode', mata_pelajaran='$mapel' WHERE id_mapel=$id");
		$pesan = 'Data berhasil diupdate';
		echo "<script>alert('Data berhasil diupdate')</script>";
		redirect_js("index?m=mapel");
	}	
}

// HAPUS DATA MAPEL
elseif ($act=='mapel_hapus') {
		$db->query("DELETE FROM `tbl_mapel` WHERE id_mapel=$_GET[id]");
		echo "<script>alert('Data berhasil dihapus')</script>";
		redirect_js("index?m=mapel");
}


// TAMBAH DATA GURU
elseif ($mod=='guru_tambah') {
	$id = getRandomId();
	$kode = strtoupper($_POST['kode']);
	$nama = $_POST['nama'];
	$nip = $_POST['nip'];
	$jk = ucwords($_POST['jk']);
	$tmp_lahir = ucwords($_POST['tempat_lahir']);
	$tgl_lahir = ucwords($_POST['tgl_lahir']);
	$pendidikan = strtoupper($_POST['pendidikan_akhir']);
	$status=$_POST['status'];

	$username = str_replace(' ', '_', strtolower($nama));
	

	if (empty($kode) || empty($nama) || empty($tmp_lahir) || empty($tgl_lahir)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=guru_tambah");
	}else{
		// tambah data ke tbl_guru
		$db->query("INSERT INTO tbl_guru(id_guru, nama_guru, kode_guru, nip, jenis_kelamin, tmp_lahir, tgl_lahir, pendidikan_akhir) VALUES ($id,'$nama','$kode','$nip','$jk','$tmp_lahir','$tgl_lahir','$pendidikan')");

		// tambah hak akses (tbl_pengguna)
		$db->query("INSERT INTO tbl_pengguna(id, username, password, status) VALUES ($id, '$id', '12345', '$status')");

		echo "<script>alert('Data berhasil disimpan')</script>";
		redirect_js("index?m=guru");
	}	
}

// EDIT DATA GURU
elseif ($mod=='guru_edit') {
	$id = $_GET['id'];
	$kode = $_POST['kode'];
	$nama = $_POST['nama'];
	$nip = $_POST['nip'];
	$jk = ucwords($_POST['jk']);
	$tmp_lahir = ucwords($_POST['tempat_lahir']);
	$tgl_lahir = ucwords($_POST['tgl_lahir']);
	$pendidikan = strtoupper($_POST['pendidikan_akhir']);
	$status=$_POST['status'];

	if (empty($kode) || empty($nama) || empty($tmp_lahir) || empty($tgl_lahir)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=guru_edit&id=$id");
	}else{
		$db->query("UPDATE tbl_guru SET nama_guru='$nama', kode_guru='$kode', nip='$nip', jenis_kelamin='$jk', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', pendidikan_akhir='$pendidikan' WHERE id_guru=$id");

		$db->query("UPDATE tbl_pengguna SET status='$status' WHERE id=$id");

		echo "<script>alert('Data berhasil diupdate')</script>";
		redirect_js("index?m=guru");
	}	
}

// HAPUS DATA GURU
elseif ($act=='guru_hapus') {
		$db->query("DELETE FROM `tbl_guru` WHERE id_guru=$_GET[id]");
		$db->query("DELETE FROM `tbl_pengguna` WHERE id=$_GET[id]");
		echo "<script>alert('Data berhasil dihapus')</script>";
		redirect_js("index?m=guru");
}



// TAMBAH DATA KELAS
elseif ($mod=='kelas_tambah') {
	$jurusan = $_POST['jurusan'];
	$jenjang = $_POST['jenjang'];
	$kelas = $_POST['kelas'];
	$id_guru = $_POST['walikelas'];
	

	if (empty($jurusan) || empty($jenjang) || empty($kelas) || empty($id_guru)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=kelas_tambah");
	}else{
		$db->query("INSERT INTO tbl_kelas(id_kelas, jurusan, jenjang, kelas, id_guru) VALUES (NULL,'$jurusan','$jenjang','$kelas',$id_guru)");

		echo "<script>alert('Data berhasil disimpan')</script>";
		redirect_js("index?m=kelas");
	}	
}

// EDIT DATA KELAS
elseif ($mod=='kelas_edit') {
	$id = $_GET['id'];
	$jurusan = $_POST['jurusan'];
	$jenjang = $_POST['jenjang'];
	$kelas = $_POST['kelas'];
	$id_guru = $_POST['walikelas'];

	if (empty($jurusan) || empty($jenjang) || empty($kelas) || empty($id_guru)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=kelas_edit&id=$id");
	}else{
		$db->query("UPDATE tbl_kelas SET jurusan='$jurusan', jenjang='$jenjang', kelas='$kelas', id_guru='$id_guru' WHERE id_kelas=$id");
		echo "<script>alert('Data berhasil diupdate')</script>";
		redirect_js("index?m=kelas");
	}	
}

// HAPUS DATA KELAS
elseif ($act=='kelas_hapus') {
		$db->query("DELETE FROM `tbl_kelas` WHERE id_kelas=$_GET[id]");
		echo "<script>alert('Data berhasil dihapus')</script>";
		redirect_js("index?m=kelas");
}



// TAMBAH DATA SISWA
elseif ($mod=='siswa_tambah') {
	$id = getRandomId();
	$nama_siswa = ucwords($_POST['nama']);
	$nis = $_POST['nis'];
	$nisn = $_POST['nisn'];
	$tmp_lahir = ucwords($_POST['tempat_lahir']);
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$nama_ortu = ucwords($_POST['nama_ortu']);
	$id_kelas = $_POST['id_kelas'];
	$keterangan = $_POST['keterangan'];
	$nisn_pass = substr($nisn, -4);
	
	$username = str_replace(' ', '_', strtolower($nama_siswa));

	if (empty($nama_siswa) || empty($nis) || empty($nama_ortu) || empty($id_kelas)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=siswa_tambah");
	}else{
		$db->query("INSERT INTO tbl_siswa(id_siswa, nama_siswa, nis, nisn, tmp_lahir, tgl_lahir, jenis_kelamin, agama, nama_ortu, id_kelas, keterangan) VALUES ($id,'$nama_siswa','$nis','$nisn','$tmp_lahir','$tgl_lahir','$jenis_kelamin','$agama','$nama_ortu',$id_kelas,'$keterangan')");

		// tambah hak akses (tbl_pengguna)
		$db->query("INSERT INTO tbl_pengguna(id, username, password, status) VALUES ($id, '$nisn', '$nisn_pass', 'siswa')");

		echo "<script>alert('Data berhasil disimpan')</script>";
		redirect_js("index?m=siswa");
	}	
}

// EDIT DATA SISWA
elseif ($mod=='siswa_edit') {
	$id = $_GET['id'];
	$nama_siswa = ucwords($_POST['nama']);
	$nis = $_POST['nis'];
	$nisn = $_POST['nisn'];
	$tmp_lahir = ucwords($_POST['tempat_lahir']);
	$tgl_lahir = $_POST['tgl_lahir'];
	$jenis_kelamin = $_POST['jenis_kelamin'];
	$agama = $_POST['agama'];
	$nama_ortu = ucwords($_POST['nama_ortu']);
	$id_kelas = $_POST['id_kelas'];
	$keterangan = $_POST['keterangan'];

	if (empty($nama_siswa) || empty($nis) || empty($nama_ortu) || empty($id_kelas)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=siswa_edit&id=$id");
	}else{
		$db->query("UPDATE tbl_siswa SET nama_siswa='$nama_siswa', nis='$nis', nisn='$nisn', tmp_lahir='$tmp_lahir', tgl_lahir='$tgl_lahir', jenis_kelamin='$jenis_kelamin', agama='$agama', nama_ortu='$nama_ortu', id_kelas=$id_kelas WHERE id_siswa=$id");
		echo "<script>alert('Data berhasil diupdate')</script>";
		redirect_js("index?m=siswa");
	}	
}

// HAPUS DATA SISWA
elseif ($act=='siswa_hapus') {
	$db->query("DELETE FROM tbl_siswa WHERE id_siswa=$_GET[id]");
	$db->query("DELETE FROM tbl_pengguna WHERE id=$_GET[id]");
	echo "<script>alert('Data berhasil dihapus')</script>";
	redirect_js("index?m=siswa");
}


// TAMBAH DATA PENGAJAR MAPEL
elseif ($mod=='pengajar_mapel_tambah'){
	$kelas = $_POST['kelas'];
	$mapel = $_POST['mapel'];
	$guru = $_POST['guru'];

	if (empty($kelas) || empty($mapel) || empty($guru)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=pengajar_mapel");
	}else{
		$db->query("INSERT INTO tbl_pengajar_mapel(id_pengajar_mapel, id_kelas, id_mapel, id_guru) VALUES (NULL,$kelas,$mapel,$guru)");
		echo "<script>alert('Data berhasil disimpan')</script>";
		redirect_js("index?m=pengajar_mapel");
	}	
}

// EDIT DATA PENGAJAR MAPEL
elseif ($mod=='pengajar_mapel_edit') {
	$id = $_GET['id'];
	$kelas = $_POST['kelas'];
	$mapel = $_POST['mapel'];
	$guru = $_POST['guru'];

	if (empty($kelas) || empty($mapel) || empty($guru)) {
		echo "<script>alert('Semua field wajib diisi!')</script>";
		redirect_js("index?m=pengajar_mapel_edit&id=$id");
	}else{
		$db->query("UPDATE tbl_pengajar_mapel SET id_kelas=$kelas, id_mapel=$mapel, id_guru=$guru WHERE id_mapel=$id");
		echo "<script>alert('Data berhasil diupdate')</script>";
		redirect_js("index?m=pengajar_mapel");
	}	
}

// HAPUS DATA PENGAJAR MAPEL
elseif ($act=='pengajar_mapel_hapus') {
		$db->query("DELETE FROM `tbl_pengajar_mapel` WHERE id_pengajar_mapel=$_GET[id]");
		echo "<script>alert('Data berhasil dihapus')</script>";
		redirect_js("index?m=pengajar_mapel");
}


// VERIFIKASI NILAI SISWA
elseif ($act=='verifikasi_nilai_siswa') {
	$id_kelas = $_GET['id_kelas'];
	$nis = $_GET['nis'];

	$db->query("UPDATE tbl_nilai SET status='telah diverifikasi' WHERE id_kelas=$id_kelas AND nis=$nis");

	echo "<script>alert('Data Nilai Siswa (NIS: $nis) telah diverifikasi!')</script>";
	redirect_js("index?m=nilai_siswa&id=700");

}

// VERIFIKASI SEMUA NILAI SISWA BERDASARKAN KELAS
elseif ($act=='verifikasi_nilai_kelas') {
	$id_kelas = $_GET['id_kelas'];

	$data_kelas = $db->get_results("SELECT * FROM tbl_kelas WHERE id_kelas=$id_kelas");
	$kls = $data_kelas[0]->jenjang.' '.$data_kelas[0]->jurusan.' '.$data_kelas[0]->kelas;

	$db->query("UPDATE tbl_nilai SET status='telah diverifikasi' WHERE id_kelas=$id_kelas");

	echo "<script>alert('Data nilai kelas $kls berhasil diverifikasi!')</script>";
	redirect_js("index?m=nilai_siswa_kelas&id_kelas=$id_kelas");

}

?>