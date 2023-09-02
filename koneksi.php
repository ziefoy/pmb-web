<?php
// Koneksi database ke server php
$host = 'localhost';
$user = 'root';
$pass = 'ajay123';
$db   = 'db_psb';

$conn = mysqli_connect($host, $user, $pass, $db);
// Cek jika error
if (!$conn) {
	echo 'Error: ' . mysqli_connect_error($conn);
}
