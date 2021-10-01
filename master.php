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
	if (isset($_REQUEST['sub'])) 
	{
		$sub= $_REQUEST['sub'];
		switch ($sub) {
			case 'jurusan':
			include 'jurusan.php';
			break;
			case 'siswa':
			include 'siswa.php';
			break;
			case 'kelas':
			include 'kelas.php';
			break;
			case 'jenis':
			include 'jenis.php';
			break;
			case 'tapel':
			include 'tapel.php';
			break;
		}
	}
	else
	{
		if (isset($_REQUEST['aksi'])) 
		{
			$aksi=$_REQUEST['aksi'];

			switch ($aksi) {
				case 'baru':
				include 'user_baru.php';
				break;
				case 'edit':
				include 'user_edit.php';
				break;
				case 'hapus':
				include 'user_hapus.php';
				break;
				
			}
		}
		else
		{
			echo "<h2>Daftar User</h2>";
			echo "<hr>";

			$sql= mysqli_query($koneksi,"SELECT iduser,username,admin,fullname FROM spp ORDER BY iduser");
			$no= 1;
			echo "<div class='row'>";
			echo "<div class='col-md-7'>";
			echo "<table class='table table-bordered'>";
			echo "<tr class='info'><th width='30'>No.</th><th>username</th><th>Nama lengkap</th><th width='50'>admin</th>";
			echo "<th><a href='admin.php?hlm=master&aksi=baru' class='btn btn-default btn-xs'>Tambah</a></th></tr>";
			while (list($id,$username,$admin,$fullname) = mysqli_fetch_array($sql)) 
			{
				echo "<tr><td>".$no."</td>";
				echo "<td>".$username."</td>";
				echo "<td>".$fullname."</td>";
				echo "<td>";
				echo ($admin==1) ? "<span class='glyphicon glyphicon-ok' aria-hidden='true'></span>":"";
				echo "</td>";
				echo "<td><a href='admin.php?hlm=master&aksi=edit&id=".$id."' class='btn btn-succes btn-xs'>Edit</a>";
				echo '<a href="admin.php?hlm=master&aksi=hapus&id='.$id.'" class="btn btn-danger btn-xs">Hapus</a></td></tr>';
				$no++;

			}
			echo "</table>";
			echo "</div></div>";
		}
	}
}