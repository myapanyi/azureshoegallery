<?php

include('config/db.php');
session_start();
$per_page = 10;

if($_GET)
{
$page=$_GET['page'];
$month=$_GET['month'];
}



//get table contents
$start = ($page-1)*$per_page;
$_SESSION['precustom']= '';
// $sql = "select * from item order by itemcode limit $start,$per_page";
// $rsd = mysql_query($sql);

?>


	                  <?php
					  date_default_timezone_set(UTC);
	                  $currentyear = date("Y");
	                  $result = mysql_query( "SELECT orderitemcode,customID,ordercategory,orderprice,totalprice,orderqty,orderimagepath,orderdate,orderdeadline
									FROM azsc.order WHERE orderdeadline like '$currentyear-$month-%' ORDER BY ID limit $start,$per_page")OR DIE('query is not available!');
						$count = mysql_num_rows($result);

						if(empty($count))
						{
							$nodata = "No Match Result";
							?>
							<h1 class="nomatch">
							<?php

							echo $nodata;
							?>
							</h1>
							<?php
						}
						else {?>
							<table class="table table-bordered">
							<thead>
							<tr>
							<th>No.</th>
							<th>UserInfo:</th>
							<th>Item Code:</th>
							<th>Image</th>
							<th>Qty:</th>
							<th>Price</th>
							<th>Total Price</th>
							<th>Deliver Date</th>
							<th>Order Date</th>

							</tr>
							</thead>
							<tbody>
						<?php
						    $ID = 0;
						    while($row = mysql_fetch_assoc($result)) :


								$ID ++;
								?>

                    	<tr>
                          <th scope="row"><?php echo $ID;?></th>
                          <td>
                          <?php

                          $customemail =  $row['customID'];
                          if ($_SESSION['precustom'] == $customemail) {

                          }
                          else{
                          $querycus = "SELECT * FROM user where email = '$customemail' ";
						    $resultcus = mysql_query($querycus);
						    $rowcus = mysql_fetch_assoc($resultcus);

						    if ($rowcus) {
							echo "Name:".$rowcus['customname'];

							echo "<br>Email:" ;
							echo $rowcus['email'];
							echo "<br>Address:" ;
							echo $rowcus['address'];
							echo "<br>Phone:" ;
							echo $rowcus['phno'];

							$_SESSION['precustom'] = $rowcus['email'];

						    }
						    }
                          ?></td>
                          <td><?php echo $row['orderitemcode'];?></td>
                          <td>

                          	<?php
                              echo "<div class=\"picture\">";
                              echo "<p>";
                              $categoryData = $row['ordercategory'];
                              // Note that we are building our src string using the filename from the database
                              echo "<img src=\" images/" .$categoryData . "/". $row['orderimagepath']."\" alt=\"\" style=\"width:100px;height:100px\"  /><br />";
                              echo "</p>";
                              echo "</div>";
                              ?>

                          </td>
                          <td><?php echo $row['orderqty'];?></td>
                          <td><?php echo $row['orderprice'];?></td>

                          <td><?php echo $row['totalprice'];?></td>
                          <td><?php echo $row['orderdeadline'];?></td>
                          <td><?php
                         echo $row['orderdate']?></td>



                        </tr>

                    <?php endwhile;?>
                    <?php unset($_SESSION['precustom']);
                    }?>
					 </tbody>
                    </table>
