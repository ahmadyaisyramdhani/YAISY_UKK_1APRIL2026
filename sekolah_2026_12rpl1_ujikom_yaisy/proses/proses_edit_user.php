<?php
session_start();
include '../koneksi.php';

$id_user_lama = $_POST['id_user_lama'];
$nama         = $_POST['nama'];
$kelas        = $_POST['kelas'];
$username     = $_POST['username'];
$password     = $_POST['password'];
$jabatan      = $_POST['jabatan'];

$sql = "UPDATE tb_user SET 
        nama     = '$nama', 
        kelas    = '$kelas', 
        username = '$username', 
        password = '$password', 
        jabatan  = '$jabatan' 
        WHERE id_user = '$id_user_lama'";

$query = mysqli_query($koneksi, $sql);

if($query) {
    echo "<script>alert('Data berhasil diperbarui!'); window.location.href='../admin/data_user.php';</script>";
} else {
    echo "Gagal update: " . mysqli_error($koneksi);
}
?>