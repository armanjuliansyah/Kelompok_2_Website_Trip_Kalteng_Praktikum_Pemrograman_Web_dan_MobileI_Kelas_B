<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

?>

<main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>Informasi</h2>
                <ol>
                    <li><a href="../isi/home.php">Beranda</a></li>
                    <li>Informasi</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Event List Section ======= -->
    <section id="event-list" class="event-list">
        <div class="container">

            <div class="row">

                <?php

                // page nomor atau limit tampilan
                $batas = 5;
                $halaman = isset($_GET['halaman']) ? (int)$_GET['halaman'] : 1;
                $halaman_awal = ($halaman > 1) ? ($halaman * $batas) - $batas : 0;

                $previous = $halaman - 1;
                $next = $halaman + 1;

                $jumlah_data = limitDataInformasi();
                $total_halaman = ceil($jumlah_data / $batas);
                $jml_informasi = semuaDataInformasi($halaman_awal, $batas);

                $no = $halaman_awal + 1;


                foreach ($jml_informasi as $hasil) {

                ?>
                    <div class="col-md-6 d-flex align-items-stretch">
                        <div class="card">
                            <div class="card-img">
                                <img src="../../assets/img/gallery/informasi/<?php echo $hasil['nama gambar']; ?>" alt="foto-informasi">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $hasil['judul berita']; ?></h5>
                                <p class="card-text" style="text-align:justify"><?php echo $hasil['isi']; ?></p>
                            </div>
                        </div>
                    </div>

                <?php

                }
                ?>

            </div>

            <nav>
                <ul class="pagination justify-content-center">
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman > 1) {
                                                    echo "href='../isi/events.php?halaman=$previous'";
                                                } ?>>Previous</a>
                    </li>
                    <?php
                    for ($x = 1; $x <= $total_halaman; $x++) {
                    ?>
                        <li class="page-item"><a class="page-link" href="../isi/events.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
                    <?php
                    }
                    ?>
                    <li class="page-item">
                        <a class="page-link" <?php if ($halaman < $total_halaman) {
                                                    echo "href='../isi/events.php?halaman=$next'";
                                                } ?>>Next</a>
                    </li>
                </ul>
            </nav>

        </div>
    </section><!-- End Event List Section -->

</main><!-- End #main -->

<!-- ======= Footer ======= -->
<?php require_once('../section/footer.php'); ?>

<!-- End Footer -->