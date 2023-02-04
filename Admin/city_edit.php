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
				<li class="active">City Edit</li>
			</ol>
		</div>
</div>

		<form method="POST" align=center>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$cityid=$_GET['id'];
			if(isset($_POST['btnup']))
			{
				$city_name=$_POST['txtcatename'];
				if(ctype_alpha($city_name) === false) 
				{
						echo '<script>alert("Digits and special charecter not allow")</script>'; 	
							
				}
				else
				{
				
						$q=mysqli_query($con,"update tlbcity set city_name='$city_name'  where city_id=$cityid");
						if($q)
						{
							echo '<script>window.location.href="city1.php";</script>';
							//header('location:category_view.php');
							//header('location:http://localhost:7882/jimmyshoping/Admin/category_view.php');
								
						}
						else
						{
								echo '<script>alert("Record Not Updated")</script>'; 
						}
				}
			}
		?>
		<table align=center>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$stateid=$_GET['id'];
			$q1=mysqli_query($con,"select * from tlbcity where city_id=$cityid");
			
			if(mysqli_num_rows($q1)>0)
			{
				while($row=mysqli_fetch_assoc($q1))
				{
					$q2=mysqli_query($con,"select * from tlbstate");
					//echo '<div style="padding:50px;">';
					echo "<tr>";
					echo "<td style='padding:20px;'><lable>State Name</lable></td>";
					echo "<td style='padding:20px;'><select>";
				//echo"<option>Select Category</option>";
					while($row2=mysqli_fetch_array($q2))
					{
						if($row['state_id']==$row2['state_id'])
						{
							echo "<option name='a1' value=$row2[0] selected>".$row2['state_name']."</option>";	
						}
						else{
							echo "<option name='a1' value=$row2[0]>".$row2['state_name']."</option>";	
						}
					}
				echo "</select></td>";
				//echo "</div>";
			
		?>
		
			
				<!--<div style="padding:20px;">-->
				<tr>
					<td style="padding:20px;"><label>City Name</label></td>
					<td style="padding:20px;"><input type="Text" name="txtcatename" value="<?php echo $row['city_name'];?>"></td>
				</td>
				
				
			
			<?php
					}
			    }
			
			?>
		</table>
		<div align=center style="padding:20px;">
					<input type="Submit" name="btnup" value="Update" style="width:167px; height:33px;">
				</div>
		<?php
					
					
					include('fff.php');
		?>
		</form>
	</body>
</html>