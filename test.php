<!-- Logic nilai raport -->

<?php 
$data_mapel = ['AGM','PKN', 'BIND', 'MTK', 'SEJARAH', 'BING'];

foreach ($data_mapel as $data) {
    echo "<tr>";
        $mapel = $db->get_row(nilaiMapel($data)); 
        $keterampilan = round($mapel->keterampilan,2);
        $pengetahuan = round(($mapel->nilai_harian + $mapel->uts + $mapel->uas) / 3,2);
        $nilai_akhir = round(($pengetahuan + $keterampilan) / 2,2);

        echo "<td>".++$i."</td>";
        echo "<td class='text-left'>$mapel->mata_pelajaran</td>";
        echo "<td>$pengetahuan</td>";
        echo "<td>$keterampilan</td>";
        echo "<td>$nilai_akhir</td>";
        echo "<td>".getRank($nilai_akhir)."</td>";
    echo "</tr>";
}

?>