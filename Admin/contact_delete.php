		<?php
			error_reporting(1);
																
			$con=mysqli_connect("localhost","root","","jimmyshoping");
			$cid=$_GET['id'];
			
			$q=mysqli_query($con,"delete from tlbcontact where c_id=$cid");
			if($q)																	
				header('location:contact.php');
			else
					echo '<script>alert("Not deleted...")</script>';
		?>