<?php 
session_start();
session_destroy();

header("location:../siswa/hal_awal.php?pesan=logout");
exit;
?>