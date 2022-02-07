<?php


if (isset($_POST['submit'])) {
    $nama_kelas = $_POST['nama_kelas'];
    $wali_kelas = $_POST['wali_kelas'];

    $sql = mysqli_query($koneksi, "INSERT INTO kelas VALUES ('id_kls','$nama_kelas', '$wali_kelas')");
    echo "<script>alsret('Data berhasil ditambahkan')</script>";
    echo "<script type='text/javascript'> document.location = 'index.php?page=data_kelas'; </script>";
}
?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h3 class="h3">TAMBAH DATA KELAS</h3>
                        </div>
                        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <form action="" method="POST">
                                        <div class="mb-3">
                                            <label for="nama_kelas" class="form-label">Nama Kelas</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="wali_kelas" class="form-label">Wali Kelas</label>
                                            <input type="text" class="form-control" id="wali_kelas" name="wali_kelas" required>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Tambah Data Kelas</button>
                                    </form>
                                </table>
                            </div>
                        </main>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>