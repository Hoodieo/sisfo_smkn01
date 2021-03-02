<?php
  if (isset($_GET['id_kelas']) && isset($_GET['id_guru']) && isset($_GET['id_mapel'])){
    $info = $db->get_row("SELECT k.jurusan, k.jenjang, k.kelas, g.nama_guru, m.mata_pelajaran 
    FROM tbl_pengajar_mapel pm
    INNER JOIN tbl_kelas k ON pm.id_kelas=k.id_kelas
    INNER JOIN tbl_guru g ON pm.id_guru=g.id_guru
    INNER JOIN tbl_mapel m ON pm.id_mapel=m.id_mapel
    WHERE pm.id_kelas='$_GET[id_kelas]' AND pm.id_mapel='$_GET[id_mapel]' AND pm.id_guru='$_GET[id_guru]'");
  }
?>
 
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
                  <?php
                    if (isset($_GET['id_kelas']) && isset($_GET['id_guru']) && isset($_GET['id_mapel'])) {
                      $kelas = $info->jenjang.' '.$info->jurusan.' '.$info->kelas;
                      echo '<h3 class="box-title">Import Nilai Mata Pelajaran: '.$info->mata_pelajaran.' - Kelas: '.$kelas.' </h3>';
                    } else {
                      echo '<h3 class="box-title">Import Nilai Mata Pelajaran</h3>';
                    }
                  ?>
                </div>

                <div class="col-lg-12">
                  <!-- Buat sebuah tag form dan arahkan action nya ke file ini lagi -->
                  <?php
                    if (isset($_GET['id_kelas']) || isset($_GET['id_mapel']) || isset($_GET['id_kelas']) ) { ?>
                      <form method="post" action="../partials/exportTemplateNilai.php" align="center"> 
                        <select name="tahunajar" id="tahunajar">
                          <option value="2019/2020">2019/2020</option>
                          <option value="2020/2021" selected>2020/2021</option>
                          <option value="2011/2022">2021/2022</option>
                        </select>
                        <select name="semester" id="semester">
                          <option value="GANJIL">GANJIL</option>
                          <option value="GENAP">GENAP</option>
                        </select>

                        <input type="hidden" name="id_kelas" value="<?= $_GET['id_kelas'] ?>">
                        <input type="hidden" name="id_guru" value="<?= $_GET['id_guru'] ?>">
                        <input type="hidden" name="id_mapel" value="<?= $_GET['id_mapel'] ?>">
                        <button type="submit" name="export" class="btn btn-primary"><span class="glyphicon glyphicon-download"></span>
                          Download Format Import File Nilai</button>
                          <br><br><br>
                      </form> 
                  <? } ?>

                  <form method="post" action="" enctype="multipart/form-data">
                  <?php
                    if (!isset($_GET['id_kelas']) || !isset($_GET['id_mapel']) || !isset($_GET['id_kelas']) ) { ?>
                    <a href="../partials/ImportNilaiSiswa.xlsx" class="btn btn-primary" download>
                      <span class="glyphicon glyphicon-download"></span>
                      Download Format Import File Nilai
                    </a>
                    <br><br><br>
                    <?  } ?>
                    
                    
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


