<?php 
	ob_start();
	require_once'../includes/functions.php';
	require_once '../vendor/autoload.php';

	$siswa = $db->get_row("SELECT * FROM tbl_siswa WHERE nis=$_GET[nis]");
	  $data_kelas = $db->get_results("SELECT tbl_kelas.* FROM tbl_kelas WHERE tbl_kelas.id_kelas=$siswa->id_kelas");
	$kls = $data_kelas[0]->jenjang.' '.$data_kelas[0]->jurusan.' '.$data_kelas[0]->kelas;
	$nilai = $db->get_results("SELECT * FROM tbl_nilai WHERE nis=$_GET[nis]");
	$status_nilai = $db->get_results("SELECT * FROM tbl_nilai WHERE nis=$siswa->nis GROUP BY status");
	$status_nilai = (count($status_nilai) < 1) ? 'Belum ada nilai' : ucfirst($status_nilai[0]->status);

	function nilaiMapel($mapel){
	  $query = "SELECT tbl_nilai.*, tbl_mapel.mata_pelajaran FROM tbl_nilai JOIN tbl_mapel ON tbl_nilai.kode_mapel=tbl_mapel.kode_mapel WHERE tbl_nilai.nis=$_GET[nis] AND tbl_nilai.kode_mapel='$mapel'";
	  return $query;
	}

	function getRank($nilai){
	  if ($nilai < 65) { $rank = 'D';
	  }elseif ($nilai >= 65 AND $nilai < 77) { $rank = 'C';
	  }elseif ($nilai >= 77 AND $nilai < 89) { $rank = 'B';
	  }elseif ($nilai >= 89) { $rank = 'A';
	  }else{ $rank = 'N/A';}
	  return $rank;
	}

	

	// ========== identitas siswa ==========
	$html = '<table><tr><td style="padding-right:20px;">Nama Sekolah</td><td>:</td><td>SMKN 1 BALAI</td></tr><tr><td style="padding-right:20px;">Alamat</td><td>:</td><td>BAKUNG</td></tr><tr><td style="padding-right:20px;">Nama Peserta Didik</td><td>:</td><td>'.strtoupper($siswa->nama_siswa).'</td><td style="min-width: 120px"></td><td>Kelas</td><td>:</td><td>'.$kls.'</td></tr><tr><td style="padding-right:20px;">Bidang Keahlian</td><td>:</td><td>Teknologi Informasi dan Komunikasi</td><td></td><td style="padding-right:20px;">Semester</td><td>:</td><td>'.ucwords($nilai[0]->semester).'</td></tr><tr><td style="padding-right:20px;">Program Keahlian</td><td>:</td><td>Teknik Komputer dan Informatika</td><td></td><td style="padding-right:20px;">Tahun Pelajaran</td><td>:</td><td>2019/2020</td></tr><tr><td style="padding-right:20px;">NISN</td><td>:</td><td>'.$siswa->nisn.'</td></tr></table><hr style="background-color: #a6a6a6; height: 2px;">';


    // ========== data nilai akademik ==========
	$html .= '<h4>A. NILAI AKADEMIK</h4><table border="1" spacing="1" cellpadding="3" cellspacing="0" class="text-center">
    <thead>
    <tr>
        <th style="padding: 6px 10px;">No.</th>
        <th style="padding: 6px 10px;">Mata Pelajaran</th>
        <th style="padding: 6px 10px;">Pengetahuan</th>
        <th style="padding: 6px 10px;">Keterampilan</th>
        <th style="padding: 6px 10px;">Nilai Akhir</th>
        <th style="padding: 6px 10px;">Predikat</th>    
        </tr>
    </thead>
    
    <tbody>
        <!-- Muatan Nasional -->
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">Muatan Nasional</span></td>
        </tr>';

			$mapel = $db->get_row(nilaiMapel('AGM')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        
    $html .= '<tr><td>1</td>
            <td class="text-left">Pendidikan Agama Katholik dan Budi Pekerti</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';


        	$mapel = $db->get_row(nilaiMapel('PKN')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
       
    $html .= '<tr><td>2</td>
            <td class="text-left">Pendidikan Pancasila dan Kewarganegaraan</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';

        	$mapel = $db->get_row(nilaiMapel('BIND')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
       
    $html .= '<tr><td>3</td>
            <td class="text-left">Bahasa Indonesia</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';

        	$mapel = $db->get_row(nilaiMapel('MTK')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
       
    $html .= '<tr><td>4</td>
            <td class="text-left">Matematika (Umum)</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';

       	$mapel = $db->get_row(nilaiMapel('SEJARAH')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
       
    $html .= '<tr><td>5</td>
            <td class="text-left">Sejarah Indonesia</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';

       	$mapel = $db->get_row(nilaiMapel('BING')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
       
    $html .= '<tr><td>6</td>
            <td class="text-left">Bahasa Inggris</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">Muatan Kewilayahan</span></td>
        </tr>
        <tr> ';


        	$mapel = $db->get_row(nilaiMapel('SB')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
       
    $html .= '<tr><td>1</td>
            <td class="text-left">Seni Budaya</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>
        <tr>';

        	$mapel = $db->get_row(nilaiMapel('PJOK')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
       
    $html .= '<tr><td>2</td>
            <td class="text-left">Pendidikan Jasmani, Olahraga dan Kesehatan</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>

        <!-- Muatan Peminatan Kejuruan -->
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">Muatan Kewilayahan</span></td>
        </tr>
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">C1. Dasar Bidang Keahlian</span></td>
        </tr>
        <tr>'; 

    
        	$mapel = $db->get_row(nilaiMapel('SKD')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);

	$html .= '<tr><td>1</td>
            <td class="text-left">Simulasi dan Komunikasi Digital</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';
        
        	$mapel = $db->get_row(nilaiMapel('FISIKA')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
    
    $html .= '<tr><td>2</td>
            <td class="text-left">Fisika</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';
        
        	$mapel = $db->get_row(nilaiMapel('KIMIA')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
    
    $html .= '<tr><td>3</td>
            <td class="text-left">Kimia</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">C2. Dasar Program Keahlian</span></td>
        </tr>';


        	$mapel = $db->get_row(nilaiMapel('SISKOM')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
    
    $html .= '<tr><td>1</td>
            <td class="text-left">Sistem Komputer</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';
        
        	$mapel = $db->get_row(nilaiMapel('KJD')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
    
    $html .= '<tr><td>2</td>
            <td class="text-left">Komputer dan Jaringan Dasar</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';
        
        	$mapel = $db->get_row(nilaiMapel('PD')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
    
    $html .= '<tr><td>3</td>
            <td class="text-left">Pemrograman Dasar</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';
        
        	$mapel = $db->get_row(nilaiMapel('DDG')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
    
    $html .= '<tr><td>4</td>
            <td class="text-left">Dasar Desain Grafis</td>
            <td>'.$pengetahuan.'</td>
            <td>'.$keterampilan.'</td>
            <td>'.$nilai_akhir.'</td>
            <td>'.getRank($nilai_akhir).'</td>
        </tr>';
    $html .= '</tbody></table>';


    //  ======================= Catatan akademik ========================
    $nilaisikap = $db->get_row("SELECT keterangan FROM tbl_siswa WHERE nis=$_GET[nis]");
    $nilaisikap = ($nilaisikap->keterangan) ? $nilaisikap->keterangan : 'Tidak ada catatan';

    $html .= '
    <h4>B. CATATAN AKADEMIK </h4><table border="1" cellspacing="0" cellpadding="5" style="width: 735px;">
					<tr><td class="p-2">'.$nilaisikap.'</td>
					</tr>
				</table>';

	$html .= '
					<h4>C. PRAKTIK KERJA LAPANGAN</h4>
					<table border="1" border="1" cellspacing="0" cellpadding="5" style="text-align: center;">
						<thead>
							<tr>
							<th style="padding: 6px 10px;">No.</th>
							<th style="padding: 6px 10px;">Mitra DU/DI</th>
							<th style="padding: 6px 10px;">Lokasi</th>
							<th style="padding: 6px 10px;">Lainnya</th>
							<th style="padding: 6px 10px;">Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>2</td>
								<td></td>
								<td></td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				
					
					<h4>D. EKSTRAKURIKULER</h4>
					<table border="1" border="1" cellspacing="0" cellpadding="5" style="text-align: center;">
						<thead>
							<tr>
							<th style="padding: 6px 10px;">No.</th>
							<th style="padding: 6px 10px;">Kegiatan Ekstrakurikuler</th>
							<th style="padding: 6px 10px;">Keterangan</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td></td>
								<td></td>
							</tr>
							<tr>
								<td>2</td>
								<td></td>
								<td></td>
							</tr>
						</tbody>
					</table>
				
					
					<h4>E. KETIDAKHADIRAN</h4>
					<table border="1" border="1" cellspacing="0" cellpadding="5" style="min-width: 300px">
						<tr>
						<th style="padding: 6px 10px;" colspan="3"  style="text-align: center;">Ketidakhadiran</th>
						</tr>
						<tr>
							<td>Sakit</td><td style="padding: 0 10px;" style="text-align: right; width: 100px;">hari</td>
						</tr>
						<tr>
							<td>Izin</td><td style="padding: 0 10px;" style="text-align: right; width: 100px;">hari</td>
						</tr>
						<tr>
							<td>Tanpa Keterangan</td><td style="padding: 0 10px;" style="text-align: right; width: 100px;">hari</td>
						</tr>
					</table>
				
					<br>';


	$walikelas = $db->get_row("SELECT tbl_guru.nama_guru FROM tbl_nilai 
				JOIN tbl_kelas ON tbl_nilai.id_kelas=tbl_kelas.id_kelas
				JOIN tbl_guru ON tbl_kelas.id_guru=tbl_guru.id_guru
				WHERE nis=$_GET[nis] GROUP BY nis");
	$walikelas = $walikelas->nama_guru ? $walikelas->nama_guru : '______________________';

	$html .= '<br><br>
			<div class="mengetahui">
				<table>
					<tr>
						<td>
							<div>Mengetahui</div>
							<div>Orang Tua/Wali,</div>
							<br>
							<br>
							<br>
							<div>______________________</div>
						</td>
						<td width="40%"></td>
						<td>
							<div>Batang Tarang, '.date('d M Y').'</div>
							<div>Wali Kelas,</div>
							<br>
							<br>
							<br>
							<div>'.$walikelas.'</div>
						</td>
					</tr>
				</table>

				<br>
				<div style="width: content-fit; display: inline-block;">
						<div>Mengetahui</div>
						<div>Kepala Sekolah,</div>
						<br>
						<br>
						<br>
						<div style="text-decoration: underline;">Yan, S.P.</div>
						<span>NIP. 197310152002121003</span>
				</div>
			</div>';


	// Create Raport PDF File
	$mpdf = new \Mpdf\Mpdf(['orientation' => 'P']);
	$mpdf->WriteHTML($html);
	$filename = 'Raport '.strtoupper($siswa->nama_siswa).'_'.$siswa->nisn.'.pdf';
	$mpdf->Output($filename,\Mpdf\Output\Destination::INLINE);
	ob_end_flush();
	ob_clean();
 ?>