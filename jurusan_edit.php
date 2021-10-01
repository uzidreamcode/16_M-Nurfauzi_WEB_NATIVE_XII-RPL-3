<?php
if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else {
	if (isset($_REQUEST['submit']))
	{
		$idjurusan= $_REQUEST['idjurusan'];
		$jurusan=$_REQUEST['jurusan'];

		$sql = mysqli_query($koneksi,"UPDATE jurusan SET jurusan='$jurusan' WHERE idjurusan='$idjurusan'");

		if ($sql > 0) {
			header('location: ./admin.php?hlm=master&sub=jurusan');
			die();
	  }else {
			echo 'ada ERROR dengan query';
		}
	}else{
		$idjurusan =$_REQUEST['idjurusan'];
		$sql = mysqli_query($koneksi,"SELECT * FROM jurusan WHERE idjurusan='$idjurusan'");
		list($idjurusan,$jurusan) = mysqli_fetch_array($sql);
?>
<h2>Edit program Studi</h2>
<hr>
<form method="post" action="admin.php?hlm=master&sub=jurusan&aksi=edit" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="idjurusan" class="col-sm-2 control-label">Kode Jurusan</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="idjurusan" readonly name="idjurusan" value="<?php echo $idjurusan; ?>">
		</div>
	</div>
	<div class="form-group">
		<label for="idjurusan" class="col-sm-2 control-label"> Jurusan</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" id="jurusan" name="jurusan" value="<?php echo $jurusan; ?>">
		</div>
	</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				<a href="./admin.php?hlm=master&sub=jurusan" class="btn btn-link">Batal</a>
			</div>
		</div>
	</div>
</form>
<?php
 }
}
?>