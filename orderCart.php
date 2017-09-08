<?php
session_start();
if (isset($_SESSION['email'])) {
	$useremail = $_SESSION['email'];
}

?>

<!DOCTYPE html>
<?php include 'conDB.php';?>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>AzureShoeGallery|Order Cart</title>
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


								<li><a href="aboutUs.php">Contact Us</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--/header-middle-->

		<div class="header-bottom"><!--header-bottom-->
			<div class="container">
				<div class="row">
					<div class="col-sm-9">
						<div class="navbar-header">
							<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
						</div>

					</div>

				</div>
			</div>
		</div><!--/header-bottom-->
	</header><!--/header-->

	<section id="cart_items">
		<div class="container">
			
			<?php
			$count = 0;
			$have = 0;
			$showamount = 0;

			if ($_SESSION['auth'] != 'user' )
			{
				echo "<h1 class=\"orderCartDesign\">Welcome Customer!</h2>";
			}
			elseif (! isset($_GET['itemcode']) && $_SESSION['auth'] == 'user'   )
			{
				if (empty($_SESSION['itemsession'])) {
					echo "<h1 class=\"orderCartDesign\">Welcome Customer!</h2>";
				}
				else{

						if (!empty($_SESSION['itemsession']))
						{?>

							<form action="doOrderCart.php" method="post">

							<?php
							foreach ($_SESSION['itemsession'] as $key => $value)
							{
								if (isset($value['sitemcode']))
								{
									$itemcodecheck = $value['sitemcode'];
								}

								$query = "SELECT * from item where itemcode = '$itemcodecheck'";
								$result = mysql_query($query);
								$row = mysql_fetch_assoc($result);
								if ($row) {

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

											<div class="table-responsive cart_info">
												<table class="table table-condensed">
													<thead>
														<tr class="cart_menu">
															<td class="image"></td>
															<td class="description">ItemCode</td>
															<td class="price">Price</td>
															<td class="quantity">Quantity</td>
															<td class="total">Total</td>
															<td class="total">DeliverDate</td>
															<td></td>
														</tr>
													</thead>


													<tbody>
														<tr>
															<td class="cart_product">
																<?php echo "<img src=\"images/".$categoryData."/i".$row['imagepath']."\" alt=\"Shoe Image\" class=\"cartImg\" />"; ?>
															</td>
															<td class="cart_description">
																<h4><?php echo  $row['itemcode']?>
																<input type="hidden" name="orderitemcode" value="<?php echo $row['itemcode'];?>">
																</h4>

															</td>
															<td class="cart_price">
																<p><?php echo  $row['sprice'];
																$calprice = $row['sprice'];

																?>
																<input type="hidden" name="orderprice" value="<?php echo $calprice;?>">
																</p>
															</td>
															<td class="cart_quantity">
																<p><?php
																$seuserqty = $value['userqty'];
																$new =  $seuserqty;
																echo $new;
																$caluserqty =  $seuserqty;
																?><input type="hidden" name="orderqty" value="<?php echo $new;?>">
																</p>

															</td>
															<td class="cart_total">
																<p class="cart_total_price"><?php 
																$tamount = $calprice* $caluserqty;
																$showamount += $tamount;
																echo $calprice* $caluserqty?>
																<input type="hidden" name="ordertotalprice" value="<?php echo $calprice* $caluserqty;?>">

																</p>
															</td>
															<td><?php echo $value['deliverdate']; ?></td>
															<td class="cart_delete">
																<a class="cart_quantity_delete" href="doorderDelete.php?itemcode=<?php echo $key?>"><i class="fa fa-times"></i></a>
															</td>
														</tr>
													</tbody>
												</table>
											</div>

								<?php }//end of row

							}//end of foreach
										?>
										<h2 class="totalamount">Total Amount = <?php echo $showamount;?></h2>
										<button type="submit" class="btn btn-default get orderbtn">Order Submit</button>
														 	</form>
										<?php

						}
					}

			}
			elseif ( isset($_GET['itemcode']) && $_SESSION['auth'] == 'user')
			{
				$showamount2 = 0;
				$buyitemcount = 0;
				$itemcodeID = $_GET['itemcode'];
				$userqty = $_GET['userqty'];

				$hqty = $_GET['hqty'];
				$sprice = $_GET['sprice'];
				$deliverdate = $_GET['deliverdate'];

				?>
				<form action="doOrderCart.php" method="post" >
					<?php
					$out ;
					$itemhaved =0;
					$have;
					if(!empty($_SESSION['buyitem']))
					{

						$itemhave = array();

						foreach ($_SESSION['buyitem'] as $itemvalue){
							if ($itemvalue['itemcode'] == $itemcodeID && $itemvalue['ddeliverdate'] == $deliverdate)
							{
								array_push($itemhave, $itemvalue['itemcode']);
								$buyitemcount = $buyitemcount+1;
							}
						}
					}
					if (!empty($_SESSION['itemsession']))
					{
					foreach ($_SESSION['itemsession'] as $key => $value)
					{
						foreach ($itemhave as $havevalue)
						{
							$itemhaved = $havevalue;
							break;

						}
						$itemcode = $value['sitemcode'];
						$checkdate = $value['deliverdate'];

						if ($itemcode != $itemhaved )
						{
							//print_r($_SESSION['itemsession']);
							$query = "SELECT * from item where itemcode = '$itemcode'";
							$result = mysql_query($query);
							$row = mysql_fetch_assoc($result);
							if ($row) {
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

									<div class="table-responsive cart_info">
										<table class="table table-condensed">
											<thead>
												<tr class="cart_menu">
													<td class="image"></td>
													<td class="description">ItemCode</td>
													<td class="price">Price</td>
													<td class="quantity">Quantity</td>
													<td class="total">Total</td>
													<td class="total">DeliverDate</td>
													<td></td>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td class="cart_product">
														<?php echo "<img src=\"images/".$categoryData."/i".$row['imagepath']."\" alt=\"Shoe Image\" class=\"cartImg\" />"; ?>
													</td>
													<td class="cart_description">
														<h4><?php echo $row['itemcode']?>

														</h4>

													</td>
													<td class="cart_price">
														<p><?php
														$calprice = $row['sprice'];
														echo $calprice;
														?></p>
													</td>
													<td class="cart_quantity">
														<p><?php
														$seuserqty = $value['userqty'];

														$new =  $seuserqty;
														echo $seuserqty;

														$caluserqty =  $seuserqty;
														?></p>

													</td>
													<td class="cart_total">
														<p class="cart_total_price"><?php 
														$tamount2 = $calprice* $caluserqty;
														$showamount2 += $tamount2;
														echo $calprice* $caluserqty?></p>
													</td>
													<td><?php echo $value['deliverdate']; ?></td>
													<td class="cart_delete">
														<a class="cart_quantity_delete" href="doorderDelete.php?itemcode=<?php echo $key?>"><i class="fa fa-times"></i></a>
													</td>
												</tr>
											</tbody>

										</table>

									</div>
							<?php }//end of row
							$count = 0;


						}//end of if
					else{

							if ($itemcode == $itemhaved && $checkdate == $deliverdate)

							{
								$have = 1;

							$query = "SELECT * from item where itemcode = '$itemcode'";
							$result = mysql_query($query);
							$row = mysql_fetch_assoc($result);
							if ($row) {
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

									<div class="table-responsive cart_info">
										<table class="table table-condensed">
											<thead>
												<tr class="cart_menu">
												<td class="image"></td>
													<td class="description">ItemCode</td>
													<td class="price">Price</td>
													<td class="quantity">Quantity</td>
													<td class="total">Total</td>
													<td class="total">DeliverDate</td>
													<td></td>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td class="cart_product">
													<?php echo "<img src=\"images/".$categoryData."/i".$row['imagepath']."\" alt=\"Shoe Image\" class=\"cartImg\" />"; ?>
													</td>
													<td class="cart_description">
														<h4><?php echo $row['itemcode']?></h4>
													</td>
													<td class="cart_price">
														<p><?php echo 'Ks-' .$row['sprice'];
														$calprice = $row['sprice'];
														?></p>
													</td>
													<td class="cart_quantity">
														<p><?php
														$seuserqty = $value['userqty'];
														$calhqty = $row['qty'];
														if ($itemcodeID == $value['sitemcode']) {
															 $new =  $userqty + $seuserqty;
															 $totalqty = $calhqty-$userqty ;
															 $updateid = $row['itemcode'];
															 $buyitemcount = 1;
															 $queryUpdate = "Update item Set qty='$totalqty',updatedDate = NOW() where itemcode = '$updateid'";
															 mysql_query($queryUpdate);
}
														else
														{
															$new = $seuserqty;
														}

														$_SESSION['itemsession'][$key]['userqty'] = $new;
														echo $new;

														$caluserqty = $new ;
														?></p>

													</td>
													<td class="cart_total">
														<p class="cart_total_price"><?php 
														$tamount3 = $calprice* $caluserqty;
														$showamount2 += $tamount3;

														echo $calprice* $caluserqty?> </p>
													</td>
													<td><?php echo $value['deliverdate']; ?></td>
													<td class="cart_delete">
														<a class="cart_quantity_delete" href="doorderDelete.php?itemcode=<?php echo $key?>"><i class="fa fa-times"></i></a>
													</td>
												</tr>

											</tbody>
										</table>
									</div>
							<?php }

						}
						else
							{
								$have = 1;

							$query = "SELECT * from item where itemcode = '$itemcode'";
							$result = mysql_query($query);
							$row = mysql_fetch_assoc($result);
							if ($row) {
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

									<div class="table-responsive cart_info">
										<table class="table table-condensed">
											<thead>
												<tr class="cart_menu">
												<td class="image"></td>
													<td class="description">ItemCode</td>
													<td class="price">Price</td>
													<td class="quantity">Quantity</td>
													<td class="total">Total</td>
													<td class="total">DeliverDate</td>
													<td></td>
												</tr>
											</thead>

											<tbody>
												<tr>
													<td class="cart_product">
													<?php echo "<img src=\"images/".$categoryData."/i".$row['imagepath']."\" alt=\"Shoe Image\" class=\"cartImg\" />"; ?>
													</td>
													<td class="cart_description">
														<h4><?php echo $row['itemcode']?></h4>
													</td>
													<td class="cart_price">
														<p><?php echo 'Ks-' .$row['sprice'];
														$calprice = $row['sprice'];
														?></p>
													</td>
													<td class="cart_quantity">
														<p><?php
														$seuserqty = $value['userqty'];
														$calhqty = $row['qty'];

															$new = $seuserqty;



														echo $new;

														$caluserqty = $userqty ;
														?></p>

													</td>
													<td class="cart_total">
														<p class="cart_total_price"><?php
														$tamount4 = $calprice* $caluserqty;
														$showamount2 += $tamount4;
														 echo $calprice* $caluserqty?> </p>
													</td>
													<td><?php echo $value['deliverdate']; ?></td>
													<td class="cart_delete">
														<a class="cart_quantity_delete" href="doorderDelete.php?itemcode=<?php echo $key?>"><i class="fa fa-times"></i></a>
													</td>
												</tr>

											</tbody>
										</table>
									</div>
							<?php }

						}

						}//end of else


					}//end of foreach
				}//isset

			if ($buyitemcount == 0)
			{
				$_SESSION['count'] = $_SESSION['count']+1;
				$countid = $_SESSION['count'] ;



					$_SESSION['itemsession'][$countid] = array('sitemcode'=> $itemcodeID, 'userqty' => $userqty, 'price' => $sprice , 'hqty' => $hqty,'customID' => $useremail,'deliverdate'=>$deliverdate);
						$_SESSION['buyitem'][$itemcodeID] =array('itemcode'=> $itemcodeID,'ddeliverdate'=>$deliverdate);


						if(isset($_SESSION['itemsession'][$countid]['sitemcode']))
						{

								$query = "SELECT * from item where itemcode = '$itemcodeID'";
								$result = mysql_query($query);
								$row = mysql_fetch_assoc($result);
								if ($row) {

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

										<div class="table-responsive cart_info">
											<table class="table table-condensed">
												<thead>
													<tr class="cart_menu">
														<td class="image"></td>
														<td class="description">ItemCode</td>
														<td class="price">Price</td>
														<td class="quantity">Quantity</td>
														<td class="total">Total</td>
														<td class="total">DeliverDate</td>
														<td></td>
													</tr>
												</thead>


												<tbody>
													<tr>
														<td class="cart_product">
															<?php echo "<img src=\"images/".$categoryData."/i".$row['imagepath']."\" alt=\"Shoe Image\" class=\"cartImg\" />"; ?>
														</td>
														<td class="cart_description">
															<h4><?php echo    $row['itemcode']?></h4>

														</td>
														<td class="cart_price">
															<p><?php echo 'Ks-' .$row['sprice'];
															$calprice = $row['sprice'];
															?></p>
														</td>
														<td class="cart_quantity">
															<p><?php
															$seuserqty = $_SESSION['itemsession'][$countid]['userqty'];
															$new =  $userqty;

															echo $new;

															$caluserqty =  $new;
															?></p>
															<?php
																$sehqty = $hqty;
																$totalqty = $sehqty - $caluserqty;
																$itemnew = $_SESSION['itemsession'][$countid]['sitemcode'];
																$updateid = $row['itemcode'];
																$queryUpdate = "Update item Set qty='$totalqty',updatedDate = NOW() where itemcode = '$updateid'";
																mysql_query($queryUpdate);
															?>
														</td>
														<td class="cart_total">
															<p class="cart_total_price"><?php 
															$tamount5 = $calprice* $caluserqty;
															$showamount2 += $tamount5;
															echo $calprice* $caluserqty?> </p>
														</td>
														<td><?php echo $_SESSION['itemsession'][$countid]['deliverdate']; ?></td>
														<td class="cart_delete">
															<a class="cart_quantity_delete" href="doorderDelete.php?itemcode=<?php echo $countid;?>"><i class="fa fa-times"></i></a>
														</td>
													</tr>

												</tbody>

											</table>
										</div>
								<?php
								}//end of row


							?>

							<?php

						}


			}//end of if count=0
			?>
			<h2 class="totalamount">Total Amount = <?php echo $showamount2;?></h2>
		<button type="submit" class="btn btn-default get orderbtn">Order Submit</button>
		</form>
											 	<?php
		}//end of else if
		else{print_r($_SESSION['itemsession']); }
		?>
	</div>
</section> <!--/#cart_items-->



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
    <script src="js/jquery.prettyPhoto.js"></script>
    <script src="js/main.js"></script>
    <script type="text/javascript">
    var ctrlKeyDown = false;

    $(document).ready(function(){
        $(document).on("keydown", keydown);
        $(document).on("keyup", keyup);
    });

    function keydown(e) {

        if ((e.which || e.keyCode) == 116 || ((e.which || e.keyCode) == 82 && ctrlKeyDown)) {
            // Pressing F5 or Ctrl+R
            e.preventDefault();
        } else if ((e.which || e.keyCode) == 17) {
            // Pressing  only Ctrl
            ctrlKeyDown = true;
        }
    };

    function keyup(e){
        // Key up Ctrl
        if ((e.which || e.keyCode) == 17)
            ctrlKeyDown = false;
    };
    window.history.pushState(â€œobject or stringâ€�, â€œTitleâ€�, â€œorderCar.phpâ€�);
    </script>
</body>
</html>
