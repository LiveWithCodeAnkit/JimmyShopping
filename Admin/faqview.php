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
			$q2=mysqli_query($con,"select * from tlbfaq");
			echo"<table class='table table-striped'>";
				echo"<tr>";
					/*echo"<th>city_id";*/
					echo"<th>Question";
					echo"<th>Answer";
					echo"<th colspan=2>Opreation";
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<!--<td><?php echo $row["city_id"]?></td>-->
						<td><?php echo $row["question"]?></td>
						<td><?php echo $row["answer"] ?></td>
						
						<td><a href='faq_edit.php?id=<?php echo $row["faq_id"];?>'>Edit</a></td>
						<td><a href='faq_del.php?id=<?php echo $row["faq_id"];?>' onClick=' return confirmation()'>Delete</a>
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
					
					
				//	include('fff.php');
		?>
	</body>
</html>