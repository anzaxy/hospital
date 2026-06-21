<?php 
$role = $this->session->userdata('role');
$segment1 = $this->uri->segment(1);
$segment2 = $this->uri->segment(2);
?>

<!-- Sidebar -->
<div class="sidebar">
    <div class="sidebar-brand">
        <i class="fa fa-heartbeat"></i> RS Sehat Sejahtera
    </div>
    <ul class="sidebar-nav">
        <li class="<?= ($segment1 == 'dashboard' || $segment1 == '') ? 'active' : ''; ?>">
            <a href="<?= site_url('dashboard'); ?>">
                <i class="fa fa-dashboard"></i> Dashboard
            </a>
        </li>
        
        <?php if ($role == 'admin'): ?>
        <li class="<?= ($segment1 == 'admin' && $segment2 == 'pasien') ? 'active' : ''; ?>">
            <a href="<?= site_url('admin/pasien'); ?>">
                <i class="fa fa-users"></i> Data Pasien
                <span class="badge"><?= isset($total_pasien) ? $total_pasien : 0; ?></span>
            </a>
        </li>
        <li class="<?= ($segment1 == 'admin' && $segment2 == 'dokter') ? 'active' : ''; ?>">
            <a href="<?= site_url('admin/dokter'); ?>">
                <i class="fa fa-user-md"></i> Data Dokter
                <span class="badge"><?= isset($total_dokter) ? $total_dokter : 0; ?></span>
            </a>
        </li>
        <li class="<?= ($segment1 == 'admin' && $segment2 == 'pendaftaran') ? 'active' : ''; ?>">
            <a href="<?= site_url('admin/pendaftaran'); ?>">
                <i class="fa fa-file-text"></i> Pendaftaran
                <span class="badge" style="background: #f0ad4e;"><?= isset($statistik['pending']) ? $statistik['pending'] : 0; ?></span>
            </a>
        </li>
        <li class="<?= ($segment1 == 'admin' && $segment2 == 'laporan') ? 'active' : ''; ?>">
            <a href="<?= site_url('admin/laporan'); ?>">
                <i class="fa fa-bar-chart"></i> Laporan
            </a>
        </li>
        <?php else: ?>
        <li class="<?= ($segment1 == 'pasien' && $segment2 == 'status') ? 'active' : ''; ?>">
            <a href="<?= site_url('pasien/status'); ?>">
                <i class="fa fa-info-circle"></i> Status Pendaftaran
            </a>
        </li>
        <li class="<?= ($segment1 == 'pasien' && $segment2 == 'profil') ? 'active' : ''; ?>">
            <a href="<?= site_url('pasien/profil'); ?>">
                <i class="fa fa-user"></i> Profil
            </a>
        </li>
        <?php endif; ?>
        
        <li class="divider"></li>
        <li>
            <a href="<?= site_url('logout'); ?>" class="logout-btn">
                <i class="fa fa-sign-out"></i> Logout
            </a>
        </li>
    </ul>
    
    <div class="sidebar-footer">
        <small>RS Sehat v1.0</small>
    </div>
</div>

<!-- MAIN CONTENT -->
<div class="main-content">

<style>
/* SIDEBAR STYLE */
.sidebar {
    position: fixed;
    top: 0;
    left: 0;
    width: 250px;
    height: 100%;
    background: #e8f5f5;
    z-index: 1000;
    overflow-y: auto;
    transition: all 0.3s;
    box-shadow: 2px 0 20px rgba(0,0,0,0.08);
}

.sidebar-brand {
    padding: 20px 25px;
    color: #1a8a8a;
    font-size: 22px;
    font-weight: 700;
    border-bottom: 1px solid rgba(0,0,0,0.06);
    margin-bottom: 15px;
    letter-spacing: 1px;
}
.sidebar-brand i {
    color: #1a8a8a;
    margin-right: 12px;
    font-size: 28px;
}

