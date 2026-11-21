
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Login | Sistem Informasi Inventaris</title>

    <link href="/sbadmin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Nunito:300,400,600,700,800,900&display=swap" rel="stylesheet">
    <link href="/sbadmin/css/sb-admin-2.min.css" rel="stylesheet">

    <style>
        * {
            font-family: 'Nunito', sans-serif;
        }

        body {
            min-height: 100vh;
            background: #f1f5f9;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 25px;
        }

        .login-container {
            width: 100%;
            max-width: 1050px;
            min-height: 590px;
            background: white;
            border-radius: 22px;
            overflow: hidden;
            display: flex;
            box-shadow: 0 15px 50px rgba(15, 23, 42, 0.12);
        }

        .login-left {
            width: 50%;
            background: linear-gradient(145deg, #102b52, #1765b5);
            color: white;
            padding: 55px 45px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .login-left img {
            width: 75%;
            max-width: 300px;
            object-fit: contain;
            margin-bottom: 35px;
        }

        .login-left h2 {
            font-size: 27px;
            font-weight: 800;
            margin-bottom: 15px;
        }

        .login-left p {
            color: #dbeafe;
            font-size: 14px;
            line-height: 1.8;
            max-width: 350px;
        }

        .login-right {
            width: 50%;
            padding: 65px 55px;
            display: flex;
            flex-direction: column;
            justify-content: center;
        }

        .login-icon {
            width: 55px;
            height: 55px;
            background: #e8f1ff;
            color: #1765b5;
            display: flex;
            justify-content: center;
            align-items: center;
            border-radius: 15px;
            font-size: 23px;
            margin-bottom: 25px;
        }

        .login-title {
            font-size: 27px;
            font-weight: 800;
            color: #172b4d;
            margin-bottom: 8px;
        }

        .login-subtitle {
            color: #8792a2;
            font-size: 14px;
            margin-bottom: 35px;
        }

        .form-label {
            color: #344563;
            font-size: 13px;
            font-weight: 700;
            margin-bottom: 9px;
        }

        .input-group-custom {
            position: relative;
            margin-bottom: 23px;
        }

        .input-group-custom i {
            position: absolute;
            left: 17px;
            top: 17px;
            color: #8995a7;
            z-index: 2;
        }

        .input-group-custom input {
            height: 52px;
            border: 1px solid #e2e8f0;
            border-radius: 10px;
            padding-left: 45px;
            font-size: 14px;
            background: #f8fafc;
        }

        .input-group-custom input:focus {
            background: white;
            border-color: #2675cf;
            box-shadow: 0 0 0 3px rgba(38, 117, 207, 0.1);
        }

        .btn-login {
            height: 52px;
            border-radius: 10px;
            background: #1765b5;
            color: white;
            border: none;
            font-weight: 800;
            font-size: 15px;
            transition: 0.3s;
            margin-top: 8px;
        }

        .btn-login:hover {
            background: #104d91;
            color: white;
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(23, 101, 181, 0.2);
        }

        .login-footer {
            text-align: center;
            color: #a0aaba;
            font-size: 12px;
            margin-top: 40px;
        }

        @media (max-width: 768px) {
            body {
                padding: 15px;
            }

            .login-container {
                max-width: 450px;
                min-height: auto;
            }

            .login-left {
                display: none;
            }

            .login-right {
                width: 100%;
                padding: 45px 30px;
            }
        }
    </style>
</head>

<body>

    <div class="login-container">

        <!-- PANEL KIRI -->
        <div class="login-left">

            <img src="/sbadmin/logo.png" alt="Logo Inventaris">

            <h2>Sistem Informasi Inventaris</h2>

            <p>
                Kelola data barang, pantau persediaan,
                dan catat transaksi inventaris dengan
                lebih mudah, cepat, dan terorganisir.
            </p>

        </div>

        <!-- PANEL KANAN -->
        <div class="login-right">

            <div class="login-icon">
                <i class="fas fa-user-lock"></i>
            </div>

            <h1 class="login-title">Selamat Datang!</h1>

            <p class="login-subtitle">
                Silakan login untuk mengakses sistem inventaris.
            </p>

            <!-- FORM LOGIN: ROUTE TETAP -->
            <form action="/login" method="POST">

                @csrf

                <div class="form-group">
                    <label class="form-label">Username</label>

                    <div class="input-group-custom">
                        <i class="fas fa-user"></i>
                        <input
                            type="text"
                            name="username"
                            class="form-control"
                            placeholder="Masukkan username"
                            required
                            autocomplete="username">
                    </div>
                </div>

                <div class="form-group">
                    <label class="form-label">Password</label>

                    <div class="input-group-custom">
                        <i class="fas fa-lock"></i>
                        <input
                            type="password"
                            name="password"
                            class="form-control"
                            placeholder="Masukkan password"
                            required
                            autocomplete="current-password">
                    </div>
                </div>

                <button type="submit" class="btn btn-login btn-block">
                    <i class="fas fa-sign-in-alt mr-2"></i>
                    Login ke Sistem
                </button>

            </form>

            <div class="login-footer">
                &copy; {{ date('Y') }} Sistem Informasi Inventaris.
                All Rights Reserved.
            </div>

        </div>

    </div>

    <script src="/sbadmin/vendor/jquery/jquery.min.js"></script>
    <script src="/sbadmin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/sbadmin/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/sbadmin/js/sb-admin-2.min.js"></script>

</body>
</html>
