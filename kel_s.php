<?php
include 'koneksi.php';
$idkelas=$_POST['idkelas'];
$nis=$_POST['nis'];
$ambil=$koneksi->query("UPDATE siswa SET id_kelas='$idkelas' WHERE nis='$nis'");
?>
<script>
 window.location=history.go(-1);
 </script>

