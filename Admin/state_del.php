<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$stateid=$_GET['id'];

				$q=mysqli_query($con,"delete from tlbstate where state_id=$stateid");		
				if($q)
				{
					echo '<script>alert("Record  Deleted")</script>'; 
					echo '<script>window.location.href="state.php";</script>';
				}
				else
				{
						echo '<script>alert("Record Not Deleted")</script>'; 
				}
?>

	
	

				