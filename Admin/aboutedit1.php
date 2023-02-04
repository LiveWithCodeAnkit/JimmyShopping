<html>
	<head></head>
	<body>
	
		<?php 
		error_reporting(1);
		include("hhh.php");
		?>
		<form method="POST">
				<?php
					$con=mysqli_connect("localhost","root","","jimmyshoping");
					$abid=$_GET['id'];
					if(isset($_POST['btnsubmit']))
					{
						$about=$_POST['txtabout'];
						$q=mysqli_query($con,"update aboutus set ab_des='$about' where ab_id=$abid");
						
						if($q)
						{
							echo '<script>window.location.href="about.php";</script>';
							
						}
						else
						{
							echo '<script>alert("Record not updated..")</script>';
						}
								
						
						
					}
					?>
			<table align=center>
				<tr>
					<td><b>Id :-</b></td>
					<td><?php echo $row['ab_id'];?></td>
				</tr>
				<tr>
					<td><b>About Us :-</b></td>
					<td>
						<textarea type="text" name="txtabout" id="txtabout" ><?php echo $row['ab_des'];?></textarea>
					</td>
				</tr>
				<tr>
					<td><input type="submit"  name="btnsubmit" value="Update Data" ></input></td>
				</tr>
			</table>
		</form>
		
<?php 
include("fff.php");
?>
</body>
	
</html>