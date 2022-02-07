<?php include('config.php'); ?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Edit Data</font></center>

		<hr>

		<?php
		//jika sudah mendapatkan parameter GET id dari URL
		if(isset($_GET['pid'])){
			//membuat variabel $id untuk menyimpan id dari GET id di URL
			$pid = $_GET['pid'];

			//query ke database SELECT tabel patient berdasarkan id = $id
			$select = mysqli_query($koneksi, "SELECT * FROM patient WHERE pid='$pid'") or die(mysqli_error($koneksi));

			//jika hasil query = 0 maka muncul pesan error
			if(mysqli_num_rows($select) == 0){
				echo '<div class="alert alert-warning">patient code is not found in the database.</div>';
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
			$bloodtype	= $_POST['bloodtype'];
			$telephone	= $_POST['telephone'];
			$address	= $_POST['address'];
			$city		= $_POST['city'];
			$prov		= $_POST['prov'];

			$sql = mysqli_query($koneksi, "UPDATE patient SET name='$name', dof='$dof', gender='$gender', bloodtype='$bloodtype', telephone='$telephone', address='$address', city='$city', prov='$prov' WHERE pid='$pid'") or die(mysqli_error($koneksi));

			if($sql){
				echo '<script>alert("Update data was successful"); document.location="index.php?page=view_patient";</script>';
			}else{
				echo '<div class="alert alert-warning">Failed to update data.</div>';
			}
		}
		?>

		<form action="index.php?page=edit_patient&pid=<?php echo $pid; ?>" method="post">
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">pid</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="pid" class="form-control" size="4" value="<?php echo $data['pid']; ?>" readonly required>
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">Blood Type</label>
				<div class="col-md-6 col-sm-6">
					<select name="bloodtype" class="form-control" required>
						<option value="">Choose Blood Type</option>
						<option value="A" <?php if($data['bloodtype'] == 'A'){ echo 'selected'; } ?>>A</option>
						<option value="B" <?php if($data['bloodtype'] == 'B'){ echo 'selected'; } ?>>B</option>
						<option value="AB" <?php if($data['bloodtype'] == 'AB'){ echo 'selected'; } ?>>AB</option>
						<option value="O" <?php if($data['bloodtype'] == 'O'){ echo 'selected'; } ?>>O</option>
					</select>
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
				<label class="col-form-label col-md-3 col-sm-3 label-align">City</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="city" class="form-control" value="<?php echo $data['city']; ?>" required>
				</div>
			</div>
			<div class="item form-group">
				<label class="col-form-label col-md-3 col-sm-3 label-align">Province</label>
				<div class="col-md-6 col-sm-6">
					<input type="text" name="prov" class="form-control" value="<?php echo $data['prov']; ?>" required>
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
