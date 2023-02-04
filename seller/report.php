<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php

include('seller_hhh.php');
include('conn.php');


?>
<div class="container">

<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Manualy Report</h6>
                        </div>
                        <div class="card-body">

<form class="user" method="post">                        
<div class="row">

<div class="col-lg-4">

<div class="form-group">
  <label for="d1">From Date</label>
  <input type="date"
    class="form-control" name="date1" id="d1" value="<?php echo $d1;?>">
</div>

</div>
<div class="col-lg-4">

<div class="form-group">
  <label for="d2">To Date</label>
  <input type="date"
    class="form-control" name="date2" id="d2" value="<?php echo $d2;?>">
</div>

</div>

<div class="col-lg-4">

<div class="form-group">
  <label for="ds">By Driver</label>
  <select class="form-control" name="txtds" id="ds">
    <option value="">---Select---</option>
  <?php
  $d=mysqli_query($conn,"select * from driver_master");
  while($row2=mysqli_fetch_array($d))
  {
  ?>
    <option value="<?php echo $row2['Name'];?>"><?php echo $row2['Name'];?></option>
<?php
  }
?>
  </select>
</div>

</div>

</div>

<div class="row">

<div class="col-lg-4">

<div class="form-group">
  <label for="cs">By Car</label>
  <select class="form-control" name="txtcs" id="cs">
    <option value="">---Select---</option>
  <?php
  $car=mysqli_query($conn,"select * from car_master");
  while($row3=mysqli_fetch_array($car))
  {
  ?>
    <option value="<?php echo $row3['Car_name'];?>"><?php echo $row3['Car_name'];?></option>
<?php
  }
?>
  </select>
</div>

</div>

<div class="col-lg-4">
<div class="form-group">
<button type="submit" name="btnsea" class="btn btn-primary">Search</button>
</div>
</div>

</div>
</form>

                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                 <tr>
                                    <th scope="col">SR No.</th>
                                    <th scope="col">Car Name</th>
                                    <th scope="col">Customer Name</th>
                                    <th scope="col">Driver Name</th>
                                    <th scope="col">Source</th>
                                    <th scope="col">Destination</th>
                                    <th scope="col">Total Km</th>
                                    <th scope="col">Pickup Time</th>
                                    <th scope="col">Booking Date</th>
                                    <th scope="col">Pickup Date</th>
                                    <th scope="col">Total Charges</th>
                                </tr>
                                
                            </thead>
                            <tbody>


                                <?php

                                
                                if(isset($_POST['btnsea']))
                                {
                                    $d1=$_POST['date1'];
                                    $d2=$_POST['date2'];
                                    $d3=$_POST['txtds'];
                                    $d4=$_POST['txtcs'];
                                    if(!empty($d3))
                                    {
                                    
                                    
                                    $f=mysqli_query($conn,"select bd.*,cd.*,um.*,dm.*,cm.* from booking_details bd inner join car_detail cd on bd.Car_detail_id=cd.Car_detail_id 
                                inner join user_master um on bd.U_id=um.U_id inner join driver_master dm on bd.D_id=dm.D_id inner join car_master cm on cd.Car_master_id=cm.Car_master_id where bd.Booking_date between '$d1' and '$d2' and dm.Name='$d3' and cm.Car_name='$d4'");
                                
                                    }
                                    else
                                    {
                                        $f=mysqli_query($conn,"select bd.*,cd.*,um.*,dm.*,cm.* from booking_details bd inner join car_detail cd on bd.Car_detail_id=cd.Car_detail_id 
                                inner join user_master um on bd.U_id=um.U_id inner join driver_master dm on bd.D_id=dm.D_id inner join car_master cm on cd.Car_master_id=cm.Car_master_id where bd.Booking_date between '$d1' and '$d2'");
                                    }
                                

                                 $sr=0;

                                while($row=mysqli_fetch_array($f))
                                 {
                                    
                                
                                    $sr++;
                                 
                                    
                                    ?>

                                <tr>
                                    <th scope="row"><?php echo $sr; ?></td>
                                    <td><?php echo $row['Car_name']; ?></td>
                                    <td><?php echo $row['U_name']; ?></td>
                                    <td><?php echo $row['Name']; ?></td>
                                    <td><?php echo $row['Source']; ?></td>
                                    <td><?php echo $row['Destination']; ?></td>
                                    <td><?php echo $row['Total_km']; ?></td>
                                    <td><?php echo $row['Pickup_time']; ?></td>
                                    <td><?php echo $row['Booking_date']; ?></td>
                                    <td><?php echo $row['Pickup_date']; ?></td>
                                    <td><?php echo $row['Total_charges']; ?></td>
                                    
                           
                                </tr>
                                <?php
                                }
                            
                                }
                                    ?>


</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>
          
                    <script src="vendor/jquery/jquery.min.js"></script>
                    <script>
                    
                            $(document).ready(function(){
                                $('#search').on("keyup",function(){
                                    var search_term = $(this).val();
                                    
                                    $.ajax({
                                        url: "search_user.php",
                                        type: "POST",
                                        data: {search:search_term },
                                        success:function(data){
                                            $('#table-data').html(data);
                                        }
                                    });
                                });
                            });
                    
                    </script>




    <?php

include('seller_fff.php');

?>

</body>

</html>