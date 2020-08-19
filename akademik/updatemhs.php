<?php
	include "koneksi.php";
	
	if(isset($_POST ['edit'])){
		$nim = $_POST['nim'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		
		$result = mysqli_query($koneksi, "UPDATE mahasiswa SET nim= '$nim', nama='$nama', jk='$jk', alamat='$alamat' WHERE nim='$nim'");
				

		header ("Location: mahasiswa.php");
	}

	if (isset($_GET['hal'])){
		if ($_GET['hal'] == "edit"){
			$tampil = mysqli_query ($koneksi,"SELECT * from mahasiswa WHERE nim = '$_GET[nim]'");
			$data = mysqli_fetch_array($tampil);
			if($data){
				$vnim = $data['nim'];
				$vnama = $data['nama'];
				$vjk = $data['jk'];
				$valamat = $data['alamat'];
			}
		
		}
	}
?>

<!DOCTYPE html>
<html>

<head>

    <title>akadmik unzira</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

</head>

<body>
	<div class="container">
	
    <h1 class="text-center">UNIVERSITAS AZIS KOMARA</h1>
    <h2 class="text-center">UNZIRA</h2>

	<!-- awal from !-->
    <div class="card" mt-3>
        <div class="card-header" bg-primary text-white>
            Update Mahasiswa
        </div>
        <div class="card-body">
<?php
	include "koneksi.php";
	
	$nim = $_GET['nim'];
	
	$result = mysqli_query($koneksi, "SELECT * FROM mahasiswa WHERE nim = :nim");

?>
            <form method="post" action="updatemhs.php">
				<div class="form-group">
					<label>NIM</label>
					<input type="text" name="nim" value="<?php echo $data['nim']; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label>Nama</label>
					<input type="text" name="nama" value="<?php echo $data['nama']; ?>" class="form-control" placeholder="input nama anda di sini" required>
				</div>
				<div class="form-group">
					<label>Jenis Kelamin</label>
					<select class="form-control" name="jk">
						<option value="<?php echo $data['jk']; ?>"><?php echo $data['jk']; ?></option>
						<option value="L">L</option>
						<option value="P">P</option>
					</select>
				</div>
				<div class="form-group">
					<label>Alamat</label>
					<textarea class="form-control" name= "alamat" placeholder="input Alamat anda di sini"> <?php echo $data['alamat']; ?> </textarea>
				</div>
		
				<input type="submit" class="btn btn-success" name="edit"> </input>
				<input type="reset" class="btn btn-danger" name="reset"></input>
				
			</form>
        </div>
    </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>