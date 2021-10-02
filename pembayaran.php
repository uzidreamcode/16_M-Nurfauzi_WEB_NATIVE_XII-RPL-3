<?php
include 'koneksi.php';
if( empty($_SESSION['iduser'] ) )
{
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	echo "<h2>pembayaran SPP</h2><hr>";
	if (isset($_REQUEST['submit'])) 
	{		
		$submit= $_REQUEST['submit'];
		$nis=$_REQUEST['nis'];

		if ($submit=='bayar') 
		{
			$kls= $_REQUEST['kls'];
			$bln= $_REQUEST['bln'];
			$tgl= $_REQUEST['tgl'];
			$jml= $_REQUEST['jml'];

			$qbayar= mysqli_query($koneksi,"INSERT INTO pembayaran VALUES ('','$nis','$kls','$bln','$tgl','$jml')");
			if ($qbayar >0) 
			{
				header('location: ./admin.php?hlm=bayar');
				die();
			}
			else
			{
				echo "ada ERROR dgn query";
			}
		}
		$qsiswa= mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$idprodi)= mysqli_fetch_array($qsiswa);
		echo '<div class="row">';
		echo '<div class="col-sm-9" ><table class="table table-bordered">';
		echo '<tr><td colspan="2">nomor induk </td><td colspan="3"> '.$nis. '</td>';
		echo '<td><a href="./cetak.php?nis ='.$nis. '" target =_blank" class ="btn btn-succes btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak semua </a></td></tr>';
		echo '<tr><td colspan="2">nama siswa</td><td colspan="4">'.$nama.'</td></tr>';
		echo '<tr><td colspan="2">pembayaran</td><td colspan="4">'
		?>
		<head>
			<link href="css/bootstrap.css" rel="stylesheet" >
		</head>
		<form class="form-inline" role="form" method="post" action="./admin.php?hlm=bayar">
			<input type="hidden" name="nis" value="<?php echo $nis ; ?>">
			<input type="hidden" name="tgl" value="<?php echo date('y-m-d')?>">
			<div class="form-group">
				<label class="sr-only" for="kls">kelas</label>
				<select name="kls" class="form-control" id="kls">
					<?php
					$ambil=$koneksi->query("SELECT * FROM kelas ");
					while ($pecah=$ambil->fetch_assoc()) 
						{?>
							<option><?php echo $pecah['kelas']?></option>

						<?php }?>
					</select>
				</div>
				<div class="form-group">
					<label class="sr-only" for="bln">bulan</label>
					<select name="bln" id="bln" class="form-control">
						<?php
						for ($i=1;$i<=12;$i++)
						{
							$b = date('F',mktime(0,0,0,$i,10));
							echo '<option value="'.$b.'">'.$b.'</option>';
						}
						?>
					</select>
				</div>
				<div class="form-group">
					<label class="sr-only" for="jml">jumlah</label>
					<div class="input-group">
						<input type="text" class="form-control" id="jml" name="jml" placeholder="jumlah">
					</div>
				</div>
				<button type="submit" class="btn btn-default" name="submit" value="bayar">bayar</button>
			</form>
			<?php
			echo '</td></tr>';
			echo '<tr class="info"><th width="50">#</th><th  width="100">kelas</th><th>bulan</th><th>tanggal bayar</th><th>jumlah</th><th>Aksi</th>';
			echo '</tr>';

  //tampilan histori pembayaran,jika ada
			$qbayar = mysqli_query($koneksi,"SELECT kelas,bulan,tgl_bayar,jumlah FROM pembayaran WHERE nis='$nis' ORDER BY tgl_bayar DESC");
			if (mysqli_num_rows($qbayar) > 0)
			{
				$no = 1;
				while (list($kelas,$bulan,$tgl,$jumlah) = mysqli_fetch_array($qbayar)) {
					echo '<tr><td>'.$no.'</td>';
					echo '<td>'.$kelas.'</td>';
					echo '<td>'.$bulan.'</td>';
					echo '<td>'.$tgl.'</td>';
					echo '<td>'.$jumlah.'</td>';
					if ($_SESSION['admin']==1) 
					{
					echo '<td><a href="./admin.php?hlm=bayar&submit=hapus&kls='.$kelas.'$nis='.$nis.'$bln='.$bulan.'" class="btn btn-danger btn-xs">hapus</a>';

					echo '<a href="./cetak.php?submit=nota&kls='.$kelas.'$nis='.$nis. '$bln='.$bulan.'" target="_blank" class="btn btn-succes btn-xs"><span class="glyphicon glyphicon-print" aria-hidden="true"></span></a>';
      		        echo '</td></tr>';
					}
					

				}
			}
			else
					{
							echo '<tr><td colspan="6"><em>belum ada data!</em></td></tr>';
					}

		}
		?>
		<!-- form input nomor induk siswa -->

		<form class="form-horizontal" role="form" method="post" action="./admin.php?hlm=bayar">
			<div class="form-group">
				<label for="nis" class="col-sm-2 control-label">Nomor Induk Siswa</label>
				<div class="col-sm-3">
					<input type="text" class="form-control" id="nis" name="nis" placeholder="Nomor Induk Siswa" required autofocus>
					<button style="margin-top: 3%; margin-bottom: 10%" type="submit" name="submit" class="btn btn-dark">Lanjut</button>
				</div>
			</div>
			
		</form>
		<?php
	}
	?>