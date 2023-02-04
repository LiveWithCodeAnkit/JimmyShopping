


<head>

</head>
<?php
include("hhh.php");
?>



<body>
<?php
$con=mysqli_connect("localhost","root","","jimmyshoping");
$abid=$_GET['id'];
$q=mysqli_query($con,"select * from aboutus where ab_id=$abid");
$row=mysqli_fetch_array($q);
if(isset($_POST['btnsubmit']))
{
	$about=$_POST['txtabout'];
	$q=mysqli_query($con,"update aboutus set aboutus='$about' where ab_id=$id");
	
	if($q)
	{
		echo '<script>window.location.href="about.php";</script>';
		//header("location:http://localhost/bca6/admin/admin_records.php");
	}
	else
	{
		echo '<script>alert("Record not updated..")</script>';
	}
			
	
	
}
?>

<form method="POST" enctype="multipart/form-data" >
<table id="simple-table" class="table  table-bordered table-hover" border="1">
		
		<tr>
			<td><b>Id :-</b></td>
			<td>
			<?php	echo $row['a_id']; ?>
													
													</td>
		</tr>
		<tr>
			<td><b>About Us :-</b></td>
			<td>
			<textarea type="text" name="txtabout" id="txtabout" ><?php
															echo $row['aboutus'];
													?>
													</textarea>
			</td>
		</tr>
											
</table>
<input type="submit" align="center" name="btnsubmit" value="Update Data" ></input>
</form>
</body>

<?php 
include("fff.php");
?>

