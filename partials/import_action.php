<?php
error_reporting(0);
  // Jika user telah mengklik tombol Preview
  if(isset($_POST['preview'])){

    if ($_FILES['file']['error']==4) {
      // tidak ada file yg dipilih
      echo "<div class='alert alert-danger' id='kosong'>Upload file terlebih dahulu</div>";
      exit();
    }

    // var_dump($_FILES); die();

    $nama_file_baru = 'dataNilai.xlsx';
    
    // Cek apakah terdapat file data.xlsx pada folder tmp
    if(is_file('../tmp/'.$nama_file_baru)) // Jika file tersebut ada
      unlink('../tmp/'.$nama_file_baru); // Hapus file tersebut
    
    $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
    $tmp_file = $_FILES['file']['tmp_name'];
    
    // Cek apakah file yang diupload adalah file Excel 2007 (.xlsx)
    if($tipe_file == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet" || $tipe_file == "application/wps-office.xlsx"){
      // Upload file yang dipilih ke folder tmp
      // dan rename file tersebut menjadi data{ip_address}.xlsx
      // {ip_address} diganti jadi ip address user yang ada di variabel $ip
      // Contoh nama file setelah di rename : data127.0.0.1.xlsx
      move_uploaded_file($tmp_file, '../tmp/'.$nama_file_baru);
      
      // Load librari PHPExcel nya
      require_once '../plugins/PHPExcel/PHPExcel.php';
      
      $excelreader = new PHPExcel_Reader_Excel2007();
      $loadexcel = $excelreader->load('../tmp/'.$nama_file_baru); // Load file yang tadi diupload ke folder tmp
      $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
      
      // Buat sebuah tag form untuk proses import data ke database
      echo "<form method='post' action='../partials/import.php'>";
      
      // Buat sebuah div untuk alert validasi kosong
      // echo "<div class='alert alert-danger' id='kosong'>
      // Semua data belum diisi, Ada <span id='jumlah_kosong'></span> data yang belum diisi.
      // </div>";
      
      echo "<table class='table table-bordered'>
      <tr>
        <th colspan='9' class='text-center'>Preview Data</th>
      </tr>
      <tr>
        <th>Mata Pelajaran</th>
        <th>Tahun Ajaran</th>
        <th>Semester</th>
        <th>Nama Siswa</th>
        <th>NIS</th>
        <th>ID Kelas</th>
        <th>Nilai Harian</th>
        <th>Nilai UTS</th>
        <th>Nilai UAS</th>
        <th>Nilai Keterampilan</th>
      </tr>";
      
      $numrow = 1;
      $kosong = 0;
      foreach($sheet as $row){ // Lakukan perulangan dari data yang ada di excel
        // Ambil data pada excel sesuai Kolom
        $mapel = $row['A']; // Ambil data kode mapel
        $thn_pel = $row['B']; // Ambil data tahun ajaran
        $smt = $row['C']; // Ambil data semester (ganjil/genap)
        $nama_siswa = $row['D']; // Ambil data nama siswa
        $nis = $row['E']; // Ambil data nis
        $kelas = $row['F']; //Ambil data id kelas
        $nilai_harian = $row['G']; //Ambil data nilai harian
        $uts = $row['H']; //Ambil data nilai UTS
        $uas = $row['I']; //Ambil data nilai UAS
        $keterampilan = $row['J']; //Ambil data keterampilan
        

        // Cek jika semua data tidak diisi
        if(empty($mapel) && empty($thn_pel) && empty($smt) && empty($nama_siswa) && empty($nis) && empty($kelas))
          continue; // Lewat data pada baris ini (masuk ke looping selanjutnya / baris selanjutnya)
        
        // Cek $numrow apakah lebih dari 1
        // Artinya karena baris pertama adalah nama-nama kolom
        // Jadi dilewat saja, tidak usah diimport
        if($numrow > 1){
          // Validasi apakah semua data telah diisi
          $mapel_td = ( ! empty($mapel))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
          $thnpel_td = ( ! empty($thn_pel))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
          $smt_td = ( ! empty($smt))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
          $nama_td = ( ! empty($nama_siswa))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
          $nis_td = ( ! empty($nis))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
          $kelas_td = ( ! empty($kelas))? "" : " style='background: #E07171;'"; // Jika kosong, beri warna merah
          
          // Jika salah satu data ada yang kosong
          if(empty($mapel) or empty($thn_pel) or empty($smt) or empty($nama_siswa) or empty($nis) or empty($kelas)){
            $kosong++; // Tambah 1 variabel $kosong
          }

          echo "<tr>";
            echo "<td".$mapel_td.">".$mapel."</td>";
            echo "<td".$thnpel_td.">".$thn_pel."</td>";
            echo "<td".$smt_td.">".$smt."</td>";
            echo "<td".$nama_td.">".$nama_siswa."</td>";
            echo "<td".$nis_td.">".$nis."</td>";
            echo "<td".$kelas_td.">".$kelas."</td>";
            echo "<td".$nilai_harian_td.">".$nilai_harian."</td>";
            echo "<td".$uts_td.">".$uts."</td>";
            echo "<td".$uas_td.">".$uas."</td>";
            echo "<td".$keterampilan_td.">".$keterampilan."</td>";
          echo "</tr>";
        }
        
        $numrow++; // Tambah 1 setiap kali looping
      }
      
      echo "</table>";
      
      // Cek apakah variabel kosong lebih dari 0
      // Jika lebih dari 0, berarti ada data yang masih kosong
      if($kosong > 0){
        echo "<div class='alert alert-danger' id='kosong'>
        Ada ".$kosong." baris data yang belum diisi, lengkapi terlebih dahulu. Kemudian import lagi.
        </div>";
        echo "<script> alert('Ada ".$kosong." data yang belum diisi. Lengkapi terlebih dahulu.') </script>";
      ?>  
        
      <?php
      }else{ // Jika semua data sudah diisi
        echo "<hr>";
        
        // Buat sebuah tombol untuk mengimport data ke database
        echo "<button type='submit' name='import' class='btn btn-primary'><span class='glyphicon glyphicon-upload'></span> Import Nilai</button>";
      }
      
      echo "</form>";
    }else{ // Jika file yang diupload bukan File Excel 2007 (.xlsx)
      // Munculkan pesan validasi
      echo "<div class='alert alert-danger'>
      File yang diimport bukan format .xlsx
      </div>"; // Munculkan pesan validasi
    }
  }
  ?>