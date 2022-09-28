	<?php
		$koneksi=mysqli_connect("localhost","root","","paw_p5");
		
		$id=(integer)$_POST["id"];
		$prodi=(integer)$_POST["prodi"];
		$name=$_POST["nama"];
		$alamat=$_POST["alamat"];
		$sql2="INSERT INTO tbl_mhs VALUES('$id','$prodi','$name','$alamat')";
		mysqli_query($koneksi,$sql2);
		echo '<a href="data_mhs.php">Kembali</a>';
	?>