<?php 
session_start();
include '../koneksi.php'; 

if($_SESSION['jabatan'] != "admin"){
    header("location:../siswa/login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}

$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE id_user = '$id'");
$data = mysqli_fetch_array($query);

if (!$data) {
    echo "<script>alert('Data tidak ditemukan!'); window.location.href='data_user.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data User</title>
    <script src="https://kit.fontawesome.com/e8c5ddf50d.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: #0000ff; 
            padding: 20px;
            overflow: hidden; 
        }

        .back-link {
            position: absolute;
            top: 20px;
            left: 20px;
            color: white;
            font-size: 24px;
            text-decoration: none;
            transition: 0.2s;
            z-index: 10;
        }

        .back-link:hover {
            transform: scale(1.2);
        }

        .container {
            background: white;
            width: 100%;
            max-width: 380px; 
            padding: 30px; 
            border-radius: 20px; 
            box-shadow: 0 15px 35px rgba(0,0,0,0.3);
        }

        h2 {
            text-align: center;
            color: #0000ff;
            margin-bottom: 25px;
            font-size: 26px;
            font-weight: bold; 
            text-transform: lowercase;
        }

        .form-grup {
            margin-bottom: 15px;
        }

        .form-grup label {
            display: block;
            font-size: 13px;
            color: #333;
            margin-bottom: 5px;
            font-weight: 600;
            text-transform: lowercase;
        }

        .form-grup input, 
        .form-grup select {
            width: 100%;
            padding: 10px 15px;
            border: 2px solid #eee; 
            border-radius: 12px;
            font-size: 15px;
            outline: none;
            transition: 0.3s;
            background-color: #f9f9f9;
        }

        .form-grup input:focus,
        .form-grup select:focus {
            border-color: #0000ff;
            background-color: white;
        }

        .btn-kirim {
            background: #0000ff;
            color: white;
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 12px; 
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-transform: lowercase;
            margin-top: 10px;
        }

        .btn-kirim:hover {
            transform: scale(1.02);
            background: #0000cc;
        }

        @media (max-width: 400px) {
            .container { padding: 20px; }
            .back-link { top: 15px; left: 15px; }
        }
    </style>
</head>
<body>

    <a href="data_user.php" class="back-link">
        <i class="fa-solid fa-arrow-left"></i>
    </a>

    <div class="container">
        <h2>Edit Data</h2>
        
        <form action="../proses/proses_edit_user.php" method="POST">
            <input type="hidden" name="id_user_lama" value="<?php echo $data['id_user']; ?>">

            <div class="form-grup">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" value="<?php echo $data['nama']; ?>" required>
            </div>

            <div class="form-grup">
                <label>Kelas (opsional)</label>
                <input type="text" name="kelas" value="<?php echo $data['kelas']; ?>">
            </div>

            <div class="form-grup">
                <label>Username</label>
                <input type="text" name="username" value="<?php echo $data['username']; ?>" required>
            </div>

            <div class="form-grup">
                <label>Password</label>
                <input type="text" name="password" value="<?php echo $data['password']; ?>" required>
            </div>

            <div class="form-grup">
                <label>Jabatan</label>
                <select name="jabatan" required>
                    <option value="admin" <?php if($data['jabatan'] == 'admin') echo 'selected'; ?>>admin</option>
                    <option value="siswa" <?php if($data['jabatan'] == 'siswa') echo 'selected'; ?>>siswa</option>
                    <option value="staff" <?php if($data['jabatan'] == 'staff') echo 'selected'; ?>>staff</option>
                    <option value="penjaga_sekolah" <?php if($data['jabatan'] == 'penjaga_sekolah') echo 'selected'; ?>>penjaga sekolah</option>
                </select>
            </div>

            <button type="submit" class="btn-kirim">Simpan Perubahan</button>
        </form>
    </div>

</body>
</html>