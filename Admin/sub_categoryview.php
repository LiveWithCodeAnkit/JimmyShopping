<html>
	<head>
		<title>Category_view</title>
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
				<li class="active">Sub-Category View</li>
			</ol>
		</div>
</div>

		<?php
			$q2=mysqli_query($con,"select * from tlbsubcategory");
			echo"<table class='table table-striped'>";
				echo"<tr>";
					echo"<th>Sub-Category_id";
					echo"<th>Category_Id";
					echo"<th>SubCategory_Name";
					echo"<th>SubCategory_Description";
					echo"<th colspan=2>Opreation";
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<td><?php echo $row["subcate_id"]?></td>
						<td><?php echo $row["cate_id"] ?></td>
						<td><?php echo $row["subcate_name"]?></td>
						<td><?php echo $row["subcate_des"]?></td>
						<td><a href='sub_categoryedit.php?id=<?php echo $row["subcate_id"];?>'>Edit</a></td>
						<td><a href='sub_categorydel.php?id=<?php echo $row["subcate_id"];?>'>Delete</a>
					</tr>
				<?php } ?>
			</table>
		

			
		<?php
					
					
					include('fff.php');
		?>
	</body>
</html>