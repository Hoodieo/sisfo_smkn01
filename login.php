<?php session_start(); require_once'includes/functions.php';

  if ($_SESSION) {

    if ($_SESSION['status'] == 'guru mapel') { $status = 'guru'; }elseif ($_SESSION['status'] == 'wali kelas') { $status = 'walikelas'; }else{ $status = 'admin'; }

    redirect_js($status.'/');
  }
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
   <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>

<body>
  <div class="container mt-5">
    <h3 class="text-center">Sistem Informasi Pengolahan Data Nilai</h3>
    <h3 class="text-center">Berbasis Website Pada SMKN 1 Balai</h3>
    <br>
    <h4 class="text-center mb-3">Login</h4>

      <div class="d-flex justify-content-center">
      <div class="card col-md-4 mb-5">
        <div class="card-body">
          <?php if ($_POST) include 'login_action.php'; ?>
          <form method="POST">
            <div class="form-group">
              <label for="username">Username</label>
              <input type="text" class="form-control" id="username" name="username" value="<?= $_POST['username']; ?>" autocomplete="off" placeholder="Username" required>
            </div>
            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Login</button>
          </form>
        </div>
      </div>
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