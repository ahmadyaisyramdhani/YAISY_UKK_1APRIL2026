<?php 
session_start();
include '../koneksi.php';

if($_SESSION['jabatan'] != "admin"){
    header("location:../siswa/login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data User</title>
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
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .wrapper {
            width: 100%;
            max-width: 1450px;
            margin-top: 20px;
        }

        .header-area {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            position: relative;
        }

        .back-btn {
            font-size: 24px;
            color: #000;
            text-decoration: none;
        }

        h1 {
            color: #0000ff;
            position: absolute;
            left: 50%;
            transform: translateX(-50%);
            font-weight: bold;
            text-transform: lowercase;
        }

        .btn-tambah {
            padding: 5px 15px;
            border-radius: 5px;
            text-decoration: none;
            color: #000;
            font-weight: bold;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        thead th {
            text-align: center;
            background-color: #0000ff;
            color: #ffffff;
            padding: 12px;
            text-transform: lowercase;
        }

        tbody td {
            text-align: center;
            padding: 10px;
            border-bottom: 1px solid #000000; 
            text-transform: lowercase;
        }

        .action-cell {
            text-align: center; 
        }

        .btn-edit, .btn-hapus {
            padding: 4px 12px; 
            border-radius: 3px;
            text-decoration: none;
            color: #000000;
            font-size: 14px;
            display: inline-block;
            transition: 0.2s;
            margin: 0 5px; 
        }

        .btn-edit {
            background-color: #f2ca26;
        }

        .btn-hapus {
            background-color: #ff1a1a;
        }

        .btn-edit:hover, .btn-hapus:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="header-area">
            <a href="dashboard_admin.php" class="back-btn"><i class="fa-solid fa-arrow-left"></i></a>
            <h1>Data User</h1>
            <a href="tambah_data.php" class="btn-tambah">Tambah Data</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>id</th>
                    <th>nama</th>
                    <th>kelas</th>
                    <th>username</th>
                    <th>password</th>
                    <th>jabatan</th>
                    <th>aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $sql = "SELECT * FROM tb_user ORDER BY id_user ASC";
                $query = mysqli_query($koneksi, $sql);
                while ($data = mysqli_fetch_array($query)) {
                ?>
                <tr>
                    <td><?php echo $data['id_user']; ?></td>
                    <td><?php echo $data['nama']; ?></td>
                    <td><?php echo $data['kelas']; ?></td>
                    <td><?php echo $data['username']; ?></td>
                    <td><?php echo $data['password']; ?></td>
                    <td><?php echo $data['jabatan']; ?></td>
                    <td class="action-cell">
                        <a href="edit_user.php?id=<?php echo $data['id_user']; ?>" class="btn-edit">edit</a>
                        <a href="../proses/proses_hapus_user.php?id=<?php echo $data['id_user']; ?>" 
   class="btn-hapus"
   onclick="return confirm('Yakin mau hapus data <?php echo $data['nama']; ?>?')">
   hapus
</a>
                    </td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>