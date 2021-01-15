<?php 
function nilaiMapel($mapel){
  $query = "SELECT tbl_nilai.*, tbl_mapel.mata_pelajaran FROM tbl_nilai JOIN tbl_mapel ON tbl_nilai.kode_mapel=tbl_mapel.kode_mapel WHERE tbl_nilai.nis=$_GET[id] AND tbl_nilai.kode_mapel='$mapel'";
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
?>


<div class="data-nilai">
<!-- ======================== Data Nilai Akademik ======================== -->
<h4>A. NILAI AKADEMIK</h4>
<table border="1" class="text-center">
    <thead>
        <th style="padding: 6px 10px;">No.</th>
        <th style="padding: 6px 10px;">Mata Pelajaran</th>
        <th style="padding: 6px 10px;">Pengetahuan</th>
        <th style="padding: 6px 10px;">Keterampilan</th>
        <th style="padding: 6px 10px;">Nilai Akhir</th>
        <th style="padding: 6px 10px;">Predikat</th>    
    </thead>
    
    <tbody>
        <!-- Muatan Nasional -->
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">Muatan Nasional</span></td>
        </tr>
        <?php $mapel = $db->get_row(nilaiMapel('AGM')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
            <td>1</td>
            <td class="text-left">Pendidikan Agama Katholik dan Budi Pekerti</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('PKN')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>2</td>
            <td class="text-left">Pendidikan Pancasila dan Kewarganegaraan</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('BIND')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>3</td>
            <td class="text-left">Bahasa Indonesia</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('MTK')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>4</td>
            <td class="text-left">Matematika (Umum)</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('SEJARAH')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>5</td>
            <td class="text-left">Sejarah Indonesia</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('BING')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>6</td>
            <td class="text-left">Bahasa Inggris</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <!-- Muatan Kewilayahan -->
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">Muatan Kewilayahan</span></td>
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('SB')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>1</td>
            <td class="text-left">Seni Budaya</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('PJOK')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>2</td>
            <td class="text-left">Pendidikan Jasmani, Olahraga dan Kesehatan</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <!-- Muatan Peminatan Kejuruan -->
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">Muatan Kewilayahan</span></td>
        </tr>
        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">C1. Dasar Bidang Keahlian</span></td>
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('SKD')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>1</td>
            <td class="text-left">Simulasi dan Komunikasi Digital</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('FISIKA')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>2</td>
            <td class="text-left">Fisika</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('KIMIA')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>3</td>
            <td class="text-left">Kimia</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>

        <tr class="text-left">
            <td colspan="6"><span class="font-weight-bold">C2. Dasar Program Keahlian</span></td>
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('SISKOM')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>1</td>
            <td class="text-left">Sistem Komputer</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('KJD')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>2</td>
            <td class="text-left">Komputer dan Jaringan Dasar</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('PD')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>3</td>
            <td class="text-left">Pemrograman Dasar</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>
        <tr>
        <?php $mapel = $db->get_row(nilaiMapel('DDG')); 
            $keterampilan = round($mapel->keterampilan,2);
            $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
            $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);
        ?>
        <td>4</td>
            <td class="text-left">Dasar Desain Grafis</td>
            <td><?= $pengetahuan; ?></td> <!-- nilai pengetahuan -->
            <td><?= $keterampilan; ?></td> <!-- nilai keterampilan -->
            <td><?= $nilai_akhir; ?></td> <!-- nilai akhir -->
            <td><?= getRank($nilai_akhir); ?></td> <!-- predikat -->
        </tr>
    </tbody>
</table>
</div>