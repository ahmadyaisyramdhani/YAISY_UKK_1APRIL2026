<?php
session_start();
include '../koneksi.php';

if (!isset($_SESSION['jabatan']) || $_SESSION['jabatan'] != "admin") {
    header("location:../siswa/login.php?pesan=Login-Dulu-Bosss!");
    exit;
}

$filter_id    = isset($_GET['f_id']) ? $_GET['f_id'] : '';
$filter_tgl   = isset($_GET['f_tgl']) ? $_GET['f_tgl'] : '';
$filter_nama  = isset($_GET['f_nama']) ? $_GET['f_nama'] : '';
$filter_kat   = isset($_GET['f_kategori']) ? $_GET['f_kategori'] : '';
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pengaduan - Admin</title>
    <script src="https://kit.fontawesome.com/e8c5ddf50d.js" crossorigin="anonymous"></script>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; font-family: 'Segoe UI', sans-serif; }
        
        body { 
            background-color: #ffffff;
            display: flex; 
            flex-direction: column; 
            align-items: center; 
            min-height: 100vh; 
            padding: 40px 20px; 
        }
        
        .container { width: 100%; max-width: 1100px; }
        
        .back-btn { 
            position: absolute; 
            top: 20px; 
            left: 20px; 
            color: #000; 
            font-size: 24px; 
            text-decoration: none; 
            transition: 0.2s; 
        }
        .back-btn:hover { transform: scale(1.2); color: #0000ff; }
        
        h1 { 
            text-align: center; 
            color: #0000ff;
            text-transform: lowercase; 
            margin-bottom: 30px; 
            font-weight: bold; 
            font-size: 32px;
        }

        .custom-filter {
            background: #0000ff; 
            padding: 25px;
            border-radius: 20px;
            margin-bottom: 40px;
            display: flex;
            flex-wrap: wrap;
            gap: 15px;
            justify-content: center;
            align-items: flex-end;
            box-shadow: 0 10px 20px rgba(0,0,255,0.2);
        }

        .input-group { display: flex; flex-direction: column; gap: 5px; }
        .input-group label { color: white; font-size: 13px; text-transform: lowercase; margin-left: 5px; font-weight: 600; }
        
        .input-group input, .input-group select {
            padding: 10px 15px;
            border-radius: 10px;
            border: none;
            background: white;
            color: #333;
            outline: none;
            width: 170px;
            font-size: 14px;
        }

        .btn-search { 
            background: white; 
            color: black; 
            border: none; 
            width: 42px;
            height: 40px;
            border-radius: 10px; 
            cursor: pointer; 
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-search:hover { transform: scale(1.10); }

        .btn-clear {
            background: white;
            color: #ff0000;
            width: 42px;
            height: 40px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 18px;
            transition: 0.3s;
        }
        .btn-clear:hover { transform: scale(1.10); }

        table { width: 100%; border-collapse: collapse; text-align: center; }
        
        thead th { 
            background-color: #0000ff; 
            color: #fff; 
            font-weight: bold; 
            padding: 15px; 
            text-transform: lowercase; 
        }

        tbody td { 
            color: #000; 
            padding: 18px 10px; 
            font-size: 15px; 
            text-transform: lowercase; 
            border-bottom: 1px solid #ddd;
        }

        .status-badge { font-weight: bold; }

        .btn-detail { 
            border: 2px solid #000; 
            padding: 5px 18px; 
            border-radius: 20px; 
            text-decoration: none; 
            color: #fff; 
            background: #000; 
            font-size: 13px; 
            font-weight: bold; 
            transition: 0.3s;
            display: inline-block;
            text-transform: lowercase;
        }
        .btn-detail:hover { transform: scale(1.05); background: #333; }

        @media (max-width: 768px) {
            .input-group input, .input-group select { width: 100%; }
            .custom-filter { flex-direction: column; align-items: stretch; }
            .btn-search, .btn-clear { width: 100%; }
        }
    </style>
</head>
<body>

    <a href="dashboard_admin.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i></a>

    <div class="container">
        <h1>riwayat pengaduan</h1>

        <form action="" method="GET" class="custom-filter">
            <div class="input-group">
                <label>id user</label>
                <input type="number" name="f_id" placeholder="..." value="<?php echo $filter_id; ?>">
            </div>
            
            <div class="input-group">
                <label>tanggal</label>
                <input type="date" name="f_tgl" value="<?php echo $filter_tgl; ?>">
            </div>

            <div class="input-group">
                <label>nama user</label>
                <input type="text" name="f_nama" placeholder="cari nama..." value="<?php echo $filter_nama; ?>">
            </div>

            <div class="input-group">
                <label>kategori</label>
                <select name="f_kategori">
                    <option value="">semua</option>
                    <option value="sarana & prasarana" <?php if($filter_kat == 'sarana & prasarana') echo 'selected'; ?>>sarana & prasarana</option>
                    <option value="kebersihan" <?php if($filter_kat == 'kebersihan') echo 'selected'; ?>>kebersihan</option>
                    <option value="keamanan" <?php if($filter_kat == 'keamanan') echo 'selected'; ?>>keamanan</option>
                    <option value="lainnya" <?php if($filter_kat == 'lainnya') echo 'selected'; ?>>lainnya</option>
                </select>
            </div>

            <button type="submit" class="btn-search" title="Cari">
                <i class="fa-solid fa-magnifying-glass"></i>
            </button>

            <?php if($filter_id != '' || $filter_tgl != '' || $filter_nama != '' || $filter_kat != ''): ?>
                <a href="riwayat_pengaduan.php" class="btn-clear" title="Hapus Filter">
                    <i class="fa-solid fa-trash-can"></i>
                </a>
            <?php endif; ?>
        </form>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nama</th>
                    <th>kategori</th>
                    <th>tgl</th>
                    <th>status</th>
                    <th>feedback</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT tb_isipengaduan.*, tb_user.nama 
                        FROM tb_isipengaduan 
                        INNER JOIN tb_user ON tb_isipengaduan.id_user = tb_user.id_user 
                        WHERE 1=1";

                if ($filter_id != '')   { $sql .= " AND tb_isipengaduan.id_user = '$filter_id'"; }
                if ($filter_tgl != '')  { $sql .= " AND DATE(tb_isipengaduan.tgl_pengaduan) = '$filter_tgl'"; }
                if ($filter_nama != '') { $sql .= " AND tb_user.nama LIKE '%$filter_nama%'"; }
                if ($filter_kat != '')  { $sql .= " AND tb_isipengaduan.kategori = '$filter_kat'"; }

                $sql .= " ORDER BY tb_isipengaduan.id DESC";
                $query = mysqli_query($koneksi, $sql);

                if (mysqli_num_rows($query) > 0) {
                    while ($data = mysqli_fetch_array($query)) {
                ?>
                    <tr>
                        <td><?php echo $data['id']; ?></td>
                        <td><?php echo $data['nama']; ?></td>
                        <td><?php echo $data['kategori']; ?></td>
                        <td><?php echo date('d/m/y', strtotime($data['tgl_pengaduan'])); ?></td>
                        <td>
                            <span class="status-badge" style="color: <?php 
                                if($data['status'] == 'menunggu') echo '#ff0000'; 
                                elseif($data['status'] == 'proses') echo '#cc9900'; 
                                else echo '#00aa00'; ?>;">
                                <?php echo $data['status']; ?>
                            </span>
                        </td>
                        <td><?php echo (empty($data['feedback'])) ? "-" : "terisi"; ?></td>
                        <td>
                            <a href="detail_verifikasi.php?id=<?php echo $data['id']; ?>" class="btn-detail">detail</a>
                        </td>
                    </tr>
                <?php
                    }
                } else {
                    echo "<tr><td colspan='7' style='padding:30px;'>data tidak ditemukan.</td></tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>