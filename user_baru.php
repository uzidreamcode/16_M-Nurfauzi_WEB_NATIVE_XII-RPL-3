<?php
include 'koneksi.php';

if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
}
else
{
}
?>
<h2>Tambah User Baru</h2>
<hr>
<form class="form-horizontal" method="post">
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label" >Username</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="username" placeholder="username" name="username" required autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">password</label>
		<div class="col-sm-3">
			<input type="password" class="form-control" id="password" name="password" placeholder="password" required><small>Password akan di enkripsi</small>
		</div>
	</div>
	<div class="form-group">
		<label for="fullname" class="col-sm-2 control-label">fullname</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" placeholder="fullname" name="fullname">
		</div>
	</div>
	<div class="form-group">
		<label for="admin" class="col-sm-2 control-label">Admin</label>
		<div class="col-sm-2">
			<select name="admin" class="form-control">
				<option value="0">bukan</option>
				<option value="1">admin</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-primary">simpan</button>
			<a href="admin.php?hlm=master">Batal</a>
		</div>
	</div>
</form>
<?php
if (isset($_POST['submit'])) 
{
	$pass=md5($_POST['password']);
	$koneksi->query("INSERT INTO SPP VALUES('','$_POST[username]','$pass','$_POST[admin]','$_POST[fullname]')");
	 echo "<script>location='./admin.php?hlm=master'</script>";	
}