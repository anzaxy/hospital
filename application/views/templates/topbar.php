<!-- Topbar / Navbar -->
<nav class="navbar navbar-custom navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- <a class="navbar-brand" href="<?= site_url('dashboard'); ?>">
                <i class="fa fa-heartbeat"></i> RS Sehat
            </a> -->
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <i class="fa fa-user-circle"></i> <?= $this->session->userdata('username'); ?>
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?= site_url('dashboard'); ?>"><i class="fa fa-dashboard"></i> Dashboard</a></li>
                        <?php if ($this->session->userdata('role') == 'pasien'): ?>
                            <li><a href="<?= site_url('pasien/profil'); ?>"><i class="fa fa-user"></i> Profil</a></li>
                        <?php endif; ?>
                        <li class="divider"></li>
                        <li><a href="<?= site_url('logout'); ?>"><i class="fa fa-sign-out"></i> Logout</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Spacer untuk fixed navbar -->
<div style="height: 50px;"></div>