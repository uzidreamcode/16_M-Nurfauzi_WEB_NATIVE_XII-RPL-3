<?php
if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	if (isset($_REQUEST['aksi'])) 
	{
		$aksi=$_REQUEST['aksi'];
		switch ($aksi) 
		{
			case 'baru':
				include 'siswa_baru.php';
				break;
			case 'edit':
				include 'siswa_edit.php';
				break;
			case 'hapus':
				include 'siswa_hapus.php';
				break;
		}
	}
	else
	{?>
		<h2>DAFTAR SISWA</h2>
		<hr>
		<div class="row">
			<div class="col-md-9">
				<table class="table table-bordered">
					<tr class="info">
						<th>#</th>
						<th width="100">NIS</th>
						<th>Nama Lengkap</th>
						<th>Jurusan</th>
						<th width="100"><a href="./admin.php?hlm=master&sub=siswa&aksi=baru" class="btn btn-primary">Tambah data</a></th>
					</tr>

					
			<?php
			$ambil=$koneksi->query("SELECT * FROM siswa INNER JOIN jurusan ON siswa.idjurusan=jurusan.idjurusan GROUP BY nis");
			$no=1;
			while ($pecah=$ambil->fetch_assoc()) {?>

				<tr>
					<td><?php echo $no?></td>
					<td><?php echo $pecah['nis']?></td>
					<td><?php echo $pecah['nama']?></td>
					<td><?php echo $pecah['jurusan']?></td>
					<td>
						<a href="./admin.php?hlm=master&sub=siswa&aksi=edit&nis=<?php echo $pecah['nis']?>" class='btn btn-warning' >Edit</a>
						<a href="./admin.php?hlm=master&sub=siswa&aksi=hapus&nis=<?php echo $pecah['nis']?>" class='btn btn-danger' >Hapus</a>
					</td>

				</tr>
			<?php $no++?>
			<?php }?>

				</table>
			</div>
		</div>
	<?php } }?>
