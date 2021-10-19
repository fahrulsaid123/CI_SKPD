<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

</div>
<div class="card mb-3 col-lg p-5 border-0 shadow-lg">
    <div class="form-group">
        <?= $this->session->flashdata('error'); ?>
        <?php echo form_open_multipart('user/proses_tambah'); ?>
        <p><input type="text" class="form-control form-control-user" id="keterangan" name="keterangan"></p>
        <p><input type="file" class="form-control form-control-user" name="gambar"></p>
        <button type="submit" class="btn btn-primary btn-user btn-block">
            Tambah
        </button>
        <?php echo form_close(); ?>
    </div>
</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->