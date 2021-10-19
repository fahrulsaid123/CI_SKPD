<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>


</div>

<div class="card mb-3 col-lg p-5 border-0 shadow-lg">
    <div class="form-group">
        <form class="user" method="post" action="<?= base_url('admin/edit/') . $member_edit[0]->username; ?>">
            <div class="form-group">
                Nama : <input type="text" class="form-control form-control-user" id="name" name="name" value="<?= $member_edit[0]->nama; ?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>'); ?>
            </div>
            <div class="form-group">
                Username : <input type="text" class="form-control form-control-user" id="username" name="username" value="<?= $member_edit[0]->username; ?>">
                <?= form_error('username', '<small class="text-danger pl-3">', '</small>'); ?>
                <input type="hidden" id="id" name="id" value="<?= $member_edit[0]->id; ?>">
                <input type="hidden" id="password" name="password" value="<?= $member_edit[0]->password; ?>">
                <input type="hidden" id="image" name="image" value="<?= $member_edit[0]->image; ?>">
            </div>
            <div class="form-group row">
                <div class="col-sm-6">
                    Status pengguna :
                    <select class="form-control" name="status_user">
                        <?php
                        $status_user = array(1 => 'admin', 2 => 'member');
                        foreach ($status_user as $s => $s_value) { ?>
                            <option value="<?php echo $s; ?>" <?php
                                                                if ($s == $member_edit[0]->role_id) {
                                                                    echo "selected";
                                                                } ?>>
                                <?php echo $s_value; ?> </option>
                        <?php } ?>
                    </select>
                </div>
                <div class="col-sm-6">
                    Status aktif :
                    <select class="form-control" name="status_aktif">
                        <?php
                        $status_aktif = array(0 => 'tidak aktif', 1 => 'aktif', 2 => 'diblokir');
                        foreach ($status_aktif as $s => $s_value) { ?>
                            <option value="<?php echo $s; ?>" <?php
                                                                if ($s == $member_edit[0]->is_active) {
                                                                    echo "selected";
                                                                } ?>>
                                <?php echo $s_value; ?> </option>
                        <?php } ?>
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-user btn-block">
                Edit
            </button>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->