/*
SQLyog Community v13.1.7 (64 bit)
MySQL - 10.4.17-MariaDB : Database - tripkalteng
*********************************************************************
*/

/*!40101 SET NAMES utf8 */;

/*!40101 SET SQL_MODE=''*/;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
CREATE DATABASE /*!32312 IF NOT EXISTS*/`tripkalteng` /*!40100 DEFAULT CHARACTER SET utf8mb4 */;

USE `tripkalteng`;

/*Table structure for table `admin` */

DROP TABLE IF EXISTS `admin`;

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL AUTO_INCREMENT,
  `nama` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `no_hp` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `admin` */

insert  into `admin`(`id_admin`,`nama`,`alamat`,`no_hp`,`email`,`gambar`,`waktu_buat`) values 
(1,'admin','palangka rayaa','081349581708                      ','admin@yahoo.com','5654.jpg','2022-03-31 22:55:05');

/*Table structure for table `destinasi` */

DROP TABLE IF EXISTS `destinasi`;

CREATE TABLE `destinasi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_destinasi` varchar(100) NOT NULL,
  `nama_destinasi` varchar(100) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `id_gallery` varchar(100) NOT NULL,
  `id_kategori` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`,`id_gallery`,`id_kategori`,`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4;

/*Data for the table `destinasi` */

insert  into `destinasi`(`id`,`id_destinasi`,`nama_destinasi`,`keterangan`,`id_gallery`,`id_kategori`,`id_admin`,`waktu_buat`) values 
(3,'d1','Bukit Batu','Museum Balanga adalah sebuah museum yang terletak di Kota Palangkaraya, Provinsi Kalimantan Tengah (Kalteng), Indonesia. Museum Balanga memiliki berbagai jenis koleksi budaya material (benda budaya) yang dikelompokkan menjadi koleksi etnografi, sejarah, arkeologi, keramologi, numismatic, dan heraldik. Sedangkan benda-benda alam dikelompokkan menjadi koleksi biologis dan geologis.','g1','k1',1,'2022-03-31 19:56:36'),
(4,'d2','Ujung Pandaran','Pantai Ujung Pandaran adalah salah satu pantai yang ada Kota Sampit dan merupakan salah satu tempat wisata favorit. Pantai Ujung Pandaran terletak di Desa Ujung Pandaran, Kecamatan Teluk Sampit, Kabupaten Kota Waringin Timur, Provinsi Kalimantan Tengah. Jarak Pantai Ujung Pandaran dari Kota Sampit yaitu sekitar 80 km arah selatan. Pantai Ujung Pandaran langsung berbatasan dengan Laut Jawa. Letak Pantai Ujung Pandaran yang jauh dari hiruk pikuk kota merupakan tempat yang menarik bagi Anda untuk berlibur melepas lelah dari rutinitas sehari-hari. Pantai Ujung Pandaran berpasir putih, butiran-butiran pasirnya juga sangat halus. Di sekitar pantai banyak ditemukan kayu-kayu besar yang berserakan. Kayu-kayu tersebut adalah kayu-kayu yang dibawa oleh ombak besar hingga bibir pantai','g2','k2',1,'2022-03-31 21:02:49'),
(5,'d3','Danau Biru Tewang Rangkang','Danau Biru Tewang Rangkang merupakan danau yang berada di Kecamatan Tewang Sangalang Garing, Kabupaten Katingan, Kalimantan Tengah. Sebutan Tewang Rangkang itu sendiri merupakan nama dari sebuah desa tempat danau ini berada. Danau Biru Tewang Rangkang terbentuk karena ada bekas galian proyek pertambangan di Kabupaten Katingan. Keberadaan sebuah lubang berukuran besar yang digenangi air dan seiring berjalannya waktu air dalam danau ini berwarna kebiruan','g3','k3',1,'2022-03-31 21:04:25'),
(6,'d4','Susur Sungai Kahayan','Sungai Kahayan adalah salah satu sungai terpanjang di Pulau Kalimantan. Memiliki luas mencapai 81,648 km2, panjang 600 km, lebar 500 meter dan kedalaman mencapai hingga 7 meter. Sungai yang membelah Kota Palangkaraya ini juga biasa disebut dengan sungai Biaju Besar atau sungai Dayak Besar. Sungai Kayahan memiliki bentuk yang sangat unik karena ia terlihat seperti teluk yang menjuruk kedalam. Alur sungainya dalam, sendimentasi dimulut sungai menyebabkan pendangkalan dikeliling sungai. Namun, bukan hanya uniknya saja yang membuat wisata susur sungai kahayan ini menarik, melainkan pemandangan disekitar sungai serta suasana kehidupan suku Dayak yang akan direkam oleh mata anda.','g4','k4',1,'2022-03-31 21:06:36'),
(7,'d5','Susur Sungai Sebangau','Taman Nasional Sebangau merupakan salah satu kawasan pelestarian rawa gambut terbesar di Indonesia yang mempunyai fungsi pokok sesuai Undang-undang no.5 tahun 1990 tentang Konservasi Sumberdaya Alam Hayati dan Ekosistemnya yaitu : Perlindungan system penyangga kehidupan, Pengawetan keanekaragaman tumbuhan dan satwa beserta ekosistemnya, dan Pemanfaatan secara lestari sumberdaya alam hayati dan ekosistemnya','g5','k4',1,'2022-03-31 21:09:36'),
(10,'d7','Taman Nasional Tanjung Puting','Taman Nasional Tanjung Puting merupakan Taman Nasional yang terletak di Kecamatan Kumai, Kotawaringin Barat, Kalimantan Tengah, disini terdapat Konservasi Orang Utan terbesar di dunia dengan populasi diperkirakan 30.000 - 40.000 Orang Utan yang tersebar di Taman Nasional dan juga di luar Taman Nasional ini.Sselain itu Taman Nasional Tanjung Puting juga merupakan Cagar Biosfer yang ditunjuk pada tahun 1977 dengan area inti Taman Nasional Tanjung Puting seluas 415.040 ha yang ditetapkan pada tahun 1982','g6','k6',1,'2022-03-31 21:17:02'),
(12,'d6','Museum Balanga','Museum Balanga adalah sebuah museum yang terletak di Kota Palangkaraya, Provinsi Kalimantan Tengah (Kalteng), Indonesia. Museum Balanga memiliki berbagai jenis koleksi budaya material (benda budaya) yang dikelompokkan menjadi koleksi etnografi, sejarah, arkeologi, keramologi, numismatic, dan heraldik. Sedangkan benda-benda alam dikelompokkan menjadi koleksi biologis dan geologis.','g11','k5',1,'2022-03-31 22:14:24');

