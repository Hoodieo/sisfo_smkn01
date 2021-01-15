 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Nilai Siswa</h4>
        </div>
    </div>
</div> 

<?php 
  $siswa = $db->get_row("SELECT * FROM tbl_siswa WHERE nis=$_GET[id]");
  $data_kelas = $db->get_results("SELECT tbl_kelas.* FROM tbl_kelas WHERE tbl_kelas.id_kelas=$siswa->id_kelas");

  $kls = $data_kelas[0]->jenjang.' '.$data_kelas[0]->jurusan.' '.$data_kelas[0]->kelas;

  $nilai = $db->get_results("SELECT * FROM tbl_nilai WHERE nis=$_GET[id]");

  $status_nilai = $db->get_results("SELECT * FROM tbl_nilai WHERE nis=$siswa->nis GROUP BY status");
  $status_nilai = (count($status_nilai) < 1) ? 'Belum ada nilai' : ucfirst($status_nilai[0]->status);

?>               
            
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="row d-flex justify-content-between">
                    <h3 class="box-title">Data Nilai Siswa: <span class="font-weight-bold"><?= strtoupper($siswa->nama_siswa) ?></span></h3>
                    <div>
                        <a href="index?m=nilai_siswa_kelas&id_kelas=<?= $siswa->id_kelas ?>" class="btn btn-white">Kembali</a>

                        <?php if ($status_nilai=='Belum diverifikasi' && $_SESSION['status']=='admin'): ?>
                            <a href="aksi?act=verifikasi_nilai_siswa&nis=<?= $siswa->nis ?>&id_kelas=<?= $siswa->id_kelas ?>" class="btn btn-success text-white">Verifikasi Nilai</a>    
                        <?php endif ?>
                        
                        <?php if ($status_nilai=='Telah diverifikasi'): ?>
                            <a href="cetak_laporan?nis=<?= $_GET['id'] ?>" class="btn btn-secondary">Print</a>     
                        <?php endif ?>
                          
                    </div>
                </div>
                <h4 class="text-muted">Status Nilai: <?= $status_nilai; ?></h4>
                
                <!-- ======================== Data Identitas Siswa ======================== -->
                <table>
                    <tr>
                        <td style="padding-right:20px;">Nama Sekolah</td><td>:</td><td>SMKN 1 BALAI</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Alamat</td><td>:</td><td>BAKUNG</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Nama Peserta Didik</td><td>:</td><td><?= strtoupper($siswa->nama_siswa) ?></td>
                        <td style="min-width: 120px"></td>
                        <td>Kelas</td><td>:</td><td><?= $kls ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Bidang Keahlian</td><td>:</td><td>Teknologi Informasi dan Komunikasi</td>
                        <td></td>
                        <td style="padding-right:20px;">Semester</td><td>:</td><td><?= ucwords($nilai[0]->semester) ?></td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Program Keahlian</td><td>:</td><td>Teknik Komputer dan Informatika</td>
                        <td></td>
                        <td style="padding-right:20px;">Tahun Pelajaran</td><td>:</td><td>2019/2020</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">NISN</td><td>:</td><td><?= $siswa->nisn ?></td>
                    </tr>
                </table>

                <hr style="background-color: #a6a6a6; height: 2px;"> <!-- line break -->

                <!-- Import format nilai sesuai jurusan -->
                <?php include '../admin/formatNilai/nilai-TIK.php'; ?>

                <!-- Import catatan akademik -->
                <?php include '../admin/formatNilai/catatan-akademik.php'; ?>                


            </div>
        </div>
    </div>
</div>
