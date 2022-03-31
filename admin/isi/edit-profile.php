<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$data_admin = query("SELECT * FROM admin")[0];


if (isset($_POST["submit"])) {
    // cek apakah data berhasil di ubah atau tidak

    if (ubahProfile($_POST) > 0) {
        echo "
    			<script>
    				alert('data berhasil diubah!');
    				document.location.href = '../isi/edit-profile.php';
    			</script>
    	";
    } else {
        echo "
    	<script>
    				alert('data gagal diubah!');
    				document.location.href = '../isi/edit-profile.php';
    			</script>
    	";
    }
}


?>

<h2>Edit Profile</h2>

<div class="text-center">
    <img src="../../assets/img/admin/<?php echo $data_admin['gambar']; ?>" style="width: 200px; height:200px;" class="rounded-circle" alt="foto-profile">
</div>

<form action="" method="POST" enctype="multipart/form-data">
    <div class="form-group">

        <label for="exampleFormControlInput1">Nama</label>
        <input type="text" name="nama" class="form-control" id="exampleFormControlInput1" required value="<?php echo $data_admin['nama']; ?>">

        <br>
        <label for="exampleFormControlInput2">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_admin['alamat']; ?>">

        <br>
        <label for="exampleFormControlInput2">Nomor Hp</label>
        <input type="text" name="nomor_hp" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_admin['no_hp']; ?>">

        <br>
        <label for="exampleFormControlInput2">Email</label>
        <input type="email" name="email" class="form-control" id="exampleFormControlInput2" required value="<?php echo $data_admin['email']; ?>">

        <br>
        <label for="exampleFormControlInput2">Gambar</label>
        <input type="text" name="gambar" class="form-control" id="exampleFormControlInput2" readonly required value="<?php echo $data_admin['gambar']; ?>">

        <br>
        <input type="file" name="upload_gambar" id="upload_gambar" class="form-control-file">

        <br>
        <button type="submit" name="submit" id="button" class="btn btn-primary">simpan</button>

        <a href="../isi/edit-profile.php" class="btn btn-primary">batal</a>
    </div>

</form>


</div>
</div>

<?php require_once('../section/footer.php');
?>