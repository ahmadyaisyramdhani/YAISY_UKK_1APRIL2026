<?php
session_start();

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:login.php?pesan=Login-Dulu-Bosss!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Siswa</title>
    <script src="https://kit.fontawesome.com/e8c5ddf50d.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-color: #0000ff;
            overflow-x: hidden;
        }

        header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 15px 40px;
            background-color: #0000ff;
            color: white;
            border-bottom: 1px solid rgba(255, 255, 255, 0.2);
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 15px;
        }

        header img {
            width: 50px;
            height: auto;
        }

        .header-left h5 { font-size: 12px; font-weight: normal; opacity: 0.8; }
        .header-left h1 { font-size: 20px; text-transform: lowercase; }

        .logout-btn {
            background: #ff4d4d;
            color: white;
            padding: 8px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-weight: bold;
            font-size: 14px;
            text-transform: lowercase;
            transition: 0.3s;
            border: 2px solid white;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .logout-btn:hover {
            transform: scale(1.05);
        }

        .main-content {
            flex: 1;
            background-color: white;
            border-top-left-radius: 60px; 
            border-top-right-radius: 60px;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 40px;
            margin-top: 10px; 
        }

        .web-badge {
            background: #0000ff;
            color: white;
            padding: 6px 20px;
            border-radius: 30px;
            font-size: 14px;
            font-weight: bold;
            letter-spacing: 2px;
            text-transform: uppercase;
            margin-bottom: 25px;
            box-shadow: 0 4px 10px rgba(0,0,255,0.2);
        }

        .main-content h2 {
            font-size: 42px;
            color: #0000ff;
            text-transform: lowercase;
            margin-bottom: 10px;
        }

        .main-content p {
            font-size: 20px;
            color: #666;
            margin-bottom: 45px;
            text-transform: lowercase;
            max-width: 600px;
        }

        .btn-container {
            display: flex;
            gap: 25px;
        }

        .btn-action {
            padding: 18px 40px;
            font-size: 18px;
            background: #0000ff;
            color: white;
            border: none;
            border-radius: 18px;
            cursor: pointer;
            font-weight: bold;
            transition: 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            text-decoration: none;
            text-transform: lowercase;
            box-shadow: 0 10px 20px rgba(0,0,255,0.15);
        }

        .btn-action:hover {
            background-color: black;
            transform: translateY(-8px);
            box-shadow: 0 15px 30px rgba(0,0,0,0.2);
        }

        @media (max-width: 768px) {
            header { padding: 15px 20px; }
            .header-left h1 { font-size: 16px; }
            .main-content { border-radius: 40px 40px 0 0; padding: 20px; }
            .main-content h2 { font-size: 30px; }
            .btn-container { flex-direction: column; width: 100%; max-width: 320px; }
            .btn-action { width: 100%; text-align: center; }
        }
    </style>
</head>
<body>

    <header>
        <div class="header-left">
            <img src="https://www.smkmutucikampek.sch.id/wp-content/uploads/2021/06/logo_mutu_png_transparant-removebg-preview-1.png" alt="logo">
            <div class="title-container">
                <h5>SMK MUHAMMADIYAH 1 CIKAMPEK</h5>
                <h1>Sistem Pengaduan</h1>
            </div>
        </div>
        
        <a href="../proses/logout.php" class="logout-btn" onclick="return confirm('yakin mau keluar?')">
            <i class="fa-solid fa-right-from-bracket"></i> Logout
        </a>
    </header>

    <main class="main-content">
        <div class="web-badge">Sarprasin</div>

        <h2>Selamat Datang <?php echo $_SESSION['nama']; ?></h2>
        <p>Silahkan laporkan kerusakan sarana & prasarana untuk kenyamanan belajar kita bersama.</p>

        <div class="btn-container">
            <a href="isipengaduan.php" class="btn-action">Isi Pengaduan</a>
            <a href="riwayatpengaduan.php" class="btn-action">Riwayat Pengaduan</a>
        </div>
    </main>

</body>
</html>