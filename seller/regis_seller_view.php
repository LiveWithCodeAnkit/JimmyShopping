<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Seller Profile</title>
	
</head>

<body>
    <?php
//session_start();
include('seller_hhh.php');
error_reporting(1);

?>
<div class="container">
                    <div class="table-responsive-lg">
                                <?php
								$abid=$_SESSION['id'];
                                include('conn.php');
								//$abid=$_GET['x'];
                                $q=mysqli_query($conn,"select * from tblseller_master where seller_id=$abid");
                                
								$row=mysqli_fetch_array($q);
								
                                ?>
                                
								<div style="margin-top:-200; height:50%; width:60%; ">
                                <?php
                                    echo "<div><label style='padding:10px;''>First Name</label><lable><b>:- ".$row['first_name']."</b></lable></div>";
                                    echo "<div><label style='padding:10px;''>Last Name</label><lable><b>:- ".$row['last_name']."</b></lable></div>";
                                    echo "<div><label style='padding:10px;''>Company Name</label><lable><b>:- ".$row['seller_company_name']."</b></lable></div>";
                                    echo "<div><label style='padding:10px;''>Email</label><lable><b>:- ".$row['seller_email']."</b></lable></div>";
                                    echo "<div><label style='padding:10px;''>Phone No.</label><lable><b>:- ".$row['seller_phone_no']."</b></lable></div>";
                                    //echo "/nPassword".$row['seller_password'];
                                    echo "<div><label style='padding:10px;''>Company Address</label><lable><b>:- ".$row['seller_company_add']."</b></lable></div>";
                                    //echo $row['seller_pic'];
                                    echo "<div><label style='padding:10px;''>Pancard No.</label><lable><b>:- ".$row['pancard_no']."</b></lable></div>";
                                    echo "<div><label style='padding:10px;''>Adhaar No.</label><lable><b>:- ".$row['adhaar_no']."</b></lable></div>";
                                    echo "<div><label style='padding:10px;''>Registration Date</label><lable><b>:- ".$row['seller_regis_date']."</b></lable></div>";?>
                                  
                                    <br><br><a class="btn btn-primary" href="regis_seller_edit.php?id=<?php echo $row['seller_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> Edit</a>
									
                                    <a class="btn btn-danger" href="seller_delete.php?id=<?php echo $row['seller_id'];?>"><i class="fa fa-trash"></i> Delete your account</a>
							</div>
                    </div>
								<div>
								<img src= ../Seller/images/<?php echo $x;?> height=50% width=30% style="border-radius:10%;margin-left:600px;margin-top:-700px">
				                    
                                </div>
</div>
          


    <?php

include('seller_fff.php');

?>

</body>

</html>