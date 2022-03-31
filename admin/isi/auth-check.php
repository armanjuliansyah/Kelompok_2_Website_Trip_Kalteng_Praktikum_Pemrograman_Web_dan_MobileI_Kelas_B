<?php

session_start();

if ($_SESSION['id_session_login']) {
} else {
    header("Location:../isi/login.php");
}
