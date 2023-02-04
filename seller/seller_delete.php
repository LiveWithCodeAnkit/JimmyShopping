<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$sid=$_GET['id'];

				$q=mysqli_query($con,"delete from tblseller_master where seller_id=$sid");


		
				if($q)
				{
					echo '<script>alert("Record  Deleted")</script>'; 
					echo '<script>window.location.href="seller_login.php";</script>';
				}
				else
				{
						echo '<script>alert("Your Account Successful Deleted")</script>'; 
				}
?>

	
	

				