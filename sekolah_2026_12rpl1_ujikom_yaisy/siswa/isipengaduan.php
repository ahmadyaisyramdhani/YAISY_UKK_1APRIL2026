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
    <title>Isi Pengaduan</title>
    <script src="https://kit.fontawesome.com/e8c5ddf50d.js" crossorigin="anonymous"></script>
    <style>
        * { 
            margin: 0; 
            padding: 0; 
            box-sizing: border-box; 
            font-family: 'Segoe UI', sans-serif; 
        }

        body { 
            height: 100vh;
            display: flex; 
            justify-content: center; 
            align-items: center; 
            background: #0000ff; 
            padding: 10px; 
            overflow: hidden;
        }
        
        .container { 
            background: white; 
            width: 100%; 
            max-width: 420px;
            padding: 25px 35px;
            border-radius: 20px; 
            box-shadow: 0 20px 40px rgba(0,0,0,0.5); 
        }

        h2 { 
            text-align: center; 
            color: #0000ff; 
            margin-bottom: 20px;
            font-size: 26px;
            font-weight: bold; 
            text-transform: lowercase; 
        }

        .form-grup { margin-bottom: 12px; }
        
        .form-grup label { 
            display: block; 
            font-size: 13px; 
            color: #333; 
            margin-bottom: 4px; 
            text-transform: lowercase; 
        }

        .form-grup input, .form-grup select, .form-grup textarea {
            width: 100%; 
            padding: 10px 15px;
            border: 1px solid #ccc; 
            border-radius: 10px; 
            font-size: 15px; 
            outline: none; 
            background: white; 
            transition: 0.3s;
        }

        .form-grup input:focus, .form-grup select:focus, .form-grup textarea:focus {
            border-color: #0000ff; 
            box-shadow: 0 0 5px rgba(0,0,255,0.1); 
        }

        textarea { height: 80px; resize: none; }

        .button-container { 
            margin-top: 15px; 
        }

        .btn-kirim {
            background: #0000ff; 
            color: white; 
            width: 100%; 
            padding: 12px; 
            border: none; 
            border-radius: 10px; 
            font-size: 17px; 
            font-weight: bold; 
            cursor: pointer; 
            transition: 0.3s; 
            text-transform: lowercase;
        }

        .btn-kirim:hover { 
            background: #0000cc; 
            transform: scale(1.02);
        }

        .back-link { 
            position: absolute; 
            top: 20px; 
            left: 20px; 
            color: white; 
            font-size: 24px; 
            text-decoration: none; 
            transition: 0.2s; 
        }

        .back-link:hover { transform: scale(1.2); }

        @media (max-width: 480px) {
            body { overflow-y: auto; align-items: flex-start; padding-top: 50px; }
            .container { padding: 20px; }
        }
    </style>
</head>
<body>
    <a href="tampilanweb.php" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>
    
    <div class="container">
        <h2>Isi Pengaduan</h2>
        <form action="../proses/proses_pengaduan.php" method="POST">
            <div class="form-grup">
                <label>Judul Laporan</label>
                <input type="text" name="judul" required placeholder="apa yang terjadi?">
            </div>

            <div class="form-grup">
                <label>Kategori</label>
                <select name="kategori" required>
                    <option value="">-- pilih kategori --</option>
                    <option value="sarana & prasarana">sarana & prasarana</option>
                    <option value="kebersihan">kebersihan</option>
                    <option value="keamanan">keamanan</option>
                    <option value="lainnya">lainnya</option>
                </select>
            </div>

            <div class="form-grup">
                <label>Lokasi</label>
                <input type="text" name="lokasi" required placeholder="lokasi kejadian...">
            </div>

            <div class="form-grup">
                <label>Keterangan</label>
                <textarea name="keterangan" required placeholder="ceritakan lebih detail..."></textarea>
            </div>

            <div class="button-container">
                <button type="submit" class="btn-kirim">kirim</button>
            </div>
        </form>
    </div>
</body>
</html>