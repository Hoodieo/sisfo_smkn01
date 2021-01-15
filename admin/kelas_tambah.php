<?php if ($_SESSION['status'] != 'admin') { redirect_js('index'); } ?>
 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title font-medium font-14">Tambah Data Kelas</h4>
        </div>
    </div>
</div> 
            
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

            <?php if($_POST) include 'aksi.php'; ?>
            <form method="POST">
                <div class="form-group row">
                    <label for="jurusan" class="col-2 col-form-label">Jurusan</label>
                    <div class="col-md-3">
                      <select name="jurusan" class="form-control">
                        <option value="TKJ">Teknik Komputer dan Jaringan</option>
                        <option value="AK">Akuntansi</option>
                        <option value="ATP">Agribisnis Tanaman Perkebunan</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang" class="col-2 col-form-label">Jenjang</label>
                    <div class="col-md-3">
                      <select name="jenjang" class="form-control">
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-2 col-form-label">Kelas</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="kelas" name="kelas" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="walikelas" class="col-2 col-form-label">Walikelas</label>
                    <div class="col-md-3">
                      <select name="walikelas" class="form-control">
                        <option hidden></option>
                        <?= getGuruOption() ?>
                      </select>
                    </div>
                </div>

                <div class="buttons">
                    <a href="index?m=kelas" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>    
                </div>
                
            </form>
                
            </div>
        </div>
    </div>
</div>