<?php
//include file config.php
include('config.php');

//jika benar mendapatkan GET id dari URL
if(isset($_GET['doc_code'])){
	//membuat variabel $doc_code yang menyimpan nilai dari $_GET['doc_code']
	$doc_code = $_GET['doc_code'];

	//melakukan query ke database, dengan cara SELECT data yang memiliki id yang sama dengan variabel $id
	$cek = mysqli_query($koneksi, "SELECT * FROM doctor WHERE doc_code='$doc_code'") or die(mysqli_error($koneksi));

	//jika query menghasilkan nilai > 0 maka eksekusi script di bawah
	if(mysqli_num_rows($cek) > 0){
		//query ke database DELETE untuk menghapus data dengan kondisi doc_code=$doc_code
		$del = mysqli_query($koneksi, "DELETE FROM doctor WHERE doc_code='$doc_code'") or die(mysqli_error($koneksi));
		if($del){
			echo '<script>alert("Data deleted."); document.location="index.php?page=view_doctor";</script>';
		}else{
			echo '<script>alert("Failed to delete data."); document.location="index.php?page=view_doctor";</script>';
		}
	}else{
		echo '<script>alert("Doctor Code was not found in the database."); document.location="index.php?page=view_doctor";</script>';
	}
}else{
	echo '<script>alert("Doctor Code was not found in the database."); document.location="index.php?page=view_doctor";</script>';
}

?>
