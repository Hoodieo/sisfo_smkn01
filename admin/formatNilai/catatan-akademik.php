<div class="data-catatan">
	<!-- ======================== Catatan Akademik ======================== -->
	<br>
	<?php $nilaisikap = $db->get_row("SELECT keterangan FROM tbl_siswa WHERE nis=$_GET[id]") ?>
	<h4>B. CATATAN AKADEMIK 
		<?php if ($_SESSION['status'] == 'wali kelas') :?>
			<a href="index?m=edit_catatan&id=<?= $_GET['id'] ?>" class="btn btn-sm btn-warning ">Edit Catatan</a>
		<?php endif; ?>
	</h4>
	<table border="1" style="width: 735px;">
		<tr>
			<td class="p-2"><?= ($nilaisikap->keterangan) ? $nilaisikap->keterangan : 'Tidak ada catatan' ; ?></td>
		</tr>
	</table>

	<br>
	<h4>C. PRAKTIK KERJA LAPANGAN</h4>
	<table border="1" class="text-center">
		<thead>
			<th style="padding: 6px 10px;">No.</th>
			<th style="padding: 6px 10px;">Mitra DU/DI</th>
			<th style="padding: 6px 10px;">Lokasi</th>
			<th style="padding: 6px 10px;">Lainnya</th>
			<th style="padding: 6px 10px;">Keterangan</th>
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

	<br>
	<h4>D. EKSTRAKURIKULER</h4>
	<table border="1" class="text-center">
		<thead>
			<th style="padding: 6px 10px;">No.</th>
			<th style="padding: 6px 10px;">Kegiatan Ekstrakurikuler</th>
			<th style="padding: 6px 10px;">Keterangan</th>
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

	<br>
	<h4>E. KETIDAKHADIRAN</h4>
	<table border="1" style="min-width: 300px">
		<th style="padding: 6px 10px;" colspan="3"  class="text-center">Ketidakhadiran</th>
		<tr>
			<td>Sakit</td><td style="padding: 0 10px;" class="text-right">hari</td>
		</tr>
		<tr>
			<td>Izin</td><td style="padding: 0 10px;" class="text-right">hari</td>
		</tr>
		<tr>
			<td>Tanpa Keterangan</td><td style="padding: 0 10px;" class="text-right">hari</td>
		</tr>
	</table>

	<br>
	<!-- ============================================================ -->
	<!--                IF SEMESTER "GENAP" THEN SHOW!                -->
	<!-- ============================================================ -->
	<?php if (ucwords($nilai[0]->semester) == 'GENAP'): ?>
		<h4>F. KENAIKAN KELAS</h4>
		<div style="display: inline-block; border: 1px solid #000; padding: 6px 20px 6px 8px ">NAIK KE KELAS &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : XII (DUA BELAS)</div>
	<?php endif ?>
	
	<!-- ============================================================ -->
</div>

<?php 
	$walikelas = $db->get_row("SELECT tbl_guru.nama_guru FROM tbl_nilai 
				JOIN tbl_kelas ON tbl_nilai.id_kelas=tbl_kelas.id_kelas
				JOIN tbl_guru ON tbl_kelas.id_guru=tbl_guru.id_guru
				WHERE nis=$_GET[id] GROUP BY nis");
?>

<br><br>
<div class="mengetahui">
	<div class="row d-flex justify-content-between">
		<div class="col">
			<div>Mengetahui</div>
			<div>Orang Tua/Wali,</div>
			<br>
			<br>
			<br>
			<div>______________________</div>
		</div>
		<div class="col">
			<div>Batang Tarang, <?= date('d M Y') ?></div>
			<div>Wali Kelas,</div>
			<br>
			<br>
			<br>
			<div><?= $walikelas->nama_guru ? $walikelas->nama_guru : '______________________'; ?></div>
		</div>
	</div>

	<br>
	<div class="row d-flex justify-content-center">
		<div class="mx-auto">
			<div>Mengetahui</div>
			<div>Kepala Sekolah,</div>
			<br>
			<br>
			<br>
			<div class="text-underline">Yan, S.P.</div>
			<span>NIP. 197310152002121003</span>

		</div>
	</div>
</div>