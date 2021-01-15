 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Nilai</h4>
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
                <h3 class="box-title">Data Nilai Kelas</h3>

                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Walikelas</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($data_kelas) < 1) : ?>
                                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_kelas as $kelas): ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $kelas->jenjang.' '.$kelas->jurusan.' '.$kelas->kelas ?></td>
                                        <td><?= ucwords($kelas->nama_guru) ?></td>

                                        <td>
                                            <a href="index?m=nilai_siswa_kelas&id_kelas=<?= $kelas->id_kelas; ?>" class="btn btn-secondary btn-sm">Lihat</a>
                                            </a>
                                        </td>
                                        
                                    </tr>
                                <?php endforeach ?>
                            <?php endif; ?>

                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>