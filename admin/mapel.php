 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Mata Pelajaran</h4>
        </div>
    </div>
</div> 
<?php 
  $mata_pelajaran = $db->get_results("SELECT * FROM tbl_mapel");
?>     
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Mata Pelajaran</h3>

                    <?php if ($_SESSION['status'] == 'admin'): ?>
                        <div>
                        <a href="index?m=mapel_tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                    <?php endif ?>
                </div>
              
                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Kode Mata Pelajaran</th>
                                <th class="border-top-0">Mata Pelajaran</th>

                                <?php if ($_SESSION['status'] == 'admin'): ?>
                                    <th class="border-top-0">Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($mata_pelajaran) < 1) : ?>
                                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($mata_pelajaran as $mapel): ?>
                                    <tr>
                                        <td><?= $mapel->id_mapel ?></td>
                                        <td><?= $mapel->kode_mapel ?></td>
                                        <td><?= $mapel->mata_pelajaran ?></td>

                                        <?php if ($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="index?m=mapel_edit&id=<?= $mapel->id_mapel; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="aksi?act=mapel_hapus&id=<?= $mapel->id_mapel; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
                                        </td>
                                        <?php endif ?>
                                        
                                    </tr>
                                <?php endforeach ?>
                            <?php endif; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>