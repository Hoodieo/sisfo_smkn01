<?php session_start(); require_once'includes/functions.php';
    redirect_js('login')
?>

<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <title>Sisfo Penilaian SMKN01</title>
    <!-- Custom CSS -->
   <link href="css/ample-admin/style.min.css" rel="stylesheet">
</head>

<body>
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin6">

                    <a class="navbar-brand" href="dashboard.html">
                        <span style="color: black; font-size: 20px; margin: auto;">SMKN1 Balai Desa</span>
                    </a>

                    <a class="nav-toggler waves-effect waves-light text-dark d-block d-md-none"
                        href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>

                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav d-none d-md-block d-lg-none">
                        <li class="nav-item">
                            <a class="nav-toggler nav-link waves-effect waves-light text-white"
                                href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                        </li>
                    </ul>

                    <ul class="navbar-nav ml-auto d-flex align-items-center">
                        <li>
                            <a class="profile-pic" href="#">
                                <span class="text-white font-medium">Halo, Budi Surtanto</span>
                            </a>
                        </li>
                    </ul>

                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index" aria-expanded="false">
                                <i class="fas fa-clock fa-fw" aria-hidden="true"></i>
                                <span class="hide-menu">Halaman Utama</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="index?m=profil" aria-expanded="false">
                                <i class="fa fa-user" aria-hidden="true"></i>
                                <span class="hide-menu">Profil Pengguna</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="basic-table.html" aria-expanded="false">
                                <i class="fa fa-table" aria-hidden="true"></i>
                                <span class="hide-menu">Mata Pelajaran</span>
                            </a>
                        </li>

                        <li class="text-center p-20 upgrade-btn">
                            <a href="#" class="btn btn-block btn-danger text-white" onclick="return confirm('Yakin ingin logout?') ">Logout</a>
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
                        echo "<div class='mt-3'>";
                        echo "The file $page not exists";
                        echo "</div>";
                    }
                }else{
                    include "home.php";
                }
        ?>
            
            <footer class="footer text-center">Sistem Informasi Pengolahan Data Nilai Berbasis Website Untuk Membantu Penilaian Pada SMKN 1 Balai.</footer>
        </div>
    </div>
    
    
    <script src="plugins/bower_components/jquery/dist/jquery.min.js"></script>
    <script src="plugins/bower_components/popper.js/dist/umd/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/ample-admin/app-style-switcher.js"></script>

    <script src="js/ample-admin/waves.js"></script>
    <script src="js/ample-admin/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="js/ample-admin/custom.js"></script>
</body>

</html>