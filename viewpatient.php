<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Patient</font></center>
		<hr>
		<a href="index.php?page=add_patient"><button class="btn btn-dark right">Insert Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No.</th>
					<th>PID</th>
					<th>Name</th>
					<th>Date of Birth</th>
					<th>Gender</th>
					<th>Blood Type</th>
					<th>Telephone</th>
					<th>Address</th>
					<th>City</th>
					<th>Prov</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel patient urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM patient ORDER BY pid DESC") or die(mysqli_error($koneksi));
				//jika query diatas menghasilkan nilai > 0 maka menjalankan script di bawah if...
				if(mysqli_num_rows($sql) > 0){
					//membuat variabel $no untuk menyimpan nomor urut
					$no = 1;
					//melakukan perulangan while dengan dari dari query $sql
					while($data = mysqli_fetch_assoc($sql)){
						//menampilkan data perulangan
						echo '
						<tr>
							<td>'.$no.'</td>
							<td>'.$data['pid'].'</td>
							<td>'.$data['name'].'</td>
							<td>'.$data['dof'].'</td>
							<td>'.$data['gender'].'</td>
							<td>'.$data['bloodtype'].'</td>
							<td>'.$data['telephone'].'</td>
							<td>'.$data['address'].'</td>
							<td>'.$data['city'].'</td>
							<td>'.$data['prov'].'</td>
							<td>
								<a href="index.php?page=edit_patient&pid='.$data['pid'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deletepatient.php?pid='.$data['pid'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to deleting this data?\')">Delete</a>
							</td>
						</tr>
						';
						$no++;
					}
				//jika query menghasilkan nilai 0
				}else{
					echo '
					<tr>
						<td colspan="6">No data.</td>
					</tr>
					';
				}
				?>
			<tbody>
		</table>
	</div>
	</div>
