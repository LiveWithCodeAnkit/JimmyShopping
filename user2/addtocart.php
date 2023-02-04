<?php
    //error_reporting(0);
    	session_start();
		$pid=$_GET['pid'];
	    if(isset($_SESSION['userid']))
		{
			$uid=$_SESSION['userid'];
			$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
			$s=mysqli_query($conn,"select * from tblcart_master where product_id=$pid and user_id=$uid");
			$sres=mysqli_num_rows($s);
			if($sres>0)
            {
                echo "<script>alert('product already is in your cart please go to the cart for adding more quantity.')</script>";
				echo "<script>window.location.href='index.php';</script>";
            }
			else
			{
				$cdate=date('Y-m-d');
				$q=mysqli_query($conn,"insert into tblcart_master values(null,$pid,$uid,1,'$cdate',1)");
				if($q)
				{
					echo '<script>alert("item added to cart")</script>';
					echo "<script>window.location.href='index.php';</script>";
				}
				else
				{
					echo '<script>alert("something is wrong");</script>';
				}
            }
		}
        else
		{
			echo "<script>alert('you have to login first'); window.location.href='login.php';</script>";
		}
?>