<?php
include "koneksi.php";
	
	//tombola simpan
	if (isset ($_POST['bsimpan']))
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	
	$result = mysqli_query("INSERT INTO mahasiswa(nim, nama, jk, alamat,) VALUES ('$nim', '$nama', '$jk', '$alamat')");
		
		if($simpan){
			echo "<script>
					alert('Simpan Data Sukses !');
					document.location='indek.php';
				</script>";
		}else{
			echo "<script>
					alert(' Data Gagal Di Simpan !');
					document.location='indek.php';
				</script>";
		}
?>