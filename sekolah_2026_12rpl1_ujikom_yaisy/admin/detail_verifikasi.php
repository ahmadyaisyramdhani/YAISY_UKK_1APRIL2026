<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['jabatan']) || $_SESSION['jabatan'] != "admin") {
    header("location:../siswa/login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT tb_isipengaduan.*, tb_user.nama FROM tb_isipengaduan 
                                 INNER JOIN tb_user ON tb_isipengaduan.id_user = tb_user.id_user 
                                 WHERE id = '$id'");
$data = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Verifikasi</title>
    <script src="https://kit.fontawesome.com/e8c5ddf50d.js" crossorigin="anonymous"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        body { 
            background: #0000ff; 
            min-height: 100vh; 
            display: flex; justify-content: center; align-items: center; 
            padding: 20px; 
        }

        .container { 
            background: white; 
            width: 100%; 
            max-width: 550px;
            padding: 21px; 
            border-radius: 30px; 
            box-shadow: 0 10px 30px rgba(0,0,0,0.3);
            position: relative;
        }

        .back-link { 
            position: absolute; 
            top: 35px; 
            left: 35px; 
            color: #333; 
            font-size: 22px; 
            transition: 0.3s; 
        }
        .back-link:hover { transform: scale(1.2); color: #0000ff; }

        h2 { 
            text-align: center; 
            color: #0000ff; 
            margin-bottom: 30px; 
            text-transform: lowercase; 
            font-weight: bold; 
            font-size: 26px;
        }

        .info-row { display: flex; margin-bottom: 12px; font-size: 16px; }
        .label { width: 130px; font-weight: bold; color: #444; text-transform: lowercase; }
        .pembatas { width: 20px; color: #444; }
        .value { flex: 1; color: #333; text-transform: lowercase; }

        hr { border: none; border-top: 1px dashed #ddd; margin: 25px 0; }

        .form-grup { margin-bottom: 15px; }
        .form-grup label { 
            display: block; 
            font-size: 15px; 
            font-weight: bold; 
            margin-bottom: 8px; 
            text-transform: lowercase; 
            color: #444;
        }
        
        select, textarea { 
            width: 100%; 
            padding: 12px; 
            border: 2px solid #eee; 
            border-radius: 12px; 
            outline: none; 
            font-size: 15px; 
            transition: 0.3s;
            background: #fdfdfd;
        }
        select:focus, textarea:focus { border-color: #0000ff; background: white; }
        textarea { height: 90px; resize: none; }

        .btn-kirim { 
            width: 100%; 
            padding: 14px; 
            background: #0000ff; 
            color: white; 
            border: none; 
            border-radius: 12px; 
            font-weight: bold; 
            font-size: 16px;
            cursor: pointer; 
            transition: 0.3s; 
            text-transform: lowercase;
            margin-top: 10px;
        }
        .btn-kirim:hover { background: #0000cc; transform: translateY(-2px); box-shadow: 0 5px 15px rgba(0,0,255,0.3); }
    </style>
</head>
<body>
    <div class="container">
        <a href="riwayat_pengaduan.php" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>        
        <h2>detail pengaduan</h2>
        <div class="info-row"><div class="label">pelapor</div><div class="pembatas">:</div><div class="value"><?php echo $data['nama']; ?></div></div>
        <div class="info-row"><div class="label">judul</div><div class="pembatas">:</div><div class="value"><?php echo $data['judul']; ?></div></div>
        <div class="info-row"><div class="label">kategori</div><div class="pembatas">:</div><div class="value"><?php echo $data['kategori']; ?></div></div>
        <div class="info-row"><div class="label">lokasi</div><div class="pembatas">:</div><div class="value"><?php echo $data['lokasi']; ?></div></div>
        <div class="info-row"><div class="label">keterangan</div><div class="pembatas">:</div><div class="value"><?php echo $data['keterangan']; ?></div></div>
        <hr>
        <form action="../proses/proses_verifikasi.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            <div class="form-grup">
                <label>status :</label>
                <select name="status">
                    <option value="menunggu" <?php if($data['status']=='menunggu') echo 'selected'; ?>>menunggu</option>
                    <option value="proses" <?php if($data['status']=='proses') echo 'selected'; ?>>proses</option>
                    <option value="selesai" <?php if($data['status']=='selesai') echo 'selected'; ?>>selesai</option>
                </select>
            </div>
            <div class="form-grup">
                <label>feedback :</label>
                <textarea name="feedback" placeholder="tulis tanggapan admin di sini..."><?php echo $data['feedback']; ?></textarea>
            </div>
            <button type="submit" class="btn-kirim">kirim</button>
        </form>
    </div>
</body>
</html>