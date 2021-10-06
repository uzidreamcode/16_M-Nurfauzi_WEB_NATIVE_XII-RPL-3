<?php
session_start();
include 'koneksi.php';
if( empty($_SESSION['iduser'] ) )
{
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	function printer()
 {
     $contents = $this->input->post('contents');
     $handle = printer_open(DEFAULT_PRINTER);
     printer_write($handle, $contents);
     printer_close($handle);
 }
	$nis = $_REQUEST['nis'];
	if (isset($_REQUEST['submit'])) 
	{
		$submit = $_REQUEST['submit'];
		$kls	= $_REQUEST['kls'];
		$bln 	= $_REQUEST['bln'];

		$sql = mysqli_query($koneksi,"SELECT s.nama,p.tgl_bayar,p.jumlah FROM siswa s INNER JOIN pembayaran p ON s.nis = p.nis='$nis'");
		list($nama,$tgl_bayar,$jml) = mysqli_fetch_array($sql);

		$printTestText = "NIS  :".$nis."\n";
		$printTestText .= "NAMA  :".$nama."\n";
		$printTestText .= "KELAS :".$kls."\n\n";
		$printTestText .= "==================================\n";
		$printTestText .= str_pad($tgl_bayar,20);
		$printTestText .= str_pad($bln,3);
		$printTestText .= str_pad($jml,10," ",STR_PAD_LEFT)."\n";
		$printTestText .= "==================================\n";
		$printTestText .= "\n";
		$printTestText .= "\n";
		$printTestText .= str_pad("--= TERIMA KASIH =--",40," ",STR_PAD_BOTH)."\n";
		$handle = printer_open("PDFcreator");
		printer_set_option($handle,PRINTER_MODE,"TEXT");
		printer_write($handle,$printTestText);
		printer_close($handle);

		echo "<script>windows.close();</script>";		
	}
}?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-with, initial-scale=1" >
	<meta name="description" content="">
	<meta name="author" content="">
	<title>
		SPP
	</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
	<style type="text/css">
		body{
			min-height: 200px;
			padding-top: 50px;
		}
		@media print{
			.noprint{
				display: none;
			}
		}
	</style>
</head>
<body>
	<div class="container">
		<h3>Bukti pembayaran SPP</h3>
		<?php
		$ambil = $koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
		$pecah=$ambil->fetch_assoc();
		?>
		<div class="row">
			<div class="col-sm-6">
				<table class="table table-bordered">
					<tr>
						<td colspan="2">Nomor induk</td>
						<td colspan="3"><?php $pecah['nis']?> </td>
					</tr>
					<tr>
						<td colspan="2">Nama SIswa </td>
						<td colspan="3"><?php echo $pecah['nama']?></td>
					</tr>
					<tr class="info">
						<th width="50">#</th>
						<th width="100">Kelas</th>
						<th>Bulan</th>
						<th>Tanggal abayar</th>
						<th>Jumlah</th>
					</tr>
					<?php $ambil=$koneksi->query("SELECT kelas,bulan,tgl_bayar,jumlah FROM pembayaran WHERE nis='$nis' ORDER BY tgl_bayar DESC ");
						if (mysqli_num_rows($ambil) > 0) 
						{
							$no=1;
							while ($hasil=$ambil->fetch_assoc()) 
						     {?>
						     	<tr>
						     		<td><?php echo $no;?></td>
						     		<td><?php echo  $hasil['kelas']?></td>
						     		<td><?php echo $hasil['bulan']?></td>
						     		<td><?php echo $hasil['tgl_bayar']?></td>
						     		<td><?php echo $hasil['jumlah']?></td>
						     	</tr>
						    
						    <?php $no++?>
						<?php } }?>
				</table>
			</div>
		</div>

	</div>

</body>
</html>