<!DOCTYPE html>
<html>

<head>

    <title>akadmik unzira</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
	<div class="container">
	
    <h1 class="text-center">DOSEN</h1>
    <h2 class="text-center">UNZIRA</h2>

	<!-- awal from !-->
    <div class="card" mt-3>
        <div class="card-header" bg-primary text-white>
            Input Dosen
        </div>
        <div class="card-body">
            <form method="post" action="dosen.php">
				<div class="form-group">
					<label>NIP</label>
					<input type="text" name="nip" class="form-control" placeholder="input nip anda di sini" required>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" class="form-control" placeholder="input nama anda di sini" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jk">
						<option value="L">L</option>
						<option value="P">P</option>
					</select>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name= "alamat" placeholder="input Alamat anda di sini"> </textarea>
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
	$nip = $_POST['nip'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	
	$result = mysqli_query($koneksi, "INSERT INTO dosen (nip, nama, jk, alamat) VALUES ('$nip', '$nama', '$jk', '$alamat')");
		
		if($result){
			echo "<script>
					alert('Simpan Data Sukses !');
					document.location='dosen.php';
				</script>";
		}else{
			echo "<script>
					alert(' Data Gagal Di Simpan !');
					document.location='dosen.php';
				</script>";
			}
	}
?>
	
	
	<!-- awal tabel !-->
	<div class="card" mt-3>
        <div class="card-header" bg-success text-white>
            Daftar Dosen
        </div>
        <div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th>NIP</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
				
				<?php
					$no = 1;
					$tampil = mysqli_query($koneksi, "SELECT * from dosen order by nip desc");
					while($data = mysqli_fetch_array($tampil)):
				?>
				<tr>
					<td><?=$no++; ?></td>
					<td><?=$data['nip'] ?></td>
					<td><?=$data['nama'] ?></td>
					<td><?=$data['jk'] ?></td>
					<td><?=$data['alamat'] ?></td>
					<td>
						<a href ="updatedosen.php?hal=edit&nip=<?=$data['nip']?>" class= "btn btn-warning"> Edit </a> 
						<a href ="deletedosen.php?hal=hapus&nip=<?=$data['nip']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini ') " class= "btn btn-danger"> Hapus </a>
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