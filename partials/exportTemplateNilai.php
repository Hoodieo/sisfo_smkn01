<?php


$connect = mysqli_connect("localhost", "root", "", "sk_sisfosmkn01");

if(isset($_POST["export"])){
        $where = " WHERE id_kelas='$_POST[id_kelas]'";

        $query_siswa ="SELECT nama_siswa, nis, nisn, id_kelas FROM tbl_siswa $where"; 
        $result_siswa = mysqli_query($connect, $query_siswa); 

        $query_info = "SELECT k.jurusan, k.jenjang, k.kelas, g.nama_guru, m.mata_pelajaran, m.kode_mapel
        FROM tbl_pengajar_mapel pm
        INNER JOIN tbl_kelas k ON pm.id_kelas=k.id_kelas
        INNER JOIN tbl_guru g ON pm.id_guru=g.id_guru
        INNER JOIN tbl_mapel m ON pm.id_mapel=m.id_mapel
        WHERE pm.id_kelas='$_POST[id_kelas]' AND pm.id_mapel='$_POST[id_mapel]' AND pm.id_guru='$_POST[id_guru]'";
        $result_info = mysqli_query($connect, $query_info); 
        $info = mysqli_fetch_array($result_info);
        
        $tahunajaran = $_POST['tahunajar'];
        $semester = $_POST['semester'];
        $kelas = $info['jenjang']." ".$info['jurusan']." ".$info['kelas'];

        // Create excel template and inject the data
        include "../plugins/PHPExcel/PHPExcel.php";
        include "../plugins/PHPExcel/PHPExcel/Writer/Excel2007.php";
        $excel = new PHPExcel;
        $excel->getProperties()->setCreator("User");
        $excel->getProperties()->setLastModifiedBy("User");
        $excel->getProperties()->setTitle("Template Import Nilai");
        $excel->removeSheetByIndex(0);
        $sheet = $excel->createSheet();

        if(mysqli_num_rows($result_siswa) > 0){
            $sheet->setTitle($kelas);
            $sheet->setCellValue("A1", "Kode Mata Pelajaran");
            $sheet->setCellValue("B1", "Tahun Ajaran");
            $sheet->setCellValue("C1", "Semester");
            $sheet->setCellValue("D1", "Nama Siswa");
            $sheet->setCellValue("E1", "NIS");
            $sheet->setCellValue("F1", "ID Kelas");
            $sheet->setCellValue("G1", "Rata-rata Nilai Harian");
            $sheet->setCellValue("H1", "Nilai UTS");
            $sheet->setCellValue("I1", "Nilai UAS");
            $sheet->setCellValue("J1", "Nilai Keterampilan");

            $cell = 2;
            while($row = mysqli_fetch_array($result_siswa)){
                $kolomA = "A".$cell;
                $kolomB = "B".$cell;
                $kolomC = "C".$cell;
                $kolomD = "D".$cell;
                $kolomE = "E".$cell;
                $kolomF = "F".$cell;
                $kolomG = "G".$cell;
                $kolomH = "H".$cell;
                $kolomI = "I".$cell;
                $kolomI = "J".$cell;
                    
                $sheet->setCellValue($kolomA, $info["kode_mapel"]);
                $sheet->setCellValue($kolomB, $tahunajaran);  
                $sheet->setCellValue($kolomC, $semester);
                $sheet->setCellValue($kolomD, $row["nama_siswa"]); 
                $sheet->setCellValue($kolomE, $row["nis"]); 
                $sheet->setCellValue($kolomF, $row["id_kelas"]);

                $cell++;
            }
        }
}

$writer = new PHPExcel_Writer_Excel2007($excel);
$writer->save("DataFileImportExcel/ImportNilai.xlsx");
?>

<h3>File template nilai berhasil dibuat!</h3>
<a href="../index">Kembali</a>
<a href="DataFileImportExcel/ImportNilai.xlsx">Download</a>
