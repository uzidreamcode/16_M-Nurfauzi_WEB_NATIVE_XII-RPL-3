<?php
session_start();
include 'koneksi.php';
if( empty($_SESSION['iduser'] ) )
{
	$_SESSION['err'] = '<strong>ERROR!</strong> anda harus login terlebih dahulu.';
	header('location: ./');
	die();
} else 
{
	$nis = $_REQUEST['nis'];
	if (isset($_REQUEST['submit'])) 
	{
		$submit = $_REQUEST['submit'];
		$kls	= $_REQUEST['kls'];
		$bln 	= $_REQUEST['bulan'];

		$sql = mysqli_query($koneksi,"SELECT s.nama,p.tgl_bayar,p.jumlah FROM siswa s INNER JOIN pembayaran p ON s.nis = p.nis='$nis'");
		list($nama,$tgl_bayar,$jml) = mysqli_fetch_array($sql);

		$printTestText = "NIS  :".$nis."\n";
	}
}
?>