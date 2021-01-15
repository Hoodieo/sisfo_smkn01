 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Print Data Siswa</h4>
        </div>
    </div>
</div> 

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between  mb-3">
                    <h3 class="box-title">Print Data Siswa</h3>

                    <div>
                        <a href="index?m=siswa" class="btn btn-white">Kembali</a>
                    </div>
                </div>
                
                <form action="../partials/cetak_data_siswa" method="POST">
                    <div class="form-group row">
                        <label for="kelas" class="col-2 col-form-label">Kelas</label>
                        <div class="col-md-3">
                          <select name="kelas" class="form-control">
                            <?= getKelasOption() ?>
                          </select>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Print</button>
                </form>
               
            </div>
        </div>
    </div>
</div>