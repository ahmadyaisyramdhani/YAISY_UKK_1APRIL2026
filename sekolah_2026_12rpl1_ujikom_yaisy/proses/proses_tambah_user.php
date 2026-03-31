<?php
session_start();
include '../koneksi.php';

$nama     = $_POST['nama'];
$kelas    = $_POST['kelas'];
$username = $_POST['username'];
$password = $_POST['password'];
$jabatan  = $_POST['jabatan'];

$sql = "INSERT INTO tb_user (nama, kelas, username, password, jabatan) 
        VALUES ('$nama', '$kelas', '$username', '$password', '$jabatan')";

$query = mysqli_query($koneksi, $sql);

if($query) {
    echo "<script>alert('Data user berhasil ditambah!'); window.location.href='../admin/data_user.php';</script>";
} else {
    echo "Gagal: " . mysqli_error($koneksi);
}
?>