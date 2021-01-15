<?php 
    $info_kelas = $db->get_row("SELECT tbl_mapel.mata_pelajaran, tbl_kelas.jurusan, tbl_kelas.jenjang, tbl_kelas.kelas 
        FROM tbl_pengajar_mapel 
        JOIN tbl_mapel ON tbl_pengajar_mapel.id_mapel=tbl_mapel.id_mapel 
        JOIN tbl_kelas ON tbl_pengajar_mapel.id_kelas=tbl_kelas.id_kelas
        WHERE tbl_pengajar_mapel.id_kelas=$_GET[id_kelas] AND tbl_pengajar_mapel.id_mapel=$_GET[id_mapel]");

    $data_nilai = $db->get_results("SELECT tbl_nilai.*, tbl_mapel.kode_mapel, tbl_siswa.nama_siswa, tbl_siswa.nis 
    FROM tbl_nilai 
    JOIN tbl_siswa ON tbl_nilai.nis=tbl_siswa.nis 
    JOIN tbl_mapel ON tbl_nilai.kode_mapel=tbl_mapel.kode_mapel 
    WHERE tbl_nilai.id_kelas=$_GET[id_kelas] AND tbl_mapel.id_mapel=$_GET[id_mapel]");
?>  

<div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-12">
            <h4 class="page-title text-uppercase font-medium font-14">
                Mata Pelajaran: <?= $info_kelas->mata_pelajaran ?> | 
                Kelas: <?= $info_kelas->jenjang.' '.$info_kelas->jurusan.' '.$info_kelas->kelas ?></h4>
        </div>
    </div>
</div> 
   
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Data Nilai Mata Pelajaran</h3>
                </div>
              
                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No.</th>
                                <th class="border-top-0">NIS</th>
                                <th class="border-top-0">Nama Siswa</th>
                                <th class="border-top-0">Nilai Harian</th>
                                <th class="border-top-0">Nilai UTS</th>
                                <th class="border-top-0">Nilai UAS</th>
                                <th class="border-top-0">Nilai Keterampilan</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>

                            <?php if (count($data_nilai) < 1) : ?>
                                <tr><td colspan="7" class="text-center">Tidak ada data</td></tr> 
                            <?php else: ?>
                                <?php foreach ($data_nilai as $nilai): ?>
                                    <tr>
                                        <td><?= ++$i ?></td>
                                        <td><?= $nilai->nis ?></td>
                                        <td><?= $nilai->nama_siswa ?></td>
                                        <td><?= $nilai->nilai_harian ?></td>
                                        <td><?= $nilai->uts ?></td>
                                        <td><?= $nilai->uas ?></td>
                                        <td><?= $nilai->keterampilan ?></td>
                                        <td>
                                            <a href="index?m=nilai_mapel_edit&id=<?= $nilai->id_nilai; ?>" class="btn btn-warning btn-sm">Edit</a>
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
