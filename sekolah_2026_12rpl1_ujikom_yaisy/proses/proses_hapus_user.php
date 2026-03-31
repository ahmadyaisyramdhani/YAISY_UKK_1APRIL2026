<?php
session_start();
include '../koneksi.php';

if($_SESSION['jabatan'] != "admin"){
    header("location:../siswa/login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}

$id = $_GET['id'];

$sql = "DELETE FROM tb_user WHERE id_user = '$id'";
$query = mysqli_query($koneksi, $sql);

if($query) {
    echo "<script>
            alert('Data Berhasil Dihapus!');
            window.location.href='../admin/data_user.php';
          </script>";
} else {
    echo "Gagal menghapus: " . mysqli_error($koneksi);
}
?>