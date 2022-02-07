<?php
if (isset($_GET['id_mhs'])) {

    $id_mhs = $_GET['id_mhs'];
    $query = "DELETE FROM mahasiswa WHERE id_mhs = '$id_mhs'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die(" Query Error : " . mysqli_error($koneksi));
    }
}

echo "<script>alsret('Data berhasil ditambahkan')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_mhs'; </script>";
