<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Rumah Sakit Sehat Sejahtera</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            overflow-x: hidden;
        }
        
        /* NAVBAR */
        .navbar {
            background: white;
            box-shadow: 0 2px 20px rgba(0,0,0,0.08);
            border: none;
            padding: 10px 0;
            border-radius: 0;
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
        .navbar-nav > li > a.btn-nav:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 20px rgba(26, 138, 138, 0.4);
            color: white !important;
        }
        
        /* HERO */
        .hero {
            background: linear-gradient(135deg, #0d2b3e 0%, #1a4a5a 100%);
            padding: 120px 0 80px;
            color: white;
            margin-top: -20px;
            position: relative;
            overflow: hidden;
        }
        .hero::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -10%;
            width: 500px;
            height: 500px;
            background: rgba(44, 187, 187, 0.08);
            border-radius: 50%;
        }
        .hero::after {
            content: '';
            position: absolute;
            bottom: -30%;
            left: -5%;
            width: 400px;
            height: 400px;
            background: rgba(44, 187, 187, 0.05);
            border-radius: 50%;
        }
        .hero h1 {
            font-weight: 800;
            font-size: 48px;
            margin-bottom: 20px;
            line-height: 1.2;
        }
        .hero h1 span {
            color: #2cbbbb;
        }
        .hero p {
            font-size: 18px;
            opacity: 0.85;
            margin-bottom: 30px;
            line-height: 1.8;
        }
        .hero .btn-hero {
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            color: white;
            padding: 14px 40px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 16px;
            transition: 0.3s;
            border: none;
            display: inline-block;
        }
        .hero .btn-hero:hover {
            transform: translateY(-3px);
            box-shadow: 0 10px 30px rgba(26, 138, 138, 0.4);
            color: white;
        }
        .hero .btn-hero-outline {
            background: transparent;
            color: white;
            padding: 14px 40px;
            border-radius: 30px;
            font-weight: 600;
            font-size: 16px;
            border: 2px solid rgba(255,255,255,0.3);
            transition: 0.3s;
            margin-left: 10px;
            display: inline-block;
        }
        .hero .btn-hero-outline:hover {
            background: white;
            color: #1a8a8a;
            transform: translateY(-3px);
            border-color: white;
            text-decoration: none;
        }
        .hero-image {
            animation: float 3s ease-in-out infinite;
            position: relative;
            z-index: 1;
        }
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-15px); }
        }
        
        /* SECTION TITLE */
        .section-title {
            text-align: center;
            margin-bottom: 50px;
        }
        .section-title h2 {
            font-weight: 700;
            color: #1a8a8a;
            font-size: 36px;
            position: relative;
            display: inline-block;
        }
        .section-title h2::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 4px;
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            border-radius: 2px;
        }
        .section-title p {
            color: #888;
            font-size: 16px;
            margin-top: 20px;
        }
        
        /* FEATURES */
        .feature-card {
            background: white;
            border-radius: 20px;
            padding: 35px 25px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.06);
            text-align: center;
            transition: 0.4s;
            margin-bottom: 30px;
            height: 100%;
            border: 1px solid #f0f4f8;
        }
        .feature-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 50px rgba(26, 138, 138, 0.12);
            border-color: #1a8a8a;
        }
        .feature-card .icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, rgba(26,138,138,0.1), rgba(44,187,187,0.1));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 20px;
        }
        .feature-card .icon i {
            font-size: 30px;
            color: #1a8a8a;
        }
        .feature-card h4 {
            font-weight: 600;
            margin-bottom: 12px;
            color: #1a1a2e;
        }
        .feature-card p {
            color: #888;
            font-size: 14px;
            line-height: 1.7;
        }
        
        /* DOKTER */
        .doctor-card {
            background: white;
            border-radius: 20px;
            padding: 25px 20px;
            box-shadow: 0 5px 30px rgba(0,0,0,0.06);
            text-align: center;
            transition: 0.4s;
            margin-bottom: 30px;
            border: 1px solid #f0f4f8;
        }
        .doctor-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.1);
        }
        .doctor-card .avatar {
            width: 100px;
            height: 100px;
            border-radius: 50%;
            background: linear-gradient(135deg, #e8f5f5, #d4ecec);
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 40px;
            color: #1a8a8a;
        }
        .doctor-card h5 {
            font-weight: 600;
            margin-bottom: 3px;
            color: #1a1a2e;
        }
        .doctor-card .spesialis {
            color: #1a8a8a;
            font-size: 13px;
            font-weight: 500;
        }
        .doctor-card .badge-senior {
            display: inline-block;
            background: linear-gradient(135deg, #f0ad4e, #f7c948);
            color: white;
            padding: 3px 15px;
            border-radius: 20px;
            font-size: 11px;
            font-weight: 600;
            margin-top: 8px;
        }
        
        /* STATISTIK */
        .stat-section {
            background: linear-gradient(135deg, #0d2b3e 0%, #1a4a5a 100%);
            padding: 60px 0;
            color: white;
        }
        .stat-box {
            text-align: center;
        }
        .stat-box h3 {
            font-weight: 800;
            font-size: 40px;
            color: #2cbbbb;
            margin-bottom: 5px;
        }
        .stat-box p {
            opacity: 0.7;
            font-size: 16px;
        }
        
        /* FOOTER */
        footer {
            background: #0d2b3e;
            color: white;
            padding: 50px 0 30px;
        }
        footer a { color: #2cbbbb; }
        footer a:hover { color: white; text-decoration: none; }
        .footer-brand {
            font-size: 24px;
            font-weight: 700;
        }
        .footer-brand i {
            color: #2cbbbb;
            margin-right: 10px;
        }
        footer h5 {
            font-weight: 600;
            margin-bottom: 15px;
            color: #2cbbbb;
        }
        footer p { opacity: 0.8; font-size: 14px; }
        footer .social a {
            display: inline-block;
            width: 40px;
            height: 40px;
            background: rgba(255,255,255,0.05);
            border-radius: 50%;
            text-align: center;
            line-height: 40px;
            margin-right: 8px;
            transition: 0.3s;
            color: white;
        }
        footer .social a:hover {
            background: #1a8a8a;
            transform: translateY(-3px);
        }
        
        @media (max-width: 768px) {
            .hero h1 { font-size: 32px; }
            .hero { padding: 80px 0 60px; }
            .hero .btn-hero, .hero .btn-hero-outline {
                display: block;
                width: 100%;
                margin: 10px 0;
                text-align: center;
            }
            .stat-box h3 { font-size: 28px; }
        }
    </style>
</head>
<body>

<!-- NAVBAR -->
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
                <li><a href="<?= base_url('kontak'); ?>">Kontak</a></li>
               <!-- Di navbar landing.php, cari bagian ini dan ubah -->

<?php if($this->session->userdata('login')): ?>
    <?php if($this->session->userdata('role') == 'admin'): ?>
        <li><a href="<?= base_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
    <?php else: ?>
        <!-- Pasien: Tampilkan Dashboard dan Profil -->
        <li><a href="<?= base_url('pasien'); ?>"><i class="fa fa-user"></i> Dashboard</a></li>
    <?php endif; ?>
    <li><a href="<?= base_url('logout'); ?>" class="btn-nav"><i class="fa fa-sign-out"></i> Logout</a></li>
<?php else: ?>
    <li><a href="<?= base_url('login'); ?>" class="btn-nav"><i class="fa fa-sign-in"></i> Login</a></li>
    <li><a href="<?= base_url('register'); ?>" class="btn-nav" style="background: transparent; border: 2px solid #1a8a8a; color: #1a8a8a !important;">Register</a></li>
<?php endif; ?>
            </ul>
        </div>
    </div>
</nav>

<!-- HERO -->
<section class="hero">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h1>Kesehatan Anda, <span>Prioritas Kami</span></h1>
                <p>Rumah Sakit Sehat Sejahtera menyediakan layanan kesehatan terbaik dengan tenaga medis profesional dan fasilitas modern untuk Anda dan keluarga.</p>
                <a href="<?= base_url('pendaftaran'); ?>" class="btn-hero">
                    <i class="fa fa-calendar-plus-o"></i> Daftar Online
                </a>
                <a href="<?= base_url('tentang'); ?>" class="btn-hero-outline">
                    <i class="fa fa-info-circle"></i> Tentang Kami
                </a>
            </div>
            <div class="col-md-6 text-center hero-image">
                <img src="https://img.icons8.com/fluency/400/000000/hospital.png" alt="Hospital" class="img-responsive" style="display: inline-block; max-width: 80%;">
            </div>
        </div>
    </div>
</section>

<!-- LAYANAN -->
<section style="padding: 80px 0; background: #f8fafc;">
    <div class="container">
        <div class="section-title">
            <h2>Layanan Kami</h2>
            <p>Kami menyediakan berbagai layanan kesehatan untuk memenuhi kebutuhan Anda</p>
        </div>
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="feature-card">
                    <div class="icon"><i class="fa fa-user-md"></i></div>
                    <h4>Dokter Spesialis</h4>
                    <p>Tenaga medis profesional di berbagai bidang spesialisasi</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-card">
                    <div class="icon"><i class="fa fa-clock-o"></i></div>
                    <h4>Pendaftaran Online</h4>
                    <p>Daftar berobat dengan mudah melalui sistem online 24 jam</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-card">
                    <div class="icon"><i class="fa fa-calendar-check-o"></i></div>
                    <h4>Jadwal Teratur</h4>
                    <p>Jadwal kunjungan yang teratur dan terorganisir</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="feature-card">
                    <div class="icon"><i class="fa fa-heart"></i></div>
                    <h4>Pelayanan 24 Jam</h4>
                    <p>Layanan darurat dan konsultasi 24 jam sehari</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- DOKTER -->
<section style="padding: 80px 0;">
    <div class="container">
        <div class="section-title">
            <h2>Tim Dokter Kami</h2>
            <p>Dokter-dokter terbaik yang siap memberikan pelayanan maksimal</p>
        </div>
        <div class="row">
            <?php if(isset($dokter) && count($dokter) > 0): 
                foreach($dokter as $d): ?>
            <div class="col-md-3 col-sm-6">
                <div class="doctor-card">
                    <div class="avatar"><i class="fa fa-user-md"></i></div>
                    <h5><?= $d->nama_dokter; ?></h5>
                    <p class="spesialis"><?= $d->spesialis; ?></p>
                    <span class="badge-senior">Senior</span>
                </div>
            </div>
            <?php endforeach; 
            else: ?>
            <div class="col-md-12 text-center">
                <p class="text-muted">Belum ada data dokter</p>
            </div>
            <?php endif; ?>
        </div>
    </div>
</section>

<!-- STATISTIK -->
<section class="stat-section">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-sm-6">
                <div class="stat-box">
                    <h3><?= isset($total_pasien) ? $total_pasien : 0; ?>+</h3>
                    <p>Pasien Terdaftar</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-box">
                    <h3><?= isset($dokter) ? count($dokter) : 0; ?>+</h3>
                    <p>Dokter Spesialis</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-box">
                    <h3><?= isset($total_pendaftaran['total']) ? $total_pendaftaran['total'] : 0; ?>+</h3>
                    <p>Total Kunjungan</p>
                </div>
            </div>
            <div class="col-md-3 col-sm-6">
                <div class="stat-box">
                    <h3>98%</h3>
                    <p>Tingkat Kepuasan</p>
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
                <p style="margin-top: 15px;">Memberikan layanan kesehatan terbaik untuk masyarakat Indonesia dengan teknologi modern dan tenaga medis profesional.</p>
                <div class="social" style="margin-top: 15px;">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-md-4">
                <h5>Kontak Kami</h5>
                <p><i class="fa fa-map-marker" style="color:#2cbbbb; width:20px;"></i> Jl. Kesehatan No. 123, Jakarta</p>
                <p><i class="fa fa-phone" style="color:#2cbbbb; width:20px;"></i> (021) 1234-5678</p>
                <p><i class="fa fa-whatsapp" style="color:#2cbbbb; width:20px;"></i> 0812-3456-7890</p>
                <p><i class="fa fa-envelope" style="color:#2cbbbb; width:20px;"></i> info@rssehat.com</p>
            </div>
            <div class="col-md-4">
                <h5>Jam Operasional</h5>
                <p><i class="fa fa-clock-o" style="color:#2cbbbb; width:20px;"></i> Senin - Jumat: 08:00 - 20:00</p>
                <p><i class="fa fa-clock-o" style="color:#2cbbbb; width:20px;"></i> Sabtu: 08:00 - 17:00</p>
                <p><i class="fa fa-clock-o" style="color:#2cbbbb; width:20px;"></i> Minggu: Tutup</p>
                <p><i class="fa fa-ambulance" style="color:#e74c6f; width:20px;"></i> IGD: 24 Jam</p>
            </div>
        </div>
        <hr style="border-color: rgba(255,255,255,0.05); margin-top: 30px;">
        <p style="text-align: center; opacity: 0.5; margin: 0; font-size: 13px;">
            &copy; <?= date('Y'); ?> Rumah Sakit Sehat Sejahtera. All Rights Reserved.
        </p>
    </div>
</footer>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</body>
</html>