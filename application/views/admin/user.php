<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Daftar member</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Foto Profil</th>
                            <th>Status Pengguna</th>
                            <th>Status Aktif</th>
                            <th>Eksekusi</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Foto Profil</th>
                            <th>Status Pengguna</th>
                            <th>Status Aktif</th>
                            <th>Eksekusi</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($member); $i++) {
                            echo '<tr>';
                            echo '<td>' . $member[$i]->nama . '</td>';
                            echo '<td>' . $member[$i]->username . '</td>';
                            echo '<td><img src="' . base_url('assets/img/profile/') . $member[$i]->image . '" height="50" width="50"></td>';
                            if ($member[$i]->role_id == 1) {
                                echo '<td> Admin </td>';
                            } else {
                                echo '<td> Member </td>';
                            }
                            if ($member[$i]->is_active == 1) {
                                echo '<td> Aktif </td>';
                            } else if ($member[$i]->is_active == 0) {
                                echo '<td> Tidak Aktif </td>';
                            } else {
                                echo '<td> Diblokir </td>';
                            }
                            echo '<td>
                            <a href="' . base_url('admin/edit/') . $member[$i]->username . '">
                                <button type="submit" class="btn btn-primary">
                                    Edit
                                </button>
                            </a>
                            <a href="' . base_url('admin/blokir/') . $member[$i]->username . '" class="btn btn-danger btn-icon-split">
                                <span class="icon text-white-50">
                                    <i class="fas fa-exclamation-triangle"></i>
                                </span>
                                <span class="text">Blokir</span>
                            </a>
                            </td>';
                            echo '</tr>';
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->