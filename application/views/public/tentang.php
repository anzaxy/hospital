<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tentang Kami - Rumah Sakit Sehat</title>
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
        .section-title {
            text-align: center;
            margin-bottom: 40px;
        }
        .section-title h2 {
            font-weight: 700;
            color: #1a8a8a;
            font-size: 32px;
        }
        .section-title p {
            color: #888;
            font-size: 16px;
        }
        .value-card {
            background: white;
            border-radius: 20px;
            padding: 30px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.06);
            text-align: center;
            margin-bottom: 30px;
            transition: 0.3s;
            border: 1px solid #f0f4f8;
        }
        .value-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 40px rgba(0,0,0,0.1);
        }
        .value-card .icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, rgba(26,138,138,0.1), rgba(44,187,187,0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        .value-card .icon i {
            font-size: 26px;
            color: #1a8a8a;
        }
        .value-card h5 {
            font-weight: 600;
        }
        .value-card p {
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

<!-- NAVBAR SAMA KAYA LANDING -->
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
                <li class="active"><a href="<?= base_url('tentang'); ?>">Tentang</a></li>
                <li><a href="<?= base_url('pendaftaran'); ?>">Pendaftaran</a></li>
                <li><a href="<?= base_url('kontak'); ?>">Kontak</a></li>
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
        <h1>Tentang Kami</h1>
        <p>Mengenal lebih dekat Rumah Sakit Sehat Sejahtera</p>
    </div>
</section>

<!-- TENTANG -->
<section style="padding: 60px 0;">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3 style="color: #1a8a8a; font-weight: 700;">Sejarah Rumah Sakit</h3>
                <p style="color: #666; line-height: 1.8;">
                    Rumah Sakit Sehat Sejahtera didirikan pada tahun 2010 dengan visi menjadi rumah sakit terpercaya yang memberikan pelayanan kesehatan berkualitas tinggi. Berawal dari klinik kecil, kami terus berkembang dan kini menjadi salah satu rumah sakit terkemuka di Jakarta.
                </p>
                <p style="color: #666; line-height: 1.8;">
                    Kami berkomitmen untuk terus meningkatkan kualitas pelayanan dengan mengadopsi teknologi medis terkini dan menghadirkan tenaga medis profesional di setiap bidangnya.
                </p>
            </div>
            <div class="col-md-6 text-center">
                <img src="assets/img/hospital.jpeg" alt="Hospital" class="img-responsive" style="display: inline-block; max-width: 80%;">
            </div>
        </div>
    </div>
</section>

<!-- VISI MISI -->
<section style="padding: 60px 0; background: #f8fafc;">
    <div class="container">
        <div class="section-title">
            <h2>Visi & Misi</h2>
            <p>Komitmen kami untuk kesehatan masyarakat</p>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default" style="border-radius: 15px; border: none; box-shadow: 0 5px 30px rgba(0,0,0,0.06);">
                    <div class="panel-body" style="padding: 30px;">
                        <h4 style="color: #1a8a8a; font-weight: 700;"><i class="fa fa-eye"></i> Visi</h4>
                        <p style="color: #666; line-height: 1.8;">Menjadi rumah sakit pilihan utama masyarakat yang memberikan pelayanan kesehatan terbaik dengan mengutamakan keselamatan dan kepuasan pasien.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="panel panel-default" style="border-radius: 15px; border: none; box-shadow: 0 5px 30px rgba(0,0,0,0.06);">
                    <div class="panel-body" style="padding: 30px;">
                        <h4 style="color: #1a8a8a; font-weight: 700;"><i class="fa fa-bullseye"></i> Misi</h4>
                        <ul style="color: #666; line-height: 2.2; padding-left: 20px;">
                            <li>Memberikan pelayanan kesehatan yang profesional dan humanis</li>
                            <li>Mengembangkan teknologi medis untuk diagnosis yang akurat</li>
                            <li>Meningkatkan kompetensi tenaga medis secara berkelanjutan</li>
                            <li>Memberikan edukasi kesehatan kepada masyarakat</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- NILAI -->
<section style="padding: 60px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Nilai-nilai Kami</h2>
            <p>Prinsip yang menjadi pedoman kami dalam melayani</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="icon"><i class="fa fa-shield"></i></div>
                    <h5>Integritas</h5>
                    <p>Jujur dan transparan dalam setiap pelayanan</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="icon"><i class="fa fa-star"></i></div>
                    <h5>Profesionalisme</h5>
                    <p>Kompeten dan bertanggung jawab</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="icon"><i class="fa fa-heart"></i></div>
                    <h5>Empati</h5>
                    <p>Peduli dan memahami kebutuhan pasien</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="value-card">
                    <div class="icon"><i class="fa fa-lightbulb-o"></i></div>
                    <h5>Inovasi</h5>
                    <p>Terus berkembang dan berinovasi</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- FOOTER SAMA KAYA LANDING -->
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