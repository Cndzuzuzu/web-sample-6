<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Simpan Makanan</title>
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<style type="text/css">
		div{
			display: inline-block;
			margin: 20px;
			text-align: center;
		}
		#container{
			display: inline-block;
			margin: auto;
			width: 100%;
		}
		footer{
			text-align: center;
			position: relative;
			background-color: lightgray;
			padding: 16px;
			padding-top: 64px;
			padding-bottom: 64px;
		}
	</style>
</head>
<body>
	<div id="container">
	<form method="POST">
		<!-- Kode Makanan -->
		<div> 
			<label>Masukkan Kode Makanan</label><br>
			<input type="text" name="kodeMakanan" required>
		</div>

		<!-- Nama Makanan -->
		<div>
			<label>Masukkan Nama Makanan</label><br>
			<input type="text" name="namaMakanan" required>
		</div>

		<!-- Harga Makanan -->
		<div>
			<label>Masukkan Harga Makanan</label><br>
			<input type="text" name="hargaMakanan" required>
		</div>

		<!-- URL Foto Makanan -->
		<div>
			<label>Masukkan URL Foto Makanan</label><br>
			<input type="text" name="urlFoto" required>
		</div>
		<br>
		<input type="submit" name="submit" value="Simpan Makanan">

	</form>
	<br>
	<form action="order.php" method="POST">
		<input type="submit" name="order" value="Order">
	</form>
	</div>
	<br><br>
	<footer> 
		<p>Disusun oleh: <br> 160421031_Cindy Yulinda <br> 160421034_Erwin </p>
	</footer>
</body>
</html>

<?php
	session_start();
    if (isset($_POST['kodeMakanan']) && isset($_POST['namaMakanan']) && isset($_POST['hargaMakanan']) && isset($_POST['urlFoto'])) 
    {
        $makanan = array('kodeMakanan' => $_POST['kodeMakanan'],
      				  'namaMakanan' => $_POST['namaMakanan'],
      				  'hargaMakanan' => $_POST['hargaMakanan'],
      				  'urlFoto' => $_POST['urlFoto']);
        $_SESSION['makanan'][] = $makanan;
    }
?>