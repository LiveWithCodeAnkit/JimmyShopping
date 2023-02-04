<html>
	<head>
		<style>
		
		
			.a1{
				
				margin-top:100;
				font-family: cursive;
		
			}
			.a1 lable
			{
				padding:25;
			}
			
			.a1 select{
				width:170px;
				height:33px;
			}
			.d2{
			
				padding:20;
			}
			.d2 lable{
					padding:20;
			}
			.d3 lable{
					padding:20;
			}
			
		</style>
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
				<li class="active">City</li>
			</ol>
		</div>
</div>

		<form align="center" method="POST" class="fo1" style="font-family: cursive;">
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$q1=mysqli_query($con,"select * from tlbstate");
				echo"<div align=center class=a1>";
				echo"<lable>State Name</lable>";
				echo "<select name='stateid'>";
				echo"<option>Select State</option>";
				while($row=mysqli_fetch_array($q1))
				{
					echo "<option value=$row[0]>".$row['state_name']."</option>";
					
				}
				echo "</select>";
			echo"</div>";
		?>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			if(isset($_POST['btnad']))
			{
					$state_id=$_POST['stateid'];
					$cityname=$_POST['txtcityname'];
					if(ctype_alpha($cityname) === false) 
					{
						echo '<script>alert("Digits and special charecter not allow")</script>'; 	
							
					}
					else
					{
						$q2=mysqli_query($con,"insert into tlbcity values(null,$state_id,'$cityname')");
						if($q2)
						{
							echo '<script>alert("Inserted")</script>'; 
						}
						else
						{
							echo '<script>alert("Not Inserted")</script>'; 
						}
					}
			}
		?>
		
			<div class=d2>
				<lable>City Name</lable>
				<input type="Text" name="txtcityname">
			</div>
			
			<div style="padding:20;">
				<input type="submit" name="btnad" value="ADD">
			</div>
		</form>
		<?php
	include('city_view.php');
?>

		<?php
			include('fff.php');
		?>
	</body>
</html>