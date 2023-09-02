<?php
session_start();
include 'koneksi.php';

if ($_SESSION['status_login'] != true) {
    echo "<script>window.location='login.php'</script>";
}

$peserta = mysqli_query($conn, "SELECT * FROM tb_pendaftaran WHERE id='" . $_GET['id'] . "'");
$p = mysqli_fetch_object($peserta);


if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $id_pendaftaran = $_POST['id_pendaftaran'];
    $tanggal_daftar = $_POST['tanggal_daftar'];
    $tahun_ajaran = $_POST['tahun_ajaran'];
    $jurusan = $_POST['jurusan'];
    $nama_peserta = $_POST['nama_peserta'];
    $tempat_lahir = $_POST['tempat_lahir'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $agama = $_POST['agama'];
    $alamat_peserta = $_POST['alamat_peserta'];

    mysqli_query($conn, "UPDATE tb_pendaftaran SET
        id_pendaftaran='$id_pendaftaran',
        tanggal_daftar='$tanggal_daftar',
        tahun_ajaran='$tahun_ajaran',
        jurusan='$jurusan',
        nama_peserta='$nama_peserta',
        tempat_lahir='$tempat_lahir',
        tanggal_lahir='$tanggal_lahir',
        jenis_kelamin='$jenis_kelamin',
        agama='$agama',
        alamat_peserta='$alamat_peserta'
        WHERE id='$id'
    ");

    echo "<script>alert('Data berhasil diubah!');</script>";
    echo "<script>window.location='data-peserta.php'</script>";
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>PSB ONLINE</title>
</head>

<body>
    <div class="container">
        <h2 class="text-center mb-4">Formulir Pendaftaran Siswa Baru</h2>

        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post" action="">
                    <input type="hidden" name="id" value="<?php echo $p->id; ?>">
                    <input type="hidden" name="id_pendaftaran" value="<?php echo $p->id_pendaftaran; ?>">
                    <input type="hidden" name="tanggal_daftar" value="<?php echo $p->tanggal_daftar; ?>">

                    <div class="mb-3">
                        <label for="tahun_ajaran" class="form-label">Tahun Ajaran</label>
                        <input type="text" class="form-control" id="tahun_ajaran" name="tahun_ajaran" value="<?php echo $p->tahun_ajaran; ?>">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Jurusan</label>
                        <select class="form-select" name="jurusan">
                            <option value="Teknik Informatika">--Teknik Informatika--</option>
                            <option value="Teknik Mesin">--Teknik Mesin--</option>
                            <option value="Sistem Informasi">--Sistem Informasi--</option>
                            <option value="Teknik Otomotif">--Teknik Otomotif--</option>
                            <option value="Arsitektur">--Arsitektur--</option>
                            <option value="Teknik Geodesi">--Teknik Geodesi--</option>
                            <option value="Teknik Sipil">--Teknik Sipil--</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="nama_peserta" class="form-label">Nama Lengkap</label>
                        <input type="text" class="form-control" id="nama_peserta" name="nama_peserta" value="<?php echo $p->nama_peserta; ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="tempat_lahir" class="form-label">Tempat Lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" name="tempat_lahir" value="<?php echo $p->tempat_lahir; ?>">
                    </div>
                    <div class=" mb-3">
                        <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" name="tanggal_lahir" value="<?php echo $p->tanggal_lahir; ?>">
                    </div>
                    <div class="mb-3">
                        <div>
                            <label for="" class="form-label">Jenis Kelamin</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Laki-laki" checked>
                            <label class="form-check-label" for="jenis_kelamin">
                                Laki-laki
                            </label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Perempuan">
                            <label class="form-check-label" for="jenis_kelamin">
                                Perempuan
                            </label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label">Agama</label>
                        <select class="form-select" name="agama">
                            <option value="Islam">Islam </option>
                            <option value="Kristen">Kristen </option>
                            <option value="Budha">Budha </option>
                            <option value="Hindu">Hindu </option>
                            <option value="Khonghuchu">Khonghucu </option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="alamat_peserta">Alamat Lengkap</label>
                        <textarea class="form-control" placeholder="" id="alamat_peserta" name="alamat_peserta" style="height: 100px"><?php echo $p->alamat_peserta; ?></textarea>
                    </div>
                    <div class="mb-3">
                        <input type="submit" name="submit" value="Daftar Sekarang" class="btn btn-primary">
                    </div>
                </form>
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