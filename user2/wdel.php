<?php
$wid=$_GET['wid'];
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$q=mysqli_query($conn,"delete from tbl_wishlist where wishlist_id=$wid");
if($q)
{
    echo '<script>alert("item removed from the wishlist.")</script>';
    echo "<script>window.location.href='wishlist.php';</script>";
}
?>