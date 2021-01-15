 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Siswa</h4>
        </div>
    </div>
</div> 
<?php 
  $data_siswa = $db->get_results("SELECT tbl_siswa.* , tbl_kelas.*  FROM tbl_siswa LEFT JOIN tbl_kelas ON tbl_siswa.id_kelas=tbl_kelas.id_kelas");
?>              
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Siswa</h3>

                    <div>
                        <a href="index?m=cetak_siswa_kelas" class="btn btn-secondary mr-2">Print</a>
                    <?php if ($_SESSION['status'] == 'admin'): ?>
                        <a href="index?m=siswa_tambah" class="btn btn-primary">Tambah Data</a>
                    <?php endif ?>
                    </div>                 
                </div>

                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">ID</th>
                                <th class="border-top-0">Nama Siswa</th>
                                <th class="border-top-0">NIS</th>
                                <th class="border-top-0">Tempat,Tgl Lahir</th>
                                <!-- <th class="border-top-0">Jenis Kelamin</th> -->
                                <th class="border-top-0">Agama</th>
                                <th class="border-top-0">Orangtua/Wali</th>
                                <th class="border-top-0">Kelas</th>

                                <?php if ($_SESSION['status'] == 'admin'): ?>
                                    <th class="border-top-0">Aksi</th>
                                <?php endif ?>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($data_siswa) < 1) : ?>
                                <tr><td colspan="9" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_siswa as $siswa): ?>
                                    <tr>
                                        <td><?= $siswa->id_siswa ?></td>
                                        <td><?= $siswa->nama_siswa ?></td>
                                        <td><?= $siswa->nis ?></td>
                                        <td><?= $siswa->tmp_lahir.', '.date('d M Y', strtotime($siswa->tgl_lahir)); ?></td>
                                        <!-- <td><?= $siswa->jenis_kelamin ?></td> -->
                                        <td><?= $siswa->agama ?></td>
                                        <td><?= $siswa->nama_ortu ?></td>
                                        <td><?= $siswa->jenjang.'-'.$siswa->jurusan.'-'.$siswa->kelas ?></td>

                                        <?php if ($_SESSION['status'] == 'admin'): ?>
                                            <td>
                                                <a href="index?m=siswa_edit&id=<?= $siswa->id_siswa; ?>" class="btn btn-warning btn-sm">Edit</a>
                                                <a href="aksi?act=siswa_hapus&id=<?= $siswa->id_siswa; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Hapus data ini?')">Hapus</a>
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