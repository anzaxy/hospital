<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Rumah Sakit Sehat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #1a8a8a 0%, #2cbbbb 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-container {
            background: white;
            border-radius: 20px;
            padding: 45px 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 420px;
            animation: fadeInUp 0.6s ease;
        }
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .login-container .logo {
            text-align: center;
            margin-bottom: 30px;
        }
        .login-container .logo .icon {
            width: 80px;
            height: 80px;
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        .login-container .logo .icon i {
            font-size: 40px;
            color: white;
        }
        .login-container .logo h3 {
            color: #1a8a8a;
            font-weight: 700;
            margin: 0;
            font-size: 24px;
        }
        .login-container .logo p {
            color: #888;
            font-size: 14px;
            margin-top: 5px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            font-weight: 500;
            color: #555;
            font-size: 14px;
            margin-bottom: 5px;
            display: block;
        }
        .form-group .input-group {
            border-radius: 12px;
            overflow: hidden;
            border: 2px solid #e8ecf1;
            transition: 0.3s;
            background: #f8f9fa;
        }
        .form-group .input-group:focus-within {
            border-color: #1a8a8a;
            box-shadow: 0 0 0 4px rgba(26, 138, 138, 0.1);
        }
        .form-group .input-group-addon {
            background: transparent;
            border: none;
            color: #1a8a8a;
            min-width: 45px;
            font-size: 16px;
            padding: 0 10px;
        }
        .form-group .form-control {
            border: none;
            height: 48px;
            background: transparent;
            border-radius: 0;
            padding: 0 15px 0 5px;
            font-size: 14px;
            box-shadow: none !important;
        }
        .form-group .form-control:focus {
            box-shadow: none;
            background: transparent;
        }
        .btn-login {
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            border: none;
            color: white;
            padding: 14px;
            font-weight: 600;
            width: 100%;
            border-radius: 12px;
            font-size: 16px;
            transition: all 0.3s;
            cursor: pointer;
        }
        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(26, 138, 138, 0.4);
            color: white;
        }
        .btn-login i {
            margin-right: 8px;
        }
        .register-link {
            text-align: center;
            margin-top: 20px;
            color: #888;
            font-size: 14px;
        }
        .register-link a {
            color: #1a8a8a;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }
        .register-link a:hover {
            color: #2cbbbb;
            text-decoration: underline;
        }
        .alert {
            border-radius: 12px;
            border: none;
            padding: 12px 18px;
            font-size: 14px;
            margin-bottom: 20px;
        }
        .alert-danger {
            background: #fde8e8;
            color: #c0392b;
        }
        .alert-success {
            background: #e8f5e9;
            color: #27ae60;
        }
        .alert i {
            margin-right: 8px;
        }
        .divider {
            text-align: center;
            margin: 25px 0 20px;
            position: relative;
        }
        .divider:before {
            content: '';
            position: absolute;
            left: 0;
            top: 50%;
            width: 100%;
            height: 1px;
            background: #e8ecf1;
        }
        .divider span {
            background: white;
            padding: 0 15px;
            color: #888;
            font-size: 13px;
            position: relative;
            z-index: 1;
        }
        @media (max-width: 480px) {
            .login-container {
                padding: 30px 20px;
            }
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="logo">
            <div class="icon">
                <i class="fa fa-heartbeat"></i>
            </div>
            <h3>RS Sehat Sejahtera</h3>
            <p>Login untuk mengakses sistem</p>
        </div>

        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <i class="fa fa-exclamation-circle"></i> <?= $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <?php if ($this->session->flashdata('success')): ?>
            <div class="alert alert-success">
                <i class="fa fa-check-circle"></i> <?= $this->session->flashdata('success'); ?>
            </div>
        <?php endif; ?>

        <form method="post" action="<?= site_url('login/proses'); ?>">
            <div class="form-group">
                <label><i class="fa fa-user"></i> Username</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required autofocus>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-lock"></i> Password</label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Masukkan password" required>
                </div>
            </div>

            <button type="submit" class="btn-login">
                <i class="fa fa-sign-in"></i> Login
            </button>
        </form>

        <div class="divider">
            <span>atau</span>
        </div>

        <div class="register-link">
            Belum punya akun? <a href="<?= site_url('register'); ?>">Daftar di sini</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>