.sidebar-nav {
    list-style: none;
    padding: 0;
    margin: 0;
}
.sidebar-nav li {
    margin: 0 12px 4px 12px;
    border-radius: 12px;
    transition: 0.3s;
}
.sidebar-nav li:hover {
    background: rgba(26, 138, 138, 0.06);
}
.sidebar-nav li.active {
    background: rgba(26, 138, 138, 0.12);
}
.sidebar-nav li.active a {
    color: #1a8a8a;
    font-weight: 600;
}
.sidebar-nav li.active a i {
    color: #1a8a8a;
}
.sidebar-nav li.active a .badge {
    background: rgba(26, 138, 138, 0.2);
    color: #1a8a8a;
}
.sidebar-nav li a {
    display: flex;
    align-items: center;
    padding: 12px 18px;
    color: #444;
    text-decoration: none;
    transition: 0.3s;
    font-weight: 500;
    font-size: 14px;
    border-radius: 12px;
}
.sidebar-nav li a i {
    margin-right: 14px;
    width: 22px;
    text-align: center;
    font-size: 18px;
    color: #1a8a8a;
}
.sidebar-nav li a .badge {
    margin-left: auto;
    background: rgba(26, 138, 138, 0.1);
    color: #1a8a8a;
    padding: 3px 10px;
    border-radius: 20px;
    font-weight: 500;
    font-size: 12px;
}
.sidebar-nav li a:hover {
    color: #1a8a8a;
    background: rgba(26, 138, 138, 0.05);
}
.sidebar-nav li a:hover i {
    color: #1a8a8a;
}
.sidebar-nav li.divider {
    height: 1px;
    background: rgba(0,0,0,0.06);
    margin: 12px 18px;
}
.sidebar-nav li .logout-btn {
    color: #444;
}
.sidebar-nav li .logout-btn i {
    color: #e74c6f;
}
.sidebar-nav li .logout-btn:hover {
    color: #e74c6f;
    background: rgba(231, 76, 111, 0.06);
}
.sidebar-nav li .logout-btn:hover i {
    color: #e74c6f;
}

.sidebar-footer {
    position: absolute;
    bottom: 20px;
    left: 0;
    right: 0;
    text-align: center;
    color: rgba(0,0,0,0.2);
    font-size: 12px;
    padding: 10px;
    border-top: 1px solid rgba(0,0,0,0.06);
    margin: 0 20px;
}

/* MAIN CONTENT */
.main-content {
    margin-left: 250px;
    padding: 25px 30px;
    min-height: 100vh;
    background: #f4f7fc;
}

/* SCROLLBAR SIDEBAR */
.sidebar::-webkit-scrollbar {
    width: 4px;
}
.sidebar::-webkit-scrollbar-track {
    background: rgba(0,0,0,0.03);
}
.sidebar::-webkit-scrollbar-thumb {
    background: rgba(26, 138, 138, 0.3);
    border-radius: 10px;
}

/* RESPONSIVE */
@media (max-width: 768px) {
    .sidebar {
        left: -250px;
    }
    .sidebar.show {
        left: 0;
    }
    .main-content {
        margin-left: 0 !important;
        padding: 15px !important;
    }
}

/* SIDEBAR TOGGLE BUTTON DI NAVBAR */
.sidebar-toggle {
    display: none;
    background: none;
    border: none;
    color: white;
    font-size: 24px;
    padding: 10px 15px;
    cursor: pointer;
}
@media (max-width: 768px) {
    .sidebar-toggle {
        display: block;
    }
}
</style>

<script>
$(document).ready(function() {
    // Toggle sidebar mobile
    $('.sidebar-toggle').click(function() {
        $('.sidebar').toggleClass('show');
    });
    
    // Close sidebar saat klik di luar
    $(document).click(function(event) {
        if (!$(event.target).closest('.sidebar').length && !$(event.target).closest('.sidebar-toggle').length) {
            $('.sidebar').removeClass('show');
        }
    });
});
</script>