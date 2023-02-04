<html>
	<head>
		<style>
			.info
			{
					
					margin-right:0;
					margin-left:100;
					padding:10px;
			}
		</style>
	</head>
		
	<body>
		<?php
					
					error_reporting(1);
					include('seller_hhh.php');
		?>
		<form method="POST">
		
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			
			$abid=$_GET['id'];
			$q2=mysqli_query($con,"select * from tblproduct_master where product_id=$abid");
		
				$row=mysqli_fetch_array($q2);
				
		?>
				<!--<div>
				<img src= ../Seller/images/<?php //echo $x;?> height=50% width=30% style="border-radius:10%;margin-left:600;margin-top:100px;"> 
				</div>-->
				<div class="info">
				
						<div>
							<label style="padding:10px;">Product Name</label>
							<label><b><?php echo $row['product_name'];?></b></label>							
							
						</div>
						
						<div>
							<label style="padding:10px;">Company Name</label>
							<label><b><?php echo $row['company_name'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Type</label>
							<label><b><?php echo $row['product_type'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Quantity</label>
							<label><b><?php echo $row['product_qty'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Price</label>
							<label><b><?php echo $row['product_price'];?>₹</b></label>
						</div>
						<div>
							<label style="padding:10px;">Discount</label>
							<label><b><?php echo $row['product_discount'];?>%</b></label>
						</div>
						<div>
							<label style="padding:10px;">Product Tax</label>
							<label><b><?php echo $row['gst_tax'];?>%</b></label>
						</div>
						
						
				</div>
				<div style="margin-left:330">
					<a href='seller_prod_master_del.php?id=<?php echo $row["product_id"];?>' onClick=' return confirmation()'>Delete</a>
					
					<a href='seller_prod_master_edit.php?id=<?php echo $row["product_id"];?>'>Edit</a></td>
				</div>
				<script>
				function confirmation()
				{
					var x=confirm("Are You want Delete this product ?");
					if(x==true)
					{
						return true;
					}
					else
					{
						return false;
					}
				}
			</script>
		
		<?php
					
					
					include('seller_fff.php');
		?>
		</form>
		
	</body>
</html>