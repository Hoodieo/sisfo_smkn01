 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Kelas</h4>
        </div>
    </div>
</div> 
<?php 
  $data_kelas = $db->get_results("SELECT tbl_kelas.* , tbl_guru.nama_guru FROM tbl_kelas JOIN tbl_guru ON tbl_kelas.id_guru=tbl_guru.id_guru");
?>               
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Kelas</h3>

                    <div>
                    <a href="cetak_kelas" class="btn btn-secondary mr-2">Print</a>
                    <?php if ($_SESSION['status'] == 'admin'): ?>
                        <a href="index?m=kelas_tambah" class="btn btn-primary">Tambah Data</a>
                    <?php endif ?>
                    </div>
                </div>
                

                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Jurusan</th>
                                <th class="border-top-0">Jenjang</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Walikelas</th>

                                <?php if ($_SESSION['status'] == 'admin'): ?>
                                    <th class="border-top-0">Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($data_kelas) < 1) : ?>
                                <tr><td colspan="6" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_kelas as $kelas): ?>
                                    <tr>
                                        <td><?= $kelas->id_kelas ?></td>
                                        <td><?= $kelas->jurusan ?></td>
                                        <td><?= $kelas->jenjang ?></td>
                                        <td><?= $kelas->kelas ?></td>
                                        <td><?= ucwords($kelas->nama_guru) ?></td>

                                        <?php if ($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="index?m=kelas_edit&id=<?= $kelas->id_kelas; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="aksi?act=kelas_hapus&id=<?= $kelas->id_kelas; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
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