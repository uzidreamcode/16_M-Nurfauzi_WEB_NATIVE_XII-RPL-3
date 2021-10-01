<?php
include 'koneksi.php';
if( empty($_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
}
else
{
}
?>
<h2>Tambah Tahun pelajaran</h2>
<hr>
<form method="post" class="form-horizontal">
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Tahun Pelajaran</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="tapel" required placeholder="tahun pelajaran">
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-4">
			<button type="submit" name="gas" class="btn btn-primary" >Simpan</button>
			<a href="" class="btn btn-link">Batal</a>
		</div>
	</div>
</form>
<?php
if (isset($_POST['gas'])) 
{
	$koneksi->query("INSERT INTO tapel set tapel='$_POST[tapel]'");
	 echo "<script>location='./admin.php?hlm=master&sub=tapel'</script>";
}
?>