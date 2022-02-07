<?php
require '../koneksi.php';
include '../template/header.php';
include '../template/navbar.php';
include '../template/sidebar.php';

$query = mysqli_query($koneksi, "SELECT mahasiswa.*, kelas.nama_kelas, kelas.wali_kelas FROM mahasiswa JOIN kelas ON mahasiswa.id_kelas = kelas.id_kelas ORDER BY kelas.nama_kelas ASC");

$no = 1;
?>

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                                <h3 class="h3">DATA KESELURUHAN</h3>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example2" class="table table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>ID Kelas</th>
                                        <th>Nama</th>
                                        <th>Nama Kelas</th>
                                        <th>Wali Kelas</th>
                                        <th>Alamat</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Hobi</th>
                                        <th>Tempat Lahir</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Provinsi Tinggal</th>
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
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>