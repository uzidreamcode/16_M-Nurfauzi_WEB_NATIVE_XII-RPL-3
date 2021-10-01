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
         $sql = mysqli_query($koneksi,"DELETE FROM jenis_bayar WHERE id_jenis='$id'");
         if ($sql > 0) 
         {
			header('location: ./admin.php?hlm=master&sub=jenis');
			die();
		}
	  }
	  else {?>
	  	<?php
	  	$id= $_GET['id'];
	  	$ambil=$koneksi->query("SELECT * FROM jenis_bayar WHERE id_jenis='$id'");
	  	$pecah=$ambil->fetch_assoc();
	  	?>
	  	<div class="alert alert-danger">Yakin akan menghapus <?php echo $pecah['tingkat'];?> <?php echo $pecah['th_pelajaran'];?> : <strong>
	  	<a href="./admin.php?hlm=master&sub=jenis&aksi=hapus&submit=ya&id=<?php echo $pecah['id_jenis'];?>">hapus</a>
	  
	    <?php } }?>		