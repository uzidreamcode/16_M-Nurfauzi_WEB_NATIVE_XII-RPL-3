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
<?php
$id=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM tapel WHERE id_tapel='$_GET[id]'");
$pecah=$ambil->fetch_assoc();
?>

<h2>Edit Tahun pelajaran</h2>
<hr>
<form method="post" class="form-horizontal">
	<div class="form-group">
		<label for="tapel" class="col-sm-2 control-label">Edit Tahun Pelajaran</label>
		<div class="col-sm-2">
			<input type="text" class="form-control" name="tapel" required value="<?php echo $pecah['tapel']?> " >
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
if (isset($_POST['gas'] )) 
{
	$koneksi->query("UPDATE tapel set tapel='$_POST[tapel]' WHERE id_tapel='$id'");
	echo "<script>location='./admin.php?hlm=master&sub=tapel'</script>";
}