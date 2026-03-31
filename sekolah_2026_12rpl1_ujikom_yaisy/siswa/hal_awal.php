<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://kit.fontawesome.com/e8c5ddf50d.js" crossorigin="anonymous"></script>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Segoe UI', sans-serif;
        }

        body {
            background: linear-gradient(135deg, #050a14 0%, #0d1b3e 100%);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #0000ff;
            color: white;
            min-height: 80px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 10px rgba(0,0,0,0.3);
            padding: 10px 20px;
            text-align: center;
        }

        .navbar h1 {
            font-size: 24px;
            text-transform: uppercase;
        }

        .content {
            display: flex;
            justify-content: space-around;
            align-items: center;
            flex: 1;
            padding: 40px 50px;
        }

        .left .fa-bullhorn {
            font-size: 300px;
            color: #0000ff;
            filter: drop-shadow(0 0 15px rgba(255,255,255,0.5));
            transform: rotate(-15deg);
            transition: 0.3s;
        }

        .right {
            text-align: center;
        }

        .right h1 {
            color: white;
            text-shadow: 2px 2px 5px rgba(0,0,0,0.7);
            margin-top: 20px;
            text-transform: lowercase;
            font-size: 28px;
        }

        .btn-login {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            background: #0000ff;
            color: white;
            border: 3px solid white;
            font-size: 23px;
            font-weight: bold;
            cursor: pointer;
            transition: 0.3s;
            box-shadow: 0 5px 15px rgba(0,0,0,0.4);
        }

        .btn-login:hover {
            transform: scale(1.1);
            background: #0000cc;
        }

        .sosmed {
            display: flex;
            justify-content: center;
            gap: 20px;
            margin-top: 20px;
        }

        .sosmed i {
            font-size: 25px;
            background-color: white;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            display: flex;
            justify-content: center;
            align-items: center;
            transition: 0.3s;
        }

        .sosmed i:hover {
            transform: translateY(-5px);
        }

        .ig { text-decoration: none; color: #d11aff; }
        .fb { text-decoration: none; color: #0000ff; }
        .yt { text-decoration: none; color: red; }
        .tt { text-decoration: none; color: black; }

        @media (max-width: 992px) {
            .left .fa-bullhorn {
                font-size: 200px;
            }
            .navbar h1 { font-size: 20px; }
        }

        @media (max-width: 768px) {
            .content {
                flex-direction: column;
                justify-content: center;
                gap: 50px;
                padding: 20px;
            }

            .left .fa-bullhorn {
                font-size: 150px;
                margin-bottom: 20px;
            }

            .navbar h1 { font-size: 18px; }
            
            .right h1 { font-size: 22px; }

            .btn-login {
                width: 100px;
                height: 100px;
                font-size: 18px;
            }

            .sosmed i {
                width: 45px;
                height: 45px;
                font-size: 20px;
            }
        }
    </style>
</head>
<body>

<nav class="navbar">
    <h1>SELAMAT DATANG DI WEBSITE PENGADUAN</h1>
</nav>

<div class="content">
    <div class="left">
        <i class="fa-solid fa-bullhorn"></i>
    </div>

    <div class="right">
        <a href="login.php"><button class="btn-login">Login</button></a>
        <h1>Sosial Media Kami</h1>
        <div class="sosmed">
            <a href="#" class="ig"><i class="fa-brands fa-instagram"></i></a>
            <a href="#" class="fb"><i class="fa-brands fa-facebook"></i></a>
            <a href="#" class="yt"><i class="fa-brands fa-youtube"></i></a>
            <a href="#" class="tt"><i class="fa-brands fa-tiktok"></i></a>
        </div>
    </div>
</div>

</body>
</html>