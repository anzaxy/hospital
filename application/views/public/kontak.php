<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Kontak Kami - Rumah Sakit Sehat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            padding-top: 70px;
        }
        .navbar {
            background: white;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            border: none;
            padding: 10px 0;
        }
        .navbar-brand {
            font-weight: 700;
            color: #1a8a8a !important;
            font-size: 24px;
        }
        .navbar-brand i {
            color: #1a8a8a;
            margin-right: 10px;
        }
        .navbar-nav > li > a {
            font-weight: 500;
            color: #555 !important;
            transition: 0.3s;
        }
        .navbar-nav > li > a:hover {
            color: #1a8a8a !important;
        }
        .navbar-nav > li > a.btn-nav {
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            color: white !important;
            border-radius: 25px;
            padding: 8px 25px;
            margin-top: 5px;
        }
        .page-header-bg {
            background: linear-gradient(135deg, #0d2b3e, #1a4a5a);
            padding: 60px 0;
            color: white;
            text-align: center;
        }
        .page-header-bg h1 {
            font-weight: 800;
            font-size: 40px;
        }
        .page-header-bg p {
            opacity: 0.8;
            font-size: 18px;
            margin-top: 10px;
        }
        .contact-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.06);
            text-align: center;
            margin-bottom: 30px;
            border: 1px solid #f0f4f8;
            transition: 0.3s;
        }
        .contact-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        .contact-card .icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(26,138,138,0.1), rgba(44,187,187,0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        .contact-card .icon i {
            font-size: 26px;
            color: #1a8a8a;
        }
        .contact-card h5 {
            font-weight: 600;
            color: #1a1a2e;
        }
        .contact-card p {
            color: #888;
            font-size: 14px;
        }
        footer {
            background: #0d2b3e;
            color: white;
            padding: 40px 0;
            margin-top: 60px;
        }
        .footer-brand {
            font-size: 24px;
            font-weight: 700;
        }
        .footer-brand i {
            color: #2cbbbb;
            margin-right: 10px;
        }
    </style>
</head>
<body>

<!-- NAVBAR SAMA -->
<nav class="navbar navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?= base_url('landing'); ?>">
                <i class="fa fa-heartbeat"></i> RS Sehat
            </a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?= base_url('landing'); ?>">Beranda</a></li>
                <li><a href="<?= base_url('tentang'); ?>">Tentang</a></li>
                <li><a href="<?= base_url('pendaftaran'); ?>">Pendaftaran</a></li>
                <li class="active"><a href="<?= base_url('kontak'); ?>">Kontak</a></li>
                <?php if($this->session->userdata('login')): ?>
                    <?php if($this->session->userdata('role') == 'admin'): ?>
                        <li><a href="<?= base_url('dashboard'); ?>">Dashboard</a></li>
                    <?php else: ?>
                        <li><a href="<?= base_url('pasien'); ?>">Dashboard</a></li>
                    <?php endif; ?>
                    <li><a href="<?= base_url('logout'); ?>" class="btn-nav">Logout</a></li>
                <?php else: ?>
                    <li><a href="<?= base_url('login'); ?>" class="btn-nav">Login</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- PAGE HEADER -->
<section class="page-header-bg">
    <div class="container">
        <h1>Kontak Kami</h1>
        <p>Hubungi kami untuk informasi lebih lanjut</p>
    </div>
</section>

<!-- KONTAK -->
<section style="padding: 60px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <div class="contact-card">
                    <div class="icon"><i class="fa fa-map-marker"></i></div>
                    <h5>Alamat</h5>
                    <p>Jl. Kesehatan No. 123<br>Jakarta, Indonesia</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="contact-card">
                    <div class="icon"><i class="fa fa-phone"></i></div>
                    <h5>Telepon</h5>
                    <p>(021) 1234-5678<br>0812-3456-7890</p>
                </div>
            </div>
            <div class="col-md-4 col-sm-6">
                <div class="contact-card">
                    <div class="icon"><i class="fa fa-envelope"></i></div>
                    <h5>Email</h5>
                    <p>info@rssehat.com<br>cs@rssehat.com</p>
                </div>
            </div>
        </div>
        
        <div class="row" style="margin-top: 30px;">
            <div class="col-md-12">
                <div class="panel panel-default" style="border-radius: 20px; border: none; box-shadow: 0 5px 30px rgba(0,0,0,0.06);">
                    <div class="panel-body" style="padding: 40px;">
                        <h3 style="color: #1a8a8a; font-weight: 700; text-align: center; margin-bottom: 30px;">
                            <i class="fa fa-paper-plane"></i> Kirim Pesan
                        </h3>
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" placeholder="Nama Anda" style="border-radius: 10px; height: 45px;">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="email" class="form-control" placeholder="Email Anda" style="border-radius: 10px; height: 45px;">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Subjek</label>
                                <input type="text" class="form-control" placeholder="Subjek pesan" style="border-radius: 10px; height: 45px;">
                            </div>
                            <div class="form-group">
                                <label>Pesan</label>
                                <textarea class="form-control" rows="5" placeholder="Tulis pesan Anda..." style="border-radius: 10px;"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary" style="background: linear-gradient(135deg, #1a8a8a, #2cbbbb); border: none; padding: 12px 40px; border-radius: 10px; font-weight: 600;">
                                <i class="fa fa-send"></i> Kirim Pesan
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <div class="footer-brand">
                    <i class="fa fa-heartbeat"></i> RS Sehat Sejahtera
                </div>
                <p style="margin-top: 15px; opacity: 0.8;">Memberikan layanan kesehatan terbaik untuk masyarakat Indonesia.</p>
            </div>
            <div class="col-md-4">
                <h5 style="color: #2cbbbb;">Kontak</h5>
                <p><i class="fa fa-map-marker" style="color:#2cbbbb;"></i> Jl. Kesehatan No. 123, Jakarta</p>
                <p><i class="fa fa-phone" style="color:#2cbbbb;"></i> (021) 1234-5678</p>
                <p><i class="fa fa-envelope" style="color:#2cbbbb;"></i> info@rssehat.com</p>
            </div>
            <div class="col-md-4">
                <h5 style="color: #2cbbbb;">Jam Operasional</h5>
                <p>Senin - Jumat: 08:00 - 20:00</p>
                <p>Sabtu: 08:00 - 17:00</p>
                <p>Minggu: Tutup</p>
            </div>
        </div>
        <hr style="border-color: rgba(255,255,255,0.05); margin-top: 30px;">
        <p style="text-align: center; opacity: 0.5; margin: 0;">
            &copy; <?= date('Y'); ?> Rumah Sakit Sehat Sejahtera. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>