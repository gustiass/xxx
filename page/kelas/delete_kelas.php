<?php
if (isset($_GET['id_kelas'])) {
    include "koneksi.php";

    $id_kelas = $_GET['id_kelas'];
    $query = "DELETE FROM kelas WHERE id_kelas = '$id_kelas'";
    $result = mysqli_query($koneksi, $query);
    if (!$result) {
        die(" Query Error : " . mysqli_error($koneksi));
    }
}
echo "<script>alsret('Data berhasil ditambahkan')</script>";
echo "<script type='text/javascript'> document.location = 'index.php?page=data_kelas'; </script>";
