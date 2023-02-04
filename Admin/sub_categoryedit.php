<html>
	<head>
		<title>Subcategory</title>
	</head>
	<body>
		<?php
					
					error_reporting(1);
					include('hhh.php');
		?>
		<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">SubCategory Edit</li>
			</ol>
		</div>
</div>

		<div style="margin-top:50;">
		<form method="POST">
			<?php
					$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
					$subcateid=$_GET['id'];
					
			
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			
			if(isset($_POST['btnup']))
			{
				//$cate_id=$_POST['a1'];
				$subcate_name=$_POST['txtsubcatename'];
				$subcate_des=$_POST['txtsubcatedes'];
				$status=$_POST['status'];
				if(ctype_alpha($subcate_name) === false) 
				{
						echo '<script>alert("Digits and special charecter not allowed")</script>'; 	
							
				}
				else
				{
					$q11=mysqli_query($con,"update tlbsubcategory set subcate_name='$subcate_name', subcate_des='$subcate_des', subcate_status=$status where subcate_id=$subcateid");
					if($q11)
					{
						echo '<script>window.location.href="sub_category.php";</script>';
						
							
					}
					else
					{
							echo '<script>alert("Record not updated")</script>';
							
					}
				}
			}
		?>
		<table align=center>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			
			$q1=mysqli_query($con,"select * from tlbcategory");
			$q2=mysqli_query($con,"select * from tlbsubcategory where subcate_id=$subcateid");
			$row2=mysqli_fetch_array($q2);
				//echo"<table align='center'>";
				echo'<tr><td style="padding:10;">Category Name</td>';
				echo '<td style="padding:10;"><select name="catid">';
				//echo"<option>Select Category</option>";
				while($row=mysqli_fetch_array($q1))
				{
					if($row['cate_id']==$row2['cate_id'])
					{
						echo "<option name='a1' value=$row[0] selected>".$row['cate_name']."</option>";	
					}
					else{
						echo "<option name='a1' value=$row[0]>".$row['cate_name']."</option>";	
					}
				}
				echo "</select>";
			echo"</td></tr>";
		?>
			<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$subcateid=$_GET['id'];
			$q1=mysqli_query($con,"select * from tlbsubcategory where subcate_id=$subcateid");
			if(mysqli_num_rows($q1)>0)
			{
				while($row=mysqli_fetch_assoc($q1))
				{
				
			
			
			?>
					<tr>
						<td style="padding:10;">Subcategory Name</td>
						<td style="padding:10;"><input type="text" name="txtsubcatename" value="<?php echo $row['subcate_name'];?>"></td>
					</tr>
					<tr>
						<td style="padding:10;">SubCategory Description</td>
						<td style="padding:10;"><textarea rows=5 col=40 name="txtsubcatedes" ><?php echo $row['subcate_des'];?></textarea></td>
					</tr>
					<tr>
					<td style='padding:10;'>Status</td>
					<td style='padding:10;'>
						<select name="status" style="width:167px; height:33px;">
						<?php if($row['subcate_status']== 1)
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
					</td>
					</tr>
					<tr align=center>
						<td colspan=2><input type="submit" name="btnup" value="Update"></td>
					</tr>
					
				</table>
		
		</form>
		
		
		
			<?php
					}
			    }
			
			?>
		</div>
		<?php
					
					
					include('fff.php');
		?>
	</body>
</html>