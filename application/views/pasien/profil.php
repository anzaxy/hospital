<div class="row">
    <div class="col-lg-12">
       <h1 class="page-header" style="color: #1a8a8a; border-bottom-color: #1a8a8a;">
            <i class="fa fa-dashboard"></i> Profil Pasien
            <small>Kelola data diri Anda</small>
        </h1>
    </div>
</div>

<div class="row">
    <div class="col-lg-6 col-md-8 col-lg-offset-3 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-edit"></i> Edit Profil
            </div>
            <div class="panel-body">
                <?php if (isset($pasien)): ?>
                <form action="<?= site_url('pasien/update_profil'); ?>" method="POST">
                    <input type="hidden" name="id_pasien" value="<?= $pasien->id_pasien; ?>">
                    
                    <div class="form-group">
                        <label>Nama Lengkap <span class="text-danger">*</span></label>
                        <input type="text" name="nama_lengkap" class="form-control" 
                               value="<?= $pasien->nama_lengkap; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" name="tanggal_lahir" class="form-control" 
                               value="<?= $pasien->tanggal_lahir; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Alamat <span class="text-danger">*</span></label>
                        <textarea name="alamat" class="form-control" required><?= $pasien->alamat; ?></textarea>
                    </div>
                    
                    <div class="form-group">
                        <label>No Telepon <span class="text-danger">*</span></label>
                        <input type="text" name="no_telepon" class="form-control" 
                               value="<?= $pasien->no_telepon; ?>" required>
                    </div>
                    
                    <div class="form-group">
                        <label>Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" class="form-control" 
                               value="<?= $pasien->email; ?>" required>
                    </div>
                    
                    <button type="submit" class="btn btn-primary btn-block">
                        <i class="fa fa-save"></i> Update Profil
                    </button>
                </form>
                <?php else: ?>
                    <div class="alert alert-warning">
                        Data pasien belum lengkap. Silakan lengkapi profil Anda.
                    </div>
                <?php endif; ?>
            </div>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading">
                <i class="fa fa-info-circle"></i> Informasi Akun
            </div>
            <div class="panel-body">
                <p><strong>Username:</strong> <?= $this->session->userdata('username'); ?></p>
                <p><strong>Role:</strong> <?= ucfirst($this->session->userdata('role')); ?></p>
                <p><strong>ID User:</strong> <?= $this->session->userdata('id_user'); ?></p>
            </div>
        </div>
    </div>
</div>