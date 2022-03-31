<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$data_kategori = query("SELECT COUNT(id_kategori) as hasilKategori FROM kategori")[0];
$jml_kategori = semuaDataKategori();

if (isset($_POST["cari"])) {
    $jml_kategori = cariNamaKategori($_POST["keyword"]);
}

?>

<h2>Manajemen Data Kategori</h2>
<p>Jumlah data ada <?php echo $data_kategori['hasilKategori']; ?></p>

<a class="btn btn-primary" href="../isi/tambah-kategori.php">tambah</a>

<a class="btn btn-info" href="../isi/kategori.php">segarkan</a>
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
            <th scope="col">Id Kategori</th>
            <th scope="col">Nama Kategori</th>
            <th scope="col">Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($jml_kategori as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['id_kategori']; ?></td>
                <td><?php echo $hasil['nama_kategori']; ?></td>
                <td>
                    <a class="btn btn-primary" href="../isi/edit-kategori.php?id_kategori=<?php echo $hasil['id_kategori']; ?>">Edit</a>
                    <a class="btn btn-primary" href="../isi/hapus-kategori.php?id_kategori=<?php echo $hasil['id_kategori']; ?>" onclick="javascript:return confirm('Hapus Data Kategori ?');">Hapus</a>
                </td>
            </tr>
        <?php
            $no++;
        }
        ?>
    </tbody>
</table>


</div>
</div>

<?php

require_once('../section/footer.php');

?>