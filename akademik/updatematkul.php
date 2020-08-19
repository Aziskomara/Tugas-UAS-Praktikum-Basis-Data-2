<?php
	include "koneksi.php";
	
	if(isset($_POST ['edit'])){
		$kode_mk = $_POST['kode_mk'];
		$nama_mk = $_POST['nama_mk'];
		$sks = $_POST['sks'];
		
		$result = mysqli_query($koneksi, "UPDATE matakuliah SET kode_mk= '$kode_mk', nama='$nama_mk', sks='$sks' WHERE kode_mk='$kode_mk'");
				
		
		header ("Location : matkul.php");
	}

	if (isset($_GET['hal'])){
		if ($_GET['hal'] == "edit"){
			$tampil = mysqli_query ($koneksi,"SELECT * from matakuliah WHERE kode_mk = '$_GET[kode_mk]'");
			$data = mysqli_fetch_array($tampil);
			if($data){
				$vkode_mk = $data['kode_mk'];
				$vnama_mk = $data['nama_mk'];
				$vsks = $data['sks'];
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
            Update Matakuliah
        </div>
        <div class="card-body">
<?php
	include "koneksi.php";
	
	$nip = $_GET['kode_mk'];
	
	$result = mysqli_query($koneksi, "SELECT * FROM matakuliah WHERE kode_mk = :kode_mk");

?>
            <form method="post" action="updatematkul.php">
				<div class="form-group">
					<label>Kode Matakuliah</label>
					<input type="text" name="kode_mk" value="<?php echo $data['kode_mk']; ?>" class="form-control">
				</div>
				<div class="form-group">
					<label>Nama Matakuliah</label>
					<input type="text" name="nama_mk" value="<?php echo $data['nama_mk']; ?>" class="form-control" placeholder="input nama anda di sini" required>
				</div>
				<div class="form-group">
					<label>sks</label>
					<input type="text" name="sks" value="<?php echo $data['sks']; ?>" class="form-control" placeholder="input nama anda di sini" required>
				</div>
				
		
				<input type="submit" class="btn btn-success" name="edit"> </input>
				<input type="reset" class="btn btn-danger" name="reset"></input>
				
			</form>
        </div>
    </div>
<script type="text/javascript" src="js/bootstrap.min.js"></script>

</body>

</html>