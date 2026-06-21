<?php $title = 'Data Pasien';
    $active_menu = 'pasien'; ?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header" style="color: #1a8a8a; border-bottom-color: #1a8a8a;">
            <i class="fa fa-dashboard"></i> Data Pasien
            <small>Manajemen data pasien</small>
        </h1>
    </div>
</div>

<!-- Tombol Tambah -->
<div class="row">
    <div class="col-lg-12">
        <button class="btn btn-primary" data-toggle="modal" data-target="#modalTambah">
            <i class="fa fa-plus"></i> Tambah Pasien
        </button>
        <hr>
    </div>
</div>

<!-- Tabel Data Pasien -->
<div class="row">
    <div class="col-lg-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-table"></i> Daftar Pasien
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="tabelPasien">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Alamat</th>
                                <th>No Telepon</th>
                                <th>Email</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($pasien) && count($pasien) > 0): 
                                $no = 1;
                                foreach ($pasien as $p): ?>
                                <tr>
                                    <td><?= $no++; ?></td>
                                    <td><?= $p->nama_lengkap; ?></td>
                                    <td><?= date('d-m-Y', strtotime($p->tanggal_lahir)); ?></td>
                                    <td><?= $p->alamat; ?></td>
                                    <td><?= $p->no_telepon; ?></td>
                                    <td><?= $p->email; ?></td>
                                    <td>
                                        <button class="btn btn-warning btn-sm btn-edit" 
                                                data-id="<?= $p->id_pasien; ?>"
                                                data-nama="<?= $p->nama_lengkap; ?>"
                                                data-tanggal="<?= $p->tanggal_lahir; ?>"
                                                data-alamat="<?= $p->alamat; ?>"
                                                data-telepon="<?= $p->no_telepon; ?>"
                                                data-email="<?= $p->email; ?>">
                                            <i class="fa fa-edit"></i>
                                        </button>
                                        <a href="<?= site_url('admin/hapus_pasien/'.$p->id_pasien); ?>" 
                                           class="btn btn-danger btn-sm btn-hapus">
                                            <i class="fa fa-trash"></i>
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; 
                            else: ?>
                                <tr>
                                    <td colspan="7" class="text-center">Belum ada data pasien</td>
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
                <h4 class="modal-title"><i class="fa fa-user-plus"></i> Tambah Pasien</h4>
            </div>
            <form action="<?= site_url('admin/tambah_pasien'); ?>" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="no_telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" required>
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
                <h4 class="modal-title"><i class="fa fa-edit"></i> Edit Pasien</h4>
            </div>
            <form id="formEdit" method="POST">
                <div class="modal-body">
                    <input type="hidden" name="id_pasien" id="edit_id">
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap" id="edit_nama" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" id="edit_tanggal" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" id="edit_alamat" class="form-control" required></textarea>
                    </div>
                    <div class="form-group">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="no_telepon" id="edit_telepon" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" id="edit_email" class="form-control" required>
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
    $('#tabelPasien').DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.10.24/i18n/Indonesian.json'
        }
    });

    // Edit button
    $('.btn-edit').click(function() {
        var id = $(this).data('id');
        var nama = $(this).data('nama');
        var tanggal = $(this).data('tanggal');
        var alamat = $(this).data('alamat');
        var telepon = $(this).data('telepon');
        var email = $(this).data('email');
        
        $('#edit_id').val(id);
        $('#edit_nama').val(nama);
        $('#edit_tanggal').val(tanggal);
        $('#edit_alamat').val(alamat);
        $('#edit_telepon').val(telepon);
        $('#edit_email').val(email);
        
        $('#formEdit').attr('action', '<?= site_url('admin/edit_pasien/'); ?>' + id);
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