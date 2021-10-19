<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('user'); ?>">
        <div>
            <img src="<?= base_url('assets/img/') . 'logo.png' ?>" height="60" width="47">
        </div>
        <div class="sidebar-brand-text mx-3">GAYUNGAN </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
            <i class="far fa-fw fa-user"></i>
            <span>Profil saya</span></a>
        <a class="nav-link" href="<?= base_url('user/kegiatan'); ?>">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Kegiatan</span></a>
        <a class="nav-link" href="<?= base_url('user/tambah_laporan'); ?>">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Tambah Laporan</span></a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('auth/logout'); ?>">
            <i class="fas fa-sign-out-alt fa-fw"></i>
            <span>Keluar</span></a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
<!-- End of Sidebar -->