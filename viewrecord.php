<?php
//memasukkan file config.php
include('config.php');
?>


	<div class="container" style="margin-top:20px">
		<center><font size="6">Record</font></center>
		<hr>
		<a href="index.php?page=add_record"><button class="btn btn-dark right">Insert Data</button></a>
		<div class="table-responsive">
		<table class="table table-striped jambo_table bulk_action">
			<thead>
				<tr>
					<th>No</th>
					<th>Record ID</th>
					<th>Staff ID</th>
					<th>Patient ID</th>
					<th>Appointment Date</th>
					<th>Doctor</th>
					<th>Desc</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<?php
				//query ke database SELECT tabel record urut berdasarkan id yang paling besar
				$sql = mysqli_query($koneksi, "SELECT * FROM record ORDER BY record_no DESC") or die(mysqli_error($koneksi));
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
							<td>'.$data['record_no'].'</td>
							<td>'.$data['staff_id'].'</td>
							<td>'.$data['pid'].'</td>
							<td>'.$data['appoinmentdate'].'</td>
							<td>'.$data['doc_code'].'</td>
							<td>'.$data['desc'].'</td>
							<td>
								<a href="index.php?page=edit_record&record_no='.$data['record_no'].'" class="btn btn-secondary btn-sm">Edit</a>
								<a href="deleterecord.php?record_no='.$data['record_no'].'" class="btn btn-danger btn-sm" onclick="return confirm(\'Are you sure to deleting this data?\')">Delete</a>
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
