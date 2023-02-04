<html>
	<head>
	<style>
		.test1
		{
			
			position:relative;
			left:355px;
			top:-300px;
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
			$q2=mysqli_query($con,"select * from tblproduct_master where product_id=$abid");
			$q3=mysqli_query($con,"select * from tblproduct_image where product_id=$abid");
			//$q2=mysqli_query($con,"select pd.*,pdi.* from tblproduct_master pd inner join tblproduct_image pdi on pd.product_id=pdi.product_id where product_id=$abid");
			//$q2=mysqli_query($con,"select pdm.*,pdi.*,sel.* from tblproduct_master pdm inner join tblproduct_image pdi on pdi.product_id=pdm.product_id inner join tblseller_master sel on sel.seller_id=pdm.seller_id where product_id=$abid");
				$row=mysqli_fetch_array($q2);
				$row2=mysqli_fetch_array($q3);
				
		?>
					
				                    
                
				<div style="height:55%;width:40%;position:relative;top:-50px;margin-left:250;background:#B9D3EE;margin-top:80;border:3px solid #27408B;border-radius:10px;font-family:arial;color:black;">
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
							<label><b><?php echo $row['gst'];?>%</b></label>
						</div>
						<div style="margin-left:90px;">
							<a class="btn btn-primary" href='seller_prod_master_del.php?id=<?php echo $row["product_id"];?>' onClick=' return confirmation()'>Delete</a>
							<a class="btn btn-primary" href="seller_prod_master_edit.php?id=<?php echo $row['product_id'];?>	">Edit</a>
						</div>
								
						<img class="test1" src= "../user2/images/<?php echo $row2['productimg_url'];?>">
						
				</div>
				
				
				
				
		
		<?php
					
					
					include('seller_fff.php');
		?>
	</body>
</html>