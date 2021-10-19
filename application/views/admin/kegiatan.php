<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Laporan Kegiatan</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tanggal</th>
                            <th>Pengguna</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tanggal</th>
                            <th>Pengguna</th>
                            <th>Keterangan</th>
                            <th>Gambar</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($laporan); $i++) {
                            echo '<tr>';
                            echo '<td>' . date('d F Y - H:i', $laporan[$i]->tanggal) . '</td>';
                            echo '<td>' . $laporan[$i]->username . '</td>';
                            echo '<td>' . $laporan[$i]->keterangan . '</td>';
                            echo '<td><img src="' . base_url('assets/img/laporan/') . $laporan[$i]->image . '" height="50" width="50"></td>';
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