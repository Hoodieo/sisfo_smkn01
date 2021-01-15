 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Pengajar Mata Pelajaran</h4>
        </div>
    </div>
</div> 
<?php 
  $data_pengajar = $db->get_results("SELECT tbl_pengajar_mapel.* , tbl_kelas.*, tbl_mapel.*, tbl_guru.nama_guru 
    FROM tbl_pengajar_mapel 
    JOIN tbl_kelas ON tbl_pengajar_mapel.id_kelas=tbl_kelas.id_kelas 
    JOIN tbl_mapel ON tbl_pengajar_mapel.id_mapel=tbl_mapel.id_mapel 
    JOIN tbl_guru ON tbl_pengajar_mapel.id_guru=tbl_guru.id_guru");
?>             
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Pengajar Mata Pelajaran</h3>

                    <?php if ($_SESSION['status'] == 'admin'): ?>
                        <div>
                        <a href="index?m=pengajar_mapel_tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                    <?php endif ?>
                </div>
                

                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Mata Pelajaran</th>
                                <th class="border-top-0">Guru</th>

                                <?php if ($_SESSION['status'] == 'admin'): ?>
                                    <th class="border-top-0">Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($data_pengajar) < 1) : ?>
                                <tr><td colspan="5" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_pengajar as $pengajar): ?>
                                    <tr>
                                        <td><?= $pengajar->id_pengajar_mapel ?></td>
                                        <td><?= $pengajar->jenjang.' '.$pengajar->jurusan.' '.$pengajar->kelas ?></td>
                                        <td><?= $pengajar->mata_pelajaran ?></td>
                                        <td><?= ucwords($pengajar->nama_guru) ?></td>

                                        <?php if ($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="index?m=pengajar_mapel_edit&id=<?= $pengajar->id_pengajar_mapel; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="aksi?act=pengajar_hapus&id=<?= $pengajar->id_kelas; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
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