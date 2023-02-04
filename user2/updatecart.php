<?php
session_start();
$cid=$_GET['cid'];
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$s=mysqli_query($conn,"select * from tblcart_master where cart_id=$cid");
$sres=mysqli_fetch_array($s);
$qty=$sres['product_qty'];
$qty++;
$q2=mysqli_query($conn,"update tblcart_master set product_qty='$qty' where cart_id=$cid");
echo "<script>window.location.href='checkout.php';</script>";
?>
