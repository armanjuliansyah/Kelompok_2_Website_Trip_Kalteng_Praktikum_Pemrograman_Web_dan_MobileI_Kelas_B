<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (tambahDataInformasi($_POST) > 0) {
        echo "
        <script>
        alert('data berhasil ditambah');
         document.location.href = '../isi/informasi.php';
     </script>
    	";
    } else {
        echo "
        <script>
                   alert('data gagal ditambah');
        			document.location.href = '../isi/informasi.php';
        		</script>
        ";
    }
}


?>

<h2>Tambah Data Informasi</h2>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">

        <label for="id_informasi">ID Informasi</label>
        <input type="text" name="id_informasi" class="form-control" id="id_informasi" required placeholder="example i1 atau lanjutkan id informasi yang telah ada">
        <br>

        <label for="id_detail_informasi">ID Detail Informasi</label>
        <input type="text" name="id_detail_informasi" class="form-control" id="id_informasi" required placeholder="example id1 atau lanjutkan id detail informasi yang telah ada">
        <br>

        <label for="id_gallery">ID Gallery atau gambar</label>
        <input type="text" name="id_gallery" class="form-control" id="id_gallery" required placeholder="example g1 atau lanjutkan id gallery yang telah ada">
        <br>

        <label for="exampleFormControlInput1">Judul Berita</label>
        <input type="text" name="judul_berita" class="form-control" id="exampleFormControlInput1" required>

        <br>

        <label for="exampleFormControlInput1">Isi Berita</label>
        <textarea class="form-control" name="isi_berita" id="isi_berita" rows="8" required></textarea>

        <br>
        <br>
        <input type="file" name="upload_gambar" id="upload_gambar" class="form-control-file">

        <br>
        <button type="submit" name="submit" id="button" class="btn btn-primary">tambah</button>

        <a href="../isi/informasi.php" class="btn btn-primary">batal</a>

    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>