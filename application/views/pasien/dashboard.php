<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #1a8a8a; border-bottom-color: #1a8a8a;">
            <i class="fa fa-dashboard"></i> Dashboard Pasien
            <small style="color: #888;">Selamat datang, <?= isset($pasien) ? $pasien->nama_lengkap : 'Pasien'; ?></small>
        </h1>
    </div>
</div>

<!-- Statistik -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading" style="background: linear-gradient(135deg, #1a8a8a, #2cbbbb); border: none;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 32px; font-weight: 700;"><?= isset($statistik['total']) ? $statistik['total'] : 0; ?></div>
                        <div>Total Pendaftaran</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading" style="background: linear-gradient(135deg, #f0ad4e, #f7c948); border: none;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-clock-o fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 32px; font-weight: 700;"><?= isset($statistik['pending']) ? $statistik['pending'] : 0; ?></div>
                        <div>Dalam Proses</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading" style="background: linear-gradient(135deg, #28a745, #20c997); border: none;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check-circle fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 32px; font-weight: 700;"><?= isset($statistik['disetujui']) ? $statistik['disetujui'] : 0; ?></div>
                        <div>Disetujui</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading" style="background: linear-gradient(135deg, #dc3545, #e74c6f); border: none;">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-times-circle fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge" style="font-size: 32px; font-weight: 700;"><?= isset($statistik['ditolak']) ? $statistik['ditolak'] : 0; ?></div>
                        <div>Ditolak</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Riwayat Pendaftaran -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default" style="border-radius: 12px; box-shadow: 0 5px 20px rgba(0,0,0,0.08); border: none;">
            <div class="panel-heading" style="background: #f8f9fa; border-bottom: 2px solid #1a8a8a; color: #1a8a8a; font-weight: 600; border-radius: 12px 12px 0 0;">
                <i class="fa fa-file-text"></i> Riwayat Pendaftaran
                <a href="<?= site_url('pasien/status'); ?>" class="btn btn-primary btn-xs pull-right" style="background: linear-gradient(135deg, #1a8a8a, #2cbbbb); border: none; border-radius: 8px;">
                    Lihat Semua
                </a>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dokter</th>
                                <th>Spesialis</th>
                                <th>Keluhan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pendaftaran) && count($pendaftaran) > 0): 
                                $no = 1;
                                foreach (array_slice($pendaftaran, 0, 10) as $p): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p->nama_dokter; ?></td>
                                    <td><?= $p->spesialis; ?></td>
                                    <td><?= substr($p->keluhan_penyakit, 0, 30); ?>...</td>
                                    <td><?= date('d-m-Y', strtotime($p->tanggal_kunjungan)); ?></td>
                                    <td><?= substr($p->jam_kunjungan, 0, 5); ?></td>
                                    <td>
                                        <?php if ($p->status == 'pending'): ?>
                                            <span class="label label-warning" style="background: #f0ad4e; padding: 5px 12px; border-radius: 20px;">Dalam Proses</span>
                                        <?php elseif ($p->status == 'disetujui'): ?>
                                            <span class="label label-success" style="background: #28a745; padding: 5px 12px; border-radius: 20px;">Disetujui</span>
                                        <?php else: ?>
                                            <span class="label label-danger" style="background: #dc3545; padding: 5px 12px; border-radius: 20px;">Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <p style="color: #888;">Belum ada riwayat pendaftaran</p>
                                        <a href="<?= site_url('pendaftaran'); ?>" class="btn btn-primary" style="background: linear-gradient(135deg, #1a8a8a, #2cbbbb); border: none; border-radius: 8px;">
                                            <i class="fa fa-plus"></i> Daftar Sekarang
                                        </a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.page-header {
    border-bottom: 3px solid #1a8a8a;
    padding-bottom: 15px;
    margin-bottom: 30px;
}
.page-header h1 {
    color: #1a8a8a;
    font-weight: 700;
    margin: 0;
}
.page-header small {
    color: #888;
    font-weight: 400;
    margin-left: 10px;
}
.panel {
    border: none;
    border-radius: 12px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
}
.panel-heading {
    border-radius: 12px 12px 0 0 !important;
    padding: 15px 20px;
}
.panel-primary .panel-heading {
    background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
    border: none;
    color: white;
}
.panel-warning .panel-heading {
    background: linear-gradient(135deg, #f0ad4e, #f7c948);
    border: none;
    color: white;
}
.panel-success .panel-heading {
    background: linear-gradient(135deg, #28a745, #20c997);
    border: none;
    color: white;
}
.panel-danger .panel-heading {
    background: linear-gradient(135deg, #dc3545, #e74c6f);
    border: none;
    color: white;
}
.panel-default .panel-heading {
    background: #f8f9fa;
    border-bottom: 2px solid #1a8a8a;
    color: #1a8a8a;
    font-weight: 600;
}
.huge {
    font-size: 32px;
    font-weight: 700;
}
.label {
    padding: 5px 12px;
    border-radius: 20px;
}
.table thead {
    background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
    color: white;
}
.table thead th {
    border: none !important;
}
.btn-primary {
    background: linear-gradient(135deg, #1a8a8a, #2cbbbb);
    border: none;
}
.btn-primary:hover {
    background: linear-gradient(135deg, #157a7a, #25aaaa);
}
</style>