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
				<li class="active">Seller Active List</li>
			</ol>
		</div>
</div>

		<?php
			$q2=mysqli_query($con,"select * from tblseller_master where seller_status=1");
			echo"<table class='table table-striped'>";
				echo"<tr>";
					echo"<th>Seller Name";
					echo"<th>Seller Company";
					echo"<th>View";
					
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<td><?php echo $row["first_name"]?></td>
						<td><?php echo $row["seller_company_name"] ?></td>
						
						<td><a href='seller_r_ap.php?id=<?php echo $row["seller_id"];?>'>View</a></td>
						
					</tr>
				<?php } ?>
			</table>
		
			
			
		
	</body>
	<?php
					
					
					include('fff.php');
		?>
</html>