<!-- Tampilkan jika ada error -->
<?php if (isset($_COOKIE['notifikasi'])):?>
<div class="row">
	<div class="col"><div class="alert alert-info alert-dismissible fade show mx-auto" role="alert">
		<?= $_COOKIE['notifikasi']; ?>
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
		<span aria-hidden="true">&times;</span>
		</button>
	</div></div>
</div>
<?php setcookie('notifikasi','',time());endif;?>