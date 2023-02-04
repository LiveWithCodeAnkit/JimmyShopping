<html>
	<head>
		<title>State</title>
		<style>
			.cat table
			{
					margin-top:10px;
			}
			.cat table tr td
			{
					padding:25px;
					font-family: cursive;
					
			}
			.cat table tr td input[type="text"]
			{
				width:200px;
				border-radius: 4px;
				box-sizing: border-box;
			}
			.cat table tr td input[type="Submit"]
			{
					
				height:50px;
				width:200px;
				border-raduis:15px;
				
			}
		</style>
	</head>
	<body>
		<?php	
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("");
			if(isset($_POST['btnsub']))
			{
					$state_name=$_POST['txtstname'];
					if(ctype_alpha($state_name) === false) 
					{
						echo '<script>alert("Digits and special charecter not allow")</script>'; 	
							
					}
					else
					{
						$du=mysqli_query($con,"select * from tlbstate where state_name like '$state_name' ");
							if(mysqli_num_rows($du)>0)
							{
								echo '<script>alert("dublicate value ")</script>'; 
							}
							else
							{
								$q=mysqli_query($con,"insert into tlbstate values(null,'$state_name')");
								if($q)
								{
									echo '<script>alert("Inserted")</script>'; 
			  
									
								}
								else
								{
										echo '<script>alert("Not insert")</script>'; 
			  
								}
							}
					}
			}
		?>
		<?php
			error_reporting();
			include('hhh.php');
		?>
		<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">State</li>
			</ol>
		</div>
</div>

		<div class="cat">
			<form method="POST">
				<table align="center">
					<tr>
						<td>State Name</td>
						<td><input type="text" name="txtstname" required></td>
					</tr>
					<tr align=center>
						<td colspan=2><input type="Submit" name="btnsub"></td>
					</tr>
				</table>
			</form>
			
		</div>
		<?php
					
					
					include('state_view.php');
		?>
		
		<?php
					
					
					include('fff.php');
		?>
	</body>
</html>