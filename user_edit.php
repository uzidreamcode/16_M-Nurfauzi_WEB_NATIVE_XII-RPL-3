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
<?php 
$id=$_GET['id'];
$ambil=$koneksi->query("SELECT * FROM spp WHERE iduser='$id'");
$pecah=$ambil->fetch_assoc();
?>
<h2>Edit User</h2>
<hr>
<form class="form-horizontal" method="post">
	<div class="form-group">
		<label for="username" class="col-sm-2 control-label" >Username</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="username" value="<?php echo $pecah['username']?>" name="username"  autofocus>
		</div>
	</div>
	<div class="form-group">
		<label for="password" class="col-sm-2 control-label">password</label>
		<div class="col-sm-3">
			<input type="password" class="form-control" id="password" name="password" placeholder="password" ><small>Biarkan kosong jika tidak berubah</small>
		</div>
	</div>
	<div class="form-group">
		<label for="fullname" class="col-sm-2 control-label">fullname</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" value="<?php echo $pecah['fullname']?> " name="fullname">
		</div>
	</div>
	<div class="form-group">
		<label for="admin" class="col-sm-2 control-label">Admin</label>
		<div class="col-sm-2">
			<select name="admin" class="form-control">
				<option value="0"<?php echo ($pecah['admin']=='0') ? 'selected' : '';?>>bukan</option>
				<option value="1"<?php echo ($pecah['admin']=='1') ? 'selected' : '';?>>admin</option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="edit" class="btn btn-primary">simpan</button>
			<a href="admin.php?hlm=master">Batal</a>
		</div>
	</div>
</form>
<?php
if (isset($_POST['edit'])) 
{
	$pass=md5($_POST['password']);
	if (empty($pass)) 
	{
		$koneksi->query("UPDATE spp SET username='$_POST[username]',fullname='$_POST[fullname]',admin='$_POST[admin]' WHERE iduser='$id' ");
		echo "<script>location='./admin.php?hlm=master'</script>";	
	}
	else
	{
		$koneksi->query("UPDATE spp SET username='$_POST[username]',fullname='$_POST[fullname]',admin='$_POST[admin]',password='$pass' WHERE iduser='$id'");
		echo "<script>location='./admin.php?hlm=master'</script>";	
	}
}