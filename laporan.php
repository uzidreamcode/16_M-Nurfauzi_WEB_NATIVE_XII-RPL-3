<?php
if( empty($_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
}else{
	if (isset($_REQUEST['sub'])){
		$sub= $_REQUEST['sub'];

		include "laporan_tagihan.php";
	} else {

		if (isset($_REQUEST['submit'])){
			$submit= $_REQUEST['submit'];
			$tgl1= $_REQUEST['tgl1'];
			$tgl2= $_REQUEST['tgl2'];

		   //echo $tgl.'-'.$tgl2;
			$q= "SELECT kelas,sum(jumlah)  FROM pembayaran WHERE tgl_bayar BETWEEN '$tgl1' AND '$tgl2' GROUP BY kelas";	

			echo '<h2> Rekap pembayaran <small>'.$tgl1.' sampai '.$tgl2.'</small></h2><hr>';
		

		} else {
			$tgl = date("Y/m/d");
			$q= "SELECT kelas,sum(jumlah)  FROM pembayaran WHERE tgl_bayar='$tgl' GROUP BY kelas";	
			echo '<h2>rekap pembayaran <small>'.$tgl.'</small></h2><hr>';
		} 

		$sql = mysqli_query($koneksi,$q);

		echo '<div class="row">';
		echo '<div class="col-md-5">';
		?>
		<div class="well well-sm noprint">
			<form class="form-inline" role="form" method="post" action="">
				<div class="form-group">
					<label class="sr-only" for="tgl1">Mulai</label>
					<input type="date" class="form-control" id="tgl2" name="tgl1">
				</div>
				<div class="form-group">
					<label class="sr-only" for="tgl2">Hingga</label>
					<input type="date" class="form-control" id="tgl2" name="tgl2">
				</div>
				<button style="margin-left: 20px" type="submit" name="submit" class="btn btn-primary">Tampilan</button>
				<a style="margin-left: 10px" class="noprint pull-right btn btn-default" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak</a>
			</form>
		</div>
		<?php
		echo '<table class="table table-bordered">';
		echo '<tr class="info"><th width="50">#</th><th>kelas</th><th>jumlah</th></tr>';

		$total = 0;
		$no=1;
		while (list($kelas,$jumlah) = mysqli_fetch_array($sql)) {
			echo '<tr><td>'.$no.'</td><td>'.$kelas. '</td><td><span class="pull-right">'.$jumlah.'</span></td></tr>';
			$total += $jumlah;
			$no++;
		}

		echo '<tr><td colspan="2"><span class="pull-right">T O T A L</span</td><td><span class="pull-right">'.$total.'</span></td></tr>';
		echo '</table>';
		echo '</div></div>';
	}
}
?>