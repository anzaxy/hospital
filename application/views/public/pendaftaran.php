<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Pendaftaran Online - Rumah Sakit Sehat</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body {
            font-family: 'Poppins', sans-serif;
            background: #f4f7fc;
            padding-top: 70px;
        }
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
        .page-header {
            background: linear-gradient(135deg, #0d2b3e, #1a4a5a);
            padding: 40px 0;
            color: white;
            text-align: center;
        }
        .page-header h1 {
            font-weight: 700;
            font-size: 32px;
            margin: 0;
        }
        .page-header p {
            opacity: 0.8;
            margin-top: 5px;
            font-size: 16px;
        }
        .form-container {
            background: white;
            border-radius: 20px;
            padding: 40px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.06);
            margin: 30px 0 50px;
        }
        .form-container .subtitle {
            color: #888;
            margin-bottom: 30px;
        }
        .form-group label {
            font-weight: 500;
            color: #555;
        }
        .form-group .required {
            color: #e74c3c;
            margin-left: 3px;
        }
        .form-control {
            border-radius: 10px;
            border: 2px solid #e8ecf1;
            height: 45px;
            transition: 0.3s;
        }
        .form-control:focus {
            border-color: #1a8a8a;
            box-shadow: 0 0 0 3px rgba(26, 138, 138, 0.1);
        }
        textarea.form-control {
            height: 100px;
            resize: vertical;
        }
        .btn-submit {
            background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
            border: none;
            color: white;
            padding: 14px 40px;
            border-radius: 10px;
            font-weight: 600;
            font-size: 16px;
            transition: 0.3s;
            width: 100%;
        }
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 30px rgba(26, 138, 138, 0.4);
            color: white;
        }
        .btn-submit i {
            margin-right: 8px;
        }
        .form-section {
            border-bottom: 2px dashed #e8ecf1;
            padding-bottom: 25px;
            margin-bottom: 25px;
        }
        .form-section:last-child {
            border-bottom: none;
            padding-bottom: 0;
            margin-bottom: 0;
        }
        .form-section h4 {
            color: #1a8a8a;
            font-weight: 600;
            margin-bottom: 20px;
        }
        .form-section h4 i {
            margin-right: 10px;
        }
        .alert-info-custom {
            background: #e8f5f5;
            border: none;
            border-radius: 10px;
            color: #1a8a8a;
            padding: 15px 20px;
            margin-bottom: 25px;
        }
        .alert-info-custom i {
            margin-right: 10px;
        }
        .alert {
            border-radius: 10px;
            border: none;
        }
        .has-error .form-control {
            border-color: #e74c3c;
        }
        .help-block {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
        }
        footer {
            background: #0d2b3e;
            color: white;
            padding: 40px 0;
        }
        .footer-brand {
            font-size: 24px;
            font-weight: 700;
        }
        .footer-brand i {
            color: #2cbbbb;
            margin-right: 10px;
        }
        @media (max-width: 768px) {
            .form-container { padding: 20px; }
            .page-header h1 { font-size: 24px; }
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
                <li class="active"><a href="<?= base_url('pendaftaran'); ?>">Pendaftaran</a></li>
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

<!-- HEADER -->
<section class="page-header">
    <div class="container">
        <h1><i class="fa fa-file-text"></i> Pendaftaran Online</h1>
        <p>Isi formulir berikut untuk mendaftar berobat di Rumah Sakit Sehat Sejahtera</p>
    </div>
</section>

<!-- FORM -->
<section>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="form-container">

                    <div class="alert alert-info-custom">
                        <i class="fa fa-info-circle"></i> 
                        Anda login sebagai <strong><?= isset($pasien) ? $pasien->nama_lengkap : $this->session->userdata('username'); ?></strong>. 
                        Data diri akan terisi otomatis.
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

                    <form action="<?= base_url('proses_pendaftaran'); ?>" method="POST">
                        
                        <!-- Data Pasien -->
                        <div class="form-section">
                            <h4><i class="fa fa-user"></i> Data Pasien</h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Nama Lengkap</label>
                                        <input type="text" class="form-control" 
                                               value="<?= isset($pasien) ? $pasien->nama_lengkap : ''; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Lahir</label>
                                        <input type="text" class="form-control" 
                                               value="<?= isset($pasien) ? date('d-m-Y', strtotime($pasien->tanggal_lahir)) : ''; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>No Telepon</label>
                                        <input type="text" class="form-control" 
                                               value="<?= isset($pasien) ? $pasien->no_telepon : ''; ?>" disabled>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input type="text" class="form-control" 
                                               value="<?= isset($pasien) ? $pasien->email : ''; ?>" disabled>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Data Pendaftaran -->
                        <div class="form-section">
                            <h4><i class="fa fa-stethoscope"></i> Data Pendaftaran</h4>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Keluhan Penyakit <span class="required">*</span></label>
                                        <textarea name="keluhan_penyakit" class="form-control" placeholder="Jelaskan keluhan Anda" required><?= set_value('keluhan_penyakit'); ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Pilih Dokter <span class="required">*</span></label>
                                        <select name="id_dokter" class="form-control" required>
                                            <option value="">-- Pilih Dokter --</option>
                                            <?php if(isset($dokter) && count($dokter) > 0): 
                                                foreach($dokter as $d): ?>
                                                <option value="<?= $d->id_dokter; ?>" <?= set_select('id_dokter', $d->id_dokter); ?>>
                                                    <?= $d->nama_dokter; ?> - <?= $d->spesialis; ?>
                                                </option>
                                            <?php endforeach; 
                                            endif; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Tanggal Kunjungan <span class="required">*</span></label>
                                        <input type="date" name="tanggal_kunjungan" class="form-control" 
                                               min="<?= date('Y-m-d'); ?>" 
                                               value="<?= set_value('tanggal_kunjungan'); ?>" required>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Jam Kunjungan <span class="required">*</span></label>
                                        <select name="jam_kunjungan" class="form-control" required>
                                            <option value="">-- Pilih Jam --</option>
                                            <option value="08:00:00" <?= set_select('jam_kunjungan', '08:00:00'); ?>>08:00</option>
                                            <option value="09:00:00" <?= set_select('jam_kunjungan', '09:00:00'); ?>>09:00</option>
                                            <option value="10:00:00" <?= set_select('jam_kunjungan', '10:00:00'); ?>>10:00</option>
                                            <option value="11:00:00" <?= set_select('jam_kunjungan', '11:00:00'); ?>>11:00</option>
                                            <option value="13:00:00" <?= set_select('jam_kunjungan', '13:00:00'); ?>>13:00</option>
                                            <option value="14:00:00" <?= set_select('jam_kunjungan', '14:00:00'); ?>>14:00</option>
                                            <option value="15:00:00" <?= set_select('jam_kunjungan', '15:00:00'); ?>>15:00</option>
                                            <option value="16:00:00" <?= set_select('jam_kunjungan', '16:00:00'); ?>>16:00</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn-submit">
                            <i class="fa fa-paper-plane"></i> Daftar Sekarang
                        </button>
                    </form>
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