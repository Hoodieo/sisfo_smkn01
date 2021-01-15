 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Nilai Siswa</h4>
        </div>
    </div>
</div> 
            
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class="row d-flex justify-content-between">
                    <h3 class="box-title">Data Nilai Siswa X</h3>
                    <div>
                        <a href="index?m=nilai_siswa_kelas&kelas=<?= $_GET['kelas'] ?>" class="btn">Kembali</a>    
                    </div>
                </div>
                
                <!-- ======================== Data Identitas Siswa ======================== -->
                <table>
                    <tr>
                        <td style="padding-right:20px;">Nama Sekolah</td><td>:</td><td>SMKN 1 BALAI</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Alamat</td><td>:</td><td>BAKUNG</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Nama Peserta Didik</td><td>:</td><td>ALAN</td>
                        <td style="min-width: 120px"></td>
                        <td>Kelas</td><td>:</td><td>X TKJ1</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Bidang Keahlian</td><td>:</td><td>Teknologi Informasi dan Komunikasi</td>
                        <td></td>
                        <td style="padding-right:20px;">Semester</td><td>:</td><td>2 (Dua)</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">Program Keahlian</td><td>:</td><td>Teknik Komputer dan Informatika</td>
                        <td></td>
                        <td style="padding-right:20px;">Tahun Pelajaran</td><td>:</td><td>2019/2020</td>
                    </tr>
                    <tr>
                        <td style="padding-right:20px;">NISN</td><td>:</td><td>0007081227</td>
                    </tr>
                </table>

                <hr style="background-color: #a6a6a6; height: 2px;"> <!-- line break -->

                <!-- Import format nilai sesuai jurusan -->
                <?php include 'formatNilai/nilai-TIK.php'; ?>

                <!-- Import catatan akademik -->
                <?php include 'formatNilai/catatan-akademik.php'; ?>                


            </div>
        </div>
    </div>
</div>
