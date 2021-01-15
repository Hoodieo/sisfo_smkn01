<?php
session_start();
require_once'includes/functions.php';

$username = $_POST['username'];
$password = $_POST['password'];

// jika salah satu field kosong
if (empty($_POST['username']) || empty($_POST['password'])) {
  	echo "<script>alert('Username dan password wajib diisi!')</script>";
    redirect_js("login");
}else{
// cek username dan password
  $user = $db->get_row("SELECT * FROM tbl_pengguna WHERE (username='$username' OR id='$username') AND password='$password'");
  // jika username dan password cocok set sesi
  if ($user) {
  		$userStatus = strtolower($user->status);

        if ($userStatus != 'siswa') {
        	$userLogin = $db->get_row("SELECT nama_guru AS nama FROM tbl_guru WHERE id_guru=$user->id");
        }else{
        	$userLogin = $db->get_row("SELECT nama_siswa AS nama FROM tbl_siswa WHERE id_siswa=$user->id");
        }

        $_SESSION['id_user'] = $user->id;
        $_SESSION['username'] = $user->username;
        $_SESSION['nama'] = $userLogin->nama;
        $_SESSION['status'] = $userStatus;

		echo "<script>alert('Login as $userStatus')</script>";
		// redirect
        if ($userStatus=='kepala sekolah' || $userStatus=='admin') {
	         redirect_js("admin/index");
        }elseif ($userStatus=='wali kelas'){
          redirect_js("walikelas/index");  
  	    }elseif ($userStatus=='guru mapel'){
  	    	redirect_js("guru/index");
  	    }elseif ($userStatus=='siswa'){
          $siswa = $db->get_row("SELECT nis FROM tbl_siswa WHERE id_siswa=$user->id");
          $_SESSION['nis'] = $siswa->nis;
  	      redirect_js("siswa/index");
  	    }else{
  	    	echo "<script>alert('Oops! Unknown role. Redirect failed')</script>";
  	    }
    }else{
        // jika username dan password tidak cocok
        echo "<script>alert('Username atau password salah!')</script>";
    	redirect_js("login");
	}
}

