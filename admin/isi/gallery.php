<?php

require_once('../isi/auth-check.php');

require_once('../../fungsi/function.php');

require_once('../section/header.php');

require_once('../section/sidebar.php');

$data_kategori = query("SELECT COUNT(id_gallery) as jmlFoto FROM gallery")[0];
$jml_gallery = semuaDataGallery();

?>

<h2>Manajemen Data Galeri</h2>
<p>Jumlah data ada <?php echo $data_kategori['jmlFoto']; ?></p>

<a class="btn btn-info" href="../isi/gallery.php">segarkan</a>

<br><br>

<br>

<table class="table">
    <thead class="thead-info">
        <tr>
            <th scope="col">Nomor</th>
            <th scope="col">Id gallery</th>
            <th scope="col">Nama Kategori</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $no = 1;
        foreach ($jml_gallery as $hasil) {
        ?>
            <tr>
                <th scope="row"><?php echo $no; ?></th>
                <td><?php echo $hasil['id_gallery']; ?></td>
                <td><?php echo $hasil['gambar']; ?></td>
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