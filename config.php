<?php
//koneksi ke database mysql,
$koneksi = mysqli_connect("localhost","root","","poliklinik");

//cek jika koneksi ke mysql gagal, maka akan tampil pesan berikut
if (mysqli_connect_errno()){
	echo "Connection to MySQL is Failed: " . mysqli_connect_error();
}
?>
