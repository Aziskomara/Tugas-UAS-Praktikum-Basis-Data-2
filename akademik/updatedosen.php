<?php
	include "koneksi.php";
	
	if(isset($_POST ['edit'])){
		$nip = $_POST['nip'];
		$nama = $_POST['nama'];
		$jk = $_POST['jk'];
		$alamat = $_POST['alamat'];
		
		$result = mysqli_query($koneksi, "UPDATE dosen SET nip= '$nip', nama='$nama', jk='$jk', alamat='$alamat' WHERE nip='$nip'");
				

		header ("Location: dosen.php");
	}

	if (isset($_GET['hal'])){
		if ($_GET['hal'] == "edit"){
			$tampil = mysqli_query ($koneksi,"SELECT * from dosen WHERE nip = '$_GET[nip]'");
			$data = mysqli_fetch_array($tampil);
			if($data){
				$vnip = $data['nip'];
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
            Update Dosen
        </div>
        <div class="card-body">
<?php
	include "koneksi.php";
	
	$nip = $_GET['nip'];
	
	$result = mysqli_query($koneksi, "SELECT * FROM dosen WHERE nip= :nip");

?>
            <form method="post" action="updatedosen.php">
				<div class="form-group">
					<label>NIp</label>
					<input type="text" name="nip" value="<?php echo $data['nip']; ?>" class="form-control">
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