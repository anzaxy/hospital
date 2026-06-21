<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #1a8a8a; border-bottom-color: #1a8a8a;">
            <i class="fa fa-dashboard"></i> Data Pendaftaran
            <small>Manajemen pendaftaran pasien</small>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-table"></i> Daftar Pendaftaran
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabelPendaftaran">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Pasien</th>
                                <th>No Telepon</th>
                                <th>Dokter</th>
                                <th>Spesialis</th>
                                <th>Keluhan</th>
                                <th>Tanggal</th>
                                <th>Jam</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pendaftaran) && count($pendaftaran) > 0): 
                                $no = 1;
                                foreach ($pendaftaran as $p): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p->nama_lengkap; ?></td>
                                    <td><?= $p->no_telepon; ?></td>
                                    <td><?= $p->nama_dokter; ?></td>
                                    <td><?= $p->spesialis; ?></td>
                                    <td><?= substr($p->keluhan_penyakit, 0, 30); ?>...</td>
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
                                    <td>
                                        <?php if ($p->status == 'pending'): ?>
                                            <a href="<?= site_url('admin/setujui/'.$p->id_pendaftaran); ?>" 
                                               class="btn btn-success btn-sm btn-setujui">
                                                <i class="fa fa-check"></i>
                                            </a>
                                            <a href="<?= site_url('admin/tolak/'.$p->id_pendaftaran); ?>" 
                                               class="btn btn-danger btn-sm btn-tolak">
                                                <i class="fa fa-times"></i>
                                            </a>
                                        <?php endif; ?>
                                        <a href="<?= site_url('admin/hapus_pendaftaran/'.$p->id_pendaftaran); ?>" 
                                           class="btn btn-danger btn-sm btn-hapus">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="10" class="text-center">Belum ada data pendaftaran</td>
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
    $('#tabelPendaftaran').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
        },
        order: [[6, 'desc']]
    });

    // Setujui
    $('.btn-setujui').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: 'Setujui pendaftaran?',
            text: "Pasien akan dikonfirmasi dan mendapat jadwal!",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, Setujui!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });

    // Tolak
    $('.btn-tolak').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: 'Tolak pendaftaran?',
            text: "Pasien akan ditolak!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#dc3545',
            cancelButtonColor: '#28a745',
            confirmButtonText: 'Ya, Tolak!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });

    // Hapus
    $('.btn-hapus').click(function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        Swal.fire({
            title: 'Yakin ingin hapus?',
            text: "Data akan dihapus permanen!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Ya, hapus!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = url;
            }
        });
    });
});
</script>