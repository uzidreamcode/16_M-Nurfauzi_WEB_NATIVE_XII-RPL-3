<?php
if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	?>
	<h2>tambah jenis bayar </h2>
	<hr>
	<form method="post" action="admin.php?hlm=master&sub=jenis&aksi=baru" class="form-horizontal" role="form">
		<div class="form-group">
			<label for="tapel" class="col-sm-2 control-label">tahun pelajaran</label>
			<div class="col-sm-2">
				<input type="text" class="form-control" id="tapel" name="tapel" placeholder="mmm/nnnn" required autofocus>
			</div>
		</div>
		<div class="form-group">
			<label for="tingkat" class="col-sm-2 control-label">kelas</label>
			<div class="col-sm-2"> 
				<select name="tingkat" id="tingkat" class="form-control">
					<option value="X">X (sepuluh)</option>
					<option value="XI">X (sebelas)</option>
					<option value="XII">X (dua belas)</option>
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
					<input type="text" class="form-control" name="jumlah" id="jumlah" placeholder="Nominal pembayaran" autofocus  required>
				</div>
			</div>
		</div>
		<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="ewe" class="btn btn-deflaut">Simpan</button>
				<a href="./admin.php?hlm=master&sub=jenis" class="btn btn-link">BATAL</a>

			</div>
		</div>
	</div>

</div>
</form>
<?php
if (isset($_POST['ewe'])) 
{
	$sql = mysqli_query($koneksi,"INSERT INTO jenis_bayar VALUES('','$_POST[jumlah]','$_POST[tapel]','$_POST[tingkat]')");
	 echo "<script>location='./admin.php?hlm=master&sub=jenis'</script>";	
}
?>

<?php }?>

