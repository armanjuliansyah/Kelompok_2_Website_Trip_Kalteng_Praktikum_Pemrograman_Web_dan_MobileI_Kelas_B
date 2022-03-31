<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

$jml_foto_destinasi = limitDataDestinasiTampil(3);
$slider_foto_destinasi = semuaDataDestinasiSlider();

?>


<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

            <?php foreach ($jml_foto_destinasi as $hasil) { ?>
                <!-- Slide 1 -->
                <div class="carousel-item active" style="background-image: url(../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>)">
                </div>

            <?php } ?>

        </div>




        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main">

    <!-- ======= My & Family Section ======= -->
    <section id="about" class="about">
        <div class="container">

            <div class="section-title">
                <h2>Pilihan Terbaik </h2>
                <p>
                    Kalimantan Tengah memiliki banyak pesona alam yang indah dan menarik, tidak kalah dengan pesona alam yang
                    ada di pulau lainnya. Meskipun memiliki pesona alam yang indah dan menarik, namun keindahan alam tersebut
                    masih belum terekspos ke dunia luar. Oleh karena itu, TripKalteng hadir untuk memperkenalkan beragam
                    destinasi wisata di Kalimantan Tengah agar dapat memberikan warna baru yang cocok dijadikan tempat berwisata
                    untuk kelurga, bahkan sebagai tempat healing bagi anak muda masa kini. TripKalteng bukan hanya menyediakan
                    informasi pesona alam yang ada di Kalimantan Tengah, tetapi juga memberikan informasi tempat yang
                    menampilkan ciri khas kebudayaan Kalimantan Tengah.
                </p>
    </section><!-- End My & Family Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="bi bi-cloud-check"></i></div>
                    <h4 class="title"><a href="">Update</a></h4>
                    <p class="description">Memberikan informasi tempat wisata terupdate</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="bi bi-speedometer2"></i></div>
                    <h4 class="title"><a href="">Akurat</a></h4>
                    <p class="description">Memberikan informasi lokasi yang akurat</p>
                </div>
                <div class="col-lg-4 col-md-6 icon-box">
                    <div class="icon"><i class="bi bi-check-circle"></i></div>
                    <h4 class="title"><a href="">Terpercaya</a></h4>
                    <p class="description">Memberikan informasi tempat wisata yang terpercaya sesuai dengan kebutuhan</p>
                </div>
            </div>


        </div>
    </section><!-- End Features Section -->

    <!-- ======= Recent Photos Section ======= -->
    <section id="recent-photos" class="recent-photos">
        <div class="container">

            <div class="section-title">
                <h2>Menjelajahi Pengalaman Terbaik</h2>
            </div>

            <div class="recent-photos-slider swiper">
                <div class="swiper-wrapper align-items-center">

                    <?php foreach ($slider_foto_destinasi
                        as $hasil) { ?>

                        <div class="swiper-slide"><a href="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="glightbox"><img src="../../assets/img/gallery/destinasi/<?php echo $hasil['gambar']; ?>" class="img-fluid" alt=""></a></div>

                        <!-- <div class="swiper-slide"><a href="../../assets/img/gallery/Bukit-Batu.jpg" class="glightbox"><img src="../../assets/img/gallery/Bukit-Batu.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="../../assets/img/gallery/Museum Balanga.jpeg" class="glightbox"><img src="../../assets/img/gallery/Museum Balanga.jpeg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="../../assets/img/gallery/Danau Biru.jpg" class="glightbox"><img src="../../assets/img/gallery/Danau Biru.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="../../assets/img/gallery/Susur Sungai Kahayan.jpg" class="glightbox"><img src="../../assets/img/gallery/Susur Sungai Kahayan.jpg" class="img-fluid" alt=""></a></div>
                        <div class="swiper-slide"><a href="../../assets/img/gallery/Tanjung Puting.jpg" class="glightbox"><img src="../../assets/img/gallery/Susur Sungai Sebangau.jpg" class="img-fluid" alt=""></a></div> -->
                    <?php } ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Recent Photos Section -->

</main><!-- End #main -->

<?php require_once('../section/footer.php'); ?>