<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_kategori = $_GET['id_kategori'];

$data_kategori = DataKategoriTertentu($id_kategori);

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (ubahDataKategori($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil diubah!');
    				document.location.href = '../isi/kategori.php';
    			</script>
    	";
    } else {
        echo "
        <script>
                    alert('data gagal diubah!');
        			document.location.href = '../isi/kategori.php';
        		</script>
        ";
    }
}


?>

<h2>Edit Kategori</h2>


<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">

        <label for="id_kategori">ID Kategori</label>
        <input type="text" name="id_kategori" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_kategori[0]['id_kategori']; ?>">


        <label for="exampleFormControlInput1">Nama Kategori</label>
        <input type="text" name="nama_kategori" class="form-control" id="nama_kategori" required value="<?php echo $data_kategori[0]['nama_kategori']; ?>">

        <br>
        <button type="submit" name="submit" id="button" class="btn btn-primary">ubah</button>

        <a href="../isi/kategori.php" class="btn btn-primary">batal</a>

    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>