<?php

$id_mhs = $_GET['id_mhs'];

$query_mhs = mysqli_query($koneksi, "SELECT * FROM mahasiswa 
LEFT JOIN kelas ON mahasiswa.id_kelas=kelas.id_kelas WHERE id_mhs = '$id_mhs'");
$mhs = mysqli_fetch_assoc($query_mhs);
$hobi = explode(',', $mhs['hobi']);

if (isset($_POST['submit'])) {
    $id_kelas = $_POST['id_kelas'];
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $hobi = $_POST['hobi'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $provinsi_tinggal = $_POST['provinsi_tinggal'];
    $hobi = implode(',', $_POST['hobi']);


    $sql = mysqli_query($koneksi, "UPDATE mahasiswa SET 
                        id_kelas = '$id_kelas', nama = '$nama', alamat = '$alamat', jenis_kelamin = '$jenis_kelamin',
                        hobi = '$hobi', tempat_lahir = '$tempat_lahir', tgl_lahir = '$tgl_lahir',
                        provinsi_tinggal = '$provinsi_tinggal' WHERE id_mhs = '$id_mhs'");

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
                            <h3 class="h3">EDIT DATA MAHASISWA</h3>
                        </div>
                        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
                            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
                            </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-sm">
                                    <form action="" method="POST">

                                        <div class="form-group">
                                            <label>ID Kelas</label>
                                            <select class="form-control select2" name="id_kelas" style="width: 100%;" required>
                                                <?php
                                                $koneksi = mysqli_connect("localhost", "root", "", "kuliah");
                                                $query = "SELECT * From kelas";
                                                $mahasiswa = mysqli_query($koneksi, $query);
                                                while ($row = mysqli_fetch_assoc($mahasiswa)) {
                                                    if ($mhs['id_kelas'] == $row['id_kelas']) {
                                                        echo " <option value='$mhs[id_kelas]' selected>$mhs[nama_kelas]</option>";
                                                    } else {
                                                        echo " <option value='$row[id_kelas]'>$row[nama_kelas]</option>";
                                                    }
                                                }
                                                ?>
                                                <?php $id_kelas = $kelas['id_kelas']; ?>
                                            </select>
                                        </div>

                                        <div class="mb-3">
                                            <label for="nama" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs['nama']; ?>">
                                        </div>

                                        <div class="mb-3">
                                            <label for="alamat" class="form-label">Alamat</label>
                                            <textarea class="form-control" id="alamat" name="alamat" rows="3"><?= $mhs['alamat']; ?></textarea>
                                        </div>


                                        <div class="mb-3">
                                            <label for="jenis_kelamin" class="form-label">Jenis Kelamin</label><br>
                                            <?php $jenis_kelamin = $mhs['jenis_kelamin']; ?>
                                            <input type="radio" name="jenis_kelamin" value="laki-laki" <?php echo ($jenis_kelamin == 'laki-laki') ? "checked" : "" ?>> Laki-laki<br>
                                            <input type="radio" name="jenis_kelamin" value="perempuan" <?php echo ($jenis_kelamin == 'perempuan') ? "checked" : "" ?>> Perempuan<br>
                                        </div>


                                        <div class="mb-3">
                                            <label for="hobi" class="form-label">Hobi</label><br>
                                            <input type="checkbox" name="hobi[]" value="Membaca" <?php if (in_array("Membaca", $hobi)) echo "checked"; ?>> Membaca <br>
                                            <input type="checkbox" name="hobi[]" value="Sepak Bola" <?php if (in_array("Sepak Bola", $hobi)) echo "checked"; ?>> Sepak Bola <br>
                                            <input type="checkbox" name="hobi[]" value="Programing" <?php if (in_array("Programing", $hobi)) echo "checked"; ?>> Programing
                                        </div>


                                        <div class="mb-3">
                                            <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                                            <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?= $mhs['tempat_lahir']; ?>">
                                        </div>


                                        <div class="mb-3">
                                            <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $mhs['tgl_lahir']; ?>">
                                        </div>


                                        <div class="form-group">
                                            <label>Provinsi Tinggal</label>
                                            <?php $provinsi_tinggal = $mhs['provinsi_tinggal']; ?>
                                            <select class="form-control select2" name="provinsi_tinggal" style="width: 100%;" required>
                                                <option selected="selected">Provinsi Tinggal</option>
                                                <option <?php echo ($provinsi_tinggal == 'JAWA BARAT') ? "selected" : ""; ?>>JAWA BARAT</option>
                                                <option <?php echo ($provinsi_tinggal == 'JAWA TIMUR') ? "selected" : ""; ?>>JAWA TIMUR</option>
                                            </select>
                                        </div>




                                        <button type="submit" name="submit" class="btn btn-primary">Update Data Mahasiswa</button>
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