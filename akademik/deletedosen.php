<?php
	include "koneksi.php";
	
	$nip = $_GET['nip'];
	
	$result = mysqli_query($koneksi, "DELETE FROM dosen  WHERE nip= '$nip'");
	
	header ("Location: dosen.php");
?>