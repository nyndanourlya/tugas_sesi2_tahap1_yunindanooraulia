<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['pid'])){
	//membuat variabel $pid yang menyimpan nilai dari $_GET['pid']
	$pid = $_GET['pid'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM patient WHERE pid='$pid'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi pid=$pid
		$del = mysqli_query($koneksi, "DELETE FROM patient WHERE pid='$pid'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Data deleted."); document.location="index.php?page=view_patient";</script>';
		}else{
			echo '<script>alert("Failed to delete data."); document.location="index.php?page=view_patient";</script>';
		}
	}else{
		echo '<script>alert("PID was not found in the database."); document.location="index.php?page=view_patient";</script>';
	}
}else{
	echo '<script>alert("PID was not found in the database."); document.location="index.php?page=view_patient";</script>';
}

?>
