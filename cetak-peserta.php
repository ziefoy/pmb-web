<?php
include 'koneksi.php';

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
    <script>
        window.print();
    </script>
</head>

<body>
    <h2>Laporan Calon Siswa</h2>
    <br>
    <table class="table" border="1">
        <thead>
            <tr>
                <th>No</th>
                <th>ID Pendaftaran</th>
                <th>Nama</th>
                <th>Tempat, Tanggal Lahir</th>
                <th>Jenis Kelamin</th>
                <th>Jurusan</th>
                <th>Tahun Ajaran</th>
                <th>Agama</th>
                <th>Alamat</th>
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
                    <td><?php echo  $row['tempat_lahir'] . ', ' . $row['tanggal_lahir']; ?></td>
                    <td><?php echo  $row['jenis_kelamin']; ?></td>
                    <td><?php echo  $row['jurusan']; ?></td>
                    <td><?php echo  $row['tahun_ajaran']; ?></td>
                    <td><?php echo  $row['agama']; ?></td>
                    <td><?php echo  $row['alamat_peserta']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>

</html>