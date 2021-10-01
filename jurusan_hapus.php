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
		$id= $_GET['id'];
		$q=312;
         $sql = mysqli_query($koneksi,"DELETE FROM jurusan WHERE idjurusan='$id'");
         if ($sql > 0) 
         {
			header('location: ./admin.php?hlm=master&sub=jurusan');
			die();
		}
		echo $id;
		echo $q;
	  }
	  else {?>
	  	<?php
	  	$idjurusan= $_GET['idjurusan'];
	  	$ambil=$koneksi->query("SELECT * FROM jurusan WHERE idjurusan='$idjurusan'");
	  	$pecah=$ambil->fetch_assoc();
	  	?>
	  	<div class="alert alert-danger">Yakin akan menghapus Jurusan <?php echo $pecah['jurusan'];?> : <strong>
	  	<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&submit=ya&id=<?php echo $pecah['idjurusan'];?>">hapus</a>

	  
	    <?php } }?>		