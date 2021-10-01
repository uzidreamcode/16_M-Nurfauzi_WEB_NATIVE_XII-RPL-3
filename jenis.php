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
				include 'jenis_baru.php';
				break;
			case 'edit':
				include 'jenis_edit.php';
				break;
			case 'hapus':
				include 'jenis_hapus.php';
				break;
		}

	}
	else
	{?>
		<h2>Jenis Bayar</h2>
		<hr>
		<div class="row">
			<div class="col-md-7">
				<table class="table table-bordered">
					<tr class="info">
						<th>#</th>
						<th width="200">Tahun Pelajaran</th>
						<th>Kelas</th>
						<th>Jumlah nominal</th>
						<th width="200">
							<a href="admin.php?hlm=master&sub=jenis&aksi=baru" class="btn btn-primary">Tambah Data</a>
						</th>
					</tr>
					<?php
					$ambil=$koneksi->query("SELECT * FROM jenis_bayar ");
					$no=1;
					while ($pecah=$ambil->fetch_assoc()) 
					{?>
						<tr>
							<td><?php echo $no?></td>
							<td><?php echo $pecah['th_pelajaran']?></td>
							<td>
								<?php echo $pecah['tingkat']?>
							</td>
							<td>
								Rp <span class="pull-right"><?php echo $pecah['jumlah']?></span>
							</td>
							<td>
								<a href="admin.php?hlm=master&sub=jenis&aksi=edit&id=<?php echo $pecah['id_jenis']?>" class="btn btn-warning">EDIT</a>
								<a href="admin.php?hlm=master&sub=jenis&aksi=hapus&id=<?php echo $pecah['id_jenis']?>" class="btn btn-danger">HAPUS</a>
							</td>

						</tr>
					<?php }?>
				</table>				
			</div>
		</div>

	<?php }?>	
<?php }?>