<?php

require_once('../../fungsi/function.php');

require_once('../section/header.php');

if (isset($_POST["submit"])) {

    global $db;
    $username = $_POST['username'];
    $password = $_POST['password'];

    $query = mysqli_query($db, "SELECT * FROM login
    WHERE username = '$username' & md5(password='$password')");

    // Mengecek pengguna
    if (mysqli_num_rows($query) != 0) {
        $row = mysqli_fetch_assoc($query);

        // var_dump($row);
        // die();
        // Membuat session
        session_start();
        $_SESSION['id_session_login'] = $row['id_login'];

        echo "
        		<script>
        			alert('berhasil login');
        			document.location.href = '../isi/beranda.php';
        		</script>
        ";
    } else {
        echo "
        <script>
            alert('gagal login');
            document.location.href = '../isi/login.php';
        </script>
";
    }
}


?>

<div class="card " style="margin-left:520px; margin-top:140px; width: 30rem;">

    <div class="card-body">
        <h5 class="card-title">Login Admin</h5>
        <form action="" method="POST">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" class="form-control" id="username" aria-describedby="emailHelp" placeholder="masukkan username">

                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" id="password" placeholder="masukkan password">
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>




<?php require_once('../section/footer.php'); ?>