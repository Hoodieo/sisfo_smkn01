 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Ganti Password</h4>
        </div>
    </div>
</div> 
            
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

            <?php if (isset($_COOKIE['notifikasi'])): ?>
				<div class="col-md-6 mx-0">
					<div class="alert alert-info alert-dismissible fade show" role="alert">
					 <?= $_COOKIE['notifikasi']; ?>
					  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
					    <span aria-hidden="true">&times;</span>
					  </button>
					</div>	
				</div>
			<?php setcookie('notifikasi','', time()); endif; ?>
		
			<div class="col-md-6">
				<?php if($_POST) include 'aksi.php'; ?>

				<form method="POST">
					 <div class="form-group row">
					    <label for="password_old" class="col-sm-4 col-form-label">Password Lama</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="password_old" name="password_old">
					    </div>
					 </div>
					 <div class="form-group row">
					    <label for="password_new" class="col-sm-4 col-form-label">Password Baru</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="password_new" name="password_new">
					    </div>
					 </div>
					 <div class="form-group row">
					    <label for="password_confirm" class="col-sm-4 col-form-label">Konfirmasi Password</label>
					    <div class="col-sm-8">
					      <input type="password" class="form-control" id="password_confirm" name="password_confirm">
					    </div>
					 </div>
					 <div class="form-group ml-1">
					    <button type="submit" class="btn btn-primary">Simpan</button>
					 </div>
				</form>
			</div>

            </div>
        </div>
    </div>
</div>