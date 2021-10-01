<?php
include 'koneksi.php';
if( empty($_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
}
else
{
	if (isset($_REQUEST['aksi'])) 
	{
		$aksi= $_REQUEST['aksi'];
		switch ($aksi) 
		{
			case 'baru':
				include 'tapel_baru.php';
			break;

			case 'edit':
				include 'tapel_edit.php';
			break;

			case 'hapus':
				include 'tapel_hapus.php';
			break;	
		}
	}
	else
	{?>
		<h2>Konfigurasi Tahun Pelajaran</h2>
		<hr>
		<div class="row">
			<div class="col-md-6">
				<table class="table table-bordered">
					<tr class="info">
						<th width="30">#</th>
						<th width="100">Tahun Pelajaran</th>
						<th><a href="./admin.php?hlm=master&sub=tapel&aksi=baru" class="btn btn-default btn-xss">Tambah data</a></th>
					</tr>
					<?php
					$no=1;
					$ambil = $koneksi->query("SELECT * FROM tapel");
					while ($pecah=$ambil->fetch_assoc()) {?>
					<tr>
						<td>
							<?php echo $no?>
						</td>
						<td>
							<?php echo $pecah['tapel']?>
						</td>
						<td>
							<a href="./admin.php?hlm=master&sub=tapel&aksi=edit&id=<?php echo $pecah['id_tapel']?> " class="btn btn-warning">EDIT</a>
							<a href="./admin.php?hlm=master&sub=tapel&aksi=hapus&id=<?php echo $pecah['id_tapel']?> " class="btn btn-danger">Hapus</a>
						</td>
					</tr>
				<?php }?>
				<?php $no++?>
				</table>
			</div>
		</div>
	<?php }}?>

