<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_kategori = $_GET['id_kategori'];

// $data_informasi = HapusDataInformasiTertentu($id_informasi, $id_detail_informasi);

if (hapusDataKategori($id_kategori) > 0) {
    echo "
				<script>
					alert('data berhasil dihapus!');
					document.location.href = '../isi/kategori.php';
				</script>
		";
} else {
    echo "
		<script>
					alert('data gagal dihapus!');
					document.location.href = '../isi/kategori.php';
				</script>
		";
}
