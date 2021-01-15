<?php session_start(); require_once'../includes/functions.php';
  if ($_SESSION['status'] == 'guru mapel' || $_SESSION['status'] == 'siswa' ) {
    redirect_js("../");
  }
?>

<?php require_once '../partials/html_head_template.php'; ?>
<?php include '../partials/header.php'; ?>

<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
        
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index" aria-expanded="false">
                        <i class="fas fa-home" aria-hidden="true"></i>
                        <span class="hide-menu">Halaman Utama</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=siswa" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=guru" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Guru</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=kelas" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Kelas</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=mapel" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Mata Pelajaran</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=nilai" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Nilai</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=pengajar_mapel" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Pengajar Mapel</span>
                    </a>
                </li>

                <?php if ($_SESSION['status'] != 'kepala sekolah'): ?>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=pengguna" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Pengguna</span>
                    </a>
                </li>
                <?php endif ?>

                
                <li class="sidebar-item">
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=ganti_password" aria-expanded="false">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <span class="hide-menu">Ganti Password</span>
                    </a>
                </li>

                <li class="text-center p-20 upgrade-btn">
                    <a href="../logout" class="btn btn-block btn-danger text-white" onclick="return confirm('Yakin ingin logout?') ">Logout</a>
                </li>
            </ul>

        </nav>
    </div>
</aside>

<div class="page-wrapper" style="min-height: 250px;">
<?php 
        if(isset($_GET['m'])){
            $page = $_GET['m'].".php";

            if (file_exists($page)) {
                include $page;
            }else{
                include "../404.php";
            }
        }else{
            include "../home.php";
        }
?>
            
<?php include '../partials/footer.php'; ?>
</div>

<?php include '../partials/html_body_template.php'; ?>
    