<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<div class="card mb-3" style="max-width: 540px;">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="card-img">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?= $user['nama']; ?></h5>
            </div>
            <div class="card-body">
                <a href="<?= base_url('user/edit_profile'); ?>">
                    <h5 class="card-title">EDIT FOTO PROFIL</h5>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->