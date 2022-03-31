<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_destinasi = $_GET['id_destinasi'];

$data_destinasi = DataDestinasiTertentu($id_destinasi);


?>

<h2>Detail Informasi</h2>

<div class="text-center">
    <img src="../../assets/img/gallery/destinasi/<?php echo $data_destinasi[0]['gambar']; ?>" style="width: 200px; height:200px;" alt="foto-destinasi">
</div>

<form action="">
    <div class="form-group">
        <label for="">id destinasi</label>
        <input type="text" name="id_informasi" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_destinasi[0]['id destinasi']; ?>">
        <br>

        <label for="exampleFormControlInput1">Nama Destinasi</label>
        <input type="text" name="judul_berita" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_destinasi[0]['nama destinasi']; ?>">

        <br>

        <label for="exampleFormControlInput1">Keterangan</label>
        <textarea class="form-control" id="form4Example3" readonly rows="8" placeholder="<?php echo $data_destinasi[0]['keterangan']; ?>"></textarea>

        <br>
        <label for="">kategori</label>
        <input type="text" name="kategori" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_destinasi[0]['nama kategori']; ?>">
        <br>
        <label for="exampleFormControlInput2">Author</label>
        <input type="text" name="nomor_hp" class="form-control" id="exampleFormControlInput2" readonly required value="<?php echo $data_destinasi[0]['author']; ?>">

        <br>
        <label for="exampleFormControlInput2">tanggal berita</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput2" readonly required value="<?php echo $data_destinasi[0]['tanggal buat']; ?>">

        <br>
        <label for="exampleFormControlInput2">Gambar</label>
        <input type="text" name="gambar" class="form-control" id="exampleFormControlInput2" readonly required value="<?php echo $data_destinasi[0]['gambar']; ?>">

        <br>
        <a href="../isi/destinasi.php" class="btn btn-primary">kembali</a>
    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>