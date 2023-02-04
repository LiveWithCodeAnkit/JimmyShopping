<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Order</title>
</head>

<body>
<?php
include('seller_hhh.php');
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$sid=$_SESSION['id'];
?>
<div class="container">
<div class="grid_3 grid_5">
    <div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<ul id="myTab" class="nav nav-tabs  mb-3" role="tablist">
						<li role="presentation" class="nav-item"> <a href="#pending" class="nav-link active" id="pending-tab" role="tab" data-toggle="tab" aria-controls="pending" aria-expanded="true">Pending Orders</a></li>
						<li role="presentation" class="nav-item"><a href="#confirmed" class="nav-link" id="confirmed-tab" role="tab" data-toggle="tab" aria-controls="confirmed" >Confirmed</a></li>
                        <li role="presentation" class="nav-item"><a href="#dispatch" class="nav-link" id="dispatch-tab" role="tab" data-toggle="tab" aria-controls="dispatch" >Dispatched</a></li>
                        <li role="presentation" class="nav-item"><a href="#delivered" class="nav-link" id="delivered-tab" role="tab" data-toggle="tab" aria-controls="dispatch" >Delivered</a></li>
                        <li role="presentation" class="nav-item"><a href="#rejected" class="nav-link" id="rejected-tab" role="tab" data-toggle="tab" aria-controls="dispatch" >Rejected</a></li>
					</ul>
            <div id="myTabContent" class="tab-content">
                <div role="tabpanel" class="tab-pane fade show active" id="pending" aria-labelledby="pending-tab">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Action</th>
									
									
									
				
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                               
								$f=mysqli_query($conn,"select * from tblorder_details where is_delivered=0 and is_approved=0 and dispatch_date is NULL and product_id in (select product_id from tblproduct_master where seller_id=$sid) order by order_detail_id DESC");
                                $fres=mysqli_num_rows($f);
                                if($fres>0)
                                {
								    while($row=mysqli_fetch_array($f))
								    {
                                        $u=mysqli_query($conn,"select * from tblorder_master where order_id=".$row['order_id']);
                                        $urow=mysqli_fetch_array($u);
                                        $f3=mysqli_query($conn,"select * from tblproduct_master where product_id=".$row['product_id']);
                                        $row3=mysqli_fetch_array($f3);
                                                                            
                               ?>

                                <tr>
                                  
                                    <td><?php echo $row['order_detail_id']; ?></td>
                                    <td><?php echo $row3['product_name']; ?></td>
                                    <td><?php echo $row3['company_name']; ?></td>
                                    <td><?php echo $row['product_quantity']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" style="height:10;" href="order_view.php?id=<?php echo $row['order_detail_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> View</a>
										<a class="btn btn-primary" href="seller_order_confirm.php?id=<?php echo $row['order_detail_id'];?>&uid=<?php echo $urow['user_id']; ?>"><i class="fa fa-pen" aria-hidden="true"></i> Confirm</a>
										<a class="btn btn-primary" href="order_cancel.php?oid=<?php echo $row['order_detail_id'];?>&uid=<?php echo $urow['user_id']; ?>"><i class="fa fa-pen" aria-hidden="true" onclick='return checkdelete()'></i> Cancel</a>
                                        
									</td>
                                  
                                <?php
                                }    
                            }
                            else{
                                echo "<tr><td>No Pending Orders for you</td></tr>";
                            }
                            
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>
            

                <div role="tabpanel" class="tab-pane fade" id="confirmed" aria-labelledby="confirmed-tab">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Action</th>
									
									
									
				
                                </tr>
                            </thead>
                            <tbody>


                                <?php
								$f=mysqli_query($conn,"select * from tblorder_details where is_delivered=0 and dispatch_date is NULL and is_approved=1 and product_id in (select product_id from tblproduct_master where seller_id=$sid) order by order_detail_id DESC");
                                $fres=mysqli_num_rows($f);
                                if($fres>0)
                                {
								    while($row=mysqli_fetch_array($f))
								    {
                                        $u=mysqli_query($conn,"select * from tblorder_master where order_id=".$row['order_id']);
                                        $urow=mysqli_fetch_array($u);
                                        $f3=mysqli_query($conn,"select * from tblproduct_master where product_id=".$row['product_id']);
                                        $row3=mysqli_fetch_array($f3);
                                                                            
                               ?>

                                <tr>
                                  
                                    <td><?php echo $row['order_detail_id']; ?></td>
                                    <td><?php echo $row3['product_name']; ?></td>
                                    <td><?php echo $row3['company_name']; ?></td>
                                    <td><?php echo $row['product_quantity']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" style="height:10;" href="order_view.php?id=<?php echo $row['order_detail_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> View</a>
										<a class="btn btn-primary" href="order_cancel.php?oid=<?php echo $row['order_detail_id'];?>&uid=<?php echo $urow['user_id']; ?>"><i class="fa fa-pen" aria-hidden="true" onclick='return checkdelete()'></i> Cancel</a>
                                        <a class="btn btn-primary" href="order_dispatch.php?oid=<?php echo $row['order_detail_id'];?>&uid=<?php echo $urow['user_id']; ?>"><i class="fa fa-pen" aria-hidden="true"></i> Dispatch</a>
									</td>
                                  
                                <?php
                                }    
                            }
                            else{
                                echo "<tr><td>No Confirmed Order from you</td></tr>";
                            }
                            
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>

                <div role="tabpanel" class="tab-pane fade" id="dispatch" aria-labelledby="dispatch-tab">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Action</th>
									
									
									
				
                                </tr>
                            </thead>
                            <tbody>


                                <?php
								$f=mysqli_query($conn,"select * from tblorder_details where is_delivered=0 and dispatch_date is not NULL and is_approved=1 and product_id in (select product_id from tblproduct_master where seller_id=$sid) order by order_detail_id DESC");
                                $fres=mysqli_num_rows($f);
                                if($fres>0)
                                {
								    while($row=mysqli_fetch_array($f))
								    {
                                        $u=mysqli_query($conn,"select * from tblorder_master where order_id=".$row['order_id']);
                                        $urow=mysqli_fetch_array($u);
                                        $f3=mysqli_query($conn,"select * from tblproduct_master where product_id=".$row['product_id']);
                                        $row3=mysqli_fetch_array($f3);
                                                                            
                               ?>

                                <tr>
                                  
                                    <td><?php echo $row['order_detail_id']; ?></td>
                                    <td><?php echo $row3['product_name']; ?></td>
                                    <td><?php echo $row3['company_name']; ?></td>
                                    <td><?php echo $row['product_quantity']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" style="height:10;" href="order_view.php?id=<?php echo $row['order_detail_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> View</a>
									</td>
                                  
                                <?php
                                }    
                            }
                            else{
                                echo "<tr><td>No Dispatched Orders from you</td></tr>";
                            }
                            
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>


                <div role="tabpanel" class="tab-pane fade" id="delivered" aria-labelledby="delivered-tab">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Action</th>
									
									
									
				
                                </tr>
                            </thead>
                            <tbody>


                                <?php
								$f=mysqli_query($conn,"select * from tblorder_details where is_delivered=1 and dispatch_date is not NULL and is_approved=1 and product_id in (select product_id from tblproduct_master where seller_id=$sid) order by order_detail_id DESC");
                                $fres=mysqli_num_rows($f);
                                if($fres>0)
                                {
								    while($row=mysqli_fetch_array($f))
								    {
                                        $u=mysqli_query($conn,"select * from tblorder_master where order_id=".$row['order_id']);
                                        $urow=mysqli_fetch_array($u);
                                        $f3=mysqli_query($conn,"select * from tblproduct_master where product_id=".$row['product_id']);
                                        $row3=mysqli_fetch_array($f3);
                                                                            
                               ?>

                                <tr>
                                  
                                    <td><?php echo $row['order_detail_id']; ?></td>
                                    <td><?php echo $row3['product_name']; ?></td>
                                    <td><?php echo $row3['company_name']; ?></td>
                                    <td><?php echo $row['product_quantity']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" style="height:10;" href="order_view.php?id=<?php echo $row['order_detail_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> View</a>
									</td>
                                  
                                <?php
                                }    
                            }
                            else{
                                echo "<tr><td>No Delivered Orders from you.</td></tr>";
                            }
                            
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>


                <div role="tabpanel" class="tab-pane fade" id="rejected" aria-labelledby="rejected-tab">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Order ID</th>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Qty</th>
                                    <th scope="col">Action</th>
									
									
									
				
                                </tr>
                            </thead>
                            <tbody>


                                <?php
								$f=mysqli_query($conn,"select * from tblorder_details where is_delivered=0 and dispatch_date is not NULL and is_approved=0 and product_id in (select product_id from tblproduct_master where seller_id=$sid) order by order_detail_id DESC");
                                $fres=mysqli_num_rows($f);
                                if($fres>0)
                                {
								    while($row=mysqli_fetch_array($f))
								    {
                                        $u=mysqli_query($conn,"select * from tblorder_master where order_id=".$row['order_id']);
                                        $urow=mysqli_fetch_array($u);
                                        $f3=mysqli_query($conn,"select * from tblproduct_master where product_id=".$row['product_id']);
                                        $row3=mysqli_fetch_array($f3);
                                                                            
                               ?>

                                <tr>
                                  
                                    <td><?php echo $row['order_detail_id']; ?></td>
                                    <td><?php echo $row3['product_name']; ?></td>
                                    <td><?php echo $row3['company_name']; ?></td>
                                    <td><?php echo $row['product_quantity']; ?></td>
                                    <td>
                                        <a class="btn btn-primary" style="height:10;" href="order_view.php?id=<?php echo $row['order_detail_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> View</a>
									</td>
                                  
                                <?php
                                }    
                            }
                            else{
                                echo "<tr><td>No Rejected Orders from you.</td></tr>";
                            }
                            
                                ?>


                            </tbody>
                        </table>
                    </div>
                </div>



            </div>
    </div>
</div>
</div>
<script>
function checkdelete()
{
    return confirm('are you sure you want to cancel');
}
</script>     

<?php

include('seller_fff.php');

?>


</body>

</html>