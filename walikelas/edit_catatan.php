<?php 
    $siswa = $db->get_row("SELECT tbl_siswa.nama_siswa, tbl_siswa.keterangan, tbl_kelas.jenjang, tbl_kelas.jurusan, tbl_kelas.kelas FROM tbl_siswa JOIN tbl_kelas ON tbl_siswa.id_kelas=tbl_kelas.id_kelas WHERE nis=$_GET[id]");
    $kelas = $siswa->jenjang.' '.$siswa->jurusan.' '.$siswa->kelas;
?>
<div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-md-8">
            <h4 class="page-title font-medium font-14">Edit Catatan Akademik: <?= $siswa->nama_siswa.' ('.$kelas.')' ; ?> </h4>
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
                    <label for="catatan" class="col-2 col-form-label">Catatan Akademik</label>
                    <div class="col-md-6">
                        <textarea class="form-control" id="catatan" name="catatan"><?= $siswa->keterangan ?></textarea>
                    </div>
                </div>

                <div class="buttons">
                    <a href="index?m=nilai_siswa&id=<?= $_GET['id'] ?>" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>    
                </div>
                
            </form>
                  
            </div>
        </div>
    </div>
</div>