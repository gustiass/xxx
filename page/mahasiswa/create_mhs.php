<?php


$koneksi = mysqli_connect("localhost", "root", "", "kuliah");
$result = mysqli_query($koneksi, "SELECT * FROM kelas") or die('Query GAGAL!' . mysqli_error($koneksi));
// session_start();

if (isset($_POST['submit'])) {
    $id_kelas = $_POST['id_kelas'];
    // $nama_kelas = $_POST['nama_kelas'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hobi = $_POST['hobi'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $provinsi_tinggal = $_POST['provinsi_tinggal'];
    $hobi = explode(',', $_POST['hobi']);


    $sql = mysqli_query($koneksi, "INSERT INTO mahasiswa VALUES ('', '$id_kelas', '$nama', '$alamat', '$jenis_kelamin', '$hobi', '$tempat_lahir', '$tgl_lahir', '$provinsi_tinggal')");
    $_SESSION['sukses'] = 'Data Berhasil Disimpan';
    echo "<script>alsret('Data berhasil ditambahkan')</script>";
    echo "<script type='text/javascript'> document.location = 'index.php?page=data_mhs'; </script>";
}
?>



<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                            <h3 class="h3">TAMBAH DATA MAHASISWA</h3>
                        </div>
                        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <form action="" method="POST">
                                        <div class="form-group">
                                            <label>Pilih Kelas</label>
                                            <select class="form-control select2" name="id_kelas" style="width: 100%;" required>
                                                <option selected="selected">Pilih Kelas</option>
                                                <?php
                                                $koneksi = mysqli_connect("localhost", "root", "", "kuliah");
                                                $query = "SELECT * From kelas";
                                                $mahasiswa = mysqli_query($koneksi, $query);
                                                while ($row = mysqli_fetch_assoc($mahasiswa)) {
                                                    echo " <option value='$row[id_kelas]'>$row[nama_kelas]</option>";
                                                }
                                                ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
                                        </div>

                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                            <input type="radio" name="jenis_kelamin" value="laki-laki" required> Laki-laki
                                            <input type="radio" name="jenis_kelamin" value="perempuan" required> Perempuan<br>
                                        </div>

                                        <div class="mb-3">
                                            <label for="hobi" class="form-label">Hobi</label><br>
                                            <input type="checkbox" name="hobi[]" value="Membaca"> Membaca
                                            <input type="checkbox" name="hobi[]" value="Sepak Bola"> Sepak Bola
                                            <input type="checkbox" name="hobi[]" value="Programer"> Programer

                                            <?php if (isset($_POST["submit"])) {
                                                if (!empty($_POST["hobi"])) {
                                                    echo '123';
                                                    foreach ($_POST["hobi"] as $hobi) {
                                                        echo '.$hobi. ';
                                                    }
                                                } else {
                                                    echo 'silakan masukan hobi';
                                                }
                                            }
                                            ?>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" required>
                                        </div>

                                        <div class="mb-3">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" required>
                                        </div>

                                        <div class="form-group">
                                            <label>Provinsi Tinggal</label>
                                            <select class="form-control select2" name="provinsi_tinggal" style="width: 100%;" required>
                                                <option selected="selected">Provinsi Tinggal</option>
                                                <option value="JAWA BARAT">JAWA BARAT</option>
                                                <option value="JAWA TIMUR">JAWA TIMUR</option>
                                            </select>
                                        </div>

                                        <button type="submit" name="submit" class="btn btn-primary">Tambah Data Mahasiswa</button>
                                        <!-- <a class="btn btn-primary" href="create.php" role="buttonn">Tambah Data</a> -->
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