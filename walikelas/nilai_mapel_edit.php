<div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title font-medium font-14">Edit Nilai Mata Pelajaran</h4>
        </div>
    </div>
</div> 
<?php 
    $query = "SELECT tbl_nilai.*, tbl_siswa.nama_siswa FROM tbl_nilai JOIN tbl_siswa ON tbl_nilai.nis=tbl_siswa.nis WHERE id_nilai=$_GET[id]";
    $nilai = $db->get_row($query);
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

            <?php if($_POST) include 'aksi.php'; ?>
            <form method="POST">
                <div class="form-group row">
                    <label for="nis" class="col-2 col-form-label">NIS</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="nis" name="nis" value="<?= $nilai->nis?>" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama_siswa" class="col-2 col-form-label">Nama Siswa</label>
                    <div class="col-md-3">
                      <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="<?= $nilai->nama_siswa?>" readonly>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="nilai_harian" class="col-2 col-form-label">Rata-rata Nilai Harian</label>
                    <div class="col-md-3">
                      <input type="number" min="0" max="100" class="form-control" id="nilai_harian" name="nilai_harian" value="<?= $nilai->nilai_harian?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uts" class="col-2 col-form-label">Nilai UTS</label>
                    <div class="col-md-3">
                      <input type="number" min="0" max="100" class="form-control" id="uts" name="uts" value="<?= $nilai->uts?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="uas" class="col-2 col-form-label">Nilai UAS</label>
                    <div class="col-md-3">
                      <input type="number" min="0" max="100" class="form-control" id="uas" name="uas" value="<?= $nilai->uas?>" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="keterampilan" class="col-2 col-form-label">Nilai Keterampilan</label>
                    <div class="col-md-3">
                      <input type="number" min="0" max="100" class="form-control" id="keterampilan" name="keterampilan" value="<?= $nilai->keterampilan?>" required>
                    </div>
                </div>
            
                <div class="buttons">
                    <a href="index?m=nilai" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Update</button>    
                </div>
                
            </form>
                
            </div>
        </div>
    </div>
</div>