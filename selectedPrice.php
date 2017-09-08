<!DOCTYPE html>
<?php include 'conDB.php';?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AzureShoeGallery|Products by Price</title>
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
								<li><a href=""><i class="fa fa-facebook"></i></a></li>
								<li><a href=""><i class="fa fa-twitter"></i></a></li>
								<li><a href=""><i class="fa fa-linkedin"></i></a></li>
								<li><a href=""><i class="fa fa-dribbble"></i></a></li>
								<li><a href=""><i class="fa fa-google-plus"></i></a></li>
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
								<li ><a href="onSale.php">OnSale</a>

                                </li>
								<li ><a href="orderCart.php">OrderCart</a>

                                </li>

								<li><a href="aboutUs.php">ContactUs</a></li>
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
						<h2>Category</h2>
							<div class="panel-group category-products" id="accordian"><!--category-productsr-->
						<div class="panel panel-default" >
						<div class="panel-heading Cat" >
							<?php $catquery = "select * from category";
							$catresult = mysql_query($catquery);
							while ($catrow = mysql_fetch_assoc($catresult)):

							?>
							<li><h4 class="panel-title"><a href="selectedCategory.php?categoryid=<?php echo $catrow['categoryid']?>"><?php echo $catrow['category']?></a></h4></li>


							<?php endwhile;?>


							</div>
							</div>


						</div><!--/category-products-->

						<div class="brands_products"><!--brands_products-->
							<h2>Prices</h2>
							<div class="brands-name" >
								<div class="panel-heading forprice Cat" >
									<li><h4 class="panel-title"><a href="selectedPrice.php?pricecode=<?php echo '1'?>"> 5000-15000 KS</a></h4></li>
									<li><h4 class="panel-title"><a href="selectedPrice.php?pricecode=<?php echo '2'?>"> 15000-25000 KS</a></h4></li>
									<li><h4 class="panel-title"><a href="selectedPrice.php?pricecode=<?php echo '3'?>"> Other</a></h4></li>
								</div>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>
				<?php
				$pricecode=$_GET['pricecode'];?>


				<form name="myform">
						<input type="hidden" name="price" value="<?php echo $pricecode ?>">

						</form>
						<?php
						if($pricecode == 1)
						{$query = "SELECT * FROM item where sprice >= 5000 AND sprice <= 15000  ";
						}
						elseif ($pricecode == 2)
						{
							$query = "SELECT * FROM item where sprice > 15000 AND sprice <= 25000  ";
						}
						else {$query = "SELECT * FROM item where sprice > 25000  ";}
						$result = mysql_query($query);
						$count = mysql_num_rows($result);
						
						$per_page = 6;
						$pages = ceil($count/$per_page);

						?>

			<div class="col-sm-9 padding-right" id="content">



			</div>

		</div>
			<div class="piginate">

								<ul id="pagination">
									<?php
									//Show page links
									for($i=1; $i<=$pages; $i++)
									{
										if($i==1)
										{$first = "Frist";
											echo '<li class="pigi" id="'.$i.'">'.$first.'</li>';
										}
										elseif($i==$pages)
										{$last = "Last";
											echo '<li class="pigi" id="'.$i.'">'.$last.'</li>';
										}
										else
										{
											echo '<li class="pigi" id="'.$i.'">'.$i.'</li>';
										}
									}
									?>
						</ul>

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
						 ?>
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
	<script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/price-range.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
	<script src="js/Pagination.js"></script>
    <script src="js/jPages.min.js"></script>

<script type="text/javascript">
pricesend = document.myform.price.value;



	$(document).ready(function(){

	//Display Loading Image
	function Display_Load()
	{
	    $("#loading").fadeIn(900,0);
		$("#loading").html("<img src='bigLoader.gif' />");
	}
	//Hide Loading Image
	function Hide_Load()
	{
		$("#loading").fadeOut('slow');
	};



	$("#pagination li:first").css({'background-color' : '#FE980F'}).css({'border' : 'none'});


	Display_Load();

	$("#content").load("selectedPricePagination.php?page=1&price="+pricesend, Hide_Load());



	//Pagination Click
	$("#pagination li").click(function(){

		Display_Load();

		//CSS Styles
		$("#pagination li")
		.css({'border' : 'solid #dddddd 1px'})
		.css({'background-color' : '#f0f0e9'});

		$(this)
		.css({'background-color' : '#FE980F'})
		.css({'border' : 'none'});

		//Loading Data
		var pageNum = this.id;

		$("#content").load("selectedPricePagination.php?page=" + pageNum+"&price="+pricesend, Hide_Load());
	});


});
	</script>



    <script src="js/main.js"></script>
</body>
</html>

