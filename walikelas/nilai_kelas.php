<?php 
    $data_kelas = $db->get_results("SELECT tbl_kelas.* FROM tbl_kelas WHERE tbl_kelas.id_guru=$_SESSION[id_user]");
    $data_siswa = $db->get_results("SELECT * FROM tbl_siswa WHERE id_kelas=$_GET[id]");

    $info_kelas = $db->get_results("SELECT COUNT(tbl_kelas.id_kelas) AS jumlah_siswa FROM tbl_kelas JOIN tbl_siswa ON tbl_kelas.id_kelas=tbl_siswa.id_kelas WHERE tbl_kelas.id_guru=$_SESSION[id_user]"); 

    $kls = $data_kelas[0]->jenjang.' '.$data_kelas[0]->jurusan.' '.$data_kelas[0]->kelas;
?>  

<div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Nilai Kelas <?= $kls ?></h4>
        </div>
    </div>
</div> 

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="d-flex justify-content-between">
                    <div>
                        <h3 class="box-title">Kelas <?= $kls ?></h3>
                        <span class="text-muted">Jumlah Siswa: <?= $info_kelas[0]->jumlah_siswa ?></span>
                    </div>

                    <!-- <div>
                        <a href="index?m=cetak_siswa_kelas" class="btn btn-secondary mr-2">Print</a>
                    </div> -->
                </div>

                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">NIS</th>
                                <th class="border-top-0">Nama Siswa</th>
                                <th class="border-top-0">Tempat,Tgl Lahir</th>
                                <th class="border-top-0">Nama Orang Tua/Wali</th>
                                <th class="border-top-0">Status Nilai</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <?php if (!$data_siswa) : ?>
                                <tr><td colspan="6" class="text-center">Tidak ada data</td></tr>
                            <?php else: ?>
                                <?php foreach ($data_siswa as $siswa): 
                                    $status_nilai = $db->get_results("SELECT * FROM tbl_nilai WHERE nis=$siswa->nis GROUP BY status");
                                    $status_nilai = (count($status_nilai) < 1) ? 'Belum ada nilai' : ucfirst($status_nilai[0]->status);
                                ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?= $siswa->nis ?></td>
                                        <td><?= $siswa->nama_siswa ?></td>
                                        <td><?= $siswa->tmp_lahir.', '.date('d M Y', strtotime($siswa->tgl_lahir)) ?></td>
                                        <td><?= $siswa->nama_ortu ?></td>
                                        <td><?= $status_nilai;?></td>
                                        <td>
                                            <a href="index?m=nilai_siswa&id=<?= $siswa->nis; ?>" class="btn btn-secondary btn-sm">Lihat Nilai</a>
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