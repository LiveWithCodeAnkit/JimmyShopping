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
				<li class="active">Category view</li>
			</ol>
		</div>
</div>

		<?php
			$q2=mysqli_query($con,"select * from tlbcategory");
			echo"<table class='table table-striped'>";
				echo"<tr>";
					echo"<th>Category_id";
					echo"<th>Category_name";
					echo"<th>Category_Status";
					echo"<th colspan=2>Opreation";
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<td><?php echo $row["cate_id"]?></td>
						<td><?php echo $row["cate_name"] ?></td>
						<td><?php
							if($row["cate_status"]==0)
							{
									echo"Actived";
							}
							else
							{
								echo"Deactived";
							}
						 ?>
						</td>
						<td><a href='category_edit.php?id=<?php echo $row["cate_id"];?>'>Edit</a></td>
						<td><a href='category_del.php?id=<?php echo $row["cate_id"];?>'onclick='return checkdelete()'><input type='submit' value='Delete' id='deletebtn'></a>
					</tr>
				<?php } ?>
			</table>
		
			<script>
				function checkdelete()
				{
					return confirm('Are u sure want delete ?');
				}
			</script>
			
		<?php
					
					
					include('fff.php');
		?>
	</body>
</html>