<?php include('config.php'); ?>

		<center><font size="6">Insert Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$pid	= $_POST['pid'];
			$name		= $_POST['name'];
			$dof		= $_POST['dof'];
			$gender		= $_POST['gender'];
			$bloodtype	= $_POST['bloodtype'];
			$telephone	= $_POST['telephone'];
			$address	= $_POST['address'];
			$city		= $_POST['city'];
			$prov		= $_POST['prov'];

			$cek = mysqli_query($koneksi, "SELECT * FROM patient WHERE pid='$pid'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO patient(pid, name, dof, gender, bloodtype, telephone, address, city, prov) VALUES('$pid', '$name', '$dof', '$gender', '$bloodtype', '$telephone', '$address', '$city', '$prov')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Insert data was successful."); document.location="index.php?page=view_patient";</script>';
				}else{
					echo '<div class="alert alert-warning">Failed to insert data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Failed, patient Code was registered</div>';
			}
		}
		?>

		<form action="index.php?page=add_patient" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">PID</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="pid" class="form-control" size="25" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="name" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Date of Birth (yyyy-mm-dd)</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="dof" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender" value="Male" required>Male
						</label>
						<label class="btn btn-primary " data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender" value="Female" required>Female
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Blood Type</label>
				<div class="col-md-6 col-sm-6">
					<select name="bloodtype" class="form-control" required>
						<option value="">Choose BloodType</option>
						<option value="A">A</option>
						<option value="B">B</option>
						<option value="AB">AB</option>
						<option value="O">O</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Telephone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="telephone" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="address" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">City</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="city" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Province</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="prov" class="form-control" required>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
