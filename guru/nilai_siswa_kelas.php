 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Data Nilai Kelas <?= $_GET['kelas'] ?></h4>
        </div>
    </div>
</div> 
            
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <h3 class="box-title">Kelas <?= $_GET['kelas'] ?></h3>

                <div class="table-responsive">
                    <table class="table" id="myDataTable">
                        <thead>
                            <tr>
                                <th class="border-top-0">No</th>
                                <th class="border-top-0">NIS</th>
                                <th class="border-top-0">Nama Siswa</th>
                                <th class="border-top-0">Tempat,Tgl Lahir</th>
                                <th class="border-top-0">Kelas</th>
                                <th class="border-top-0">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Deshmukh</td>
                                <td>Prohaska</td>
                                <td>@Genelia</td>
                                <td>Prohaska</td>
                                <td>
                                    <a href="index?m=nilai_siswa&kelas=abc&nis=1289173" class="btn btn-secondary btn-sm">Lihat</a>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Deshmukh</td>
                                <td>Gaylord</td>
                                <td>@Ritesh</td>
                                <td>Prohaska</td>
                                <td>
                                    <a href="index?m=nilai_siswa&kelas=abc&nis=1289173" class="btn btn-secondary btn-sm">Lihat</a>
                                </td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>Sanghani</td>
                                <td>Gusikowski</td>
                                <td>Prohaska</td>
                                <td>@Govinda</td>
                                <td>
                                    <a href="index?m=nilai_siswa&kelas=abc&nis=1289173" class="btn btn-secondary btn-sm">Lihat</a>
                                </td>
                            </tr>
                            <tr>
                                <td>4</td>
                                <td>Roshan</td>
                                <td>Rogahn</td>
                                <td>@Hritik</td>
                                <td>Prohaska</td>
                                <td>
                                    <a href="index?m=nilai_siswa&kelas=abc&nis=1289173" class="btn btn-secondary btn-sm">Lihat</a>
                                </td>
                            </tr>
                            <tr>
                                <td>5</td>
                                <td>Joshi</td>
                                <td>Hickle</td>
                                <td>@Maruti</td>
                                <td>Prohaska</td>
                                <td>
                                    <a href="index?m=nilai_siswa&kelas=abc&nis=1289173" class="btn btn-secondary btn-sm">Lihat</a>
                                </td>
                            </tr>
                            <tr>
                                <td>6</td>
                                <td>Nigam</td>
                                <td>Eichmann</td>
                                <td>Prohaska</td>
                                <td>@Sonu</td>
                                <td>
                                    <a href="index?m=nilai_siswa&kelas=abc&nis=1289173" class="btn btn-secondary btn-sm">Lihat</a>
                                </td>
                            </tr>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>