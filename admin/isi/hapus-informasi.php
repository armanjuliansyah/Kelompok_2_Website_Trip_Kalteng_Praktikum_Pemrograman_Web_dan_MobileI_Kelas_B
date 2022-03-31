<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_informasi = $_GET['id_informasi'];
$id_detail_informasi = $_GET['id_detail_informasi'];
$id_gallery = $_GET['id_gallery'];

// $data_informasi = HapusDataInformasiTertentu($id_informasi, $id_detail_informasi);

if (hapusDataInformasi($id_informasi, $id_detail_informasi, $id_gallery) > 0) {
	echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = '../isi/informasi.php';
				</script>
		";
} else {
	echo "
		<script>
					alert('data gagal dihapus!');
					document.location.href = '../isi/informasi.php';
				</script>
		";
}
