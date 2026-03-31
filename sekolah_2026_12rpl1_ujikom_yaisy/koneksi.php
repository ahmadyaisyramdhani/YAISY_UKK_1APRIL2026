<?php
$host = "localhost";    
$user = "root";         
$pass = "";            
$db   = "2026_ujikom_12rpl1_yaisy"; 

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
