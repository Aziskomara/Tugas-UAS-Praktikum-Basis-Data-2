<!DOCTYPE html>
<html>

<head>

    <title>akadmik unzira</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
	<div class="container">
	
    <h1 class="text-center">MAHASISWA</h1>
    <h2 class="text-center">UNZIRA</h2>

	<!-- awal from !-->
    <div class="card" mt-3>
        <div class="card-header" bg-primary text-white>
            Input Mahasiswa
        </div>
        <div class="card-body">
            <form method="post" action="mahasiswa.php">
				<div class="form-group">
					<label>NIM</label>
					<input type="text" name="nim" value="<?=@$vnim?>" class="form-control" placeholder="input nim anda di sini" required>
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" value="<?=@$vnama?>" class="form-control" placeholder="input nama anda di sini" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jk">
						<option value="<?=@$vjk?>"><?=@$vjk?></option>
						<option value="L">L</option>
						<option value="P">P</option>
					</select>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name= "alamat" placeholder="input Alamat anda di sini"> <?=@$valamat?> </textarea>
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
	$nim = $_POST['nim'];
	$nama = $_POST['nama'];
	$jk = $_POST['jk'];
	$alamat = $_POST['alamat'];
	
	$result = mysqli_query($koneksi, "INSERT INTO mahasiswa (nim, nama, jk, alamat) VALUES ('$nim', '$nama', '$jk', '$alamat')");
		
		if($result){
			echo "<script>
					alert('Simpan Data Sukses !');
					document.location='mahasiswa.php';
				</script>";
		}else{
			echo "<script>
					alert(' Data Gagal Di Simpan !');
					document.location='mahasiswa.php';
				</script>";
			}
	}
?>	
	
	<!-- awal tabel !-->
	<div class="card" mt-3>
        <div class="card-header" bg-success text-white>
            Daftar Mahasiswa
        </div>
        <div class="card-body">
			<table class="table table-bordered">
				<tr>
					<th>No</th>
					<th>NIM</th>
					<th>Nama</th>
					<th>Jenis Kelamin</th>
					<th>Alamat</th>
					<th>Aksi</th>
				</tr>
				
				<?php
					$no = 1;
					$tampil = mysqli_query($koneksi, "SELECT * from mahasiswa order by nim desc");
					while($data = mysqli_fetch_array($tampil)):
				?>
				<tr>
					<td><?=$no++; ?></td>
					<td><?=$data['nim'] ?></td>
					<td><?=$data['nama'] ?></td>
					<td><?=$data['jk'] ?></td>
					<td><?=$data['alamat'] ?></td>
					<td>
						<a href ="updatemhs.php?hal=edit&nim=<?=$data['nim']?>"  class= "btn btn-warning"> Edit </a> 
						<a href ="deletemhs.php?hal=hapus&nim=<?=$data['nim']?>" onclick="return confirm('Apakah yakin ingin menghapus data ini ') " class= "btn btn-danger"> Hapus </a>
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