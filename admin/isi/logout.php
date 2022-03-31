<?php

session_start();
session_destroy();
echo '<script>alert("Anda Telah Logout");window.location="../isi/login.php"</script>';
exit();
