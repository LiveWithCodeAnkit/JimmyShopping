<?php
include("hhh.php");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Contact Edit</li>
			</ol>
		</div>
</div>



<body>
<?php
$con=mysqli_connect("localhost","root","","jimmyshoping");
$x=$_GET['id'];
$q=mysqli_query($con,"select * from tlbcontact where c_id=$x");
$row=mysqli_fetch_array($q);
if(isset($_POST['btnsubmit']))
{
	$name=$_POST['txtname'];
	$address=$_POST['txtadd'];
	$mobile_no=$_POST['txtphone'];
	
	$email=$_POST['txtemail'];
	$q=mysqli_query($con,"update tlbcontact set c_name='$name',c_add='$address',c_phone='$mobile_no' , c_email='$email' where c_id=$x");
	
	if($q)
	{
		echo '<script>window.location.href="contact.php";</script>';
		//header("location:http://localhost/bca6/admin/admin_records.php");
	}
	else
	{
		echo '<script>alert("Record not updated..")</script>';
		echo '<script>window.location.href="contact.php";</script>';
	}
			
	
	
}
?>

<form method="post" enctype="multipart/form-data" >
<table id="simple-table" class="table  table-bordered table-hover" border="1">
		
		<tr>
			<td><b>Id :-</b></td>
			<td>
													<?php
															echo $row['c_id'];
													?>
													
													</td>
		</tr>
		<tr>
			<td><b>Name :-</b></td>
			<td>
			<input type="text" name="txtname" value="<?php
															echo $row['c_name'];
													?>" >
													</input>
			</td>
		</tr>
		
		<tr>
			<td><b>Address :-</b></td>
			<td>
													
													<input type="text" name="txtadd" value="<?php
															echo $row['c_add'];
													?>" >
													</input>
													</input>
													</td>
		</tr>
		<tr>
			<td><b>Mobile No :-</b></td>
			<td>
													
													<input type="text" name="txtphone" value="<?php
															echo $row['c_phone'];
													?>" >
													</input>
													</input>
													</td>
		</tr>
		
		<tr>
			<td><b>E-Mail :-</b></td>
			<td>
													
													<input type="text" name="txtemail" value="<?php
															echo $row['c_email'];
													?>" >
													</input>
													</input>
													</td>
		</tr>
		
		
		
											
</table>
			<input type="submit" align="center" name="btnsubmit">
</form>
</body>

<?php 
include("fff.php");
?>