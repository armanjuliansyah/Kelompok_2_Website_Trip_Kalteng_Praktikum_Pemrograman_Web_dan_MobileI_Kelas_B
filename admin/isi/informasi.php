<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$data_informasi = query("SELECT COUNT(id_informasi) as 'hasil informasi' FROM informasi")[0];

?>

<h2>Manajemen Data Informasi</h2>
<p>Jumlah data ada <?php echo $data_informasi['hasil informasi']; ?></p>

<a class="btn btn-primary" href="../isi/tambah-informasi.php">tambah</a>

<a class="btn btn-info" href="../isi/informasi.php">segarkan</a>
<br><br>


<form class="form-inline" action="" method="POST">
    <input type="text" name="keyword" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
    <button type="submit" class="btn btn-outline-success my-2 my-sm-0" name="cari">Search</button>
</form>

<br>

<table class="table">
    <thead class="thead-info">
        <tr>
            <th scope="col">Nomor</th>
            <th style="width: -20px;" scope="col">Judul</th>
            <th scope="col">Waktu Buat</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
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

        // page untuk mencari data
        if (isset($_POST["cari"])) {
            $jml_informasi = cariJudulInformasi($_POST["keyword"]);
        }


        foreach ($jml_informasi as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['judul berita']; ?></td>
                <td><?php echo $hasil['tanggal buat']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="../isi/edit-informasi.php?id_informasi=<?php echo $hasil['id informasi']; ?>">edit</a>
                    <a class="btn btn-danger btn-sm" href="../isi/hapus-informasi.php?id_informasi=<?php echo $hasil['id informasi']; ?>&id_detail_informasi=<?php echo $hasil['id detail informasi']; ?>&id_gallery=<?php echo $hasil['id gallery']; ?>" onclick="javascript:return confirm('Hapus Data Informasi ?');">hapus</a>
                    <a class="btn btn-info btn-sm" href="../isi/detail-informasi.php?id_informasi=<?php echo $hasil['id informasi']; ?>">detail</a>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>
<nav>
    <ul class="pagination justify-content-center">
        <li class="page-item">
            <a class="page-link" <?php if ($halaman > 1) {
                                        echo "href='../isi/informasi.php?halaman=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="../isi/informasi.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='../isi/informasi.php?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>


</div>
</div>

<?php

require_once('../section/footer.php');

?>