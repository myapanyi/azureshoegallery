<?php

			include('conDB.php');

			$per_page = 6;

			if($_GET)
			{
			$page=$_GET['page'];
			}



			//get table contents
			$start = ($page-1)*$per_page;


			?>
			<div class="features_items">
				<!--features_items-->
						<h2 class="title text-center">Products</h2>
						<?php
						$query = "select * from item where qty > 0 order by itemcode limit $start,$per_page";
						$result = mysql_query($query);


						while($row = mysql_fetch_assoc($result)) :

						?>
						<div class="col-sm-4">
							<div class="product-image-wrapper">

								<div class="single-products">
										<div class="productinfo text-center">
										<?php if(isset($row['categoryid']))
						    	{
						    		$categoryID = $row['categoryid'];
						    		$gquery = "SELECT category FROM category where categoryid = '$categoryID' ";
								    $gresult = mysql_query($gquery);
								    while($grow = mysql_fetch_assoc($gresult)) :
								    $categoryData = $grow['category'];
								    endwhile;
								} ?>

									<?php echo "<img class=\"custom_img_align\" src=\"admin/adminpart/images/".$categoryData."/".$row['imagepath']."\" />";?>
									<h3 class="code">Code:  <?php echo $row['itemcode']?></h3>
									<h2>Price:  <?php echo $row['sprice']?></h2>

									<a href="productDetail.php?itemcode=<?php echo $row['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-info"></i>Detail</a>
									<a href="productDetail.php?itemcode=<?php echo $row['itemcode']?>" class="btn btn-default add-to-cart"><i class="fa fa-shopping-cart"></i>Order</a>
								</div>
								<div >

								</div>
								<img src="images/home/sale.png" class="new" alt="">
								</div>

							</div>
						</div>
						<?php endwhile;?>


				</div>