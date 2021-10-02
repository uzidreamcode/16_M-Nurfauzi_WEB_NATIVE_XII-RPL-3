
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
 <script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
 <link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #07385c;">
    <a class="navbar-brand text-white" style="height: 25px" href="#">Spp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarText">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link text-white" href="admin.php">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link text-white" href="admin.php?hlm=bayar">pembayaran</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Laporan
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="admin.php?hlm=laporan">Rekap Pembayaran</a>
            <a class="dropdown-item" href="#">Cetak Tagihan</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link text-white dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Data Master
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="./admin.php?hlm=master&sub=jurusan">Jurusan</a>
            <a class="dropdown-item" href="./admin.php?hlm=master&sub=siswa">Siswa</a>
            <a class="dropdown-item" href="./admin.php?hlm=master&sub=kelas">Kelas</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./admin.php?hlm=master&sub=jenis">Jenis Bayar</a>
            <a class="dropdown-item" href="./admin.php?hlm=master">User</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="./admin.php?hlm=master&sub=tapel">Tahun Pelajaran</a>
          </div>
        </li>


      </ul>
      <div class="pull-right">
        <ul class="nav pull-right">
          <li class="dropdown">
            
            <button style="margin-right: 40px; height: 30px; width: 60px; border-radius: 10px" class="btn btn-deflaut" class="dropdown" data-toggle="dropdown"><?php echo $_SESSION['fullname']?></button>
            <ul class="dropdown-menu">
              <li style="border-radius: 10px"><a href="logout.php"><i class="icon-off"></i> Logout</a></li>
            </ul>
          </li>
        </ul>
      </div>



      



    </div></nav>







  </body>
  </html>