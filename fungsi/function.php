<?php

$server_name = "localhost";
$username_server = "root";
$password_server = "";
$database_name = "tripkalteng";

$db = mysqli_connect($server_name, $username_server, $password_server, $database_name);

function query($query)
{
    global $db;
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function semuaDataInformasi($halaman_awal, $batas)
{
    global $db;
    $query = "SELECT
              g.id_gallery as 'id gallery',
              di.id_detail_informasi as 'id detail informasi',
              i.id_informasi as 'id informasi',
              a.nama as 'author',
              i.waktu_buat as 'tanggal buat',
              di.id_gallery as 'gambar',
              g.gambar as 'nama gambar',
              i.judul as 'judul berita',
              di.isi_informasi as 'isi'
            FROM informasi as i
            INNER JOIN detail_informasi as di ON (di.id_detail_informasi = i.id_detail_informasi)
            INNER JOIN gallery g on (di.id_gallery = g.id_gallery)
            INNER JOIN admin a on (di.id_admin = a.id_admin)
            LIMIT $halaman_awal, $batas ";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}


function semuaDataDestinasi($halaman_awal, $batas)
{
    global $db;
    $query = "SELECT 
             ds.id_destinasi as 'id destinasi',
             g.id_gallery as 'id gallery',
             ds.id_kategori as 'kategori',
             g.gambar as 'gambar',
             ds.nama_destinasi as 'nama destinasi',
             ds.keterangan as 'keterangan',
             ds.id_kategori as 'kategori',
             a.nama as 'author',
             ds.waktu_buat as 'tanggal buat'
             FROM destinasi as ds
             INNER JOIN gallery as g ON (g.id_gallery = ds.id_gallery)
             INNER JOIN kategori as k ON (k.id_kategori = ds.id_kategori)
             INNER JOIN admin a on (a.id_admin = ds.id_admin)
             LIMIT $halaman_awal, $batas ";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function semuaDataDestinasiGroup($keyword)
{
    global $db;
    $query = "SELECT
                ds.id_destinasi as 'id destinasi',
                g.id_gallery as 'id gallery',
                ds.id_kategori as 'kategori',
                g.gambar as 'gambar',
                ds.nama_destinasi as 'nama destinasi',
                ds.keterangan as 'keterangan',
                ds.id_kategori as 'kategori',
                a.nama as 'author',
                ds.waktu_buat as 'tanggal buat'
                FROM destinasi as ds
                INNER JOIN gallery as g ON (g.id_gallery = ds.id_gallery)
                INNER JOIN kategori as k ON (k.id_kategori = ds.id_kategori)
                INNER JOIN admin a on (a.id_admin = ds.id_admin)
                WHERE ds.id_kategori = '$keyword'
             ";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function ubahProfile($data)
{
    global $db;
    $id = 1;
    // ambil data dari tiap elemen dalam form

    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $no_hp = htmlspecialchars($data["nomor_hp"]);
    $email = htmlspecialchars($data["email"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];

    if ($file_name == null) {

        $query = "UPDATE admin
        SET nama = '$nama',
        alamat = '$alamat',
        no_hp = '$no_hp ',
        email = '$email',
        waktu_buat = now()

        WHERE id_admin = '$id'";

        // query insert data
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    } else {

        if (file_exists('../../assets/img/admin/' . $gambar)) {
            unlink('../../assets/img/admin/' . $gambar);
        }

        move_uploaded_file($file_temp_name, '../../assets/img/admin/' . $file_name . '');
        $query = "UPDATE admin
            SET nama = '$nama',
            alamat = '$alamat',
            no_hp = '$no_hp ',
            email = '$email',
            gambar = '$file_name',
            waktu_buat = now()
    
            WHERE id_admin = '$id'";

        // query insert data
        mysqli_query($db, $query);

        return mysqli_affected_rows($db);
    }
}

function DataInformasiTertentu($id_informasi)
{
    global $db;
    $query = "SELECT
             g.id_gallery as 'id gallery',
             di.id_detail_informasi as 'id detail informasi',
              i.id_informasi as 'id informasi',
              a.nama as 'author',
              i.waktu_buat as 'tanggal buat',
              g.gambar as 'gambar',
              i.judul as 'judul berita',
              di.isi_informasi as 'isi'
            FROM informasi as i
            INNER JOIN detail_informasi as di ON (di.id_detail_informasi = i.id_detail_informasi)
            INNER JOIN gallery g on (di.id_gallery = g.id_gallery)
            INNER JOIN admin a on (di.id_admin = a.id_admin)
            WHERE i.id_informasi = '$id_informasi'";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function hapusDataInformasi($id_informasi, $id_detail_informasi, $id_gallery)
{
    global $db;

    $query_tampil_gallery = "SELECT * FROM gallery
    WHERE id_gallery = '$id_gallery' ";
    $result_gallery = mysqli_query($db, $query_tampil_gallery);
    $row_gallery = mysqli_fetch_array($result_gallery, MYSQLI_ASSOC);

    $gambar = $row_gallery['gambar'];

    if (file_exists('../../assets/img/gallery/informasi/' . $gambar)) {
        unlink('../../assets/img/gallery/informasi/' . $gambar);
    }

    $query = "DELETE FROM gallery WHERE id_gallery = '$id_gallery'";
    mysqli_query($db, $query);

    $query = "DELETE FROM detail_informasi WHERE id_detail_informasi = '$id_detail_informasi'";
    mysqli_query($db, $query);

    $query = "DELETE FROM informasi WHERE id_informasi = '$id_informasi'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function ubahDataInformasi($data)
{
    global $db;
    $author = 1;

    // ambil data dari tiap elemen dalam form
    // ambil data dari tiap elemen dalam form
    $id_informasi = htmlspecialchars($data["id_informasi"]);
    $id_detail_informasi = htmlspecialchars($data["id_detail_informasi"]);
    $id_gallery = htmlspecialchars($data["id_gallery"]);

    $judul = htmlspecialchars($data["judul_berita"]);
    $isi_berita = htmlspecialchars($data["isi_berita"]);
    $gambar = htmlspecialchars($data['gambar']);

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];


    if ($file_name == null) {

        if ($isi_berita != null) {
            $query = "UPDATE informasi
            SET judul = '$judul',
                waktu_buat = now()
            WHERE id_informasi = '$id_informasi'";

            mysqli_query($db, $query);

            $query = "UPDATE detail_informasi
            SET isi_informasi = '$isi_berita'
            WHERE id_detail_informasi ='$id_detail_informasi'";
            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        } else {

            $query = "UPDATE informasi
            SET judul = '$judul',
                waktu_buat = now()
            WHERE id_informasi = '$id_informasi'";

            mysqli_query($db, $query);
            return mysqli_affected_rows($db);
        }
    } else {

        if ($isi_berita != null) {
            if (file_exists('../../assets/img/gallery/informasi/' . $gambar)) {
                unlink('../../assets/img/gallery/informasi/' . $gambar);
            }

            move_uploaded_file($file_temp_name, '../../assets/img/gallery/informasi/' . $file_name . '');

            $query = "UPDATE gallery
                  SET gambar = '$file_name'
                  WHERE id_gallery = '$id_gallery'";
            mysqli_query($db, $query);

            $query = "UPDATE detail_informasi
                      SET isi_informasi = '$isi_berita'
                      WHERE id_detail_informasi ='$id_detail_informasi'";
            mysqli_query($db, $query);

            $query = "UPDATE informasi
                      SET judul = '$judul',
                        waktu_buat = now()
                WHERE id_informasi = '$id_informasi'";

            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        } else {
            if (file_exists('../../assets/img/gallery/informasi/' . $gambar)) {
                unlink('../../assets/img/gallery/informasi/' . $gambar);
            }

            move_uploaded_file($file_temp_name, '../../assets/img/gallery/informasi/' . $file_name . '');

            $query = "UPDATE gallery
                  SET gambar = '$file_name'
                  WHERE id_gallery = '$id_gallery'";
            mysqli_query($db, $query);

            $query = "UPDATE informasi
                      SET judul = '$judul',
                        waktu_buat = now()
                WHERE id_informasi = '$id_informasi'";

            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        }
    }
}

function tambahDataInformasi($data)
{

    global $db;
    $author = 1;

    // ambil data dari tiap elemen dalam form
    $id_informasi = htmlspecialchars($data["id_informasi"]);
    $id_detail_informasi = htmlspecialchars($data["id_detail_informasi"]);
    $id_gallery = htmlspecialchars($data["id_gallery"]);

    $judul = htmlspecialchars($data["judul_berita"]);
    $isi_berita = htmlspecialchars($data["isi_berita"]);

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];

    move_uploaded_file($file_temp_name, '../../assets/img/gallery/informasi/' . $file_name . '');


    $query = "INSERT INTO gallery (id_gallery, gambar) VALUES ('$id_gallery','$file_name')";
    mysqli_query($db, $query);

    $query = "INSERT INTO detail_informasi(id_detail_informasi, id_admin, isi_informasi, id_gallery) VALUES
              ('$id_detail_informasi','$author','$isi_berita','$id_gallery')";
    mysqli_query($db, $query);

    $query = "INSERT INTO informasi(ID_INFORMASI, ID_ADMIN, JUDUL, ID_DETAIL_INFORMASI)
                VALUES ('$id_informasi','$author','$judul','$id_detail_informasi')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function limitDataInformasi()
{
    global $db;
    $query = "SELECT
              g.id_gallery as 'id gallery',
              di.id_detail_informasi as 'id detail informasi',
              i.id_informasi as 'id informasi',
              a.nama as 'author',
              i.waktu_buat as 'tanggal buat',
              di.id_gallery as 'gambar',
              i.judul as 'judul berita',
              di.isi_informasi as 'isi'
            FROM informasi as i
            INNER JOIN detail_informasi as di ON (di.id_detail_informasi = i.id_detail_informasi)
            INNER JOIN gallery g on (di.id_gallery = g.id_gallery)
            INNER JOIN admin a on (di.id_admin = a.id_admin);";
    $result = mysqli_query($db, $query);
    $jumlah_data = mysqli_num_rows($result);

    return $jumlah_data;
}

function cariJudulInformasi($keyword)
{
    $query = "SELECT
    g.id_gallery as 'id gallery',
    di.id_detail_informasi as 'id detail informasi',
    i.id_informasi as 'id informasi',
    a.nama as 'author',
    i.waktu_buat as 'tanggal buat',
    di.id_gallery as 'gambar',
    i.judul as 'judul berita',
    di.isi_informasi as 'isi'
         FROM informasi as i
         INNER JOIN detail_informasi as di ON (di.id_detail_informasi = i.id_detail_informasi)
        INNER JOIN gallery g on (di.id_gallery = g.id_gallery)
        INNER JOIN admin a on (di.id_admin = a.id_admin)
        WHERE
        i.judul LIKE '%$keyword%'";

    return query($query);
}

function semuaDataKategori()
{
    global $db;
    $query = "SELECT * FROM kategori";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function semuaDataGallery()
{
    global $db;
    $query = "SELECT * FROM gallery";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function DataKategoriTertentu($id_kategori)
{
    global $db;
    $query = "SELECT * FROM kategori WHERE id_kategori = '$id_kategori'";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function ubahDataKategori($data)
{
    global $db;

    // ambil data dari tiap elemen dalam form
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $nama_kategori = htmlspecialchars($data["nama_kategori"]);
    $query = "UPDATE kategori
                     SET nama_kategori = '$nama_kategori',
                     waktu_buat = now()
              WHERE id_kategori = '$id_kategori'";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapusDataKategori($id_gallery)
{
    global $db;

    $query = "DELETE FROM kategori
            WHERE id_kategori = '$id_gallery'";

    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function tambahDataKategori($data)
{
    global $db;

    // ambil data dari tiap elemen dalam form
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $nama_kategori = htmlspecialchars($data["nama_kategori"]);
    $query = "INSERT INTO kategori(id_kategori, nama_kategori)
                VALUES ('$id_kategori','$nama_kategori')";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function cariNamaKategori($keyword)
{
    $query = "SELECT * FROM kategori
                WHERE nama_kategori
                LIKE '%$keyword%'";

    return query($query);
}

function limitDataDestinasi()
{
    global $db;

    $query = "SELECT       
    ds.id_destinasi as 'id destinasi',
    g.id_gallery as 'id gallery',
    ds.id_kategori as 'kategori',
    g.gambar as 'gambar',
    ds.nama_destinasi as 'nama destinasi',
    ds.keterangan as 'keterangan',
    a.nama as 'author',
    ds.waktu_buat as 'tanggal buat'
    FROM destinasi as ds
    INNER JOIN gallery as g ON (g.id_gallery = ds.id_gallery)
    INNER JOIN kategori as k ON (k.id_kategori = ds.id_kategori)
    INNER JOIN admin a on (a.id_admin = ds.id_admin)";

    $result = mysqli_query($db, $query);
    $jumlah_data = mysqli_num_rows($result);

    return $jumlah_data;
}

function cariNamaDestinasi($keyword)
{
    $query = "SELECT       
    ds.id_destinasi as 'id destinasi',
    g.id_gallery as 'id gallery',
    ds.id_kategori as 'kategori',
    g.gambar as 'gambar',
    ds.nama_destinasi as 'nama destinasi',
    ds.keterangan as 'keterangan',
    a.nama as 'author',
    ds.waktu_buat as 'tanggal buat'
    FROM destinasi as ds
    INNER JOIN gallery as g ON (g.id_gallery = ds.id_gallery)
    INNER JOIN kategori as k ON (k.id_kategori = ds.id_kategori)
    INNER JOIN admin a on (a.id_admin = ds.id_admin)
    WHERE
    ds.nama_destinasi LIKE '%$keyword%'";

    return query($query);
}

function DataDestinasiTertentu($id_destinasi)
{
    global $db;
    $query = "SELECT       
                ds.id_destinasi as 'id destinasi',
                g.id_gallery as 'id gallery',
                ds.id_kategori as 'kategori',
                g.gambar as 'gambar',
                ds.nama_destinasi as 'nama destinasi',
                ds.keterangan as 'keterangan',
                k.nama_kategori as 'nama kategori',
                a.nama as 'author',
                ds.waktu_buat as 'tanggal buat'
                FROM destinasi as ds
                INNER JOIN gallery as g ON (g.id_gallery = ds.id_gallery)
                INNER JOIN kategori as k ON (k.id_kategori = ds.id_kategori)
                INNER JOIN admin a on (a.id_admin = ds.id_admin)
                WHERE ds.id_destinasi = '$id_destinasi'";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function ubahDataDestinasi($data)
{
    global $db;
    $author = 1;

    // ambil data dari tiap elemen dalam form
    $id_destinasi = htmlspecialchars($data["id_destinasi"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $id_gallery = htmlspecialchars($data["id_gallery"]);

    $nama_destinasi = htmlspecialchars($data["nama_destinasi"]);
    $keterangan = htmlspecialchars($data["keterangan"]);
    $gambar = htmlspecialchars($data["gambar"]);

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];


    if ($file_name == null) {
        if ($keterangan != null) {
            $query = "UPDATE destinasi
            SET nama_destinasi = '$nama_destinasi',
                keterangan ='$keterangan',
                id_kategori = '$id_kategori',
                id_gallery  = '$id_gallery',
                waktu_buat = now()
            WHERE id_destinasi = '$id_destinasi'";

            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        } else {
            $query = "UPDATE destinasi
        SET nama_destinasi = '$nama_destinasi',
            id_kategori = '$id_kategori',
            id_gallery  = '$id_gallery',
            waktu_buat = now()
        WHERE id_destinasi = '$id_destinasi'";

            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        }
    } else {
        if ($keterangan != null) {
            if (file_exists('../../assets/img/gallery/destinasi/' . $gambar)) {
                unlink('../../assets/img/gallery/destinasi/' . $gambar);
            }

            move_uploaded_file($file_temp_name, '../../assets/img/gallery/destinasi/' . $file_name . '');

            $query = "UPDATE gallery
                  SET gambar = '$file_name'
                  WHERE id_gallery = '$id_gallery'";
            mysqli_query($db, $query);

            $query = "UPDATE destinasi
                        SET nama_destinasi = '$nama_destinasi',
                        keterangan ='$keterangan',
                        id_kategori = '$id_kategori',
                        id_gallery  = '$id_gallery',
                        waktu_buat = now()
                    WHERE id_destinasi = '$id_destinasi'";

            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        } else {

            if (file_exists('../../assets/img/gallery/destinasi/' . $gambar)) {
                unlink('../../assets/img/gallery/destinasi/' . $gambar);
            }

            move_uploaded_file($file_temp_name, '../../assets/img/gallery/destinasi/' . $file_name . '');

            $query = "UPDATE gallery
                  SET gambar = '$file_name'
                  WHERE id_gallery = '$id_gallery'";
            mysqli_query($db, $query);

            $query = "UPDATE destinasi
                        SET nama_destinasi = '$nama_destinasi',
                        id_kategori = '$id_kategori',
                        id_gallery  = '$id_gallery',
                        waktu_buat = now()
                    WHERE id_destinasi = '$id_destinasi'";

            mysqli_query($db, $query);

            return mysqli_affected_rows($db);
        }
    }
}

function tambahDataDestinasi($data)
{

    global $db;
    $author = 1;

    // ambil data dari tiap elemen dalam form
    $id_destinasi = htmlspecialchars($data["id_destinasi"]);
    $id_kategori = htmlspecialchars($data["id_kategori"]);
    $id_gallery = htmlspecialchars($data["id_gallery"]);

    $nama_destinasi = htmlspecialchars($data["nama_destinasi"]);
    $keterangan = htmlspecialchars($data["keterangan"]);

    $file_name = $_FILES['upload_gambar']['name'];
    $file_temp_name = $_FILES['upload_gambar']['tmp_name'];

    move_uploaded_file($file_temp_name, '../../assets/img/gallery/destinasi/' . $file_name . '');


    $query = "INSERT INTO gallery (id_gallery, gambar) VALUES ('$id_gallery','$file_name')";
    mysqli_query($db, $query);

    $query = "INSERT INTO destinasi (id_destinasi, nama_destinasi, keterangan,id_gallery,id_kategori,id_admin)
             VALUES ('$id_destinasi','$nama_destinasi','$keterangan','$id_gallery','$id_kategori','$author');";
    mysqli_query($db, $query);

    return mysqli_affected_rows($db);
}

function hapusDataDestinasi($id_destinasi, $id_gallery)
{
    global $db;

    $query_tampil_gallery = "SELECT * FROM gallery
    WHERE id_gallery = '$id_gallery' ";
    $result_gallery = mysqli_query($db, $query_tampil_gallery);
    $row_gallery = mysqli_fetch_array($result_gallery, MYSQLI_ASSOC);

    $gambar = $row_gallery['gambar'];

    if (file_exists('../../assets/img/gallery/destinasi/' . $gambar)) {
        unlink('../../assets/img/gallery/destinasi/' . $gambar);
    }

    $query = "DELETE FROM gallery WHERE id_gallery = '$id_gallery'";
    mysqli_query($db, $query);

    $query = "DELETE FROM destinasi WHERE id_destinasi = '$id_destinasi'";
    mysqli_query($db, $query);
    return mysqli_affected_rows($db);
}

function limitDataDestinasiTampil($keyword)
{
    global $db;

    $query = "SELECT
    ds.id_destinasi as 'id destinasi',
    g.id_gallery as 'id gallery',
    ds.id_kategori as 'kategori',
    g.gambar as 'gambar',
    ds.nama_destinasi as 'nama destinasi',
    ds.keterangan as 'keterangan',
    a.nama as 'author',
    ds.waktu_buat as 'tanggal buat'
    FROM destinasi as ds
    INNER JOIN gallery as g ON (g.id_gallery = ds.id_gallery)
    INNER JOIN kategori as k ON (k.id_kategori = ds.id_kategori)
    INNER JOIN admin a on (a.id_admin = ds.id_admin)
    GROUP BY ds.waktu_buat ASC
    LIMIT $keyword";

    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}

function semuaDataDestinasiSlider()
{
    global $db;
    $query = "SELECT 
             ds.id_destinasi as 'id destinasi',
             g.id_gallery as 'id gallery',
             ds.id_kategori as 'kategori',
             g.gambar as 'gambar',
             ds.nama_destinasi as 'nama destinasi',
             ds.keterangan as 'keterangan',
             ds.id_kategori as 'kategori',
             a.nama as 'author',
             ds.waktu_buat as 'tanggal buat'
             FROM destinasi as ds
             INNER JOIN gallery as g ON (g.id_gallery = ds.id_gallery)
             INNER JOIN kategori as k ON (k.id_kategori = ds.id_kategori)
             INNER JOIN admin a on (a.id_admin = ds.id_admin)";
    $result = mysqli_query($db, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}
