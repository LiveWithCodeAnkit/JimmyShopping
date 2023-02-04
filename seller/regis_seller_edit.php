
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
	<style>
		#ad1
		{
			margin-top:200;
			
		}
	</style>
</head>
<style>
input[type="text"]
{
	border-radius:10px;
	
}
td
{
	padding:10px;
}
img
{
	padding: 10px;
}
</style>
<body>

<?php
include('seller_hhh.php');
error_reporting(1);

?>
							<form method="POST">
		
                              <?php

									$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
									$sid=$_GET['id'];
									$q=mysqli_query($con,"select * from tblseller_master where seller_id=$sid");
									$row=mysqli_fetch_array($q);
									if(isset($_POST["btnup"]))
									{
										$first=$_POST["txtname"];
										$last=$_POST["txtlname"];
										$phone=$_POST['txtph'];
										$adhar=$_POST['txtadh'];
										$pancard=$_POST['txtpan'];
										$email=$_POST['txtemail'];
										$com_add=$_POST['txtcom'];
										if(ctype_alpha($first) === false and ctype_alpha($last)=== false) 
										{
											echo '<script>alert("Digits and special charecter not allow")</script>'; 	
												
										}
										else
										{
											$q2=mysqli_query($con,"update tblseller_master set first_name='$first' , last_name='$last',seller_phone_no='$phone',seller_email='$email', seller_company_add='$com_add', adhaar_no='$adhar', pancard_no='$pancard',seller_status=0 where seller_id=$sid");
											if($q2)
											{
												echo '<script>alert("Successful Record Updated")</script>'; 
												echo '<script>window.location.href="index.php";</script>';
											}
											else
											{
												echo '<script>alert("Record Not Update")</script>'; 
											}
										}
										
									}
                                ?>
								<table  align=center style="margin-top:90px;">
									<tr>
										<td><label>Name</label></td>
										<td><input type='text' name='txtname' value="<?php echo $row['first_name'];?>" required></td>
										<td><input type='text' name='txtlname' value="<?php echo $row['last_name'];?>" required></td>
									</tr>
									<tr>
										<td><label>Email</label></td>
										<td><input type='text' name='txtemail' value="<?php echo $row['seller_email'];?>" required></td>
										
									</tr>
									<tr>
										
										<td><label>Phone</label></td>
										<td><input type='text' name='txtph' value="<?php echo $row['seller_phone_no'];?>" required></td>
									</tr>
									<tr>
										
										<td><label>Adhaar No</label></td>
										<td><input type='text' name='txtadh' value="<?php echo $row['adhaar_no'];?>" required></td>
									</tr>
									<tr>
										
										<td><label>Pancard No</label></td>
										<td><input type='text' name='txtpan' value="<?php echo $row['pancard_no'];?>" required></td>
									</tr>
									<tr>
										
										<td><label>Company Address</label></td>
										<td><input type='text' name='txtcom' value="<?php echo $row['seller_company_add'];?>"required></td>
									</tr>
									
									<tr>
										<td><input type="Submit" name="btnup" value="Update" style="width:167px; height:33px; border-radius:10px;" onclick="return checkupdate()"></td>
									</tr>
							</table>

					<div>
								<img src= ../Seller/images/<?php echo $x;?> height=250px width=250px style="border-radius:10%;margin-left:750px;margin-top:-400px;">
				                    
                </div>
				   
				   </form>

</body>
<script>
function checkupdate()
{
	return confirm('If you update your profile, it will be in a review and you can not log in untill it\'s done do you still want to continue?')
}
</script>
<?php
	
include('seller_fff.php');

?>

</html>