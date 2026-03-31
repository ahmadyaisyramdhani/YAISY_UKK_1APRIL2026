<?php
session_start(); 
date_default_timezone_set('Asia/Jakarta');
include '../koneksi.php';

if (!isset($_SESSION['status']) || $_SESSION['status'] != "login") {
    header("location:../siswa/login.php?pesan=Login-Dulu-Bosss!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Laporan</title>
    <script src="https://kit.fontawesome.com/e8c5ddf50d.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background-color: #ffffff;
            min-height: 100vh;
            padding-top: 80px; 
            padding-left: 20px;
            padding-right: 20px;
        }

        .container {
            width: 100%;
            max-width: 1100px;
            margin: 0 auto;
        }

        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: #000;
            font-size: 24px;
            text-decoration: none;
            transition: 0.3s;
        }

        .back-link:hover { transform: scale(1.2); color: #0000ff; }

        h1 {
            text-align: center;
            font-weight: bold;
            margin-bottom: 40px;
            text-transform: lowercase;
            color: #0000ff;
            font-size: 32px;
        }

        .table-responsive { overflow-x: auto; }

        table {
            width: 100%;
            border-collapse: collapse;
            background-color: white;
        }

        thead th {
            background-color: #0000ff;
            color: #fff;
            font-weight: bold;
            padding: 15px 10px;
            text-transform: lowercase;
            border: none;
        }

        tbody td {
            color: #000;
            padding: 15px 10px;
            font-size: 16px;
            text-transform: lowercase;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        .btn-detail {
            background-color: #000000;
            color: #fff;
            padding: 6px 20px;
            border-radius: 20px;
            text-decoration: none;
            font-size: 13px;
            font-weight: bold;
            display: inline-block;
            transition: 0.3s;
            text-transform: lowercase;
            border: 2px solid #000;
        }

        .btn-detail:hover {
            background-color: #333;
            transform: scale(1.02); 
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }

        .status-menunggu { color: #ff0000; font-weight: bold; } 
        .status-proses { color: #cc9900; font-weight: bold; }  
        .status-selesai { color: #00aa00; font-weight: bold; } 

        @media (max-width: 600px) {
            h1 { font-size: 24px; }
            tbody td, thead th { font-size: 14px; padding: 10px 5px; }
        }
    </style>
</head>
<body>
    <a href="tampilanweb.php" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>
    
    <div class="container">
        <h1>Riwayat Pengaduan</h1>
        
        <div class="table-responsive">
            <table>
                <thead>
                    <tr>
                        <th>tanggal</th>
                        <th>judul</th>
                        <th>kategori</th>
                        <th>status</th>
                        <th>aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $id_user_login = $_SESSION['id_user'];
                    $sql = "SELECT * FROM tb_isipengaduan WHERE id_user = '$id_user_login' ORDER BY id DESC";
                    $query = mysqli_query($koneksi, $sql);
                    
                    if (mysqli_num_rows($query) > 0) {
                        while ($data = mysqli_fetch_array($query)) {
                            // Penentuan Class Status
                            $s = $data['status'];
                            $c = ($s == 'menunggu') ? 'status-menunggu' : (($s == 'proses') ? 'status-proses' : 'status-selesai');
                    ?>
                        <tr>
                            <td><?php echo date('d/m/y H:i', strtotime($data['tgl_pengaduan'])); ?></td>
                            <td><?php echo $data['judul']; ?></td>
                            <td><?php echo $data['kategori']; ?></td>
                            <td class="<?php echo $c; ?>"><?php echo $s; ?></td>
                            <td>
                                <a href="detail_laporan.php?id=<?php echo $data['id']; ?>" class="btn-detail">detail</a>
                            </td>
                        </tr>
                    <?php
                        }
                    } else {
                        echo "<tr><td colspan='5' style='text-align:center; padding: 30px;'>belum ada laporan.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>