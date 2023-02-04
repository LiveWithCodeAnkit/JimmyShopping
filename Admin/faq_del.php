<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$faqid=$_GET['id'];
				$q=mysqli_query($con,"delete from tlbfaq where faq_id=$faqid ");
				if($q)
				{
					header('location:faqin.php');
				}
				else
				{
						echo '<script>alert("Record Not Deleted")</script>'; 
				}
			
?>