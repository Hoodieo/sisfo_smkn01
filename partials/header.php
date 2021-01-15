<header class="topbar" data-navbarbg="skin5">
    <nav class="navbar top-navbar navbar-expand-md navbar-dark">
        <div class="navbar-header" data-logobg="skin6">

            <a class="navbar-brand" href="index">
                <span style="color: black; font-size: 20px; margin: auto;">SMKN 1 Balai</span>
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
                        <span class="text-white font-medium">Halo, <?= ucwords($_SESSION['nama']).' <span class="text-muted">('.ucwords($_SESSION['status']).')</span>'?></span>
                    </a>
                </li>
            </ul>

        </div>
    </nav>
</header>