<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #1a8a8a; border-bottom-color: #1a8a8a;">
            <i class="fa fa-dashboard"></i> Data Dokter
            <small>Manajemen data dokter</small>
        </h1>
    </div>
</div>

<!-- Tombol Tambah -->
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Dokter
        </button>
        <hr>
    </div>
</div>

<!-- Tabel Data Dokter -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-table"></i> Daftar Dokter
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabelDokter">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokter</th>
                                <th>Spesialis</th>
                                <th>No Telepon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($dokter) && count($dokter) > 0): 
                                $no = 1;
                                foreach ($dokter as $d): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $d->nama_dokter; ?></td>
                                    <td><?= $d->spesialis; ?></td>
                                    <td><?= $d->no_telepon; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-edit" 
                                                data-id="<?= $d->id_dokter; ?>"
                                                data-nama="<?= $d->nama_dokter; ?>"
                                                data-spesialis="<?= $d->spesialis; ?>"
                                                data-telepon="<?= $d->no_telepon; ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="<?= site_url('admin/hapus_dokter/'.$d->id_dokter); ?>" 
                                           class="btn btn-danger btn-sm btn-hapus">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="5" class="text-center">Belum ada data dokter</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MODAL TAMBAH -->
<div class="modal fade" id="modalTambah" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Dokter</h4>
            </div>
            <form action="<?= site_url('admin/tambah_dokter'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Dokter <span class="text-danger">*</span></label>
                        <input type="text" name="nama_dokter" class="form-control" placeholder="Contoh: Dr. Ahmad Wijaya, Sp.PD" required>
                    </div>
                    <div class="form-group">
                        <label>Spesialis <span class="text-danger">*</span></label>
                        <input type="text" name="spesialis" class="form-control" placeholder="Contoh: Penyakit Dalam" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="no_telepon" class="form-control" placeholder="Contoh: 081234567890" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- MODAL EDIT -->
<div class="modal fade" id="modalEdit" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Dokter</h4>
            </div>
            <form id="formEdit" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_dokter" id="edit_id">
                    <div class="form-group">
                        <label>Nama Dokter <span class="text-danger">*</span></label>
                        <input type="text" name="nama_dokter" id="edit_nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Spesialis <span class="text-danger">*</span></label>
                        <input type="text" name="spesialis" id="edit_spesialis" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="no_telepon" id="edit_telepon" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-warning"><i class="fa fa-save"></i> Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
$(document).ready(function() {
    $('#tabelDokter').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
        }
    });

    // Edit button
    $('.btn-edit').click(function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var spesialis = $(this).data('spesialis');
        var telepon = $(this).data('telepon');
        
        $('#edit_id').val(id);
        $('#edit_nama').val(nama);
        $('#edit_spesialis').val(spesialis);
        $('#edit_telepon').val(telepon);
        
        $('#formEdit').attr('action', '<?= site_url('admin/edit_dokter/'); ?>' + id);
        $('#modalEdit').modal('show');
    });

    // Delete confirmation
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