<!DOCTYPE html>
<html>

<head>

    <title>akadmik unzira</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
	<div class="container">
	
    <h1 class="text-center">MATAKULIAH</h1>
    <h2 class="text-center">UNZIRA</h2>

	<!-- awal from !-->
    <div class="card" mt-3>
        <div class="card-header" bg-primary text-white>
            Input Matakuliah
        </div>
        <div class="card-body">
            <form method="post" action="matkul.php">
				<div class="form-group">
					<label>Kode Matakuliah</label>
					<input type="text" name="kode_mk" class="form-control" placeholder="input kode matakuliah anda di sini" required>
				</div>
				<div class="form-group">
					<label>Nama Matakuliah</label>
					<input type="text" name="nama_mk" class="form-control" placeholder="input nama matakuliah di sini" required>
				</div>
				<div class="form-group">
					<label>sks</label>
					<input type="text" name="sks" class="form-control" placeholder="input sks matakuliah di sini" required>
				</div>
				
				<input type="submit" class="btn btn-success" name="bsimpan"> </input>
				<input type="reset" class="btn btn-danger" name="reset"></input>
			</form>
        </div>
    </div>
	<!-- akhir from !-->
	
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
            Daftar Matakuliah
        </div>
        <div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th>Kode Matakuliah</th>
					<th>Nama Matakuliah</th>
					<th>SKS</th>
					<th>Aksi</th>
				</tr>
				
				<?php
					$no = 1;
					$tampil = mysqli_query($koneksi, "SELECT * from matakuliah order by kode_mk desc");
					while($data = mysqli_fetch_array($tampil)):
				?>
				<tr>
					<td><?=$no++; ?></td>
					<td><?=$data['kode_mk'] ?></td>
					<td><?=$data['nama_mk'] ?></td>
					<td><?=$data['sks'] ?></td>
					<td>
						<a href ="updatematkul.php?hal=edit&kode_mk=<?=$data['kode_mk']?>" class= "btn btn-warning"> Edit </a> 
						<a href ="deletematkul.php?hal=hapus&kode_mk=<?=$data['kode_mk']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini ') " class= "btn btn-danger"> Hapus </a>
					</td>
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