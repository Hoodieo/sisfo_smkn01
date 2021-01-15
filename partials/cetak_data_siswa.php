<?php 
	ob_start();
	require_once'../includes/functions.php';
	require_once '../vendor/autoload.php';

    $data_siswa = $db->get_results("SELECT tbl_siswa.* , tbl_kelas.*  FROM tbl_siswa JOIN tbl_kelas ON tbl_siswa.id_kelas=tbl_kelas.id_kelas WHERE tbl_siswa.id_kelas=$_GET[kelas]");

    $html = '<h3 style="text-align:center;"> Data Siswa Kelas '.$data_siswa[0]->jenjang.' '.$data_siswa[0]->jurusan.' '.$data_siswa[0]->kelas;

    $html .= '<br><br><table class="table" border="1" cellspacing="0" cellpadding="5" id="myDataTable"><thead><tr>
            <th class="border-top-0">ID</th>
            <th class="border-top-0">NIS</th>
            <th class="border-top-0">Nama Siswa</th>
            <th class="border-top-0">Tempat,Tgl Lahir</th>
            <!-- <th class="border-top-0">Jenis Kelamin</th> -->
            <th class="border-top-0">Agama</th>
            <th class="border-top-0">Orangtua/Wali</th>
        </tr></thead><tbody>';


    if (count($data_siswa) < 1){
        $html .= '<tr><td colspan="9" class="text-center">Tidak ada data</td></tr>';
    }else{
        foreach ($data_siswa as $siswa) {
            $html .= '<tr>
                    <td>'.$siswa->id_siswa.'</td>
                    <td>'.$siswa->nis.'</td>
                    <td>'.$siswa->nama_siswa.'</td>
                    <td>'.$siswa->tmp_lahir.', '.date('d M Y', strtotime($siswa->tgl_lahir)).'</td>
                    <td>'.$siswa->agama.'</td>
                    <td>'.$siswa->nama_ortu.'</td>
                </tr>';
        }
    }


    $html .= '</tbody></table>';


	// Create Raport PDF File
	$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
	$mpdf->WriteHTML($html);
	$filename = 'Data Siswa Kelas '.$data_siswa[0]->jenjang.' '.$data_siswa[0]->jurusan.' '.$data_siswa[0]->kelas.'.pdf';
	$mpdf->Output($filename,\Mpdf\Output\Destination::INLINE);
	ob_end_flush();
	ob_clean();
 ?>