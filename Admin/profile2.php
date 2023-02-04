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
					include('hhh.php');
		?>
		<form method="POST">
		<?php
			$abid=$_GET['id'];
			$q2=mysqli_query($con,"select * from tbl_admin where admin_id=$abid");
		
				$row=mysqli_fetch_array($q2);
				//$x=$row['seller_pic'];
		?>
				<!--<div>
				<img src= ../Seller/images/<?php //echo $x;?> height=50% width=30% style="border-radius:10%;margin-left:600;margin-top:100px;"> 
				</div>-->
				<div class=info>
				
						<div>
							<label style="padding:10px;"> Name</label>
							<label><b><?php echo $row['admin_name'];?></b></label>							
							
						</div>
						<div>
							<label style="padding:10px;">Company Name</label>
							<label><b><?php echo $row['admin_name'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Type</label>
							<label><b><?php echo $row['admin_name'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Quantity</label>
							<label><b><?php echo $row['admin_name'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Price</label>
							<label><b><?php echo $row['admin_name'];?>₹</b></label>
						</div>
						<div>
							<label style="padding:10px;">Discount</label>
							<label><b><?php echo $row['admin_name']?>%</b></label>
						</div>
						<div>
							<label style="padding:10px;">GST Tax</label>
							<label><b><?php echo $row['admin_name']?>%</b></label>
						</div>
						
						
				</div>
				<div style="margin-left:330">
					<input type="submit" name="btnapp" value="Approve">
					<input type="submit" name="btnde" value="Dis-Approved">
				</div>
		
			<?php
				$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
				$abid=$_GET['id'];
				
				if(isset($_POST['btnapp']))
				{
					$q=mysqli_query($con,"update tblproduct_master set product_status=1 where product_id=$abid");
					if($q)
					{
						echo '<script>alert("Approval Sucessfull")</script>'; 
						echo '<script>window.location.href="product_ra.php";</script>';
					}
					else
					{
						echo '<script>alert("Approval Uncessfull")</script>'; 
					}
				}
				
			?>
			<?php
				$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
				$abid=$_GET['id'];
				if(isset($_POST['btnde']))
				{
					$q2=mysqli_query($con,"delete from tblproduct_master where product_id=$abid");
					if($q2)
					{
						echo '<script>alert("De-Approval Sucessfull")</script>'; 
						echo '<script>window.location.href="product_ra.php";</script>';
					}
					else
					{
						echo '<script>alert("De-Approval Uncessfull")</script>'; 
					}
				}
			?>
		<?php
					
					
					include('fff.php');
		?>
		</form>
		
	</body>
</html>