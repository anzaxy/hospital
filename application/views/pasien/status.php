<div class="row">
    <div class="col-lg-12">
       <h1 class="page-header" style="color: #1a8a8a; border-bottom-color: #1a8a8a;">
            <i class="fa fa-dashboard"></i> Status Pendaftaran
            <small>Cek status pendaftaran Anda</small>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-list"></i> Daftar Status Pendaftaran
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabelStatus">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Dokter</th>
                                <th>Spesialis</th>
                                <th>Keluhan</th>
                                <th>Tanggal Kunjungan</th>
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
                                    <td><?= $p->nama_dokter; ?></td>
                                    <td><?= $p->spesialis; ?></td>
                                    <td><?= $p->keluhan_penyakit; ?></td>
                                    <td><?= date('d-m-Y', strtotime($p->tanggal_kunjungan)); ?></td>
                                    <td><?= substr($p->jam_kunjungan, 0, 5); ?></td>
                                    <td>
                                        <?php if ($p->status == 'pending'): ?>
                                            <span class="label label-warning" style="font-size:14px;">
                                                <i class="fa fa-clock-o"></i> Dalam Proses
                                            </span>
                                        <?php elseif ($p->status == 'disetujui'): ?>
                                            <span class="label label-success" style="font-size:14px;">
                                                <i class="fa fa-check-circle"></i> Disetujui
                                            </span>
                                        <?php else: ?>
                                            <span class="label label-danger" style="font-size:14px;">
                                                <i class="fa fa-times-circle"></i> Ditolak
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                            <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <p>Belum ada pendaftaran</p>
                                        <a href="<?= site_url('pendaftaran'); ?>" class="btn btn-primary">
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

<script>
$(document).ready(function() {
    $('#tabelStatus').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
        },
        order: [[4, 'desc']]
    });
});
</script>