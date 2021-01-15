<?php session_start(); require_once'../includes/functions.php';
$kelas = $db->get_row("SELECT tbl_kelas.* FROM tbl_kelas WHERE tbl_kelas.id_guru=$_SESSION[id_user]");
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
                        href="index?m=nilai_kelas&id=<?= $kelas->id_kelas;?>" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Nilai Kelas</span>
                    </a>
                </li>
                <li class="sidebar-item"> 
                    <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="index?m=nilai" aria-expanded="false">
                        <i class="fa fa-table" aria-hidden="true"></i>
                        <span class="hide-menu">Data Nilai Mapel</span>
                    </a>
                </li>
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
    