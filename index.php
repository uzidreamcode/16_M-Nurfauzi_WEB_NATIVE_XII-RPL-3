<!--
Author: W3layouts
Author URL: http://w3layouts.com
-->
<?php
session_start();
?>
<!DOCTYPE html>
<html lang="zxx">

<head>
	<title>SPP</title>
	<!-- Meta tag Keywords -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="UTF-8" />
	<meta name="keywords"
	content="Working Signin form Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
	<!-- //Meta tag Keywords -->
	<link href="//fonts.googleapis.com/css2?family=Karla:wght@400;700&display=swap" rel="stylesheet">
	<!--/Style-CSS -->
	<link rel="stylesheet" href="css/login.css" type="text/css" media="all" />
	<!--//Style-CSS -->
</head>

<body>


	<!-- form section start -->
	<section class="w3l-workinghny-form">
		<!-- /form -->
		<div class="workinghny-form-grid">
			<div class="wrapper">
				<div class="logo">
					<h1><a class="brand-logo" href="index.html">Aplikasi SPP FAUZI</a></h1>
                    <!-- if logo is image enable this   
                        <a class="brand-logo" href="#index.html">
                            <img src="image-path" alt="Your logo" title="Your logo" style="height:35px;" />
                        </a> -->
                    </div>
                    <div class="workinghny-block-grid">
                    	<div class="workinghny-left-img align-end">
                    		<img src="images/2.png" class="img-responsive" style="height: 400px" alt="img" />
                    	</div>
                    	<div class="form-right-inf">

                    		<div class="login-form-content">
                    			<h2>Where to?</h2>
                    			<form class="signin-form" method="post">

                    				<div class="one-frm">

                    					<label>Name</label>
                    					<input type="text" name="username"  placeholder="" required="">
                    				</div>
                    				<div class="one-frm">
                    					<label>Password</label>
                    					<input type="password" name="password"  placeholder="" required="">
                    				</div>
                    				<label class="check-remaind">
                    					<input type="checkbox">
                    					<span class="checkmark"></span>
                    					<p class="remember">Remember Me</p>

                    				</label>
                    				<button name="submit" class="btn btn-style mt-3">Login </button>
                    				<p class="already">Don't have an account? <a href="#signin">Sign Up</a></p>
                    			</form>
                    			<?php
                    			include 'koneksi.php';	
                    			if (isset($_POST['submit'])) 
                    			{
                    				$user= $_POST["username"];
                    				$pass= md5($_POST['password']);	
                    				$ambil=$koneksi->query("SELECT * FROM spp WHERE username='$user' AND password='$pass'");
                                    $pecah = $ambil->fetch_assoc();
                                    $benar =$ambil->num_rows;
                    				if ($benar > 0) 
                                    {   
                    					echo "<script>alert ('Password benar')</script>"; 
                                         $_SESSION['iduser'] =$user;
                                        $_SESSION['fullname'] = $user;
                                        $_SESSION['admin'] = $pecah['admin'];
                                       header("Location: admin.php");
                                          die();

                    				}
                    				else
                    				{
                    					echo "<script>alert ('Password salah')</script>"; 
                    				}
                    			}
                    			?>
                    		</div>
                    	</div>
                    </div>
                </div>
            </div>
            <!-- //form -->
            <!-- copyright-->

            <!-- //copyright-->
        </section>
        <!-- //form section start -->

    </body>

    </html>