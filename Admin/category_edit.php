<html>
	<head>
	</head>
	<body>
		<?php
					
					error_reporting(0);
					include('hhh.php');
		?>
		<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Category Edit</li>
			</ol>
		</div>
</div>

		<form method="POST"align=center>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$cateid=$_GET['id'];
			if(isset($_POST['btnup']))
			{
				$categoryname=$_POST['txtcatename'];
				$status=$_POST['status'];
				if(ctype_alpha($categoryname) === false) 
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
						
								$q=mysqli_query($con,"update tlbcategory set cate_name='$categoryname' , cate_status='$status' where cate_id=$cateid");
								if($q)
								{
									echo '<script>window.location.href="category.php";</script>';
									//header('location:category_view.php');
									//header('location:http://localhost:7882/jimmyshoping/Admin/category_view.php');
										
								}
								else
								{
										echo '<script>alert("Record Not Updated")</script>'; 
								}
							}
				}
			}
		?>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$cateid=$_GET['id'];
			$q1=mysqli_query($con,"select * from tlbcategory where cate_id=$cateid");
			if(mysqli_num_rows($q1)>0)
			{
				while($row=mysqli_fetch_assoc($q1))
				{
				
			
			
		?>
		
			<div style="background:#A7C7E7;width:500px;height:300;border-radius: 10px;border: 3px solid #0F52BA;margin-left:300;margin-top:100;">
				<h1>Update Category</h1>
				<div style="margin-top:40;">
					<label><b style="font-size:19;">Category Name</b></label>
					<input type="Text" style="width:167px;color:black;font-size:18;"name="txtcatename" value="<?php echo $row['cate_name'];?>">
				</div>
				<div style="margin-top:15;">
					<label><b style="font-size:19;">Category Status</b></label>
					<select name="status" style="width:167px;height:33px;color:black;font-size:18;">
						<?php if($row['cate_status']== 0)
							{
									echo"<option value='1' selected>Enable</option>
									<option value='0'>Disable</option>";
							}
							else
							{
								echo"<option value='1'>Enable</option>
									<option value='0' selected>Disable</option>";
							}
						
						?>
					</select>
				</div>
				<div align=center style="padding:20px;">
					<input type="Submit" name="btnup" value="Update" style="width:167px; height:33px;">
				</div>
			</div>
			<?php
					}
			    }
			
			?>
		
		
		<?php
					include('fff.php');
		?>
		</form>
	</body>
</html>