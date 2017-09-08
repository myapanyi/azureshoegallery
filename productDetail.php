<?php session_start();?>
<!DOCTYPE html>
<?php include 'conDB.php';?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AzureShoeGallery|Product Details</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/prettyPhoto.css" rel="stylesheet">
    <link href="css/price-range.css" rel="stylesheet">
    <link href="css/animate.css" rel="stylesheet">
	<link href="css/main.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link rel="stylesheet" href="//code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">
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
								<li ><a href="onSale.php">On Sale</a>

                                </li>
								<li ><a href="orderCart.php">Order Cart</a>

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
						<h2>Category</h2>
						<div class="panel-group category-products" id="accordian"><!--category-productsr-->
							<?php $catquery = "select * from category";
							$catresult = mysql_query($catquery);
							while ($catrow = mysql_fetch_assoc($catresult)):

							?>
							<div class="panel panel-default">
								<div class="panel-heading">
									<h4 class="panel-title"><a href="selectedCategory.php?categoryid=<?php echo $catrow['categoryid']?>"><?php echo $catrow['category']?></a></h4>
								</div>
							</div>
							<?php endwhile;?>


						</div><!--/category-products-->


						<div class="brands_products"><!--brands_products-->
							<h2>Prices</h2>
							<div class="brands-name">
								<ul class="nav nav-pills nav-stacked">
									<li><a href="selectedPrice.php?pricecode=<?php echo '1'?>"> <span class="pull-right">(50)</span>5000-15000 KS</a></li>
									<li><a href="selectedPrice.php?pricecode=<?php echo '2'?>"> <span class="pull-right">(56)</span>15000-25000 KS</a></li>
									<li><a href="selectedPrice.php?pricecode=<?php echo '3'?>"> <span class="pull-right">(27)</span>Other</a></li>
								</ul>
							</div>
						</div><!--/brands_products-->
					</div>
				</div>


				<div class="col-sm-9 padding-right">
					<div class="product-details"><!--product-details-->
						<div class="col-sm-5">
							<div class="view-product">
							<?php
								$itemcode = $_GET['itemcode'];
								$query = "select * from item where itemcode = '$itemcode'";
								$result = mysql_query($query);
								while ($row = mysql_fetch_assoc($result)):

			                        $categoryid = $row['categoryid'];
			                        $gquery = "select category from category where categoryid='$categoryid'";
			                        $gresult = mysql_query($gquery);
			                       $grow = mysql_fetch_assoc($gresult);
			                        if ($grow != null)
			                        {
			                        	$category = $grow['category'];
			                        }
			                        ?>
			                        <?php
										$source= "admin/adminpart/images/".$category."/".$row['imagepath'];
										 $dest = "images/".$category."/i".$row['imagepath'];
										 function stream_copy($src, $dest)
										 {
										 	$fsrc = fopen($src,'r+');
										 	$fdest = fopen($dest,'w+');
										 	$len = stream_copy_to_stream($fsrc,$fdest);
										 	fclose($fsrc);
										 	fclose($fdest);
										 	return $len;
										 }

										stream_copy($source, $dest);

										?>
								<?php echo "<img src=\"images/".$category."/i".$row['imagepath']."\" alt=\"Shoe Image\" />"; ?>

							</div>


						</div>
						<div class="col-sm-7">
							<div class="product-information"><!--/product-information-->


								<span class="product_info">Product Info:</span>
								<p>Item Code: <i><strong><?php echo $row['itemcode']?></strong></i></p>
								<p><b>Qty:</b> <?php echo $row['qty']?></p>
								  <?php
			                        $sizeid = $row['sizeid'];
			                        $squery = "select size from size where sizeid='$sizeid'";
			                        $sresult = mysql_query($squery);
			                       $srow = mysql_fetch_assoc($sresult);
			                        if ($srow != null)
			                        {
			                        ?>
								<p><b>Size:</b> <?php echo $srow['size']?></p><?php }?>
								<?php
			                        $colorid = $row['colorid'];
			                        $cquery = "select color from color where colorid='$colorid'";
			                        $cresult = mysql_query($cquery);
			                       $crow = mysql_fetch_assoc($cresult);
			                        if ($crow != null)
			                        {
			                        ?>
								<p><b>Color:</b> <?php echo $crow['color']?></p><?php }?>
								 <?php
			                        $madeinid = $row['madeinid'];
			                        $mquery = "select madein from madein where madeinid='$madeinid'";
			                        $mresult = mysql_query($mquery);
			                       $mrow = mysql_fetch_assoc($mresult);
			                        if ($mrow != null)
			                        {
			                        ?>
								<p><b>MadeIn:</b><?php echo $mrow['madein']?></p><?php }?>

								<p><b>Category:</b> <?php echo $category ?></p>

							<form action="orderCart.php" id="orderForm" onsubmit="return validateOrder()" method="get">

								<label class="deadlabel">Deliver Date</label>
								<input type="text" id="datepicker" onchange="return checkForm()" name="deliverdate" required="required" class="deadline" placeholder="(yyyy-mm-dd)">
								<br>
								<label class="datedesign">eg.2016-01-01</label>
								<br>
								<span>
									<span><?php echo $row['sprice']?></span>
									<input type="hidden" value="<?php echo  $row['itemcode']?>" name="itemcode">

									<input type="hidden" value="<?php echo $row['sprice'];?>" name="sprice">
									<label>Quantity:</label>
									<input type="number" min="1" max="<?php echo $row['qty']; ?>"  name="userqty" >

									<input type="hidden" value="<?php echo $row['qty'];?>" name="hqty">
									<input type="hidden" value="<?php echo $_SESSION['auth'];?>"  name="auth">
									<button type="submit" class="btn btn-fefault cart">
										<i class="fa fa-shopping-cart"></i>
										Add to cart
									</button>
								</span>

							</form>
								<?php endwhile;?>


							</div><!--/product-information-->
						</div>
						<?php echo "<a href=\"javascript:history.go(-1)\" class=\"linkback\">GO BACK</a>";?>

					</div><!--/product-details-->
				</div>
			</div>
		</div>
	</section>

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
	<script src="js/price-range.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="js/moment/moment.min.js"></script>
    <script src="js/datepicker/daterangepicker.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="js/custom.min.js"></script>
	<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  	<script src="https://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
	<script type="text/javascript">


  function checkForm()
  {
    // regular expression to match required date format
    var date = orderForm.deliverdate.value;
    re = /^\d{4}\-\d{2}\-\d{2}$/;
 // Create date from input value
    var inputDate = new Date(date);

    // Get today's date
    var todaysDate = new Date();

    // call setHours to take the time out of the comparison
    if(inputDate.setHours(0,0,0,0) <= todaysDate.setHours(0,0,0,0)) {
    	alert("Sorry Customer...Order Date Check... ");
    	orderForm.deliverdate.value = '';
    	return false;
    }

    if(orderForm.deliverdate.value != '' && !orderForm.deliverdate.value.match(re)) {
      alert("Invalid Date Format:(yyyy-mm-dd) " + orderForm.deliverdate.value);
      orderForm.deliverdate.focus();
      return false;
    }



  }



	function validateOrder()
	{	var userqty = document.forms["orderForm"]["userqty"].value;
		var hqty = parseInt(document.forms["orderForm"]["hqty"].value);
		var auth = new String(document.forms["orderForm"]["auth"].value);
		var sprice = new String(document.forms["orderForm"]["sprice"].value);
		var itemcode = new String(document.forms["orderForm"]["itemcode"].value);
		var deliverdate = new String(document.forms["orderForm"]["deliverdate"].value);
		if(userqty == null || userqty == ' ' || userqty == 0)
		{
			alert("Please Fill Qty to Order...");
			return false;
		}

		if(userqty > hqty)
		{	alert("Please Check Qty");
			return false;
		}

		if(auth == "user")
		{

			return true;
		}
		 // regular expression to match required date format
	    re = /^\d{4}\-\d{2}\-\d{2}$/;

	    if(orderForm.deliverdate.value != '' && !orderForm.deliverdate.value.match(re)) {
	      alert("Invalid Date Format:(yyyy-mm-dd) " + orderForm.deliverdate.value);
	      orderForm.deliverdate.focus();
	      return false;
	    }

		else{

			window.location.assign("http://localhost/AzureShoeGallery/userlogin.php?itemcode="+itemcode+"&userqty="+userqty+"&hqty="+hqty+"&sprice="+sprice+"&deliverdate="+deliverdate);
			return false;
			}





	}
	 $( function() {
		 $("#datepicker").datepicker({ dateFormat: 'yy-mm-dd' });
		  } );

	</script>
	<script>
    $( "selector" ).datepicker({
    	 altFormat: 'yy-mm-dd'
        altField : "#actualDate"

    });
      $(document).ready(function() {
        var data1 = [
          [gd(2012, 1, 1), 17],
          [gd(2012, 1, 2), 74],
          [gd(2012, 1, 3), 6],
          [gd(2012, 1, 4), 39],
          [gd(2012, 1, 5), 20],
          [gd(2012, 1, 6), 85],
          [gd(2012, 1, 7), 7]
        ];

        var data2 = [
          [gd(2012, 1, 1), 82],
          [gd(2012, 1, 2), 23],
          [gd(2012, 1, 3), 66],
          [gd(2012, 1, 4), 9],
          [gd(2012, 1, 5), 119],
          [gd(2012, 1, 6), 6],
          [gd(2012, 1, 7), 9]
        ];
        $("#canvas_dahs").length && $.plot($("#canvas_dahs"), [
          data1, data2
        ], {
          series: {
            lines: {
              show: false,
              fill: true
            },
            splines: {
              show: true,
              tension: 0.4,
              lineWidth: 1,
              fill: 0.4
            },
            points: {
              radius: 0,
              show: true
            },
            shadowSize: 2
          },
          grid: {
            verticalLines: true,
            hoverable: true,
            clickable: true,
            tickColor: "#d5d5d5",
            borderWidth: 1,
            color: '#fff'
          },
          colors: ["rgba(38, 185, 154, 0.38)", "rgba(3, 88, 106, 0.38)"],
          xaxis: {
            tickColor: "rgba(51, 51, 51, 0.06)",
            mode: "time",
            tickSize: [1, "day"],
            //tickLength: 10,
            axisLabel: "Date",
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial',
            axisLabelPadding: 10
          },
          yaxis: {
            ticks: 8,
            tickColor: "rgba(51, 51, 51, 0.06)",
          },
          tooltip: false
        });

        function gd(year, month, day) {
          return new Date(year, month - 1, day).getTime();
        }
      });
    </script>
    <!-- /Flot -->

</body>
</html>
