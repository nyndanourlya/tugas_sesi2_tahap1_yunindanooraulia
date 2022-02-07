<?php include('config.php'); ?>

		<center><font size="6">Insert Data</font></center>
		<hr>
		<?php
		if(isset($_POST['submit'])){
			$doc_code	= $_POST['doc_code'];
			$name		= $_POST['name'];
			$dof		= $_POST['dof'];
			$gender		= $_POST['gender'];
			$telephone	= $_POST['telephone'];
			$address	= $_POST['address'];
			$specialist	= $_POST['specialist'];
			$status		= $_POST['status'];

			$cek = mysqli_query($koneksi, "SELECT * FROM doctor WHERE doc_code='$doc_code'") or die(mysqli_error($koneksi));

			if(mysqli_num_rows($cek) == 0){
				$sql = mysqli_query($koneksi, "INSERT INTO doctor(doc_code, name, dof, gender, telephone, address, specialist, status) VALUES('$doc_code', '$name', '$dof', '$gender', '$telephone', '$address', '$specialist', '$status')") or die(mysqli_error($koneksi));

				if($sql){
					echo '<script>alert("Insert data was successful."); document.location="index.php?page=view_doctor";</script>';
				}else{
					echo '<div class="alert alert-warning">Failed to insert data.</div>';
				}
			}else{
				echo '<div class="alert alert-warning">Failed, Doctor Code was registered</div>';
			}
		}
		?>

		<form action="index.php?page=add_doctor" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Doctor Code</label>
				<div class="col-md-6 col-sm-6 ">
					<input type="text" name="doc_code" class="form-control" size="10" required>
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Specialist</label>
				<div class="col-md-6 col-sm-6">
					<select name="specialist" class="form-control" required>
						<option value="">Choose Specialist</option>
						<option value="Cardiologist">Cardiologist</option>
						<option value="Dental">Dental</option>
						<option value="Dermatologist">Dermatologist</option>
						<option value="ENT">ENT</option>
						<option value="Obstetrician">Obstetrician</option>
						<option value="Ophthalmologist">Ophthalmologist</option>
						<option value="Pediatric">Pediatric</option>
						<option value="Pulmonary">Pulmonary</option>
						<option value="Thoracic">Thoracic</option>	
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6">
					<select name="status" class="form-control" required>
						<option value="">Choose Status</option>
						<option value="Permanent">Permanent</option>
						<option value="Trainee">Trainee</option>
						<option value="Visiting">Visiting</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<div  class="col-md-6 col-sm-6 offset-md-3">
					<input type="submit" name="submit" class="btn btn-primary" value="Save">
			</div>
		</form>
	</div>
