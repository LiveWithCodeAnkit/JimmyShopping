<html>
	<head>
		<title>Category.php</title>
		<style>
			.d2
			{
				margin-left:690;
				margin-top:-49px;
				
			}
			.d1{
					margin-left:355;
					
				
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
				<li class="active">Category</li>
			</ol>
		</div>
</div>

		<?php	
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("");
			if(isset($_POST['btnsub']))
			{
					$category_name=$_POST['txtcatname'];
					$st="false";					
					if(ctype_alpha($category_name) === false) 
					{
						echo '<script>alert("Digits and special charecter not allow")</script>'; 	
							
					}
					else
					{
						$du=mysqli_query($con,"select * from tlbcategory where cate_name like '$category_name' ");
							if(mysqli_num_rows($du)>0)
							{
								echo '<script>alert("dublicate value ")</script>'; 
							}
							else
							{
								$q=mysqli_query($con,"insert into tlbcategory values(null,'$category_name','$st')");
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
		<div class="cat">
			<form method="POST">
			<div class=d1>
				<table>
					<tr>
						<td style="padding: 10px;"><b>Category Name </b></td>
						<td style="padding: 10px;"><input type="text" name="txtcatname" required></td>
					
				
					
						<td  style=" padding:10px;"><input type="Submit" name="btnsub" ></td>
					</tr>
				</table>
			</div>
			</form>
		</div>
		<?php
			$q2=mysqli_query($con,"select * from tlbcategory");
			echo"<table class='table table-striped'>";
				echo"<tr>";
					//echo"<th>Category_id";
					echo"<th>Category_name";
					echo"<th>Category_Status";
					echo"<th colspan=2>Opreation";
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
		?>
					<tr>
						
						<!--<td><?php /*echo $row["cate_id"]*/?></td>-->
						<td><?php echo $row["cate_name"] ?></td>
						<td><?php
							if($row["cate_status"]==1)
							{
									echo"Active";
							}
							else
							{
								echo"inactive";
							}
						 ?>
						</td>
						<td><a href='category_edit.php?id=<?php echo $row["cate_id"];?>'>Edit</a></td>
						<td><a href='category_del.php?id=<?php echo $row["cate_id"];?>' onClick=' return confirmation()'>Delete</a></td>
					</tr>
				<?php } ?>
			</table>
			
			<script>
				function confirmation()
				{
					var x=confirm("Are You want Delete this Category ?");
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
					include('fff.php');
		?>
	</body>
</html>