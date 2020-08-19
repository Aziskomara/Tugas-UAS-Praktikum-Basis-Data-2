<!DOCTYPE html>
<html>

<head>

    <title>akadmik unzira</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
	<div class="container">
	
    <h1 class="text-center">DAFTAR NILAI</h1>
    <h2 class="text-center">UNZIRA</h2>

	
<?php
	include "koneksi.php";
	//tombola simpan
	if(isset($_POST['bsimpan'])){
	$kode_mk = $_POST['kode_mk'];
	$nama_mk = $_POST['nama_mk'];
	$sks = $_POST['sks'];
	
	$result = mysqli_query($koneksi, "INSERT INTO matakuliah (kode_mk, nama_mk, sks) VALUES ('$kode_mk', '$nama_mk', '$sks')");
		
		if($result){
			echo "<script>
					alert('Simpan Data Sukses !');
					document.location='matkul.php';
				</script>";
		}else{
			echo "<script>
					alert(' Data Gagal Di Simpan !');
					document.location='matkul.php';
				</script>";
			}
	}
?>
	
	
	<!-- awal tabel !-->
	<div class="card" mt-3>
        <div class="card-header" bg-success text-white>
            Daftar Nilai
        </div>
        <div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th>NIM Mahasiswa</th>
					<th>NIP Dosen</th>
					<th>Kode Matakuliah</th>
					<th>Nilai UTS</th>
					<th>Nilai UAS</th>
				</tr>
				
				<?php
					$no = 1;
					$tampil = mysqli_query($koneksi, "SELECT * from nilai order by nim desc");
					while($data = mysqli_fetch_array($tampil)):
				?>
				<tr>
					<td><?=$no++; ?></td>
					<td><?=$data['nim'] ?></td>
					<td><?=$data['nip'] ?></td>
					<td><?=$data['kode_mk'] ?></td>
					<td><?=$data['uts'] ?></td>
					<td><?=$data['uas'] ?></td>
					
				</tr>
				<?php endwhile;?>
			</table>
            
        </div>
    </div>
	<!-- akhir tabel !-->
	
	</div>

<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>