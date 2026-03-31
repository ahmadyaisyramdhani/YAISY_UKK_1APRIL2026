<?php
session_start();
include '../koneksi.php'; 

$username = $_POST['username'];
$password = $_POST['password'];

$query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
$cek = mysqli_num_rows($query);

if($cek > 0){
    $data = mysqli_fetch_assoc($query);
    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama']     = $data['nama'];
    $_SESSION['jabatan']  = $data['jabatan']; 
    $_SESSION['status']   = "login";

    if($data['jabatan'] == "admin"){
        header("location:../admin/dashboard_admin.php");
    } else {
        header("location:../siswa/tampilanweb.php");
    }
} 

else {
    header("location:../siswa/login.php?pesan=gagal");
    exit;
}
?>