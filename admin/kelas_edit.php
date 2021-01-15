<?php if ($_SESSION['status'] != 'admin') { redirect_js('index'); } ?>
<div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title font-medium font-14">Edit Data Kelas</h4>
        </div>
    </div>
</div> 
<?php 
    $query = "SELECT * FROM tbl_kelas WHERE id_kelas=$_GET[id]";
    $kelas = $db->get_row($query);
?>
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
                        <option hidden value="<?= $kelas->jurusan?>"><?= $kelas->jurusan?></option>
                        <option value="TKJ" <?= ($kelas->jurusan=='TKJ') ? 'selected' : '' ?>>[TKJ] Teknik Komputer dan Jaringan</option>
                        <option value="AK" <?= ($kelas->jurusan=='AK') ? 'selected' : '' ?>>[AK] Akuntansi</option>
                        <option value="ATP" <?= ($kelas->jurusan=='ATP') ? 'selected' : '' ?>>[ATP] Agribisnis Tanaman Perkebunan</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenjang" class="col-2 col-form-label">Jenjang</label>
                    <div class="col-md-3">
                      <select name="jenjang" class="form-control">
                        <option hidden value="<?= $kelas->jenjang?>"><?= $kelas->jenjang?></option>
                        <option value="X">X</option>
                        <option value="XI">XI</option>
                        <option value="XII">XII</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kelas" class="col-2 col-form-label">Kelas</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="kelas" name="kelas" value="<?= $kelas->kelas?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="walikelas" class="col-2 col-form-label">Walikelas</label>
                    <div class="col-md-3">
                      <select name="walikelas" class="form-control">
                        <!-- <option hidden></option> -->
                        <?= getGuruOption($kelas->id_guru) ?>
                      </select>
                    </div>
                </div>

                <div class="buttons">
                    <a href="index?m=kelas" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>    
                </div>
                
            </form>
                
            </div>
        </div>
    </div>
</div>