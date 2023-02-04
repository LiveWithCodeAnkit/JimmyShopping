<?php
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$sid=$_GET["sid"];
$result=mysqli_query($conn,"select * from tlbcity where state_id=$sid");
while($row=mysqli_fetch_assoc($result)) 
{
    echo "<option value='".$row['city_id']."'>".$row['city_name']."</option>";
}
?>