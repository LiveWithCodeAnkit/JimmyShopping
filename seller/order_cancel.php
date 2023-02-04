<?php
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$oid=$_GET['oid'];
date_default_timezone_set('Asia/Kolkata');
$ddate=date('Y-m-d');
$q=mysqli_query($conn,"update tblorder_details set dispatch_date='$ddate' , is_approved=0 where order_detail_id=$oid");
if($q)
{
    echo '<script>alert("status updated to cancelled");</script>';
    $uid=$_GET['uid'];
    $q2=mysqli_query($conn,"select * from tbluser_master where user_id=$uid");
    $row2=mysqli_fetch_array($q2);
    $to_email = $row2['user_email'];
	$subject = "JimmyShopping.com Delivery OTP verfication";
	$body ="your order has been rejected by the seller with order id ".$oid." on JimmyShopping.com";
	$headers = "From: jimmyshopping@services.com";
	if (mail($to_email, $subject, $body, $headers))
	{
	    echo '<script>window.location.href="order_master.php";</script>';
	}
	else 
	{
    	echo '<script>alert("coulde not send email to user for rejection please try again..."); window.location.href="order_master.php";</script>';
	}
}
else{
    echo '<script>alert("status could not update please try again later"); window.location.href="order_master.php";</script>';
}
?>