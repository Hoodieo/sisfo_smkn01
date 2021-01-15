<?php if ($_SESSION['status'] != 'admin') { redirect_js('index'); } ?>
 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title font-medium font-14">Edit Data Siswa</h4>
        </div>
    </div>
</div> 
<?php 
    $query = "SELECT * FROM tbl_siswa WHERE id_siswa=$_GET[id]";
    $siswa = $db->get_row($query);
?>  
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

            <?php if($_POST) include 'aksi.php'; ?>
            <form method="POST">
                <div class="form-group row ">
                    <label for="nisn" class="col-2 col-form-label">NISN</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="nisn" name="nisn" autocomplete="off" value="<?= $siswa->nisn ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nis" class="col-2 col-form-label">NIS</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="nis" name="nis" autocomplete="off" value="<?= $siswa->nis ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-2 col-form-label">Nama Siswa</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= $siswa->nama_siswa ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-2 col-form-label">Tempat Lahir</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off" value="<?= $siswa->tmp_lahir ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-3">
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" autocomplete="off" value="<?= $siswa->tgl_lahir ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jenis_kelamin" class="col-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-3">
                      <select name="jenis_kelamin" class="form-control">
                        <option hidden value="<?= $siswa->jenis_kelamin ?>"><?= $siswa->jenis_kelamin ?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="agama" class="col-2 col-form-label">Agama</label>
                    <div class="col-md-3">
                      <select name="agama" class="form-control">
                        <option hidden value="<?= $siswa->agama ?>"><?= $siswa->agama ?></option>
                        <option value="Islam">Islam</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Kristen Protestan">Kristen Protestan</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Konghucu">Konghucu</option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_ortu" class="col-2 col-form-label">Nama Orangtua/Wali</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="nama_ortu" name="nama_ortu" autocomplete="off" value="<?= $siswa->nama_ortu ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="id_kelas" class="col-2 col-form-label">Kelas</label>
                    <div class="col-md-3">
                      <select class="form-control" id="id_kelas" name="id_kelas" required>
                          <?= getKelasOption($siswa->id_kelas) ?>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterangan" class="col-2 col-form-label">Keterangan</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="keterangan" name="keterangan" autocomplete="off" value="<?= $siswa->keterangan ?>">
                    </div>
                </div>

                <div class="buttons">
                    <a href="index?m=siswa" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>    
                </div>
                
            </form>
                
            </div>
        </div>
    </div>
</div>