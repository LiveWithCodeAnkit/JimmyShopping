<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$cateid=$_GET['id'];
				$q=mysqli_query($con,"delete from tlbsubcategory where subcate_id=$cateid");
				if($q)
				{
					header('location:sub_category.php');
				}
				else
				{
						echo '<script>alert("Record Not Deleted")</script>'; 
				}
			
?>