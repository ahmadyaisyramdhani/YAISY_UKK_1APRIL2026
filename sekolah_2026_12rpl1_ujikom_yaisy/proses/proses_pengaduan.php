<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("location:../siswa/login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}

$judul      = mysqli_real_escape_string($koneksi, $_POST['judul']);
$kategori   = mysqli_real_escape_string($koneksi, $_POST['kategori']);
$lokasi     = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
$keterangan = mysqli_real_escape_string($koneksi, $_POST['keterangan']);
$id_user    = $_SESSION['id_user'];

$sql = "INSERT INTO tb_isipengaduan (id_user, judul, kategori, lokasi, keterangan, status, tgl_pengaduan) 
        VALUES ('$id_user', '$judul', '$kategori', '$lokasi', '$keterangan', 'menunggu', NOW())";

$query = mysqli_query($koneksi, $sql);

if($query) {
    echo "<script>
            alert('Laporan berhasil dikirim!'); 
            window.location.href='../siswa/riwayatpengaduan.php'; 
          </script>";
} else {
    echo "Terjadi Kesalahan: " . mysqli_error($koneksi);
}
?>