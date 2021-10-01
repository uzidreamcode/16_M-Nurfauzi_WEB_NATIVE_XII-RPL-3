<?php

if (empty($_SESSION['iduser'])) 
{
		$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
}
else
{
	if (isset($_REQUEST['submit'])) 
	{
		$idd=$_GET['id'];
	
		if(($submit='simpan') AND isset($_REQUEST['nis'] ))
		{
			$nis=$_REQUEST['nis'];
			$sql=mysqli_query($koneksi,"UPDATE siswa SET id_kelas='$idd' WHERE nis='$nis'");
		}
}?>
	<?php
	$id=$_GET['id'];
	$ewe=$koneksi->query("SELECT * FROM kelas WHERE id_kelas='$_GET[id]'");
	while ($qq=$ewe->fetch_assoc()){
	$kelas=$qq['kelas'];
	$tapel=$qq['th_pelajaran'];
	$idjurusan=$qq['idjurusan'];
	}?>
	<div class="row">
		<div class="col-md-12">
			<h2>Daftar Siswa</h2>
			<form method="post" action="kel_s.php" class="form-inline" >
				<input type="hidden" value="<?php echo $kelas?>" name="kelas">
				<input type="hidden" value="<?php echo $tapel?>" name="tapel">
				<input type="hidden" value="<?php echo $idjurusan?>" name="idjurusan">
				<input type="hidden" value="<?php echo $id?>" name="idkelas">
				<div class="form-group">
					<select name="nis" class="form-control">
						 <?php 
						 $qsiswa=$koneksi->query("SELECT * FROM siswa WHERE id_kelas=0");
						 while ($hawo=$qsiswa->fetch_assoc())
						 {?>
						 	<option value="<?php echo $hawo['nis']?>"><?php echo $hawo['nis']?>
						 		<?php echo $hawo['nama'] ?>
						 	</option>	
						 <?php }?>
					</select>
				</div>
				<button type="submit" name="submit" class="btn btn-deflaut">
					<span class="glyphicon glyphicon-plus"></span>
					Tambah
				</button>
				<a href="admin.php?hlm=master&sub=kelas" class="btn btn-link">Daftar Kelas</a>
			</form>
		</div>
	</div><br>
		<div class="row">
			<div class="col-md-9">
				<table class="table table-bordered">
					<tr>
						<td colspan="2">kelas</td>
						<td colspan="2"><?php echo $kelas?></td>
					</tr>
					<tr class="info">
						<th width="20">no</th>
						<th width="150">NIS</th>
						<th>Nama siswa</th>
						<th>Aksi</th>
					</tr>
					
						<?php
						$ambil=$koneksi->query("SELECT * FROM siswa WHERE id_kelas='$id'");
						$no=1;
						while ($pecah=$ambil->fetch_assoc()) 
						{?>
							<tr>
						<td><?php echo $no?></td>
						<td><?php echo $pecah['nis']?></td>
						<td><?php echo $pecah['nama']?></td>
						<td>
							<a href="hapus_s.php?id=<?php echo $pecah['nis']?>" class="btn btn-danger" >Hapus</a>
						</td>
						</tr>
						<?php $no++?>
						<?php }?>
					
					
				</table>
			</div>
	</div>
<?php }?>