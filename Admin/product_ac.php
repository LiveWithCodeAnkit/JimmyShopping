<html>
	<head>
		<title>Seller view</title>
	</head>
	<body>
		<?php
					
					error_reporting(1);
					include('hhh.php');
					
		?>
		<?php
			$q2=mysqli_query($con,"select * from tblproduct_master where product_status=1");
			echo"<table class='table table-striped'>";
				echo"<tr>";
					echo"<th>Product Name";
					echo"<th>Company Name";
					echo"<th>View";
					
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<td><?php echo $row["product_name"]?></td>
						<td><?php echo $row["company_name"] ?></td>
						
						<td><a href='product_r_ap.php?id=<?php echo $row["product_id"];?>'>View</a></td>
						
					</tr>
				<?php } ?>
			</table>
		
			
			
		
	</body>
	<?php
					
					
					include('fff.php');
		?>
</html>