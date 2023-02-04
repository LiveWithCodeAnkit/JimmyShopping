<html>
	<head>
		<style>
			.info
			{
					
					margin-right:0;
					margin-left:100;
					padding:10px;
			}
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
					include('hhh.php');
					
		?>
		<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Product view</li>
			</ol>
		</div>
</div>

		<form method="POST">
		
		<?php
			$abid=$_GET['id'];
			$q2=mysqli_query($con,"select * from tblproduct_master where product_id=$abid");
				$q3=mysqli_query($con,"select * from tblproduct_image where product_id=$abid");
				$q4=mysqli_query($con,"select * from tblproduct_details where product_id=$abid");
				$row=mysqli_fetch_array($q2);
				$row3=mysqli_fetch_array($q3);
				$row4=mysqli_fetch_array($q4);
				
		?>
				<div style="height:60%;width:40%;position:relative;top:-50px;margin-left:250;background:#B9D3EE;margin-top:80;border:3px solid #27408B;border-radius:10px;font-family:arial;color:black;">
						<div>
							<label style="padding:10px;">Product Name</label>
							<label><b><?php echo $row['product_name'];?></b></label>							
							
						</div>
						
						<div>
							<label style="padding:10px;">Company Name</label>
							<label><b><?php echo $row['company_name'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Product Description</label>
							<label><b><?php echo $row4['product_description'];?></b></label>
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
						<img class="test1" src= "../user2/images/<?php echo $row3['productimg_url'];?>">
						<div style="position:absolute;margin-left:80px;margin-top:-200">
							<input type="submit" name="btnapp" value="Approve" class="btn btn-info btn-round">
							<input type="submit" name="btnde" value="Disapprove" class="btn btn-info btn-round">
						</div>
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
					$q2=mysqli_query($con,"update tblproduct_master set product_status=0 where product_id=$abid");
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