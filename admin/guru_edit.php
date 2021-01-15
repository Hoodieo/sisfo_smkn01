<?php if ($_SESSION['status'] != 'admin') { redirect_js('index'); } ?>
<div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title font-medium font-14">Edit Data Guru</h4>
        </div>
    </div>
</div> 

<?php 
    $query = "SELECT tbl_guru.*, tbl_pengguna.* FROM tbl_guru LEFT JOIN tbl_pengguna ON tbl_guru.id_guru=tbl_pengguna.id WHERE tbl_guru.id_guru=$_GET[id]";
    $guru = $db->get_row($query);
?>
            
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

            <?php if($_POST) include 'aksi.php'; ?>
            <form method="POST">
                <div class="form-group row ">
                    <label for="nama" class="col-2 col-form-label">Nama Lengkap</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="nama" name="nama" autocomplete="off" value="<?= $guru->nama_guru ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="kode" class="col-2 col-form-label">Kode Guru</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="kode" name="kode" autocomplete="off" value="<?= $guru->kode_guru ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nip" class="col-2 col-form-label">NIP</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="nip" name="nip" autocomplete="off" value="<?= $guru->nip ?>">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jk" class="col-2 col-form-label">Jenis Kelamin</label>
                    <div class="col-md-3">
                      <select name="jk" class="form-control">
                        <option hidden value="<?= $guru->jenis_kelamin?>" ><?= $guru->jenis_kelamin?></option>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                        </option>
                      </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tempat_lahir" class="col-2 col-form-label">Tempat Lahir</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" autocomplete="off" value="<?= $guru->tmp_lahir ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="tgl_lahir" class="col-2 col-form-label">Tanggal Lahir</label>
                    <div class="col-md-3">
                      <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $guru->tgl_lahir ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="pendidikan_akhir" class="col-2 col-form-label">Pendidikan Akhir</label>
                    <div class="col-md-5">
                      <input type="text" class="form-control" id="pendidikan_akhir" name="pendidikan_akhir" autocomplete="off" value="<?= $guru->pendidikan_akhir ?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-2 col-form-label">Status</label>
                    <div class="col-md-3">
                      <select name="status" class="form-control">
                        <option hidden value="<?= $guru->status ?>"><?= $guru->status ?></option>
                        <option value="guru mapel">Guru Mata Pelajaran</option>
                        <option value="kepala sekolah">Kepala Sekolah</option>
                        <option value="wali kelas">Wali Kelas</option>
                        <option value="admin">Waka Kurikulum</option>
                        <option value="admin">Admin</option>
                        </option>
                      </select>
                    </div>
                </div>

                <div class="buttons">
                    <a href="index?m=guru" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>    
                </div>
                
            </form>
                
            </div>
        </div>
    </div>
</div>