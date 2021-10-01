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
         $sql = mysqli_query($koneksi,"DELETE FROM spp WHERE iduser='$id'");
         if ($sql > 0) 
         {
			header('location: ./admin.php?hlm=master');
			die();
		}
	  }
	  else {?>
	  	<?php
	  	$id= $_GET['id'];
	  	$ambil=$koneksi->query("SELECT * FROM spp WHERE iduser='$id'");
	  	$pecah=$ambil->fetch_assoc();
	  	?>
	  	<div class="alert alert-danger">Yakin akan menghapus <?php echo $pecah['fullname'];?><strong>
	  	<a href="./admin.php?hlm=master&aksi=hapus&submit=ya&id=<?php echo $pecah['iduser'];?>">hapus</a>
	  
	    <?php } }?>		