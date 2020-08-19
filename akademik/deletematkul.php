<?php
	include "koneksi.php";
	
	$kode_mk = $_GET['kode_mk'];
	
	$result = mysqli_query($koneksi, "DELETE FROM matakuliah  WHERE kode_mk= '$kode_mk'");
	
	header ("Location: matkul.php");
?>