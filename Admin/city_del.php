<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$cityid=$_GET['id'];
				$q=mysqli_query($con,"delete from tlbcity where city_id=$cityid ");
				if($q)
				{
					header('location:city1.php');
				}
				else
				{
						echo '<script>alert("Record Not Deleted")</script>'; 
				}
			
?>