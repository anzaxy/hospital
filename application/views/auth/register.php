<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Rumah Sakit Sehat</title>
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
            padding: 40px 20px;
        }
        .register-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 20px 60px rgba(0,0,0,0.3);
            width: 100%;
            max-width: 520px;
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
        .register-container .logo {
            text-align: center;
            margin-bottom: 25px;
        }
        .register-container .logo .icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 12px;
        }
        .register-container .logo .icon i {
            font-size: 32px;
            color: white;
        }
        .register-container .logo h3 {
            color: #1a8a8a;
            font-weight: 700;
            margin: 0;
            font-size: 22px;
        }
        .register-container .logo p {
            color: #888;
            font-size: 13px;
            margin-top: 3px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            font-weight: 500;
            color: #555;
            font-size: 13px;
            margin-bottom: 3px;
            display: block;
        }
        .form-group label .required {
            color: #e74c3c;
            margin-left: 3px;
        }
        .form-group .input-group {
            border-radius: 10px;
            overflow: hidden;
            border: 2px solid #e8ecf1;
            transition: 0.3s;
            background: #f8f9fa;
        }
        .form-group .input-group:focus-within {
            border-color: #1a8a8a;
            box-shadow: 0 0 0 3px rgba(26, 138, 138, 0.1);
        }
        .form-group .input-group-addon {
            background: transparent;
            border: none;
            color: #1a8a8a;
            min-width: 40px;
            font-size: 14px;
            padding: 0 8px;
        }
        .form-group .form-control {
            border: none;
            height: 42px;
            background: transparent;
            border-radius: 0;
            padding: 0 12px 0 5px;
            font-size: 13px;
            box-shadow: none !important;
        }
        .form-group .form-control:focus {
            box-shadow: none;
            background: transparent;
        }
        textarea.form-control {
            height: 60px;
            resize: vertical;
            padding-top: 8px;
        }
        .btn-register {
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            border: none;
            color: white;
            padding: 13px;
            font-weight: 600;
            width: 100%;
            border-radius: 10px;
            font-size: 15px;
            transition: all 0.3s;
            cursor: pointer;
            margin-top: 5px;
        }
        .btn-register:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(26, 138, 138, 0.4);
            color: white;
        }
        .btn-register i {
            margin-right: 8px;
        }
        .login-link {
            text-align: center;
            margin-top: 18px;
            color: #888;
            font-size: 13px;
        }
        .login-link a {
            color: #1a8a8a;
            font-weight: 600;
            text-decoration: none;
            transition: 0.3s;
        }
        .login-link a:hover {
            color: #2cbbbb;
            text-decoration: underline;
        }
        .alert {
            border-radius: 10px;
            border: none;
            padding: 10px 15px;
            font-size: 13px;
            margin-bottom: 15px;
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
            margin: 20px 0 15px;
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
            font-size: 12px;
            position: relative;
            z-index: 1;
        }
        @media (max-width: 480px) {
            .register-container {
                padding: 25px 18px;
            }
        }
    </style>
</head>
<body>
    <div class="register-container">
        <div class="logo">
            <div class="icon">
                <i class="fa fa-heartbeat"></i>
            </div>
            <h3>RS Sehat Sejahtera</h3>
            <p>Daftar akun untuk akses layanan online</p>
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

        <?php echo validation_errors('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ', '</div>'); ?>

        <form method="post" action="<?= site_url('register/proses'); ?>">
            <div class="form-group">
                <label><i class="fa fa-user"></i> Username <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user"></i></span>
                    <input type="text" name="username" class="form-control" placeholder="Buat username" value="<?= set_value('username'); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-lock"></i> Password <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-lock"></i></span>
                    <input type="password" name="password" class="form-control" placeholder="Minimal 6 karakter" required>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-user-md"></i> Nama Lengkap <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-user-md"></i></span>
                    <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama lengkap" value="<?= set_value('nama_lengkap'); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-calendar"></i> Tanggal Lahir <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                    <input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir'); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-map-marker"></i> Alamat <span class="required">*</span></label>
                <div class="input-group" style="align-items: stretch;">
                    <span class="input-group-addon" style="display: flex; align-items: center;"><i class="fa fa-map-marker"></i></span>
                    <textarea name="alamat" class="form-control" placeholder="Alamat lengkap" required><?= set_value('alamat'); ?></textarea>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-phone"></i> Nomor Telepon <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    <input type="text" name="no_telepon" class="form-control" placeholder="Nomor telepon" value="<?= set_value('no_telepon'); ?>" required>
                </div>
            </div>

            <div class="form-group">
                <label><i class="fa fa-envelope"></i> Email <span class="required">*</span></label>
                <div class="input-group">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    <input type="email" name="email" class="form-control" placeholder="Alamat email" value="<?= set_value('email'); ?>" required>
                </div>
            </div>

            <button type="submit" class="btn-register">
                <i class="fa fa-user-plus"></i> Daftar Sekarang
            </button>
        </form>

        <div class="divider">
            <span>sudah punya akun?</span>
        </div>

        <div class="login-link">
            <a href="<?= site_url('login'); ?>">Login di sini</a>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>