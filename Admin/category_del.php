<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$cateid=$_GET['id'];

				$q=mysqli_query($con,"delete from tlbcategory where cate_id=$cateid");


		
				if($q)
				{
					echo '<script>alert("Record  Deleted")</script>'; 
					echo '<script>window.location.href="category.php";</script>';
				}
				else
				{
						echo '<script>alert("Record Not Deleted")</script>'; 
				}
?>

	
	

				