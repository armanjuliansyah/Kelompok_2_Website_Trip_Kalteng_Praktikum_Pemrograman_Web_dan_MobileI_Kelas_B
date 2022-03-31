<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (tambahDataKategori($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil ditambah!');
    				document.location.href = '../isi/kategori.php';
    			</script>
    	";
    } else {
        echo "
        <script>
                    alert('data gagal ditambah!');
        			document.location.href = '../isi/kategori.php';
        		</script>
        ";
    }
}


?>

<h2>Tambah Kategori</h2>


<form action="" method="POST">
    <div class="form-group">

        <label for="id_kategori">ID Kategori</label>
        <input type="text" name="id_kategori" class="form-control" id="id_kategori" required placeholder="example k1 atau lanjutkan id kategori yang telah ada">

        <br>
        <label for="nama_kategori">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" required>

        <br>
        <button type="submit" name="submit" id="button" class="btn btn-primary">tambah</button>

        <a href="../isi/kategori.php" class="btn btn-primary">batal</a>

    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>