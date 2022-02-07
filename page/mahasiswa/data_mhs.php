<?php
// session_start();
$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa") or die('Query GAGAL!') . mysqli_error($koneksi);
$query = mysqli_query($koneksi, "SELECT mahasiswa.*, kelas.nama_kelas, kelas.wali_kelas FROM mahasiswa JOIN kelas ON mahasiswa.id_kelas = kelas.id_kelas ORDER BY kelas.nama_kelas ASC");
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
                            <a class="btn btn-primary" href="index.php?page=create_mhs" role="buttonn">Tambah Data</a>
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                Tambah Data
                            </button> -->
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>ID MHS</th>
                                    <th>ID KELAS</th>
                                    <th>Nama</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Hobi</th>
                                    <th>Tempat Lahir</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Provinsi Tinggal</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                $query = mysqli_query($koneksi, "SELECT mahasiswa.*, kelas.nama_kelas, kelas.wali_kelas FROM mahasiswa JOIN kelas ON mahasiswa.id_kelas = kelas.id_kelas ORDER BY kelas.nama_kelas ASC");
                                while ($data = mysqli_fetch_array($query)) {
                                    $no++;
                                ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $data['id_mhs']; ?></td>
                                        <td><?= $data['nama_kelas']; ?></td>
                                        <td><?= $data['nama']; ?></td>
                                        <td><?= $data['alamat']; ?></td>
                                        <td><?= $data['jenis_kelamin']; ?></td>
                                        <td><?= $data['hobi']; ?></td>
                                        <td><?= $data['tempat_lahir']; ?></td>
                                        <td><?= $data['tgl_lahir']; ?></td>
                                        <td><?= $data['provinsi_tinggal']; ?></td>
                                        <td>
                                            <a href="index.php?page=edit_mhs&id_mhs=<?= $data['id_mhs']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                            <a onclick="return confirm ('Apakah anda yakin?')" href="index.php?page=delete_mhs&id_mhs=<?= $data['id_mhs']; ?>" class="btn btn-danger btn-sm">Hapus</a>
                                        </td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->