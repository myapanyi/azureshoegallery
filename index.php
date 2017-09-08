<?php session_start() ?>
<!DOCTYPE html>
<?php include 'conDB.php';?>


<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AzureShoeGallery|Home</title>
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


						<?php  if(isset($_SESSION['userid'])) { ?>
						<div class="social-icons pull-right">
							<ul class="nav navbar-nav ">
								<li class="profile"><a href="myprofile.php" style="color:darkgoldenrod">My Profile</a></li>
								<li><a href="userLogout.php" class="logoutlink" style="color:blue">Logout</a></li>
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/signup"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/start/join"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/session/new"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://accounts.google.com/login"><i class="fa fa-google-plus"></i></a></li>

							</ul>
							
							</div>
							<?php }else{?>
							<div class="social-icons pull-right">
							<ul class="nav navbar-nav ">
								<li><a href="https://www.facebook.com/"><i class="fa fa-facebook"></i></a></li>
								<li><a href="https://twitter.com/signup"><i class="fa fa-twitter"></i></a></li>
								<li><a href="https://www.linkedin.com/start/join"><i class="fa fa-linkedin"></i></a></li>
								<li><a href="https://dribbble.com/session/new"><i class="fa fa-dribbble"></i></a></li>
								<li><a href="https://accounts.google.com/login"><i class="fa fa-google-plus"></i></a></li>
							</ul>

							</div>
								<?php } ?>


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

								<li><a href="aboutUs.php">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->


	</header><!--/header-->

	<section id="slider"><!--slider-->
		<div class="container">
			<div class="row">
				<div class="col-sm-12">
					<div id="slider-carousel" class="carousel slide" data-ride="carousel">
						<ol class="carousel-indicators">
							<li data-target="#slider-carousel" data-slide-to="0" class="active"></li>
							<li data-target="#slider-carousel" data-slide-to="1"></li>
							<li data-target="#slider-carousel" data-slide-to="2"></li>
						</ol>

						<div class="carousel-inner">
							<div class="item active">
								<div class="col-sm-6">
									<h1><span>Deliver Get Within Two Weeks!!!</span> </h1>
									<a href="aboutUs.php"><button type="button" class="btn btn-default get">CONTACT US</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl1.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>
							<div class="item">
								<div class="col-sm-6">
									<h1><span>Deliver Get Within Two Weeks!!!</span></h1>
									<a href="aboutUs.php"><button type="button" class="btn btn-default get">CONTACT US</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl2.jpg" class="girl img-responsive" alt="" />
								</div>
							</div>

							<div class="item">
								<div class="col-sm-6">
									<h1><span>Deliver Get Within Two Weeks!!!</span></h1>
									<a href="aboutUs.php"><button type="button" class="btn btn-default get">CONTACT US</button></a>
								</div>
								<div class="col-sm-6">
									<img src="images/home/girl3.jpg" class="girl img-responsive" alt="" />

								</div>
							</div>

						</div>

						<a href="#slider-carousel" class="left control-carousel hidden-xs" data-slide="prev">
							<i class="fa fa-angle-left"></i>
						</a>
						<a href="#slider-carousel" class="right control-carousel hidden-xs" data-slide="next">
							<i class="fa fa-angle-right"></i>
						</a>
					</div>

				</div>
			</div>
		</div>
	</section><!--/slider-->

	<section>
		<div class="container">
			<div class="row">
				<div class="col-sm-3">
						<div class="left-sidebar">
					<?php if(isset($_SESSION['customname'])){ ?>
						<h2><?php
						echo "Welcome";
						?></h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->

							<label style="padding-right:15px"><span class="ulogin_design">User Name:</span></label>
							<label><?php echo $_SESSION['customname']; ?></label><br/>
							<label style="padding-right:15px"><span class="ulogin_design">Email :</span></label>
							<label><?php echo $_SESSION['email']; ?></label>

							

						</div>
						<?php }else{

							        if (isset($_SESSION["error"])):?>
							         <h2>User Login</h2>
							         <div class="usererror"><?php echo $_SESSION["error"]; ?></div>
							      <?php endif;
							       if (isset($_SESSION['user']["emailerror"] )):?>
							         <h2>User Login</h2>
							         <div class="usererror"><?php echo $_SESSION['user']["emailerror"] ; ?></div>
							      <?php endif;
							       if (isset($_SESSION['user']["usererror"])):?>
							         <h2>User Login</h2>
							         <div class="usererror"><?php echo $_SESSION['user']["usererror"]; ?></div>
							      <?php endif;?>




						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<form action="doUserLogin.php" method="post">
							<label style="padding-right:15px"><span class="ulogin_design">Email   :</span></label>
							<input type="email" name="email" required >
							<label><span class="ulogin_design">Password:</span></label>
							<input type="password" name="password" required>
							<a class="newreg" href="userRegister.php">New Register?</a>
							<button style="margin-left:120px;margin-top: 20px" name="submit" type="submit">Login</button>
							</form>
						</div>
						<?php } ?>

					</div>



				</div>

				<div class="col-sm-9 padding-right">
					<div class="features_items"><!--features_items-->
						<h2 class="title text-center">New Products</h2>
						<?php
						$query = "SELECT * FROM item where qty>0 ORDER BY itemcode DESC LIMIT 6 ";
						$result = mysql_query($query);

						while($row = mysql_fetch_assoc($result)) :

						?>

								<?php if(isset($row['categoryid']))
						    	{
						    		$categoryID = $row['categoryid'];
						    		$gquery = "SELECT category FROM category where categoryid = '$categoryID' ";
								    $gresult = mysql_query($gquery);
								    while($grow = mysql_fetch_assoc($gresult)) :
								    $categoryData = $grow['category'];
								    endwhile;
								} ?>
								 <?php
										$source= "admin/adminpart/images/".$categoryData."/".$row['imagepath'];
										 $dest = "images/".$categoryData."/i".$row['imagepath'];
										 if (!function_exists('stream_copy')) {
										 	function stream_copy($src, $dest)
											{
												$fsrc = fopen($src,'r+');
												$fdest = fopen($dest,'w+');
												$len = stream_copy_to_stream($fsrc,$fdest);
												fclose($fsrc);
												fclose($fdest);
												return $len;
											}
										 }

										stream_copy($source, $dest);

										?>
										<div class="col-sm-4">
							<div class="product-image-wrapper">
								<div class="single-products">
										<div class="productinfo text-center">
											<?php echo "<img class=\"custom_img_align\" src=\"images/".$categoryData."/i".$row['imagepath']."\" />";?>
											<h3 class="code">Code:  <?php echo $row['itemcode']?></h3>
											<h2>Price:  <?php echo $row['sprice']?></h2>

											<a href="productDetail.php?itemcode=<?php echo $row['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Detail</a>
											<a href="productDetail.php?itemcode=<?php echo $row['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Order</a>
										</div>
										<div >

										</div>
										<img src="images/home/new.png" class="new" alt="" />
								</div>

							</div>
						</div>
						<?php endwhile;?>

					</div><!--features_items-->
				</div>
			</div>
		</div>
	</section>
	<?php 
	$querycheck = "SELECT * FROM item ";
						$resultcheck = mysql_query($querycheck);
						$countcheck = mysql_num_rows($resultcheck);

						if ($countcheck > 5) {
							
						?>
	<div class="recommended_items"><!--recommended_items-->
						<h2 class="title text-center">recommended items</h2>

						<div id="recommended-item-carousel" class="carousel slide" data-ride="carousel">
							<div class="carousel-inner">
								<div class="item active">

<?php
						$queryrecommend = "SELECT * FROM item ORDER BY itemcode DESC LIMIT 3 ";
						$resultd = mysql_query($queryrecommend);
						$count = 0;
						while($recommended = mysql_fetch_assoc($resultd)) :


						?>

								<?php if(isset($recommended['categoryid']))
						    	{
						    		$categoryID = $recommended['categoryid'];
						    		$gquery = "SELECT category FROM category where categoryid = '$categoryID' ";
								    $gresult = mysql_query($gquery);
								    while($grow = mysql_fetch_assoc($gresult)) :
								    $categoryData = $grow['category'];
								    endwhile;
								} ?>
								 <?php
										$source= "admin/adminpart/images/".$categoryData."/".$recommended['imagepath'];
										 $dest = "images/".$categoryData."/i".$recommended['imagepath'];
										 if (!function_exists('stream_copy')) {
										 	function stream_copy($src, $dest)
											{
												$fsrc = fopen($src,'r+');
												$fdest = fopen($dest,'w+');
												$len = stream_copy_to_stream($fsrc,$fdest);
												fclose($fsrc);
												fclose($fdest);
												return $len;
											}
										 }

										stream_copy($source, $dest);


										?>
									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
											<?php echo "<img class=\"custom_img_align\" src=\"images/".$categoryData."/i".$recommended['imagepath']."\" />";?>
											<h3 class="code">Code:  <?php echo $recommended['itemcode']?></h3>
											<h2>Price:  <?php echo $recommended['sprice'];?>KS</h2>

											<a href="productDetail.php?itemcode=<?php echo $recommended['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Detail</a>
											<a href="productDetail.php?itemcode=<?php echo $recommended['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Order</a>
										</div>

											</div>
										</div>
									</div>

								<?php endwhile;?>

								</div>

								<div class="item">
								<?php
								$queryre = "SELECT * FROM item  ORDER BY itemcode DESC LIMIT 3,3 ";
								$resultfor = mysql_query($queryre);

								while($recommended = mysql_fetch_assoc($resultfor)) :


								?>

								<?php if(isset($recommended['categoryid']))
						    	{
						    		$categoryID = $recommended['categoryid'];
						    		$gquery = "SELECT category FROM category where categoryid = '$categoryID' ";
								    $gresult = mysql_query($gquery);
								    while($grow = mysql_fetch_assoc($gresult)) :
								    $categoryData = $grow['category'];
								    endwhile;
								} ?>
								 <?php
										$source= "admin/adminpart/images/".$categoryData."/".$recommended['imagepath'];
										 $dest = "images/".$categoryData."/i".$recommended['imagepath'];
										 if (!function_exists('stream_copy')) {
										 	function stream_copy($src, $dest)
											{
												$fsrc = fopen($src,'r+');
												$fdest = fopen($dest,'w+');
												$len = stream_copy_to_stream($fsrc,$fdest);
												fclose($fsrc);
												fclose($fdest);
												return $len;
											}
										 }

										stream_copy($source, $dest);


										?>

									<div class="col-sm-4">
										<div class="product-image-wrapper">
											<div class="single-products">
												<div class="productinfo text-center">
											<?php echo "<img class=\"custom_img_align\" src=\"images/".$categoryData."/i".$recommended['imagepath']."\" />";?>
											<h3 class="code">Code:  <?php echo $recommended['itemcode']?></h3>
											<h2>Price:  <?php echo $recommended['sprice'];?>KS</h2>

											<a href="productDetail.php?itemcode=<?php echo $recommended['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Detail</a>
											<a href="productDetail.php?itemcode=<?php echo $recommended['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Order</a>
										</div>

											</div>
										</div>
									</div>
									<?php endwhile;?>

								</div>

							</div>
							 <a class="left recommended-item-control" href="#recommended-item-carousel" data-slide="prev">
								<i class="fa fa-angle-left"></i>
							  </a>
							  <a class="right recommended-item-control" href="#recommended-item-carousel" data-slide="next">
								<i class="fa fa-angle-right"></i>
							  </a>
				</div>
		</div><!--/recommended_items-->
		<?php }
		unset($_SESSION["error"]);
		unset($_SESSION['user']["emailerror"] );
		unset($_SESSION['user']["usererror"]);
		
						 ?>
	<footer id="footer"><!--Footer-->
		<div class="footer-bottom">
			<div class="container">

				<div class="row">
					<p class="pull-left">AzureShoeGallery © AZSG</p>
					<a href="admin/adminpart/adminlogin.php"><button type="button" class="btn btn-default adminbtn orderbtn">Admin Login</button></a>
				</div>
			</div>
		</div>

	</footer><!--/Footer-->



    <script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>

    <script src="js/main.js"></script>
</body>
</html>