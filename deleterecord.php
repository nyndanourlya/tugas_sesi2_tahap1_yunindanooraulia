<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['record_no'])){
	//membuat variabel $record_no yang menyimpan nilai dari $_GET['record_no']
	$record_no = $_GET['record_no'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM record WHERE record_no='$record_no'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi record_no=$record_no
		$del = mysqli_query($koneksi, "DELETE FROM record WHERE record_no='$record_no'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Data deleted."); document.location="index.php?page=view_record";</script>';
		}else{
			echo '<script>alert("Failed to delete data."); document.location="index.php?page=view_record";</script>';
		}
	}else{
		echo '<script>alert("record number was not found in the database."); document.location="index.php?page=view_record";</script>';
	}
}else{
	echo '<script>alert("record number was not found in the database."); document.location="index.php?page=view_record";</script>';
}

?>
