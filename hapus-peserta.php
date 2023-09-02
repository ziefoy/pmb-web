<?php
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo "<script>window.location='login.php'</script>";
}

if (isset($_GET['id'])) {
    $delete = mysqli_query($conn, "DELETE FROM tb_pendaftaran WHERE id='" . $_GET['id'] . "'");

    echo "<script>alert('Data berhasil dihapus!');</script>";
    echo "<script>window.location='data-peserta.php'</script>";
}
