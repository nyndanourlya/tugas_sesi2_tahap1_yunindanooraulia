<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['doc_code'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$doc_code = $_GET['doc_code'];

			//query ke database SELECT tabel doctor berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM doctor WHERE doc_code='$doc_code'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">Doctor code is not found in the database.</div>';
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
			$name		= $_POST['name'];
			$dof		= $_POST['dof'];
			$gender		= $_POST['gender'];
			$telephone	= $_POST['telephone'];
			$address	= $_POST['address'];
			$specialist	= $_POST['specialist'];
			$status		= $_POST['status'];

			$sql = mysqli_query($koneksi, "UPDATE doctor SET name='$name', dof='$dof', gender='$gender', telephone='$telephone', address='$address', specialist='$specialist', status='$status' WHERE doc_code='$doc_code'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Update data was successful"); document.location="index.php?page=view_doctor";</script>';
			}else{
				echo '<div class="alert alert-warning">Failed to update data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_doctor&doc_code=<?php echo $doc_code; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">doc_code</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="doc_code" class="form-control" size="4" value="<?php echo $data['doc_code']; ?>" readonly required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Name</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="name" class="form-control" value="<?php echo $data['name']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Date of Birth (yyyy-mm-dd)</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="dof" class="form-control" value="<?php echo $data['dof']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Gender</label>
				<div class="col-md-6 col-sm-6 ">
					<div class="btn-group" data-toggle="buttons">
						<label class="btn btn-secondary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender" value="Male" <?php if($data['gender'] == 'Male'){ echo 'checked'; } ?> required>Male
						</label>
						<label class="btn btn-primary" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
							<input type="radio" class="join-btn" name="gender" value="Female" <?php if($data['gender'] == 'Female'){ echo 'checked'; } ?> required>Female
						</label>
					</div>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Telephone</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="telephone" class="form-control" value="<?php echo $data['telephone']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Address</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="address" class="form-control" value="<?php echo $data['address']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Specialist</label>
				<div class="col-md-6 col-sm-6">
					<select name="specialist" class="form-control" required>
						<option value="">Choose Specialist</option>
						<option value="Cardiologist" <?php if($data['specialist'] == 'Cardiologist'){ echo 'selected'; } ?>>Cardiologist</option>
						<option value="Dental" <?php if($data['specialist'] == 'Dental'){ echo 'selected'; } ?>>Dental</option>
						<option value="Dermatologist" <?php if($data['specialist'] == 'Dermatologist'){ echo 'selected'; } ?>>Dermatologist</option>
						<option value="ENT" <?php if($data['specialist'] == 'ENT'){ echo 'selected'; } ?>>ENT</option>
						<option value="Obstetrician" <?php if($data['specialist'] == 'Obstetrician'){ echo 'selected'; } ?>>Obstetrician</option>
						<option value="Ophthalmologist" <?php if($data['specialist'] == 'Ophthalmologist'){ echo 'selected'; } ?>>Ophthalmologist</option>
						<option value="Pediatric" <?php if($data['specialist'] == 'Pediatric'){ echo 'selected'; } ?>>Pediatric</option>
						<option value="Pulmonary" <?php if($data['specialist'] == 'Pulmonary'){ echo 'selected'; } ?>>Pulmonary</option>
						<option value="Thoracic" <?php if($data['specialist'] == 'Thoracic'){ echo 'selected'; } ?>>Thoracic</option>
					</select>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Status</label>
				<div class="col-md-6 col-sm-6">
					<select name="status" class="form-control" required>
						<option value="">Choose Status</option>
						<option value="Permanent" <?php if($data['status'] == 'Permanent'){ echo 'selected'; } ?>>Permanent</option>
						<option value="Trainee" <?php if($data['status'] == 'Trainee'){ echo 'selected'; } ?>>Trainee</option>
						<option value="Visiting" <?php if($data['status'] == 'Visiting'){ echo 'selected'; } ?>>Visiting</option>
						</select>
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
