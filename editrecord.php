<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['record_no'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$record_no = $_GET['record_no'];

			//query ke database SELECT tabel record berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM record WHERE record_no='$record_no'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">record code is not found in the database.</div>';
				exit();
			//jika hasil query > 0
			}else{
				//membuat variabel $data dan menyimpan data row dari query
				$data = mysqli_fetch_assoc($select);
			}
		}
		?>

		<?php
		//jika tombol simpan di tekan/klik
		if(isset($_POST['submit'])){
			$record_no		= $_POST['record_no'];
			$staff_id		= $_POST['staff_id'];
			$pid			= $_POST['pid'];
			$appoinmentdate	= $_POST['appoinmentdate'];
			$doc_code		= $_POST['doc_code'];
			$desc			= $_POST['desc'];

			$sql = mysqli_query($koneksi, "UPDATE record SET name='$staff_id', pid='$pid', appoinmentdate='$appoinmentdate', doc_code='$doc_code', desc='$desc' WHERE record_no='$record_no'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Update data was successful"); document.location="index.php?page=view_doc";</script>';
			}else{
				echo '<div class="alert alert-warning">Failed to update data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_record&record_no=<?php echo $record_no; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">record_no</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="record_no" class="form-control" size="4" value="<?php echo $data['record_no']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Staff ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="staff_id" class="form-control" value="<?php echo $data['staff_id']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Patient ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pid" class="form-control" value="<?php echo $data['pid']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Appointment (yyyy-mm-dd)</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="appoinmentdate" class="form-control" value="<?php echo $data['appoinmentdate']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Doctor</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="doc_code" class="form-control" value="<?php echo $data['doc_code']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="desc" class="form-control" value="<?php echo $data['desc']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<div class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
					<a href="index.php?page=view_doc" class="btn btn-warning">Back</a>
				</div>
			</div>
		</form>
	</div>
