<?php
if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
}
?>
<h2>EDIT JENIS PEMBAYARAN</h2>
<hr>
<?php
$id=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM jenis_bayar WHERE id_jenis='$id'");
$pecah=$ambil->fetch_assoc();
?>
<form method="post"  class="form-horizontal" role="form">
		<div class="form-group">
			<label for="tapel" class="col-sm-2 control-label">tahun pelajaran</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="tapel" value="<?php echo $pecah['th_pelajaran']?>" name="tapel"  autofocus>
			</div>
		</div>
		<div class="form-group">
			<label for="tingkat" class="col-sm-2 control-label">kelas</label>
			<div class="col-sm-2"> 
				<select name="tingkat" id="tingkat" class="form-control">
					<option value="X"<?php echo ($pecah['tingkat']=='X') ? 'selected' : '';?>>X (sepuluh)</option>
					<option value="XI"<?php echo ($pecah['tingkat']=='XI') ? 'selected' : '';?>>XI (sebelas)</option>
					<option value="XII"<?php echo ($pecah['tingkat']=='XII') ? 'selected' : '';?>>XII (dua belas)</option>
				</select>
			</div>
		</div>	
		<div class="form-group">
			<label for="jumlah" class="col-sm-2 control-label">jumlah nominal</label>
			<div class="col-sm-3">
				<div class="input-group">
					<div class="input-group-prepend">
						<span class="input-group-text" id="basic-addon1">Rp.</span>
					</div>
					<input type="text" class="form-control" name="jumlah" id="jumlah" value="<?php echo $pecah['jumlah']?> " autofocus >
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="edit" class="btn btn-deflaut">Simpan</button>
				<a href="./admin.php?hlm=master&sub=jenis" class="btn btn-link">BATAL</a>

			</div>
		</div>
	</div>

</div>
</form>
<?php
if (isset($_POST['edit'])) 
{
	$koneksi->query("UPDATE jenis_bayar SET jumlah='$_POST[jumlah]',th_pelajaran='$_POST[tapel]',tingkat='$_POST[tingkat]' WHERE id_jenis='$id' ");
	 echo "<script>location='./admin.php?hlm=master&sub=jenis'</script>";	
}
?>