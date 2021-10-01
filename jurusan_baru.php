<?php
include 'koneksi.php';
if( empty($_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
}
else
{
	if (isset($_REQUEST['submit'])) 
	{
		$idjurusan= $_REQUEST['idjurusan'];
		$jurusan=$_REQUEST['jurusan'];

		$sql=mysqli_query($koneksi,"INSERT INTO jurusan VALUES ('$idjurusan','$jurusan')");
		if ($sql >0) 
		{
			header('location: ./admin.php?hlm=master&sub=jurusan');
			die();
		}
		else
		{
			echo "ada error dengan query";
		}
	}
	else{?>
	<H2>TAMBAH PROGRAM STUDI</H2>
	<hr>
	<form method="post" action="admin.php?hlm=master&sub=jurusan&aksi=baru" class="form-horizontal" role="form">
		<div class="form-group">
			<label for="idjurusan" class="col-md-2 control-label"></label>
		 	<div class="col-sm-2">
		 		<input type="text" class="form-control" id="idjurusan" name="idjurusan" placeholder="kode jurusan" required="">
		 	</div>
		</div>
		<div class="form-group">
			<label for="jurusan" class="col-sm-2 control-label" >Nama Jurusan</label>
			<div class="col-sm-4">
				<input type="text" class="form-control" id="jurusan"  name="jurusan" placeholder="nama jurusan">
				
			</div>
			
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-link">Batal</a>
			</div>
		</div>
	</form>	
	<?php
	}
}
?>