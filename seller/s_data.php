<?php
header('Content-Type: application/json');

//$conn = mysqli_connect("localhost","root","","phpmyadmin");

//$sqlQuery = "SELECT student_id,student_name,marks FROM tbl_marks ORDER BY student_id";

include('conn.php');
//$d1=date("Y-m-d",strtotime("first day of previous month"));
//$d2=date("Y-m-d",strtotime("last day of previous month"));
                                
$f=mysqli_query($conn,"select pn.Name,sum(bd.Total_charges) as total from driver_master dm,booking_details bd where bd.D_id=dm.D_id group by bd.D_id");

//$result = mysqli_query($conn,$sqlQuery);

$data = array();
foreach ($f as $row) {
	$data[] = $row;
}

mysqli_close($conn);

echo json_encode($data);
?>