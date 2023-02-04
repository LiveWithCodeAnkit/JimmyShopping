<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$pid=$_GET['id'];
				$q=mysqli_query($con,"delete from tblproduct_master where product_id=$pid");
				if($q)
				{
					echo '<script>alert("deleted succesfully"); window.location.href="seller_prod_master_view.php";</script>';
				}
				else
				{
					echo '<script>alert("Record Not Deleted"); window.location.href="seller_prod_master_view.php";</script>';
				}
			
?>