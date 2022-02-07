<?php include('config.php'); ?>

		<center><font size="6">Insert Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$record_no	= $_POST['record_no'];
			$staff_id	= $_POST['staff_id'];
			$pid		= $_POST['pid'];
			$appoinmentdate		= $_POST['appoinmentdate'];
			$doc_code	= $_POST['doc_code'];
			$desc	= $_POST['desc'];

			$cek = mysqli_query($koneksi, "SELECT * FROM record WHERE record_no='$record_no'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO patient(pid, name, dof, gender, bloodtype, telephone, address, city, prov) VALUES('$pid', '$name', '$dof', '$gender', '$bloodtype', '$telephone', '$address', '$city', '$prov')") or die(mysqli_error($koneksi));

				$sql = mysqli_query($koneksi, "INSERT INTO record(record_no, staff_id, pid, appoinmentdate, doc_code, desc) VALUES('$record_no', '$staff_id', '$pid', '$appoinmentdate', '$doc_code', '$desc')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Insert data was successful."); document.location="index.php?page=view_record";</script>';
				}else{
					echo '<div class="alert alert-warning">Failed to insert data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Failed, record Code was registered</div>';
			}
		}
		?>

		<form action="index.php?page=add_record" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Record No</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="record_no" class="form-control" size="10" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Staff ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="staff_id" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Patient ID</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pid" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Appointment (yyyy-mm-dd)</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="appoinmentdate" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Doctor Code</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="doc_code" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="desc" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
