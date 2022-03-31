<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');


$id_destinasi = $_GET['id_destinasi'];
$data_kategori = semuaDataKategori();

$data_destinasi = DataDestinasiTertentu($id_destinasi);

if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak
    // ubah satu satu
    if (ubahDataDestinasi($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil diubah!');
    				document.location.href = '../isi/destinasi.php';
    			</script>
    	";
    } else {
        echo "
        <script>
                    alert('data gagal diubah!');
        			document.location.href = '../isi/destinasi.php';
        		</script>
        ";
    }
}


?>

<h2>Edit Destinasi</h2>

<div class="text-center">
    <img src="../../assets/img/gallery/destinasi/<?php echo $data_destinasi[0]['gambar']; ?>" style="width: 200px; height:200px;" alt="foto-informasi">
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">

        <input type="hidden" name="id_destinasi" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_destinasi[0]['id destinasi']; ?>">


        <input type="hidden" name="id_gallery" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_destinasi[0]['id gallery']; ?>">

        <label for="exampleFormControlInput1">Nama Destinasi</label>
        <input type="text" name="nama_destinasi" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_destinasi[0]['nama destinasi']; ?>">

        <br>

        <label for="exampleFormControlInput1">Keterangan</label>
        <textarea class="form-control" name="keterangan" id="keterangan" rows="8" placeholder="<?php echo $data_destinasi[0]['keterangan']; ?>"></textarea>

        <br>
        <label for="kategori">kategori</label>
        <input type="text" name="id_kategori" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_destinasi[0]['kategori']; ?>">

        <br>
        <label for="exampleFormControlInput2">Author</label>
        <input type="text" name="author" class="form-control" id="author" readonly required value="<?php echo $data_destinasi[0]['author']; ?>">

        <br>
        <label for="exampleFormControlInput2">Gambar</label>
        <input type="text" name="gambar" class="form-control" id="gambar" readonly required value="<?php echo $data_destinasi[0]['gambar']; ?>">

        <br>
        <br>
        <input type="file" name="upload_gambar" id="upload_gambar" class="form-control-file">

        <br>
        <button type="submit" name="submit" id="button" class="btn btn-primary">ubah</button>

        <a href="../isi/destinasi.php" class="btn btn-primary">batal</a>

    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>