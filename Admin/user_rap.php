<html>
	<head>
		<style>
			.info
			{
					margin-top:-310;
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
		<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">User Details</li>
			</ol>
		</div>
</div>

		<form method="POST">
		<?php
			$abid=$_GET['id'];
			$q2=mysqli_query($con,"select * from tbluser_master where user_id=$abid");
		
				$row=mysqli_fetch_array($q2);
				$x=$row['user_pic'];
		?>
				<div>
				<img src= ../user2/Profile/<?php echo $x;?> height=50% width=30% style="border-radius:10%;margin-left:600;margin-top:100px;"> 
				</div>
				<div class=info>
				
						<div>
							<label style="padding:10px;">User Name</label>
							<label><b><?php echo $row['user_name'];?></b></label>							
							
						</div>
						<div>
							<label style="padding:10px;">Gender</label>
							<label><b><?php echo $row['user_gen'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Email</label>
							<label><b><?php echo $row['user_email'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Phone Number</label>
							<label><b><?php echo $row['user_phone'];?></b></label>
						</div>
						<div>
							<label style="padding:10px;">Address</label>
							<label><b><?php echo $row['user_add'];?></b></label>
						</div>
						
						<div>
							<label style="padding:10px;">Registration Date</label>
							<label><b><?php echo $row['regis_date'];?></b></label>
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
					$q=mysqli_query($con,"update tbluser_master set user_status=1 where user_id=$abid");
					if($q)
					{
						echo '<script>alert("Approval Sucessfull")</script>'; 
						echo '<script>window.location.href="user_re_l.php";</script>';
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
					$q2=mysqli_query($con,"delete from tbluser_master where user_id=$abid");
					if($q2)
					{
						echo '<script>alert("De-Approval Sucessfull")</script>'; 
						echo '<script>window.location.href="user_re_l.php.php";</script>';
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