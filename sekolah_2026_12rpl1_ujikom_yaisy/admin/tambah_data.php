<?php 
session_start();

if(!isset($_SESSION['jabatan']) || $_SESSION['jabatan'] != "admin"){
    header("location:../siswa/login.php?pesan=Mau-Ngapain-Bosss!");
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data User</title>
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
        <h2>Tambah Data</h2>
        
        <form action="../proses/proses_tambah_user.php" method="POST">
            <div class="form-grup">
                <label>Nama Lengkap</label>
                <input type="text" name="nama" placeholder="..." required>
            </div>

            <div class="form-grup">
                <label>Kelas (opsional)</label>
                <input type="text" name="kelas" placeholder="...">
            </div>

            <div class="form-grup">
                <label>Username</label>
                <input type="text" name="username" placeholder="..." required>
            </div>
            
            <div class="form-grup">
                <label>Password</label>
                <input type="password" name="password" placeholder="..." required>
            </div>

            <div class="form-grup">
                <label>Jabatan</label>
                <select name="jabatan" required>
                    <option value="" disabled selected>pilih</option>
                    <option value="admin">admin</option> 
                    <option value="siswa">siswa</option>
                    <option value="staff">staff</option>
                    <option value="penjaga_sekolah">penjaga sekolah</option>
                </select>
            </div>

            <button type="submit" class="btn-kirim">Tambah Data</button>
        </form>
    </div>

</body>
</html>