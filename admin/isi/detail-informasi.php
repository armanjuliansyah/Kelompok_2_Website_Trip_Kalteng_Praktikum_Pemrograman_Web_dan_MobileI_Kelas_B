<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$id_informasi = $_GET['id_informasi'];

$data_informasi = DataInformasiTertentu($id_informasi);


?>

<h2>Detail Informasi</h2>

<div class="text-center">
    <img src="../../assets/img/gallery/informasi/<?php echo $data_informasi[0]['gambar']; ?>" style="width: 200px; height:200px;" alt="foto-informasi">
</div>

<form action="">
    <div class="form-group">
        <label for="">id informasi</label>
        <input type="text" name="id_informasi" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_informasi[0]['id informasi']; ?>">
        <br>

        <label for="">id detail informasi</label>
        <input type="text" name="id_detail_informasi" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_informasi[0]['id detail informasi']; ?>">
        <br>

        <label for="">id gallery</label>
        <input type="text" name="id_gallery" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_informasi[0]['id gallery']; ?>">
        <br>

        <label for="exampleFormControlInput1">Judul Berita</label>
        <input type="text" name="judul_berita" class="form-control" id="exampleFormControlInput1" readonly required value="<?php echo $data_informasi[0]['judul berita']; ?>">

        <br>

        <label for="exampleFormControlInput1">Isi Berita</label>
        <textarea class="form-control" id="form4Example3" readonly rows="8" placeholder="<?php echo $data_informasi[0]['isi']; ?>"></textarea>

        <br>
        <label for="exampleFormControlInput2">Author</label>
        <input type="text" name="nomor_hp" class="form-control" id="exampleFormControlInput2" readonly required value="<?php echo $data_informasi[0]['author']; ?>">

        <br>
        <label for="exampleFormControlInput2">tanggal berita</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput2" readonly required value="<?php echo $data_informasi[0]['tanggal buat']; ?>">

        <br>
        <label for="exampleFormControlInput2">Gambar</label>
        <input type="text" name="gambar" class="form-control" id="exampleFormControlInput2" readonly required value="<?php echo $data_informasi[0]['gambar']; ?>">

        <br>
        <a href="../isi/informasi.php" class="btn btn-primary">kembali</a>
    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>