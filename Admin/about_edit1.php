<html>
	<head>
	</head>
	<body>
		<?php
					
					error_reporting();
					include('hhh.php');
		?>
		<form method="POST" align=center>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$stateid=$_GET['id'];
			if(isset($_POST['btnup']))
			{
				$state_name=$_POST['txtstatenam'];
				
				$q=mysqli_query($con,"update aboutus set ab_des='$state_name'  where ab_id=$stateid");
				if($q)
				{
					echo '<script>window.location.href="about.php";</script>';
						
				}
				else
				{
						echo '<script>alert("Record Not Updated")</script>'; 
				}
			}
		?>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$stateid=$_GET['id'];
			$q1=mysqli_query($con,"select * from aboutus where ab_id=$stateid");
			if(mysqli_num_rows($q1)>0)
			{
				while($row=mysqli_fetch_assoc($q1))
				{
				
			
			
		?>
		
			
				<div style="padding:20px;">
					<label>id</label>
					<input type="text" name='txtstatenam' value="<?php echo $row['ab_id'];?>">
				</div>
				<div style="padding:20px;">
					<label>About_us</label>
					<input type="text" name='txtstatenam' value="<?php echo $row['ab_des'];?>">
				</div>
				
				<div align=center style="padding:20px;">
					<input type="Submit" name="btnup" value="Update" style="width:167px; height:33px;">
				</div>
			
			<?php
					}
			    }
			
			?>
		
		<?php
					
					
					include('fff.php');
		?>
		</form>
	</body>
</html>