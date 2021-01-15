 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Guru</h4>
        </div>
    </div>
</div> 
<?php 
  $data_guru = $db->get_results("SELECT * FROM tbl_guru");
?>          
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Guru</h3>
                    
                    <?php if ($_SESSION['status'] == 'admin'): ?>
                        <div>
                        <a href="index?m=guru_tambah" class="btn btn-primary">Tambah Data</a>
                        </div>
                    <?php endif ?>
                </div>
                
                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Kode Guru</th>
                                <th class="border-top-0">Nama Guru</th>
                                <th class="border-top-0">NIP</th>
                                <th class="border-top-0">Jenis Kelamin</th>
                                <th class="border-top-0">Tempat, Tanggal Lahir</th>
                                <th class="border-top-0">Pendidikan Akhir</th>
                                
                                <?php if ($_SESSION['status'] == 'admin'): ?>
                                    <th class="border-top-0">Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($data_guru) < 1) : ?>
                                <tr><td colspan="8" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_guru as $guru): ?>
                                    <tr>
                                        <td><?= $guru->id_guru ?></td>
                                        <td><?= $guru->kode_guru ?></td>
                                        <td><?= $guru->nama_guru ?></td>
                                        <td><?= $guru->nip ?></td>
                                        <td><?= $guru->jenis_kelamin ?></td>
                                        <td><?= $guru->tmp_lahir.', '.date('d M Y', strtotime($guru->tgl_lahir)); ?></td>
                                        <td><?= $guru->pendidikan_akhir ?></td>

                                        <?php if ($_SESSION['status'] == 'admin'): ?>
                                        <td>
                                            <a href="index?m=guru_edit&id=<?= $guru->id_guru; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a href="aksi?act=guru_hapus&id=<?= $guru->id_guru; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
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