/*Table structure for table `detail_informasi` */

DROP TABLE IF EXISTS `detail_informasi`;

CREATE TABLE `detail_informasi` (
  `id_detail_informasi` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `isi_informasi` text NOT NULL,
  `id_gallery` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_detail_informasi`,`id_admin`,`id_gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `detail_informasi` */

insert  into `detail_informasi`(`id_detail_informasi`,`id_admin`,`isi_informasi`,`id_gallery`,`waktu_buat`) values 
('di1',1,'Orangutan, yang namanya berarti “orang-orang hutan”, tinggal di hutan tropis dan rawa di pulau-pulau Asia Tenggara di Kalimantan dan Sumatra. Kera merah shaggy ini adalah mamalia arboreal terbesar dan satu-satunya kera besar yang ditemukan di Asia. Rambut panjang yang berwarna kemerahan menutupi sebagian besar kulit abu orangutan. Tubuhnya yang gempal memiliki pelvis yang fleksibel, leher yang tebal, dan kaki yang membungkuk. Lengan orang utan lebih panjang dari kakinya, sampai hampir sampai ke mata kaki saat kera berdiri. Seperti kera lainnya, orang utan tidak memiliki ekor','g7','2022-03-31 21:20:09'),
('di2',1,'KBRN, Palangka Raya: Potensi wisata belum diketahui masyarakat luas banyak terdapat di Kabupaten Katingan, Kalimantan Tengah. Salah satunya adalah Danau Biru. Lokasi wisata alam satu ini berada di Desa Tewang Rangkang, Kecamatan Tewang Sangalang Garing. Ketidaktahuan masyarakat akan lokasi wisata indah bekas lahan tambang ini bahkan juga terjadi dengan sebagian warga di Kota Palangka Raya. Danau Biru semula adalah tempat penambangan masyarakat yang kemudian membentuk kubangan. Setelah tidak lagi menjadi lokasi penambangan, kubangan terisi air yang terlihat berwarna biru dan cukup jernih','g8','2022-03-31 21:22:46'),
('di3',1,'Wisata Kalteng, lokasi wisata alam Susur Sungai Dermaga Kereng Bengkirai Kecamatan Sabangau Palangkaraya, Kalimantan Tengah, biasanya ramai dikunjungi warga saat hari libur sebagian pengunjung penasaran datang untuk melihat air hitam sungai sebangau. Warga setempat yang selama ini menjaga parkir kendaraan pengunjung atau pemilik perahu susur sungai sudah mengerti setiap hari libur seperti saat tanggal merah atau Hari Sabtu dan Minggu, sudah mempersiapkan sarana atau fasilitas yang biasa pengunjung sejak pagi, karena pengunjung biasanya datang cukup banyak','g9','2022-03-31 21:23:43'),
('di4',1,'Objek wisata Pantai Ujung Pandaran Kecamatan Teluk Sampit Kabupaten Kotawaringin Timur Kalimantan Tengah, diserbu pengunjung pada libur Tahun Baru 2022. Ada beberapa titik lokasi yang biasanya menjadi konsentrasi pengunjung di pantai itu yaitu kawasan wisata yang dikelola pemerintah daerah, serta kawasan yang terdapat fasilitas milik swasta dan masyarakat seperti Camp Kobes, Pantai Tebing Kalap, Pantai Gaul dan lainnya','g10','2022-03-31 21:25:24');

/*Table structure for table `gallery` */

DROP TABLE IF EXISTS `gallery`;

CREATE TABLE `gallery` (
  `id_gallery` varchar(100) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  PRIMARY KEY (`id_gallery`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `gallery` */

insert  into `gallery`(`id_gallery`,`gambar`) values 
('g1','Bukit-Batu.jpg'),
('g10','Pantai Ujung Pandaran.jpg'),
('g11','Museum Balanga.jpeg'),
('g2','Pantai Ujung Pandaran.jpg'),
('g3','Danau Biru.jpg'),
('g4','Susur Sungai Kahayan.jpg'),
('g6','Tanjung Puting.jpg'),
('g8','Danau Biru.jpg'),
('g9','sebangau.jpg');

/*Table structure for table `informasi` */

DROP TABLE IF EXISTS `informasi`;

CREATE TABLE `informasi` (
  `id` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_informasi` varchar(100) NOT NULL,
  `id_admin` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `id_detail_informasi` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`,`id_admin`,`id_detail_informasi`)
) ENGINE=InnoDB AUTO_INCREMENT=17 DEFAULT CHARSET=utf8mb4;

/*Data for the table `informasi` */

insert  into `informasi`(`id`,`id_informasi`,`id_admin`,`judul`,`id_detail_informasi`,`waktu_buat`) values 
(13,'i1',1,'Mengenal Orang Utan Lebih Dekat','di1','2022-03-31 21:20:09'),
(14,'i2',1,'Danau Biru Masih Asing di Telinga Khalayak','di2','2022-03-31 21:22:47'),
(15,'i3',1,'Wisata Kalteng, Air Hitam Bikin Penasaran Pengunjung Wisata Susur Sungai Kereng Bengkirai','di3','2022-03-31 21:23:43'),
(16,'i4',1,'Wisata Ujung Pandaran Diserbu Pengunjung Akhir Tahun','di4','2022-03-31 21:25:24');

/*Table structure for table `kategori` */

DROP TABLE IF EXISTS `kategori`;

CREATE TABLE `kategori` (
  `id_kategori` varchar(100) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*Data for the table `kategori` */

insert  into `kategori`(`id_kategori`,`nama_kategori`,`waktu_buat`) values 
('k1','Bukit','2022-03-31 19:22:38'),
('k2','Pantai','2022-03-31 19:23:01'),
('k3','Danau','2022-03-31 19:23:13'),
('k4','Sungai','2022-03-31 19:23:38'),
('k5','Museum','2022-03-31 19:23:52'),
('k6','Taman','2022-03-31 19:24:04');

/*Table structure for table `login` */

DROP TABLE IF EXISTS `login`;

CREATE TABLE `login` (
  `id_login` int(11) NOT NULL AUTO_INCREMENT,
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `waktu_buat` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id_login`,`id_admin`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4;

/*Data for the table `login` */

insert  into `login`(`id_login`,`id_admin`,`username`,`password`,`waktu_buat`) values 
(1,1,'admin','a303e5bf8598edb3855af01a4a517632','2022-03-29 13:38:20');

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
