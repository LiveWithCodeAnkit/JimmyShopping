<html>
	<head>
		<title>Seller view</title>
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
				<li class="active">User List</li>
			</ol>
		</div>
</div>

		<?php
			$q2=mysqli_query($con,"select * from tbluser_master where user_status=1");
			echo"<table class='table table-striped'>";
				echo"<tr>";
					echo"<th>User Name";
					echo"<th>User Email";
					echo"<th>View";
					
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<td><?php echo $row["user_name"]?></td>
						<td><?php echo $row["user_email"] ?></td>
						
						<td><a href='user_rap.php?id=<?php echo $row["user_id"];?>'>View</a></td>
						
					</tr>
				<?php } ?>
			</table>
		
			
			
		
	</body>
	<?php
					
					
					include('fff.php');
		?>
</html>