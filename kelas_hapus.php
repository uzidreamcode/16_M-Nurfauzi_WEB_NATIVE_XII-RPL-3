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
		$nol=0;
		$ambil=$koneksi->query("UPDATE siswa SET id_kelas='$nol' WHERE id_kelas='$id'");

         $sql = mysqli_query($koneksi,"DELETE FROM kelas WHERE id_kelas='$id'");
         if ($sql > 0) 
         {
			header('location: https://localhost/16_M%20Nurfauzi%20i_XI%20RPL%203_WEB/admin.php?hlm=master&sub=kelas');
			die();
		}
	  }
	  else {?>
	  	<?php
	  	$id= $_GET['id'];
	  	$ambil=$koneksi->query("SELECT * FROM kelas WHERE id_kelas='$id'");
	  	$pecah=$ambil->fetch_assoc();
	  	?>
	  	<div class="alert alert-danger">Yakin akan menghapus <?php echo $pecah['kelas'];?> : <strong>
	  	<a href="./admin.php?hlm=master&sub=kelas&aksi=hapus&submit=ya&id=<?php echo $pecah['id_kelas'];?>">hapus</a>

	  
	    <?php } }?>		