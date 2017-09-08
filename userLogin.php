<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AzureShoeGallery|User Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
    <!--[if lt IE 9]>
    <script src="js/html5shiv.js"></script>
    <script src="js/respond.min.js"></script>
    <![endif]-->
    <link rel='shortcut icon' type='image/x-icon' href='images/home/favicon.ico' />
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
</head><!--/head-->

<body>
	<header id="header"><!--header-->
		<div class="header_top"><!--header_top-->
			<div class="container">
				<div class="row">
					<div class="col-sm-6">
						<div class="contactinfo">
							
						</div>
					</div>
					<div class="col-sm-6">
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/signup"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/start/join"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/session/new"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://accounts.google.com/login"><i class="fa fa-google-plus"></i></a></li>

							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header_top-->

		<div class="header-middle"><!--header-middle-->
			<div class="container">
				<div class="row">
					<div class="col-sm-4">
						<div class="logo pull-left">
							<img src="images/home/logo.png" alt="" />
						</div>
						<div class="btn-group pull-right">



						</div>
					</div>
					<div class="col-sm-8">
						<div class="shop-menu pull-right">
							<ul class="nav navbar-nav collapse navbar-collapse">
								<li><a href="index.php">Home</a></li>
								<li class="dropdown"><a href="onSale.php">OnSale</a>

                                </li>
								<li class="dropdown"><a href="orderCart.php">OrderCart</a>

                                </li>

								<li><a href="aboutUs.php">ContactUS</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->


	</header><!--/header-->

	 <div id="contact-page" class="container">
    	<div class="bg">

    		<div class="row">
	    		<div class="col-sm-8 contact_us ">
	    			<div class="contact-form">
	    				<h2 class="title text-center"> Login IN</h2>
	    				<div class="status alert alert-success" style="display: none"></div>
				    <div class="col-sm-4 col-sm-offset-1 loginDesign">
					<div class="login-form"><!--login form-->
							<?php
							if (isset($_GET['itemcode'])) {
								$orderitem = $_GET['itemcode'];
								$userqty = $_GET['userqty'];
								$hqty = $_GET['hqty'];
								$sprice = $_GET['sprice'];
								$deliverdate = $_GET['deliverdate'];
							}
							if(isset($_SESSION["erroruserformat"]))
							{?>

							<div class="erroruserorder"><?php echo $_SESSION["erroruserformat"]?></div>
							<?php
							}
							else {
								if (isset($_SESSION["orderemailerror"]))
								{
								?>
								<div class="erroruserorder"><?php echo $_SESSION["orderemailerror"]?></div>
								<?php
								}
								if (isset($_SESSION["orderpassworderror"] ))
								{
								?>
								<div class="erroruserorder"><?php echo $_SESSION["orderpassworderror"] ?></div>
								<?php
								}
								if (isset($_SESSION["erroruserorder"]))
								{
								?>
								<div class="erroruserorder"><?php echo $_SESSION["erroruserorder"]?></div>
								<?php
								}
								
							}


							 ?>
						<form action="doUserLogin.php" method="post">
							<input type="email" name="email" placeholder="Email" required>
							<input type="password" placeholder="Password" name="password" required>
							<input type="hidden" name="latestlogin" value="latestlogin">
							<input type="hidden" name="orderitem" value="<?php echo $orderitem;?>">
							<input type="hidden" name="userqty" value="<?php echo $userqty;?>">
							<input type="hidden" name="hqty" value="<?php echo $hqty;?>">
							<input type="hidden" name="sprice" value="<?php echo $sprice;?>">
							<input type="hidden" name="deliverdate" value="<?php echo $deliverdate;?>">
							<input type="hidden" name="orderlogin" value="orderlogin">
							<span>
								<a href="userRegister.php">New Register?</a>

							</span>
							<button type="submit" name="submit" class="btn btn-default">Login</button>
						</form>
						
					</div><!--/login form-->
				</div>


	    			</div>
	    		</div>
	    		<div class="col-sm-4">

    			</div>
	    	</div>
    	</div>
    </div><!--/#contact-page-->
<?php unset($_SESSION["orderemailerror"]);
						unset($_SESSION["orderpassworderror"]) ;
						unset($_SESSION["erroruserorder"]);?>
	<footer id="footer"><!--Footer-->


		<div class="footer-bottom">
			<div class="container">
				<div class="row">
					<p class="pull-left">AzureShoeGallery © AZSG</p>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
    <script type="text/javascript" src="js/gmaps.js"></script>
	<script src="js/contact.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    function validateRegister()
	{	var password = document.forms["registerForm"]["password"].value;
		var confirmpassword = document.forms["registerForm"]["confirmpassword"].value;

		if(password != confirmpassword  )
		{
			alert("Please Enter Same Password");
			return false;

		}



	}</script>

</body>
</html>