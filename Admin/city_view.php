<html>
	<head>
		<title>Category_view</title>
	</head>
	<body>
		<?php
					
					error_reporting();
					//include('hhh.php');
		?>
		<?php
			$q2=mysqli_query($con,"select * from tlbcity");
			echo"<table class='table table-striped'>";
				//echo"<table border=1>";
				echo"<tr>";
					/*echo"<th>city_id";
					echo"<th>State_id";*/
					echo"<th>City_name";
					echo"<th colspan=2 align=center>Opreation";
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<!--<td><?php echo $row["city_id"]?></td>
						<td><?php echo $row["state_id"]?></td>-->
						<td><?php echo $row["city_name"] ?></td>
						
						<td><a href='city_edit.php?id=<?php echo $row["city_id"];?>'>Edit</a></td>
						<td><a href='city_del.php?id=<?php echo $row["city_id"];?>' onClick=' return confirmation()'>Delete</a>
					</tr>
				<?php } ?>
			</table>
		

			<script>
				function confirmation()
				{
					var x=confirm("Are You want Delete this city Name ?");
					if(x==true)
					{
						return true;
					}
					else
					{
						return false;
					}
				}
			</script>
		<?php
					
					
				//	include('fff.php');
		?>
	</body>
</html>