<?php if ($_SESSION['status'] != 'admin') { redirect_js('index'); } ?>
 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title font-medium font-14">Tambah Pengajar Mata Pelajaran</h4>
        </div>
    </div>
</div> 

<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

            <?php if($_POST) include 'aksi.php'; ?>
            <form method="POST">
                <div class="form-group row ">
                    <label for="kelas" class="col-2 col-form-label">Kelas</label>
                    <div class="col-md-3">
                      <select class="form-control" id="kelas" name="kelas" required>
                          <?= getKelasOption() ?>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mapel" class="col-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-md-5">
                      <select class="form-control" id="mapel" name="mapel" required>
                          <?= getMapelOption() ?>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="guru" class="col-2 col-form-label">Guru</label>
                    <div class="col-md-5">
                      <select class="form-control" id="guru" name="guru" required>
                          <?= getGuruOption() ?>
                      </select>
                    </div>
                </div>

                <div class="buttons">
                    <a href="index?m=pengajar_mapel" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>    
                </div>
                
            </form>
                
            </div>
        </div>
    </div>
</div>