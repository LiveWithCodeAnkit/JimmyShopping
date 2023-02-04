<?php
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
$cid=$_GET["cid"];
$result=mysqli_query($conn,"select * from tlbsubcategory where cate_id=$cid and subcate_status=1");
while($row=mysqli_fetch_assoc($result)) 
{
    echo "<option value='".$row['subcate_id']."'>".$row['subcate_name']."</option>";
}
?>