<?php
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$oid=$_GET['oid'];
date_default_timezone_set('Asia/Kolkata');
$ddate=date('Y-m-d');
$otp=rand(1000,9999);
$q=mysqli_query($conn,"update tblorder_details set dispatch_date='$ddate' , is_approved=1 ,otp=$otp where order_detail_id=$oid");
if($q)
{
    echo '<script>alert("status updated to dispatched");</script>';
    $uid=$_GET['uid'];
    $q2=mysqli_query($conn,"select * from tbluser_master where user_id=$uid");
    $row2=mysqli_fetch_array($q2);
    $to_email = $row2['user_email'];
	$subject = "JimmyShopping.com Delivery OTP verfication";
	$body = $otp." is your otp for verifying your product delivery with order id ".$oid." on JimmyShopping.com";
	$headers = "From: jimmyshopping@services.com";
	if (mail($to_email, $subject, $body, $headers))
	{
	    echo '<script>window.location.href="order_master.php";</script>';
	}
	else 
	{
    	echo '<script>alert("Otp sending failed please check your mail Id..."); window.location.href="order_master.php";</script>';
	}
}
else{
    echo '<script>alert("status could not update please try again later"); window.location.href="order_master.php";</script>';
}
?>