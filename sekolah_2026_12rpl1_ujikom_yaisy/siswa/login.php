<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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
        }

        .login-box {
            background: white;
            width: 100%;
            max-width: 360px;
            padding: 35px;
            border-radius: 16px;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            transition: 0.3s;
        }

        .login-box h2 {
            text-align: center;
            color: #0000ff;
            text-transform: lowercase;
        }

        .input-group {
            margin-bottom: 18px;
        }

        .input-group label {
            display: block;
            font-size: 14px;
            margin-bottom: 5px;
            text-transform: lowercase;
        }

        .input-group input {
            width: 100%;
            padding: 12px;
            border-radius: 10px;
            border: 1px solid #ccc;
            outline: none;
        }

        .input-group input:focus {
            border-color: #0000ff;
        }

        .options {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 14px;
            text-transform: lowercase;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            border: none;
            border-radius: 10px;
            background: #0000ff;
            color: white;
            font-size: 16px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            text-transform: lowercase;
        }

        .btn-login:hover {
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
            transition: 0.3s;
        }

        .back-link:hover {
            transform: scale(1.2);
        }

        @media (max-width: 480px) {
            .login-box {
                padding: 25px;
                max-width: 100%;
            }

            .back-link {
                top: 15px;
                left: 15px;
                font-size: 20px;
            }

            .login-box h2 {
                font-size: 22px;
            }
        }

        @media (max-height: 500px) {
            body {
                align-items: flex-start;
                padding-top: 60px;
            }
        }
    </style>
</head>
<body>
    <?php 
    if(isset($_GET['pesan'])){
        if($_GET['pesan'] == "gagal"){
            echo "<script>alert('Username atau Password salah!');</script>";
        }
    }
    ?>
    
    <a href="hal_awal.php" class="back-link"><i class="fa-solid fa-arrow-left"></i></a>
    
    <div class="login-box">
        <h2>Login</h2>
        <br>
        <form action="../proses/proses_login.php" method="POST">
            <div class="input-group">
                <label>Username</label>
                <input type="text" name="username" required placeholder="masukkan username">
            </div>

            <div class="input-group">
                <label>Password</label>
                <input type="password" name="password" id="password" required placeholder="masukkan password">
            </div>

            <div class="options">
                <input type="checkbox" id="showPassword">
                <label for="showPassword">tampilkan password</label>
            </div>
            <br>
            <button type="submit" name="login" class="btn-login">masuk</button>
        </form>
    </div>

    <script>
        const showPassword = document.getElementById("showPassword");
        const passwordInput = document.getElementById("password");
        showPassword.addEventListener("change", function() {
            passwordInput.type = this.checked ? "text" : "password";
        });
    </script>
</body>
</html>