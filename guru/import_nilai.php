 <div class="page-breadcrumb bg-white my-2">
    <div class="row align-items-center">
        <div class="col-lg-3 col-md-4 col-sm-4 col-xs-12">
            <h4 class="page-title text-uppercase font-medium font-14">Import Nilai Mata Pelajaran</h4>
        </div>
    </div>
</div> 
  
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="white-box">
                <div class=" d-flex justify-content-between mb-3">
                    <h3 class="box-title">Import Nilai Mata Pelajaran</h3>
                </div>

                <div class="col-lg-12">
                  <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
                  <form method="post" action="" enctype="multipart/form-data">
                    <a href="../partials/ImportNilaiSiswa.xlsx" class="btn btn-primary" download>
                      <span class="glyphicon glyphicon-download"></span>
                      Download Format Import File Nilai
                    </a>
                    <br><br><br>
                    
                    <div>
                      <input type="file" name="file" class="pull-left">
                      
                      <button type="submit" name="preview" class="btn btn-success text-white btn-sm">
                        <span class="glyphicon glyphicon-eye-open"></span> Preview
                      </button>
                    </div>
                  </form>
                  <br>
                  
                    <ul>
                      <li>File yang dapat diimport hanya format .xlsx</li>
                      <li>File import maksimum 10MB</li>
                      <li>Gunakan format nilai yang telah disediakan</li>
                    </ul>
                  <hr>


                  <!--  ============= Preview Data ============= -->
                  <?php include '../partials/import_action.php'; ?>

                </div>
              
               
            </div>
        </div>
    </div>
</div>


