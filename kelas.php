<?php
if( empty($_SESSION['iduser'] ) ){
	//session_destroy();
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	include 'koneksi.php';
	if (isset($_REQUEST['aksi'])) 
	{
		$aksi= $_REQUEST['aksi'];
		if ($aksi == 'view') 
		{
			include 'kelas_baru.php';
		}
		elseif ($aksi=='edit') 
		{
			include 'kelas_edit.php';
		}
		elseif ($aksi == 'hapus') 
		{
			include 'kelas_hapus.php';
		}
		elseif ($aksi=='baru' ) 
		{
			include 'kel_baru.php';
		}
	}
	else
	{
		?>
		<h2>DAFTAR KELAS</h2><hr>
		<div class="row">
			<div class="col-md-7">
				
				<form action="./admin.php?hlm=master&sub=kelas" method="post">
					<div class="col-md-6">
						<select name="tahun" class="form-control">
							<option value="2020/2021"><?php echo date('Y', strtotime('-1 year'));echo "/";echo date('Y');?></option>
							<option value="<?php echo date('Y');echo "/";echo date('Y', strtotime('+1 year'));?>"><?php echo date('Y');echo "/";echo date('Y', strtotime('+1 year'));?></option>
							<option value="<?php echo date('Y', strtotime('+1 year'));echo "/";echo date('Y', strtotime('+2 year'));?>"><?php echo date('Y', strtotime('+1 year'));echo "/";echo date('Y', strtotime('+2 year'));?></option>
						</select>
					</div>
					<button class="btn btn-primary" name="cari">Filter</button>
				</form>
				<br>

				<table class="table table-bordered">
					<tr class="info">
						<th width="50">#</th>
						<th>kelas</th>
						<th>Tahun pelajaran</th>
						<th width="200">
							<a href="./admin.php?hlm=master&sub=kelas&aksi=baru" class="btn btn-default btn-xs">Tambah data</a>
						</th>
					</tr>
					<?php
					if (isset($_POST['cari'])) 
					{
						$cari=$_POST['tahun'];
						$sql = $koneksi->query("SELECT * FROM kelas WHERE th_pelajaran='$cari' ");
					}
					else
					{
						// $sql = mysqli_query($koneksi,"SELECT kelas.kelas, kelas.th_pelajaran, count(siswa.id_kelas) as jml, siswa.id_kelas FROM kelas,siswa WHERE siswa.id_kelas=kelas.id_kelas GROUP BY kelas.kelas");

						$sql = $koneksi->query("SELECT * FROM kelas");

					}
					
					$no=1;
					while ($pecah=$sql->fetch_assoc()) 
						{?>
							<tr>
								<td><?php echo $no?></td>
								<td><?php echo $pecah['kelas']?>
								<span class="badge pull-right">
									<?php $ambil=$koneksi->query("SELECT * FROM siswa WHERE id_kelas='$pecah[id_kelas]'");
									$testis=$ambil->num_rows;
									?>
								<?php echo $testis?>
								 siswa </span>
							</td>
							<td>
								<?php echo $pecah['th_pelajaran']?>
							</td>
							<td>
								<a href="./admin.php?hlm=master&sub=kelas&aksi=view&id=<?php echo $pecah['id_kelas']?> " class='btn btn-warning'>EDIT </a>
								<a href="./admin.php?hlm=master&sub=kelas&aksi=hapus&id=<?php echo $pecah['id_kelas'] ?>" class='btn btn-danger'>HAPUS </a>
							</td>
						</tr>
						<?php $no++?>
					<?php }?>






				</table>
			</div>

		</div>
		<?php }}?>