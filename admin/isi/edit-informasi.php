<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_informasi = $_GET['id_informasi'];

$data_informasi = DataInformasiTertentu($id_informasi);

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (ubahDataInformasi($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil diubah!');
    				document.location.href = '../isi/informasi.php';
    			</script>
    	";
    } else {
        echo "
        <script>
                    alert('data gagal diubah!');
        			document.location.href = '../isi/informasi.php';
        		</script>
        ";
    }
}


?>

<h2>Detail Informasi</h2>

<div class="text-center">
    <img src="../../assets/img/gallery/informasi/<?php echo $data_informasi[0]['gambar']; ?>" style="width: 200px; height:200px;" alt="foto-informasi">
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">

        <input type="hidden" name="id_informasi" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_informasi[0]['id informasi']; ?>">

        <input type="hidden" name="id_detail_informasi" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_informasi[0]['id detail informasi']; ?>">

        <input type="hidden" name="id_gallery" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_informasi[0]['id gallery']; ?>">

        <label for="exampleFormControlInput1">Judul Berita</label>
        <input type="text" name="judul_berita" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_informasi[0]['judul berita']; ?>">

        <br>

        <label for="exampleFormControlInput1">Isi Berita</label>
        <textarea class="form-control" name="isi_berita" id="isi_berita" rows="8" placeholder="<?php echo $data_informasi[0]['isi']; ?>"></textarea>

        <br>
        <label for="exampleFormControlInput2">Author</label>
        <input type="text" name="author" class="form-control" id="author" readonly required value="<?php echo $data_informasi[0]['author']; ?>">

        <br>
        <label for="exampleFormControlInput2">Gambar</label>
        <input type="text" name="gambar" class="form-control" id="gambar" readonly required value="<?php echo $data_informasi[0]['gambar']; ?>">

        <br>
        <br>
        <input type="file" name="upload_gambar" id="upload_gambar" class="form-control-file">

        <br>
        <button type="submit" name="submit" id="button" class="btn btn-primary">ubah</button>

        <a href="../isi/informasi.php" class="btn btn-primary">batal</a>

    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>