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
			$q2=mysqli_query($con,"select * from tlbstate");
			echo"<table class='table table-striped'>";
				echo"<tr>";					
					echo"<th>State_name";
					echo"<th colspan=2>Opreation";
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						<td><?php echo $row["state_name"] ?></td>
						<td><a href='state_edit.php?id=<?php echo $row["state_id"];?>'>Edit</a></td>
						<td><a href='state_del.php?id=<?php echo $row["state_id"];?>' onClick=' return confirmation()'>Delete</a></td>
					</tr>
				<?php } ?>
			</table>
		

			<script>
				function confirmation()
				{
					var x=confirm("Are You want Delete this State Name ?");
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
					
					
					//include('fff.php');
		?>
	</body>
</html>