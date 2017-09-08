<?php

include('config/db.php');

$per_page = 10;

if($_GET)
{
$page=$_GET['page'];
}



//get table contents
$start = ($page-1)*$per_page;
// $sql = "select * from item order by itemcode limit $start,$per_page";
// $rsd = mysql_query($sql);

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

	                  <?php $queryDel = "Delete FROM item where qty <= 0 ";
                $resultDel = mysql_query($queryDel);

                    $query = "SELECT * FROM item order by createdDate desc limit $start,$per_page";
						    $result = mysql_query($query);
						    $ID = 0;
						    while($row = mysql_fetch_assoc($result)) :
				    	
						    	if(isset($row['categoryid']))
						    	{
						    		$categoryID = $row['categoryid'];
						    		$gquery = "SELECT category FROM category where categoryid = '$categoryID' ";
								    $gresult = mysql_query($gquery);
								    while($grow = mysql_fetch_assoc($gresult)) :
								    $categoryData = $grow['category'];
								    endwhile;
								}
								$ID ++;
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

			                        <a href="itemListUpdate.php?itemcode=<?php echo $row['itemcode']?>"> <button class="btn btn-success" type="button"><i class="fa fa-edit"></i>Edit</button></a>
			                        <a href="itemListDetail.php?itemcode=<?php echo $row['itemcode']?>"><button type="button" class="btn btn-info">Detail</button></a>
			                        <a href="itemListDelete.php?itemcode=<?php echo $row['itemcode']?>" onclick="return confirm('Are You Sure ? You Want to Delete This Item:<?php echo $row['itemcode'];?>')" title="Delete"><button class="btn btn-danger" type="button"><i class="fa fa-remove"></i>Delete</button></a>

		                      </div>
                          </td>
                        </tr>

                    <?php endwhile;?>
					 </tbody>
                    </table>