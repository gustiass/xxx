<?php
error_reporting(error_reporting() & ~E_NOTICE);
// include "config/koneksi.php";
if ($_GET['page'] == "data_mhs") {
    include "page/mahasiswa/data_mhs.php";
} else if ($_GET['page'] == "create_mhs") {
    include "page/mahasiswa/create_mhs.php";
} else if ($_GET['page'] == "edit_mhs") {
    include "page/mahasiswa/edit_mhs.php";
} else if ($_GET['page'] == "delete_mhs") {
    include "page/mahasiswa/delete_mhs.php";
} else if ($_GET['page'] == "data_kelas") {
    include "page/kelas/data_kelas.php";
} else if ($_GET['page'] == 'create_kelas') {
    include "page/kelas/create_kelas.php";
} else if ($_GET['page'] == 'edit_kelas') {
    include "page/kelas/edit_kelas.php";
} else if ($_GET['page'] == 'delete_kelas') {
    include "page/kelas/delete_kelas.php";
} else {
    $query = mysqli_query($koneksi, "SELECT mahasiswa.*, kelas.nama_kelas, kelas.wali_kelas FROM mahasiswa JOIN kelas ON mahasiswa.id_kelas = kelas.id_kelas ORDER BY kelas.nama_kelas ASC");
    // $query = mysqli_query($koneksi, $sql);
    $no = 1;
?>
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>DataTables</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">DataTables</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                                <h3 class="card-title">Data Mahasiswa</h3>
                            </div>
                        </div>
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">ID Kelas</th>
                                        <th scope="col">Nama</th>
                                        <th scope="col">Nama Kelas</th>
                                        <th scope="col">Wali Kelas</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Jenis Kelamin</th>
                                        <th scope="col">Hobi</th>
                                        <th scope="col">Tempat Lahir</th>
                                        <th scope="col">Tanggal Lahir</th>
                                        <th scope="col">Provinsi Tinggal</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php while ($data = mysqli_fetch_array($query)) : ?>
                                        <tr>
                                            <!-- <th scope="row"><?= $data['id_data']; ?></th> -->
                                            <td><?= $no++ ?></td>
                                            <td><?= $data['id_kelas']; ?></th>
                                            <td><?= $data['nama']; ?></td>
                                            <td><?= $data['nama_kelas']; ?></td>
                                            <td><?= $data['wali_kelas']; ?></td>
                                            <td><?= $data['alamat']; ?></td>
                                            <td><?= $data['jenis_kelamin']; ?></td>
                                            <td><?= $data['hobi']; ?></td>
                                            <td><?= $data['tempat_lahir']; ?></td>
                                            <td><?= $data['tgl_lahir']; ?></td>
                                            <td><?= $data['provinsi_tinggal']; ?></td>
                                        </tr>
                                    <?php endwhile;  ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- /.content-wrapper -->
<?php
}
?>