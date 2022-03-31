<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$data_destinasi   = query("SELECT COUNT(id_destinasi) as hasilGallery FROM destinasi")[0];


?>

<h2>Manajemen Data Destinasi</h2>
<p>Jumlah data ada <?php echo $data_destinasi['hasilGallery']; ?></p>

<a class="btn btn-primary" href="../isi/tambah-destinasi.php">tambah</a>

<a class="btn btn-info" href="../isi/destinasi.php">segarkan</a>
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
            <th style="width: -20px;" scope="col">Nama</th>
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

        $jumlah_data = limitDataDestinasi();
        $total_halaman = ceil($jumlah_data / $batas);
        $jml_destinasi = semuaDataDestinasi($halaman_awal, $batas);

        $no = $halaman_awal + 1;

        // page untuk mencari data
        if (isset($_POST["cari"])) {
            $jml_destinasi = cariNamaDestinasi($_POST["keyword"]);
        }


        foreach ($jml_destinasi as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['nama destinasi']; ?></td>
                <td><?php echo $hasil['tanggal buat']; ?></td>
                <td>
                    <a class="btn btn-warning btn-sm" href="../isi/edit-destinasi.php?id_destinasi=<?php echo $hasil['id destinasi']; ?>">edit</a>
                    <a class="btn btn-danger btn-sm" href="../isi/hapus-destinasi.php?id_destinasi=<?php echo $hasil['id destinasi']; ?>&id_gallery=<?php echo $hasil['id gallery']; ?>" onclick="javascript:return confirm('Hapus Data Informasi ?');">hapus</a>
                    <a class="btn btn-info btn-sm" href="../isi/detail-destinasi.php?id_destinasi=<?php echo $hasil['id destinasi']; ?>">detail</a>
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
                                        echo "href='../isi/destinasi.php?halaman=$previous'";
                                    } ?>>Previous</a>
        </li>
        <?php
        for ($x = 1; $x <= $total_halaman; $x++) {
        ?>
            <li class="page-item"><a class="page-link" href="../isi/destinasi.php?halaman=<?php echo $x ?>"><?php echo $x; ?></a></li>
        <?php
        }
        ?>
        <li class="page-item">
            <a class="page-link" <?php if ($halaman < $total_halaman) {
                                        echo "href='../isi/destinasi.php?halaman=$next'";
                                    } ?>>Next</a>
        </li>
    </ul>
</nav>


</div>
</div>

<?php

require_once('../section/footer.php');

?>