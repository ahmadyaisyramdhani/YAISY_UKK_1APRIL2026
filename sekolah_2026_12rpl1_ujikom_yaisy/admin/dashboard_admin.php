<?php 
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login" || $_SESSION['jabatan'] != "admin") {
    header("Location: ../siswa/login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #0000ff;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        header {
            width: 100%;
            height: 100px;
            background-color: #0000ff;
            display: flex;
            align-items: center;
            padding: 0 40px;
            color: white;
        }

        .logo-box {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        .logo-box img {
            width: 50px;
        }

        .logo-text h2 {
            font-size: 14px;
            font-weight: normal;
        }

        .logo-text h1 {
            font-size: 20px;
            text-transform: lowercase;
        }

        .main-content {
            flex: 1;
            background-color: #ffffff;
            border-radius: 50px 50px 0 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .badge-app {
            background-color: #0000ff;
            color: white;
            padding: 6px 25px;
            border-radius: 20px;
            font-size: 14px;
            font-weight: bold;
            margin-bottom: 20px;
            display: inline-block;
            text-transform: uppercase;
        }

        .welcome-text {
            text-align: center;
            margin-bottom: 50px;
        }

        .welcome-text h1 {
            font-size: 40px;
            color: #0000ff;
            font-weight: bold;
            text-transform: lowercase;
        }

        .button-grid {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
            gap: 20px;
            width: 100%;
            max-width: 900px;
        }

        .btn-menu {
            width: 220px;
            height: 60px;
            background-color: #0000ff;
            color: white;
            text-decoration: none;
            border-radius: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 18px;
            text-transform: lowercase;
            transition: 0.3s;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
        }

        .btn-menu:hover {
            transform: scale(1.02);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }

        .btn-logout {
            background-color: #ff0000;
        }

        @media (max-width: 768px) {
            header { padding: 0 20px; }
            .welcome-text h1 { font-size: 28px; }
            .button-grid { flex-direction: column; }
            .btn-menu { width: 100%; max-width: 300px; }
            .main-content { border-radius: 30px 30px 0 0; }
        }
    </style>
</head>
<body>

    <header>
        <div class="logo-box">
           <img src="https://www.smkmutucikampek.sch.id/wp-content/uploads/2021/06/logo_mutu_png_transparant-removebg-preview-1.png" alt="logo">
            <div class="logo-text">
                <h2>SMK MUHAMMADIYAH 1 CIKAMPEK</h2>
                <h1>halaman admin</h1>
            </div>
        </div>
    </header>

    <div class="main-content">
        <div class="badge-app">Sarprasin</div>
        
        <div class="welcome-text">
            <h1>Selamat Datang <?php echo $_SESSION['nama']; ?></h1>
        </div>

        <div class="button-grid">
            <a href="data_user.php" class="btn-menu">Data User</a>
            
            <a href="../proses/logout.php" class="btn-menu btn-logout" onclick="return confirm('apakah anda yakin ingin logout?')">
                Logout
            </a>

            <a href="riwayat_pengaduan.php" class="btn-menu">Riwayat Pengaduan</a>
        </div>
    </div>

</body>
</html>