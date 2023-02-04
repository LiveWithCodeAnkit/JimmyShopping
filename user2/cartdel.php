<?php
$cid=$_GET['cid'];
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$q=mysqli_query($conn,"delete from tblcart_master where cart_id=$cid");
if($q)
{
    echo '<script>alert("item removed from the cart.")</script>';
    echo "<script>window.location.href='checkout.php';</script>";
}
?>