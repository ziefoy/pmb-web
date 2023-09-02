<?php
session_start();
include 'koneksi.php';
if ($_SESSION['status_login'] != true) {
    echo "<script>window.location='login.php'</script>";
}
?>
<!DOCTYPE html>
<html>

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <title>PMB ONLINE 2022</title>
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="beranda.php">PMB Online 2022</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " href="beranda.php">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="data-peserta.php">Data Peserta</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="keluar.php" onclick="return confirm('Yakin mau keluar?');">Keluar</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <!-- bagian content -->
    <div class="container">
        <div class="row mt-5">
            <h2 class="text-center">Data Peserta</h2>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <a href="cetak-peserta.php" target="_blank" class="btn btn-primary mb-3">Print</a>
                <table class="table" border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>ID Pendaftaran</th>
                            <th>Nama</th>
                            <th>Jenis Kelamin</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        $list_peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran");

                        while ($row = mysqli_fetch_array($list_peserta)) {
                        ?>
                            <tr>
                                <td><?php echo $no++; ?></td>
                                <td><?php echo  $row['id_pendaftaran']; ?></td>
                                <td><?php echo  $row['nama_peserta']; ?></td>
                                <td><?php echo  $row['jenis_kelamin']; ?></td>
                                <td>
                                    <a href="detail-peserta.php?id=<?php echo $row['id']; ?>">Detail</a> |
                                    <a href="ubah-peserta.php?id=<?php echo $row['id']; ?>">Ubah</a> |
                                    <a href="hapus-peserta.php?id=<?php echo $row['id']; ?>" onclick="return confirm('Yakin?');">Hapus</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
</body>

</html>