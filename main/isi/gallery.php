<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

$jml_destinasi_1 = semuaDataDestinasiGroup('k1');
$jml_destinasi_2 = semuaDataDestinasiGroup('k2');
$jml_destinasi_3 = semuaDataDestinasiGroup('k3');
$jml_destinasi_4 = semuaDataDestinasiGroup('k4');
$jml_destinasi_5 = semuaDataDestinasiGroup('k5');
$jml_destinasi_6 = semuaDataDestinasiGroup('k6');

?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Kategori</h2>
                <ol>
                    <li><a href="../isi/home.php">Beranda</a></li>
                    <li>Kategori</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- group by berdasarkan filter yang ada misalnya filter bukit berarti bukit ja yang di filter -->
    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 d-flex justify-content-center">
                    <ul id="gallery-flters">
                        <li data-filter="*">Semua</li>
                        <li data-filter=".filter-bukit">Bukit</li>
                        <li data-filter=".filter-pantai">Pantai</li>
                        <li data-filter=".filter-danau">Danau</li>
                        <li data-filter=".filter-sungai">Sungai</li>
                        <li data-filter=".filter-museum">Museum</li>
                        <li data-filter=".filter-taman">Taman</li>
                    </ul>
                </div>
            </div>

            <div class="row gallery-container">

                <?php foreach ($jml_destinasi_1 as $hasil) { ?>
                    <div class="col-lg-4 col-md-6 gallery-item filter-bukit">
                        <div class="gallery-wrap">
                            <img src="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="img-fluid" alt="">
                            <div class="gallery-info">
                                <h4><?php echo $hasil['nama destinasi']; ?></h4>
                                <div class="gallery-links">
                                    <a href="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="glightbox" title="<br><?php echo $hasil['keterangan']; ?><br>"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($jml_destinasi_2 as $hasil) { ?>
                    <div class="col-lg-4 col-md-6 gallery-item filter-pantai">
                        <div class="gallery-wrap">
                            <img src="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="img-fluid" alt="">
                            <div class="gallery-info">
                                <h4><?php echo $hasil['nama destinasi']; ?></h4>
                                <div class="gallery-links">
                                    <a href="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="glightbox" title="<br><?php echo $hasil['keterangan']; ?><br>"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($jml_destinasi_3 as $hasil) { ?>
                    <div class="col-lg-4 col-md-6 gallery-item filter-danau">
                        <div class="gallery-wrap">
                            <img src="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="img-fluid" alt="">
                            <div class="gallery-info">
                                <h4><?php echo $hasil['nama destinasi']; ?></h4>
                                <div class="gallery-links">
                                    <a href="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="glightbox" title="<br><?php echo $hasil['keterangan']; ?><br>"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($jml_destinasi_4 as $hasil) { ?>
                    <div class="col-lg-4 col-md-6 gallery-item filter-sungai">
                        <div class="gallery-wrap">
                            <img src="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="img-fluid" alt="">
                            <div class="gallery-info">
                                <h4><?php echo $hasil['nama destinasi']; ?></h4>
                                <div class="gallery-links">
                                    <a href="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="glightbox" title="<br><?php echo $hasil['keterangan']; ?><br>"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($jml_destinasi_5 as $hasil) { ?>
                    <div class="col-lg-4 col-md-6 gallery-item filter-museum">
                        <div class="gallery-wrap">
                            <img src="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="img-fluid" alt="">
                            <div class="gallery-info">
                                <h4><?php echo $hasil['nama destinasi']; ?></h4>
                                <div class="gallery-links">
                                    <a href="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="glightbox" title="<br><?php echo $hasil['keterangan']; ?><br>"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

                <?php foreach ($jml_destinasi_6 as $hasil) { ?>
                    <div class="col-lg-4 col-md-6 gallery-item filter-taman">
                        <div class="gallery-wrap">
                            <img src="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="img-fluid" alt="">
                            <div class="gallery-info">
                                <h4><?php echo $hasil['nama destinasi']; ?></h4>
                                <div class="gallery-links">
                                    <a href="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="glightbox" title="<br><?php echo $hasil['keterangan']; ?><br>"><i class="bx bx-plus"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>

            </div>

        </div>
    </section><!-- End Gallery Section -->

</main><!-- End #main -->

<?php require_once('../section/footer.php'); ?>