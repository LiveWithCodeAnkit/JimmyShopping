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
				height:39px;
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
			.s1{
				margin-left:100;
				width:207px;
				
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
				<li class="active">Sub-Category</li>
			</ol>
		</div>
</div>

		<form align="center" method="POST" class="fo1" style="font-family: cursive;">
		<table align='center'>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$q1=mysqli_query($con,"select * from tlbcategory where cate_status=1");
				//echo"<table align='center'>";
				echo'<tr><td style="padding:10;">Category Name</td>';
				echo "<td style='padding:10;'><select name='catid'>";
				echo"<option selected diasbled>--Select Category--</option>";
				while($row=mysqli_fetch_array($q1))
				{
					echo "<option value=$row[0]>".$row['cate_name']."</option>";
					
				}
				echo "</select></td>";
			echo"</tr>";
		?>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			if(isset($_POST['btnad']))
			{
					$cate_id=$_POST['catid'];
					$sub_catename=$_POST['txtsubcaten'];
					$sub_catedes=$_POST['txtsubcatdes'];
					if(ctype_alpha($sub_catename) === false) 
					{
						echo '<script>alert("Digits and special charecter not allow")</script>'; 	
							
					}
					else
					{
							$du=mysqli_query($con,"select * from tlbsubcategory where subcate_name like '$sub_catename' ");
							if(mysqli_num_rows($du)>0)
							{
								echo '<script>alert("dublicate value ")</script>'; 
							}
							else
							{
								$q2=mysqli_query($con,"insert into tlbsubcategory values(null,$cate_id,'$sub_catename','$sub_catedes',1)");
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
			}
		?>
			<div>
					
					<tr>
						<td style="padding:10;">Sub Category Name</td>
						<td style="padding:10;"><input type="Text" name="txtsubcaten" required></td>
					</tr>
					<tr>
						<td style="padding:10;">Sub Category Description</td>
						<td style="padding:10;"><textarea rows=5 col=40 name="txtsubcatdes" required></textarea></td>
					</tr>
					<tr align=center >
						<td colspan=2 style="padding:10;"><input type="submit" name="btnad" value="ADD" style="width:200;"></td>
					</tr>
				</table>
			</div>
			
		</form>
		<!--view-->
		<?php
			$q2=mysqli_query($con,"select * from tlbsubcategory");
			$c=1;
			echo"<table class='table table-striped'>";
				echo"<tr>";
					echo"<th>No.";
					//echo"<th>Category_Id";
					echo"<th>SubCategory_Name";
					echo"<th>Category_Name";
					echo"<th colspan=2>Opreation";
				echo"</tr>";
				while($row=mysqli_fetch_array($q2))
				{
					$q3=mysqli_query($con,"select * from tlbcategory where cate_id=".$row['cate_id']);
					$row2=mysqli_fetch_array($q3)
		?>
					<tr>
						
						<td><?php echo $c; $c++;?></td>
						<!--<td><?php echo $row["cate_id"] ?></td>-->
						<td><?php echo $row["subcate_name"]?></td>
						<td><?php echo $row2["cate_name"]?></td>
						<td><a href='sub_categoryedit.php?id=<?php echo $row["subcate_id"];?>'>Edit</a></td>
						<td><a href='sub_categorydel.php?id=<?php echo $row["subcate_id"];?>' onclick="return confirmation()">Delete</a>
					</tr>
				<?php } ?>
			</table>
			<script>
				function confirmation()
				{
					var x=confirm("Do You Really Want To Delete This Sub-Category?");
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