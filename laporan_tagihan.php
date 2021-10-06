<?php
if( empty( $_SESSION['iduser'] ) ){
	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else 
include 'koneksi.php';
{?>

   <H2>tagihan pembayaran</H2>
   <hr>
   <a style="margin-left: 10px" class="noprint pull-right btn btn-primary" onclick="window.print();"><span class="glyphicon glyphicon-print" aria-hidden="true"></span> cetak</a>
   <div class="row">
      <div class="col-md-7">
         <table class="table table-bordered">
            <tr class="info">
               <th width="50">#</th>
               <th>Nama</th>
               <th>Kelas</th>
               <th>Bulan</th>
               <th>Jumlah</th>
            </tr>
            <?php
            $no = 1;
            $ambil=$koneksi->query("SELECT * FROM pembayaran RIGHT JOIN siswa ON pembayaran.nis = siswa.nis LEFT JOIN kelas ON siswa.nis = siswa.nis");
            while ($pecah=$ambil->fetch_assoc()){
               ?>
            <tr>
               <td><?php echo  $no?></td>
               <td><?php echo $pecah['nama']?></td>
               <td><?php echo $pecah['kelas']?></td>
               <?php
               if (empty($pecah['bulan']) AND empty($pecah['jumlah']))
               {?>
                <td>--</td>
                <td>belum</td>
               <?php }
               else{
                  ?>
                  <td><?php echo $pecah['bulan']?></td>
                  <td><?php echo "lunas"?></td>
               <?php }?>
            </tr>
            <?php $no++?>
               <?php }?>
         </table>

      </div>
   </div>
   

<?php }?>