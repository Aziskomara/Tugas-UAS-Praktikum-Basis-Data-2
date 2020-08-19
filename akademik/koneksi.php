<?php
//koneksi databases
	$server = "localhost";
	$user = "root";
	$pass = "";
	$database = "10118029_akademik";
	$koneksi = mysqli_connect($server, $user, $pass, $database) or die (mysqli_error($koneksi)) ;
?>