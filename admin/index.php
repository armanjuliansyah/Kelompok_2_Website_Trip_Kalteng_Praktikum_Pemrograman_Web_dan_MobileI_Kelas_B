<?php

$url = $_SERVER['REQUEST_URI'];

header('location: ' . $url . 'isi/login.php');

exit();
