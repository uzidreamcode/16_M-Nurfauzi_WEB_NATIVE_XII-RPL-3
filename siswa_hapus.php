<?php
if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	if (isset($_REQUEST['submit']))
	{
		$nis= $_GET['nis'];
         $sql = mysqli_query($koneksi,"DELETE FROM siswa WHERE nis='$nis'");
         if ($sql > 0) 
         {
			header('location: ./admin.php?hlm=master&sub=siswa');
			die();
		}
	  }
	  else {?>
	  	<?php
	  	$nis= $_GET['nis'];
	  	$ambil=$koneksi->query("SELECT * FROM siswa WHERE nis='$nis'");
	  	$pecah=$ambil->fetch_assoc();
	  	?>
	  	<div class="alert alert-danger">Yakin akan menghapus <?php echo $pecah['nama'];?> : <strong>
	  	<a href="./admin.php?hlm=master&sub=siswa&aksi=hapus&submit=ya&nis=<?php echo $pecah['nis'];?>">hapus</a>

	  
	    <?php } }?>		