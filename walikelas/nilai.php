 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Nilai Per Mata Pelajaran</h4>
        </div>
    </div>
</div> 
<?php 
  $mata_pelajaran = $db->get_results("SELECT tbl_pengajar_mapel.*, tbl_mapel.kode_mapel, tbl_mapel.mata_pelajaran, tbl_guru.nama_guru, tbl_kelas.jurusan, tbl_kelas.jenjang, tbl_kelas.kelas 
        FROM tbl_pengajar_mapel 
        JOIN tbl_mapel ON tbl_pengajar_mapel.id_mapel=tbl_mapel.id_mapel 
        JOIN tbl_guru ON tbl_pengajar_mapel.id_guru=tbl_guru.id_guru 
        JOIN tbl_kelas ON tbl_pengajar_mapel.id_kelas=tbl_kelas.id_kelas
        WHERE tbl_pengajar_mapel.id_guru=$_SESSION[id_user]");
?>     
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Nilai Mata Pelajaran</h3>

                    <div>
                        <a href="index?m=import_nilai" class="btn btn-success text-white">Import Nilai</a>
                    </div>
                </div>
              
                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No.</th>
                                <th class="border-top-0">Kode Mata Pelajaran</th>
                                <th class="border-top-0">Mata Pelajaran</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($mata_pelajaran) < 1) : ?>
                                <tr><td colspan="4" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($mata_pelajaran as $mapel): ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $mapel->kode_mapel ?></td>
                                        <td><?= $mapel->mata_pelajaran ?></td>
                                        <td><?= $mapel->jenjang.' '.$mapel->jurusan.' '.$mapel->kelas ?></td>

                                        <td>
                                            <a href="index?m=nilai_mapel&id_kelas=<?= $mapel->id_kelas ?>&id_mapel=<?= $mapel->id_mapel ?>&id_guru=<?= $mapel->id_guru ?>" class="btn btn-secondary btn-sm">Lihat</a>
                                        </td>
                                        
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


