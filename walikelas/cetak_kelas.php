<?php 
	ob_start();
	require_once'../includes/functions.php';
	require_once '../vendor/autoload.php';

    $data_kelas = $db->get_results("SELECT tbl_kelas.* , tbl_guru.nama_guru FROM tbl_kelas JOIN tbl_guru ON tbl_kelas.id_guru=tbl_guru.id_guru");

    $html = '<h3 style="text-align:center;">Data Kelas';

    $html .= '<br><br><table class="table" border="1" cellspacing="0" cellpadding="6" style="margin: 0 auto;"><thead><tr>
            <th>No.</th>
            <th>ID Kelas</th>
            <th style="width: 150px">Kelas</th>
            <th style="width: 250px">Walikelas</th>
        </tr></thead><tbody>';


    if (count($data_kelas) < 1){
        $html .= '<tr><td colspan="3" class="text-center">Tidak ada data</td></tr>';
    }else{
        foreach ($data_kelas as $kelas) {
            $html .= '<tr>
                    <td>'.++$i.'</td>
                    <td>'.$kelas->id_kelas.'</td>
                    <td>'.$kelas->jenjang.'-'.$kelas->jurusan.'-'.$kelas->kelas.'</td>
                    <td>'.ucwords($kelas->nama_guru).'</td>
                </tr>';
        }
    }


    $html .= '</tbody></table>';


	// Create Raport PDF File
	$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
	$mpdf->WriteHTML($html);
	$filename = 'Data Siswa Kelas.pdf';
	$mpdf->Output($filename,\Mpdf\Output\Destination::INLINE);
	ob_end_flush();
	ob_clean();
 ?>