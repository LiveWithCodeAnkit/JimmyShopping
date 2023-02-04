<html>
	<head>
	<style>
		.test1
		{
			
			position:relative;
			left:520px;
			top:-400px;
			height:250px;
			width:220px;
			border:3px solid #27408B;
			border-radius:10px;
		}
	</style>
	</head>
	<body>
		<?php
					
					error_reporting(1);
					include('seller_hhh.php');
		?>
	
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			
			$abid=$_GET['id'];
			$q=mysqli_query($con,"select * from tblorder_details where order_detail_id=$abid");
			$row=mysqli_fetch_array($q);
			$q2=mysqli_query($con,"select * from tblorder_master where order_id=".$row['order_id']);
			$row2=mysqli_fetch_array($q2);
			$q3=mysqli_query($con,"select * from tblproduct_master where product_id=".$row['product_id']);
			$row3=mysqli_fetch_array($q3);
			$q4=mysqli_query($con,"select * from tblproduct_image where product_id=".$row['product_id']);
			$row4=mysqli_fetch_array($q4);
		?>
					
				                    
                
				<div style="height:60%;width:50%;position:relative;top:-50px;margin-left:250;background:#B9D3EE;margin-top:80;border:3px solid #27408B;border-radius:10px;font-family:arial;color:black;">
						
						<div>
							<label style="padding:10px;"> Order Id</label>
							<label><b><?php echo $row['order_id'];?></b></label>							
							
						</div>
						<div>
							<label style="padding:10px;">Order Date</label>
							<label><b><?php echo $row2['order_date'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Customer Name</label>
							<label><b><?php echo $row2['full_name'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Customer Email</label>
							<label><b><?php echo $row2['email_id'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Customer Phone</label>
							<label><b><?php echo $row2['phno'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Shipping Address</label>
							<label><b><?php echo $row2['shipping_add'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Product Name</label>
							<label><b><?php echo $row3['product_name'];?></b></label>
						</div>
						
						<div>
							<label style="padding:10px;">Quantity</label>
							<label><b><?php echo $row['product_quantity'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Total Amount</label>
							<label><b><?php echo $row['total_price'];?></b></label>
						</div>
						<div style="margin-left:90px;">
							<a class="btn btn-primary" href="seller_order_confirm.php?oid=<?php echo $row['order_detail_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i>Confirm</a>
							<a class="btn btn-primary" href="order_cancel.php?oid=<?php echo $row['order_detail_id'];?>	"><i class="fa fa-pen" aria-hidden="true" onclick='return checkdelete()'></i>Cancel</a>
							<a class="btn btn-primary" href="order_dispatch.php?oid=<?php echo $row['order_detail_id'];?>"><i class="fa fa-pen" aria-hidden="true" ></i> Dispatch</a>
						</div>
						<div>
						<img class="test1" src= "../user2/images/<?php echo $row4['productimg_url'];?>">		
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