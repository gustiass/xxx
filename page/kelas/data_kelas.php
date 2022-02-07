<?php
$result = mysqli_query($koneksi, "SELECT * FROM kelas") or die('Query GAGAL!' . mysqli_error($koneksi));
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
                            <h3 class="card-title">Data Kelas</h3>
                            <a class="btn btn-primary" href="index.php?page=create_kelas" role="buttonn">Tambah Data</a>
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                Tambah Data
                            </button> -->
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kelas</th>
                                    <th>Wali Kelas</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($kelas = mysqli_fetch_assoc($result)) : ?>

                                    <tr>
                                        <th scope="row"> <?= $no++; ?></th>
                                        <td> <?= $kelas['nama_kelas']; ?></td>
                                        <td> <?= $kelas['wali_kelas']; ?></td>

                                        <td>
                                            <a href="index.php?page=edit_kelas&id_kelas=<?= $kelas['id_kelas']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a onclick="return confirm ('Apakah anda yakin?')" href="index.php?page=delete_kelas&id_kelas=<?= $kelas['id_kelas']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>