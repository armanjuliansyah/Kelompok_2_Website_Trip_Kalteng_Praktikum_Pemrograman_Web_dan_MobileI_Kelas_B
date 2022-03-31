<?php

$url = $_SERVER['REQUEST_URI'];

header('location: ' . $url . 'main/isi/home.php');

exit();
