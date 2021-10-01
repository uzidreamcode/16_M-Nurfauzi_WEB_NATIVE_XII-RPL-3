<?php
session_start();
if( empty($_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
}else{
	include "koneksi.php";
	include "menu.php";
}
?>
<!DOCTYPE html>
	<html lang ="en">
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-compatible" content="IE=edge">
	<meta name="viewsport" content="width=device-width, initial-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<title>ADMIN PAGE</title>
	
	<!-- bootstrap core CSS -->
	<link href="css/bootstrap.css" rel="stylesheet" >

	<!-- <style type="text/css">
		body{
			min-height: 200px;
			padding-top: 70px;
			background-image: url(); 
		}
		@media print {
			.nonprint{
				display: none;
			}
		}
	</style> -->


</head>
<body>
	

	<div class="container">

		<?php
		if( isset($_REQUEST['hlm'] )) {
            $hln = $_REQUEST['hlm'];

             switch ($hln) {
             	case 'bayar':
             		include "pembayaran.php";
             		break;
             		case 'laporan':
             		include "laporan.php";
             		break;
             		case 'master':
             		include "master.php";
             		break;
             	case 'user':
             		include "profil.php";
             		break;
             	
             }
		
		}else {
			?>
			<!-- component for a primary marketing massage or call to action -->
			<div class="jumbotron">
				<h2 align="center"> APLIKASI PEMBAYARAN SPP Muhammad Nurfauzi</h2>
				<P align="center"> jl.raya kedungpedaringan kepanjen</P>
				<p align="center"> selamat datang <strong> <?php echo $_SESSION ['fullname']; ?></strong></p>
			</div>
			<?php
			}
			?>
		</div> <!-- /container -->

		<!-- booststrap core Javascript, Placed at the document so the pages load faster -->

		<script src="js/jquery.min.js"></script>
		<script src="js/booststrap.min.js" ></script>
		<script type="text/javascript"> s(". force-logout").alert().delay(3000).slideUp('slow'. function(){
			window.location = "./logout.php";
	});
		function fncetak() {
			window.print();
		}
</script>
</body>

</html>
