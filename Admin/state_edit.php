<html>
	<head>
	</head>
	<body>
		<?php
					
					error_reporting();
					include('hhh.php');
		?>
		<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">State Edit</li>
			</ol>
		</div>
</div>

		<form method="POST" align=center>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$stateid=$_GET['id'];
			if(isset($_POST['btnup']))
			{
				$state_name=$_POST['txtstatenam'];
				if(ctype_alpha($state_name) === false) 
				{
						echo '<script>alert("Digits and special charecter not allow")</script>'; 	
							
				}
				else
				{
					$q=mysqli_query($con,"update tlbstate set state_name='$state_name'  where state_id=$stateid");
					if($q)
					{
						echo '<script>window.location.href="state.php";</script>';
							
					}
					else
					{
							echo '<script>alert("Record Not Updated")</script>'; 
					}
				}
			}
		?>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$stateid=$_GET['id'];
			$q1=mysqli_query($con,"select * from tlbstate where state_id=$stateid");
			if(mysqli_num_rows($q1)>0)
			{
				while($row=mysqli_fetch_assoc($q1))
				{
				
			
			
		?>
		
			
				<div style="padding:20px;">
					<label>State Name</label>
					<input type="text" name='txtstatenam' value="<?php echo $row['state_name'];?>">
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