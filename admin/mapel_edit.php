 <?php if ($_SESSION['status'] != 'admin') { redirect_js('index'); } ?>
 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title font-medium font-14">Edit Data Mata Pelajaran</h4>
        </div>
    </div>
</div> 

<?php 
    $query = "SELECT * FROM tbl_mapel WHERE id_mapel=$_GET[id]";
    $mapel = $db->get_row($query);
?>
            
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="white-box">

            <?php 
            include '../partials/error_message.php';
            if($_POST) include 'aksi.php';
            ?>
            
            <form method="POST">
                <div class="form-group row ">
                    <label for="kode" class="col-2 col-form-label">Kode Mata Pelajaran</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="kode" name="kode" value="<?= $mapel->kode_mapel ?>" required autocomplete="off">
                    </div>
                </div>
                <div class="form-group row ">
                    <label for="mapel" class="col-2 col-form-label">Mata Pelajaran</label>
                    <div class="col-md-3">
                        <input type="text" class="form-control" id="mapel" name="mapel" value="<?= $mapel->mata_pelajaran ?>" required autocomplete="off">
                    </div>
                </div>
                <div class="buttons">
                    <a href="index?m=mapel" class="btn btn-secondary mr-2">Batal</a>
                    <button type="submit" class="btn btn-primary">Simpan</button>    
                </div>
                
            </form>
                
            </div>
        </div>
    </div>
</div>