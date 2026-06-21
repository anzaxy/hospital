<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">
            <i class="fa fa-bar-chart"></i> Laporan
            <small>Statistik dan laporan pendaftaran</small>
        </h1>
    </div>
</div>

<!-- Tombol Download -->
<div class="row">
    <div class="col-lg-12">
        <div class="btn-group" style="margin-bottom: 20px;">
            <a href="<?= site_url('admin/download_pdf'); ?>" class="btn btn-danger">
                <i class="fa fa-file-pdf-o"></i> Download PDF
            </a>
            <a href="<?= site_url('admin/download_csv'); ?>" class="btn btn-success">
                <i class="fa fa-file-excel-o"></i> Download CSV
            </a>
        </div>
        <hr>
    </div>
</div>

<!-- Statistik -->
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-file-text fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= isset($statistik['total']) ? $statistik['total'] : 0; ?></div>
                        <div>Total Pendaftaran</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-warning">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-clock-o fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= isset($statistik['pending']) ? $statistik['pending'] : 0; ?></div>
                        <div>Pending</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-success">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-check-circle fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= isset($statistik['disetujui']) ? $statistik['disetujui'] : 0; ?></div>
                        <div>Disetujui</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-danger">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-times-circle fa-4x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?= isset($statistik['ditolak']) ? $statistik['ditolak'] : 0; ?></div>
                        <div>Ditolak</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Grafik -->
<div class="row">
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-pie-chart"></i> Grafik Status Pendaftaran
            </div>
            <div class="panel-body">
                <div class="chart-container">
                    <canvas id="chartPie"></canvas>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-bar-chart"></i> Grafik Statistik Pendaftaran
            </div>
            <div class="panel-body">
                <div class="chart-container">
                    <canvas id="chartBar"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tabel Laporan -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-table"></i> Detail Laporan Pendaftaran
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabelLaporan">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>Dokter</th>
                                <th>Spesialis</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pendaftaran) && count($pendaftaran) > 0): 
                                $no = 1;
                                foreach ($pendaftaran as $p): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p->nama_lengkap; ?></td>
                                    <td><?= $p->nama_dokter; ?></td>
                                    <td><?= $p->spesialis; ?></td>
                                    <td><?= date('d-m-Y', strtotime($p->tanggal_kunjungan)); ?></td>
                                    <td><?= substr($p->jam_kunjungan, 0, 5); ?></td>
                                    <td>
                                        <?php if ($p->status == 'pending'): ?>
                                            <span class="label label-warning">Pending</span>
                                        <?php elseif ($p->status == 'disetujui'): ?>
                                            <span class="label label-success">Disetujui</span>
                                        <?php else: ?>
                                            <span class="label label-danger">Ditolak</span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data</td>
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
    box-shadow: 0 5px 20px rgba(0,0,0,0.06);
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
.chart-container {
    position: relative;
    height: 280px;
    width: 100%;
}
.btn-group .btn {
    border-radius: 8px !important;
    padding: 10px 25px;
    font-weight: 500;
}
</style>