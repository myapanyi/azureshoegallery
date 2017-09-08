<?php

include('config/db.php');
session_start();
$per_page = 10;

if($_GET)
{
$page=$_GET['page'];
$search=$_GET['search'];
}



//get table contents
$start = ($page-1)*$per_page;

// $sql = "select * from item order by itemcode limit $start,$per_page";
// $rsd = mysql_query($sql);

?>


	                  <?php


	                  $result = mysql_query("SELECT * FROM item WHERE sprice like '%$search%' ORDER BY itemcode limit $start,$per_page")OR DIE('query is not available!');
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
						else {
?>
				<table class="table table-bordered">
                     <thead>
                        <tr>
                          <th>No.</th>
                          <th>ItemCode</th>
                          <th>Image</th>
                          <th>Purchase<br>Price</th>
                          <th>Sale<br>Price</th>
                          <th>Qty</th>
                          <th>Created Date</th>
                          <th>Updated Date</th>
                          <th>Processing</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php

						    $ID = 0;
						    while($row = mysql_fetch_assoc($result)) :


								$ID ++;
						    if(isset($row['categoryid']))
						    {
						    	$categoryID = $row['categoryid'];
						    	$gquery = "SELECT category FROM category where categoryid = '$categoryID' ";
						    	$gresult = mysql_query($gquery);
						    	while($grow = mysql_fetch_assoc($gresult)) :
						    	$categoryData = $grow['category'];
						    	endwhile;
						    }
								?>

                    	<tr>
                          <th scope="row"><?php echo $ID;?></th>
                          <td><?php echo $row['itemcode'];?></td>
                          <td>

                          	<?php
                              echo "<div class=\"picture\">";
                              echo "<p>";

                              // Note that we are building our src string using the filename from the database
                              echo "<img src=\" images/" .$categoryData . "/". $row['imagepath']."\" alt=\"\" style=\"width:100px;height:100px\"  /><br />";
                              echo "</p>";
                              echo "</div>";
                              ?>

                          </td>
                          <td><?php echo $row['pprice'];?></td>
                          <td><?php echo $row['sprice'];?></td>

                          <td><?php echo $row['qty'];?></td>
                          <td><?php echo $row['createdDate'];?></td>
						<td><?php echo $row['updatedDate'];?></td>
                          <td>
                          		<div class="btn-group">
			                        <a href="itemListUpdate.php?itemcode=<?php echo $row['itemcode']?>"> <button class="btn btn-success"  type="button"><i class="fa fa-edit"></i>Edit</button></a>
			                        <a href="itemListDetail.php?itemcode=<?php echo $row['itemcode']?>"><button type="button" class="btn btn-info">Detail</button></a>
			                        <a href="itemListDelete.php?itemcode=<?php echo $row['itemcode']?>" onclick="return confirm('Are You Sure ? You Want to Delete This Item:<?php echo $row['itemcode'];?>')" title="Delete"><button class="btn btn-danger" type="button"><i class="fa fa-remove"></i>Delete</button></a>

		                      </div>
                          </td>
						</tr>
                    <?php endwhile;?>
                    <?php
                    }?>

					 </tbody>
                    </table>
