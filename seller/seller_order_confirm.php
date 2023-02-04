<?php
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$oid=$_GET['id'];
$q=mysqli_query($conn,"update tblorder_details set is_approved=1 ,dispatch_date=null where order_detail_id=$oid");
if($q)
{
    echo '<script>alert("status updated to confirmed");</script>';
    $uid=$_GET['uid'];
    $q2=mysqli_query($conn,"select * from tbluser_master where user_id=$uid");
    $row2=mysqli_fetch_array($q2);
    $to_email = $row2['user_email'];
	$subject = "JimmyShopping.com Delivery OTP verfication";
	$body ="your order has been approved by the seller with order id ".$oid." on JimmyShopping.com";
	$headers = "From: jimmyshopping@services.com";
	if (mail($to_email, $subject, $body, $headers))
	{
	    echo '<script>window.location.href="order_master.php";</script>';
	}
	else 
	{
    	echo '<script>alert("could not send email to user about order approval please try again..."); window.location.href="order_master.php";</script>';
	}
}
else{
    echo '<script>alert("could not update status please try again later"); window.location.href="order_master.php";</script>';
}
?>