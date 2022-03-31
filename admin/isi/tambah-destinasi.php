<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');


if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (tambahDataDestinasi($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil ditambah!');
    				document.location.href = '../isi/destinasi.php';
    			</script>
    	";
    } else {
        echo "
        <script>
                    alert('data gagal ditambah!');
        			document.location.href = '../isi/destinasi.php';
        		</script>
        ";
    }
}


?>

<h2>Tambah Data Destinasi</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">

        <label for="">ID Destinasi</label>
        <input type="text" name="id_destinasi" class="form-control" id="exampleFormControlInput1" required placeholder="example d1 atau lanjutkan id destinasi yang telah ada">
        <br>

        <label for="">ID Kategori</label>
        <input type="text" name="id_kategori" class="form-control" id="exampleFormControlInput1" required placeholder="example k1 atau pilih data id kategori yang telah ada ">

        <br>
        <label for="">ID Gallery</label>
        <input type="text" name="id_gallery" class="form-control" id="exampleFormControlInput1" required placeholder="example k1 atau lanjutkan id gallery yang telah ada ">

        <br>

        <label for="exampleFormControlInput1">Nama Destinasi</label>
        <input type="text" name="nama_destinasi" class="form-control" id="exampleFormControlInput1" required>

        <br>

        <label for="exampleFormControlInput1">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="keterangan" rows="8" required></textarea>

        <br>
        <input type="file" name="upload_gambar" id="upload_gambar" class="form-control-file">

        <br>
        <button type="submit" name="submit" id="button" class="btn btn-primary">tambah</button>

        <a href="../isi/destinasi.php" class="btn btn-primary">batal</a>

    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>