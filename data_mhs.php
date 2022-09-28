<?php
	$koneksi=mysqli_connect("localhost","root","","paw_p5");

	$sql = "SELECT id_mhs,nama_mhs,nama_prodi,alamat_mhs
			FROM tbl_mhs m,tbl_prodi p
			WHERE m.id_prodi=p.id_prodi";
	$hasil = mysqli_query($koneksi,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <h2>Data Mahasiswa</h2>
  <p>Berikut adalah data mahasiswa dari mySQL:</p>   
  <button id="tambah" type="button" class="btn btn-primary btn-sm">Tambah Data</button>
  <form id="tambah_data" action="tambah_data.php" method="POST" style="display: none">
	<br>
	<input id="id" name="id" type="text" placeholder="id_mhs"/>
	<input id="prodi" name="prodi" type="text" placeholder="id_programStudi"/>
	<input id="nama" name="nama" type="text" placeholder="nama_mhs"/>
	<input id="alamat" name="alamat" type="text" placeholder="alamat_mhs"/>
	<input type="submit" />
	
	<script>
	
		const element = document.getElementById("tambah");
		element.addEventListener("click", myFunction);

		function myFunction() {
		document.getElementById("tambah_data").style.display="block";
		}
	
	</script>
	<br>
  </form>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nama</th>
        <th>Program Studi</th>
        <th>Alamat</th>
      </tr>
    </thead>
    <tbody>
		<?php
			while ($baris = mysqli_fetch_assoc($hasil)){
				echo "<tr><td>". $baris["id_mhs"]."</td>".
				"<td>".$baris["nama_mhs"]."</td>".
				"<td>".$baris["nama_prodi"]."</td>".
				"<td>".$baris["alamat_mhs"]."</td>".
				"<td> <button type='button' class='btn btn-danger btn-sm'>Edit</button> ".
				"<button type='button' class='btn btn-danger btn-sm'>Delete</button>".
				"</td>".
				"</tr>";
			}
		?>
		
    </tbody>
  </table>
</div>

</body>
</html>