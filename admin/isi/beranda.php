<?php

// require_once('../../fungsi/function.php');

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$jml_informasi = query("SELECT COUNT(id_informasi) as hasilInformasi FROM informasi")[0];
$jml_kategori  = query("SELECT COUNT(id_kategori) as hasilKategori FROM kategori")[0];
$jml_destinasi   = query("SELECT COUNT(id_destinasi) as hasilGallery FROM destinasi")[0];
$jml_gambar = query("SELECT COUNT(id_gallery) as jmlFoto FROM gallery")[0];
$profile_admin = query("SELECT nama as 'nama admin' FROM admin")[0];

?>

<h2>Hai,<?php echo $profile_admin['nama admin']; ?></h2>
<p>Selamat datang di dashboard admin trip kalteng</p>

<div class="row">

    <!--STATUS PANELS -->
    <div class="col-md-3">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <center>
                        <i class="fa fa-user"></i>
                        Jumlah Informasi
                    </center>
                </h5>
                <div class="panel-body">
                    <center>
                        <h1><?php echo number_format($jml_informasi['hasilInformasi']); ?></h1>
                    </center>
                </div>

                <a href="../isi/informasi.php" class="card-link">
                    <center>
                        Menu Informasi
                    </center>
                </a>
            </div>
        </div>
        <!--/grey-panel -->
    </div><!-- /col-md-3-->

    <!--STATUS PANELS -->
    <div class="col-md-3" style="margin-left: 20px;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <center>
                        <i class="fa fa-user"></i>
                        Jumlah kategori
                    </center>
                </h5>
                <div class="panel-body">
                    <center>
                        <h1><?php echo number_format($jml_kategori['hasilKategori']); ?></h1>
                    </center>
                </div>

                <a href="../isi/kategori.php" class="card-link">
                    <center>
                        Menu Kategori
                    </center>
                </a>
            </div>
        </div>
        <!--/grey-panel -->
    </div><!-- /col-md-3-->


    <!--STATUS PANELS -->
    <div class="col-md-3" style="margin-left: 20px;">
        <div class="card" style="width: 21rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <center>
                        <i class="fa fa-user"></i>
                        Jumlah Destinasi
                    </center>
                </h5>
                <div class="panel-body">
                    <center>

                        <h1><?php echo number_format($jml_destinasi['hasilGallery']); ?></h1>
                    </center>
                </div>

                <a href="../isi/destinasi.php" class="card-link">
                    <center>
                        Menu Destinasi
                    </center>
                </a>
            </div>
        </div>
        <!--/grey-panel -->
    </div><!-- /col-md-3-->

    <br>
    <br>
    <!--STATUS PANELS -->
    <div class="col-md-3" style="margin-top: 20px;">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h5 class="card-title">
                    <center>
                        <i class="fa fa-user"></i>
                        Jumlah Gallery
                    </center>
                </h5>
                <div class="panel-body">
                    <center>
                        <h1><?php echo number_format($jml_gambar['jmlFoto']); ?></h1>
                    </center>
                </div>

                <a href="../isi/gallery.php" class="card-link">
                    <center>
                        Menu Gallery
                    </center>
                </a>
            </div>
        </div>
        <!--/grey-panel -->
    </div><!-- /col-md-3-->



</div>

</div>
</div>

<?php

require_once('../section/footer.php');

?>