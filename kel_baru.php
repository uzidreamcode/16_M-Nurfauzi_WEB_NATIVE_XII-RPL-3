<h2>Tambah Kelas</h2>
<hr>	
<form method="post" action="https://localhost/16_M%20Nurfauzi%20i_XI%20RPL%203_WEB/admin.php?hlm=master&sub=kelas&aksi=baru" class="form-horizontal">
	<div class="form-group">
		<label for="kelas" class="col-sm-2 contol-label" >Kelas</label>
		<div class="col-sm-4">
		 		<input type="text" class="form-control" id="kelas" name="kelas" placeholder="Nama Kelas" required="">
		 	</div>
	</div>
	<div class="form-group">
		<label for="tapel" class="col-sm-2 contol-label" >tahun pelajaran</label>
		<div class="col-sm-4">
			<select name="tapel" class="form-control">
				<option value="2020/2021"><?php echo date('Y', strtotime('-1 year'));echo "/";echo date('Y');?></option>
				<option value="<?php echo date('Y');echo "/";echo date('Y', strtotime('+1 year'));?>"><?php echo date('Y');echo "/";echo date('Y', strtotime('+1 year'));?></option>
				<option value="<?php echo date('Y', strtotime('+1 year'));echo "/";echo date('Y', strtotime('+2 year'));?>"><?php echo date('Y', strtotime('+1 year'));echo "/";echo date('Y', strtotime('+2 year'));?></option>
			</select>
		</div>
	</div>
	<div class="form-group">
		<label for="jurusan" class="col-sm-2 contol-label">PROGRAM STUDI</label>
		<div class="col-sm-4">

			<select class="form-control" id="jurusan" name="idjurusan">
				<?php
			$ambil=$koneksi->query("SELECT * FROM jurusan ORDER BY idjurusan");
			while ($pecah=$ambil->fetch_assoc()) 
			{?>
				<option value="<?php echo $pecah['idjurusan']?>"><?php echo $pecah['jurusan']?></option>
			<?php }?>
			</select>
		</div>
	</div>
	<div class="form-group">
			<div class="col-sm-offset-2 col-sm-10">
				<button type="submit" name="submit" class="btn btn-primary">Simpan</button>
				<a href="admin.php?hlm=master&sub=kelas" class="btn btn-link">Batal</a>
			</div>
		</div>
	
</form>
<?php
if (isset($_POST['submit'])) 
{	
	$ambil=$koneksi->query("INSERT INTO kelas SET kelas='$_POST[kelas]',th_pelajaran='$_POST[tapel]',idjurusan= '$_POST[idjurusan]'");
	echo "<script>location='admin.php?hlm=master&sub=kelas'</script>";
 
}
?>