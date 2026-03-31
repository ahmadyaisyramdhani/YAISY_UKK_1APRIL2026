<?php
session_start();
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';

if (!isset($_SESSION['id_user'])) {
    header("location:login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}

$id_laporan = $_GET['id'];
$id_user_login = $_SESSION['id_user'];
$jabatan = $_SESSION['jabatan'];

if ($jabatan == "admin") {
    $query = mysqli_query($koneksi, "SELECT * FROM tb_isipengaduan WHERE id = '$id_laporan'");
} else {
    $query = mysqli_query($koneksi, "SELECT * FROM tb_isipengaduan WHERE id = '$id_laporan' AND id_user = '$id_user_login'");
}

$data = mysqli_fetch_array($query);

if (!$data) {
    echo "<script>alert('Laporan tidak ditemukan atau Anda tidak memiliki akses!'); window.location.href='riwayatpengaduan.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Pengaduan</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Segoe UI', sans-serif; 
        }

        body {
            background-color: #0000ff;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            width: 100%;
            max-width: 550px;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.3);
            position: relative;
        }

        .back-btn {
            position: absolute;
            top: 25px;
            left: 25px;
            text-decoration: none;
            color: #333;
            font-size: 22px;
            transition: 0.3s;
        }

        .back-btn:hover { transform: scale(1.2); color: #0000ff; }

        h2 {
            text-align: center;
            text-transform: lowercase;
            color: #0000ff;
            margin-bottom: 30px;
            font-size: 28px;
            font-weight: bold;
        }

        .info-wrapper {
            margin-bottom: 20px;
        }

        .info-group {
            display: flex;
            margin-bottom: 12px;
            font-size: 16px;
            line-height: 1.5;
            text-transform: lowercase;
        }

        .label {
            font-weight: bold;
            color: #333;
            width: 130px;
            flex-shrink: 0;
        }

        .value {
            color: #555;
            word-break: break-word;
        }

        .status-badge {
            font-weight: bold;
            text-transform: lowercase;
        }

        .feedback-box {
            margin-top: 25px;
            padding-top: 20px;
            border-top: 2px dashed #eee;
        }

        .feedback-title {
            font-weight: bold;
            color: #0000ff;
            display: block;
            margin-bottom: 8px;
            text-transform: lowercase;
        }

        .feedback-content {
            background: #f9f9f9;
            padding: 15px;
            border-radius: 10px;
            color: #666;
            font-style: italic;
            font-size: 15px;
            text-transform: lowercase;
        }

        @media (max-width: 480px) {
            .container { padding: 25px; padding-top: 60px; }
            .back-btn { top: 20px; left: 20px; }
            h2 { font-size: 24px; }
            .info-group { flex-direction: column; margin-bottom: 15px; }
            .label { width: 100%; margin-bottom: 2px; }
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="riwayatpengaduan.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i></a>

        <h2>Detail Pengaduan</h2>

        <div class="info-wrapper">
            <div class="info-group">
                <span class="label">id laporan :</span> 
                <span class="value"><?php echo $data['id']; ?></span>
            </div>
            <div class="info-group">
                <span class="label">tanggal :</span>
                <span class="value"><?php echo date('d/m/y H:i', strtotime($data['tgl_pengaduan'])); ?></span>
            </div>
            <div class="info-group">
                <span class="label">status :</span> 
                <span class="status-badge" style="color: 
                    <?php 
                        if($data['status'] == 'menunggu') echo '#ff0000'; 
                        elseif($data['status'] == 'proses') echo '#cc9900'; 
                        else echo '#00aa00'; 
                    ?>;">
                    <?php echo $data['status']; ?>
                </span>
            </div>
            <div class="info-group">
                <span class="label">pelapor :</span> 
                <span class="value"><?php echo $_SESSION['nama']; ?></span>
            </div>
            <div class="info-group">
                <span class="label">judul :</span> 
                <span class="value"><?php echo $data['judul']; ?></span>
            </div>
            <div class="info-group">
                <span class="label">kategori :</span> 
                <span class="value"><?php echo $data['kategori']; ?></span>
            </div>
            <div class="info-group">
                <span class="label">lokasi :</span> 
                <span class="value"><?php echo $data['lokasi']; ?></span>
            </div>
            <div class="info-group">
                <span class="label">keterangan :</span> 
                <span class="value"><?php echo $data['keterangan']; ?></span>
            </div>
        </div>

        <div class="feedback-box">
            <span class="feedback-title">feedback admin :</span>
            <div class="feedback-content">
                <?php 
                    echo (empty($data['feedback'])) ? "belum ada feedback dari admin." : $data['feedback']; 
                ?>
            </div>
        </div>
    </div>
</body>
</html>