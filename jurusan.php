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
		$aksi = $_REQUEST['aksi'];
		switch ($aksi) 
		{
			case 'baru':
			include 'jurusan_baru.php';
			break;
			case 'edit':
			include 'jurusan_edit.php';
			break;
			case 'hapus':
			include 'jurusan_hapus.php';
			break;
		}
	}
	else
	{
		$sql= mysqli_query($koneksi,"SELECT * FROM jurusan ORDER BY idjurusan");?>
		<h2>DAFTAR JURUSAN</h2>
		<hr>
		<div class="row">
			<div class="col-md-9">
				<table class="table table-bordered">
					<tr class="info">
						<th>#</th>
						<th width="100">
							kode jurusan
						</th>
						<th>
							nama jurusan
						</th>
						<th width="200">
							<a href="./admin.php?hlm=master&sub=jurusan&aksi=baru" class="btn btn-primary btn-xs">TAMBAH</a>
						</th>

					</tr>
					<?php
					$no=1;

						while (list($idjurusan,$jurusan)= mysqli_fetch_array($sql)){?>
							<tr>
								<td><?php echo $no?></td>
								<td><?php echo $idjurusan?></td>
								<td><?php echo $jurusan?></td>
								<td>
									<a href="./admin.php?hlm=master&sub=jurusan&aksi=edit&idjurusan=<?php echo $idjurusan?> "class='btn btn-warning'>Edit</a>
									<a href="./admin.php?hlm=master&sub=jurusan&aksi=hapus&idjurusan=<?php echo $idjurusan?> "class='btn btn-danger'>Hapus</a> 
								</td>
								<?php 
								$no++;?>

							</tr>
						<?php }?>

					
				</table>
				
			</div>
			
		</div>
	<?php }?>
	

<?php }?>
