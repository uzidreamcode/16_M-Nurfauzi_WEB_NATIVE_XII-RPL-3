<?php
if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	if (isset($_POST['submit'])) 
	{
		$nis=$_REQUEST['nis'];
		$nama=$_REQUEST['nama'];
		$idjurusan= $_REQUEST['idjurusan'];

		$sql = mysqli_query($koneksi,"UPDATE siswa SET nama='$nama',idjurusan='$idjurusan' WHERE nis='$nis' ");
		if ($sql>0) 
		{
			header('location: ./admin.php?hlm=master&sub=siswa');
			die();
		}
		else
		{
			echo "ERROR!";
		}
	}
	else
	{
		$nis = $_REQUEST['nis'];
		$sql = mysqli_query($koneksi,"SELECT * FROM siswa WHERE nis='$nis'");
		list($nis,$nama,$idjurusan)=mysqli_fetch_array($sql);?>

		<h2>Edit siswa</h2>
		<hr>
		<form method="post" action="admin.php?hlm=master&sub=siswa&aksi=edit" class="form-horizontal" role='form'>
			<div class="form-group">

				<label for="nis" class="col-sm-2 control-label">NIS</label>
				<div class="col-sm-2">
					<input readonly="" value="<?php echo $nis?>" type="text" class="form-control" id="nis" name="nis" required autofocus>
				</div>
			</div>
			<div class="form-group">

				<label for="nama" class="col-sm-2 control-label">NAMA</label>
				<div class="col-sm-4">
					<input type="text" class="form-control" id="nama" name="nama" value="<?php echo $nama?>" required autofocus>
				</div>
			</div>
			<div class="form-group">
				<label for="jurusan" class="col-sm-2 control-label">JURUSAN</label>
				<div class="col-sm-4">
					<select class="form-control" name="idjurusan">
						<?php
						$ambil=$koneksi->query("SELECT * FROM jurusan");
						while (list($id,$jurusan)=mysqli_fetch_array($ambil)) 
						{
							echo '<option value="'.$id.'"';
							echo ($id==$idjurusan) ? 'selected' : '';
							echo '>'.$jurusan.'</option>';
						}
						?>
			
						</select>
					</div>
				</div>
				<div class="form-group">
					<div class="col-sm-offset-2 col-sm-10">
						<button name="submit" class="btn btn-primary">Simpan</button>
						<a href="./admin.php?hlm=master&sub=siswa" class="btn btn-link"> Batal</a>
						
					</div>
				</div>

		


		</form>
		<?php }} ?>