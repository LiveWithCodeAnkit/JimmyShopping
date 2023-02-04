<?php
header('Content-Type: application/json');

//$conn = mysqli_connect("localhost","root","","phpmyadmin");

//$sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";

include('conn.php');
//$d1=date("Y-m-d",strtotime("first day of previous month"));
//$d2=date("Y-m-d",strtotime("last day of previous month"));
                                
$f=mysqli_query($conn,"select product_name,monthname(create_date) as month from tblproduct_master where year(create_date)=year(curdate()) GROUP BY monthname(create_date)");

//$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($f as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>