<?php
include 'koneksi.php';
$id=$_GET['id'];
$nol=0;
$ambil=$koneksi->query("UPDATE siswa SET id_kelas='$nol' WHERE nis='$id'");
?>
<script>
 window.location=history.go(-1);
 </script>
