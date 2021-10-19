<!-- Sidebar -->
<ul class="navbar-nav bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="<?= base_url('admin'); ?>">
        <div>
            <img src="<?= base_url('assets/img/') . 'logo.png' ?>" height="60" width="47">
        </div>
        <div class="sidebar-brand-text mx-3">ADMIN - GAYUNGAN </div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="<?= base_url('admin/user'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Daftar user</span></a>
        <a class="nav-link" href="<?= base_url('admin/user_blokir'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>User blokir</span></a>
        <a class="nav-link" href="<?= base_url('admin/kegiatan'); ?>">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Log Kegiatan</span></a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        User
    </div>

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