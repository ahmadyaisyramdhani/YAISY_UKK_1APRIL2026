<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['jabatan']) || $_SESSION['jabatan'] != "admin") {
    echo "<script>alert('Akses Ditolak! Anda bukan admin.'); window.location.href='../siswa/login.php';</script>";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $id       = mysqli_real_escape_string($koneksi, $_POST['id']); 
    $status   = mysqli_real_escape_string($koneksi, $_POST['status']);
    $feedback = mysqli_real_escape_string($koneksi, $_POST['feedback']);

    if (!empty($id)) {
        $sql = "UPDATE tb_isipengaduan SET 
                status = '$status', 
                feedback = '$feedback' 
                WHERE id = '$id'";

        $query = mysqli_query($koneksi, $sql);

        if($query) {
            echo "<script>alert('Verifikasi Berhasil Diperbarui!'); window.location.href='../admin/riwayat_pengaduan.php';</script>";
        } else {
            echo "Error Database: " . mysqli_error($koneksi);
        }
    } else {
        echo "<script>alert('ID Laporan Tidak Ditemukan!'); window.history.back();</script>";
    }

} else {
    header("location:../admin/riwayat_pengaduan.php");
    exit;
}
?>