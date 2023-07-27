<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Makanan</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Karma">
	<style type="text/css">
		body{
			background-image: url("https://media.istockphoto.com/id/809072960/photo/gold-damask-pattern-background.jpg?s=612x612&w=0&k=20&c=0cSiF6DuNtd8WYlz4IcnZjiaEpUeN5goD6GlZpFssaQ=");
/*			background-repeat: no-repeat;*/
			background-size: 100%;
		}
	h3,h5{
		font-family: "Karma", sans-serif;
		margin: 0;
	}
	h3{
		margin: 5px;
	}
	.makanan {
		background-color: papayawhip;
		margin: auto;
		text-align: center;
      	float: left;
      	width: auto;
      	padding: 20px;
    }
    #fixed{
    	position:fixed;
    	left: 0;
    	top: -16px;
    	width:100%;
/*    	max-width:100%;*/
/*    	margin:0px;*/
    	font-size:24px;
    	text-align: center;
    	padding: 16px;
    	background-color: antiquewhite;
    }
    .container{
    	display: inline-block;
/*    	position: relative;*/
/*    	border: 2px solid black;*/
/*    	margin: 0;*/
    	margin-top: 100px;
    	margin-left:20%;
    	margin-right:5%;
/*    	max-width:100%;*/
		width: auto;
    	transition:margin-left .4s;
/*		position: absolute;*/
/*		top: 50%;*/
/*		left: 50%;*/

/*		transform: translate(20%,0%);*/
/*    	padding: 50px;*/

    }
    .pilih {
    	position: fixed;
    	background-color: floralwhite;
/*      border: 1px solid black;*/
        padding: 10px;
        width: auto;
        left: 0px;
        top: 55px;
        text-align: center;
/*      clear: both;*/
    }
	</style>
</head>
<body>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  	<script>
  		function pilih() {
        var kodeMakanan = $(this).data('kode');
        var namaMakanan = $(this).data('nama');
        var hargaMakanan = $(this).data('harga');
        $('#makananTerpilih').append('<p>'+ kodeMakanan + ' . '  + namaMakanan + '........Rp.' + hargaMakanan + '</p>');
        var totalHarga = parseFloat($('#totalHarga').text()) + parseFloat(hargaMakanan);
        $('#totalHarga').text(totalHarga);
        $(this).prop('disabled', true);
      	};

    	$(document).ready(function() {
      		$('.buttonPilih').click(pilih);
    	});
  	</script>
  	<h1 id="fixed">Order Page</h1>
  	<!-- <div id='content'></div> -->
    <?php
    	session_start();
    	if (isset($_SESSION['makanan']) && count($_SESSION['makanan']) > 0) {
    		echo "<div class='container'>";
      		foreach ($_SESSION['makanan'] as $key => $item) {
        		echo "<div class='makanan'>";
        		echo "<img src='".$item['urlFoto']."' width='300' height='500'><br>";
        		echo "<h3>".$item['namaMakanan']."</h3>";
        		echo "<h5>Kode ".$item['kodeMakanan']."</h5>";
        		echo "Rp.".$item['hargaMakanan']."<br>";
        		echo "<button class='buttonPilih' 
        			  		  data-kode='".$item['kodeMakanan']."' 
        			  		  data-nama='".$item['namaMakanan']."' 
        			  		  data-harga='".$item['hargaMakanan']."'>Pilih</button>";
        		echo '</div>';
     	}
      	echo '</div>';
    	} 
    	else {
      		echo "Belum ada data makanan yang diorder.";
    	}
    ?>
  	<div class="pilih">
    	<h3>Pilihan ku:</h3>
    	<div id="makananTerpilih"></div>
    	<div>Total Harga: Rp.<span id="totalHarga">0.00</span></div>
    	<br>
   		<form action="index.php" method="POST">
    		<input type="submit" name="kembali" value="Kembali">
  		</form>
  	</div>

	<!-- </div> -->
</body>
</html>