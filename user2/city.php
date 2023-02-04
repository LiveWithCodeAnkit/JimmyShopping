<?php
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$cid=$_GET["cid"];
$result=mysqli_query($conn,"select * from tlbcity where state_id=$cid");
while($row=mysqli_fetch_assoc($result)) 
{
    echo "<option value='".$row['city_id']."'>".$row['city_name']."</option>";
}
?>