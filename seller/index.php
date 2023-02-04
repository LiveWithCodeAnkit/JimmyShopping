<?php

include('seller_hhh.php');


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="vendor/jquery/jquery.min.js"></script>
    
    <script>
        $(document).ready(function(){
            $('#day_chart').load("seller_chat.php");
           
            $("#product").click(function(){
                $("#load-table").load("home_product_show.php");
            });

            $("#users").click(function(){
                $("#load-table").load("home_user_show.php");
            });

            $("#admins").click(function(){
                $("#load-table").load("home_admin_show.php");
            });

        });
    </script>
</head>

<body>

    <div class="container">

     <!-- Page Heading -->
     <div class="d-sm-flex align-items-center justify-content-between mb-4">
          <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
    </div>


     <!-- Content Row -->
     <div class="row">

<!-- Admin Card Example -->
<div class="col-xl-3 col-md-6 mb-4" id="product">
    <div class="card border-left-primary shadow h-100 py-2">
        <div class="card-body">
            <div class="row no-gutters align-items-center">
                <div class="col mr-2">
                    <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                        Total Products</div>
                <?php
                
                include('conn.php');
                $q=mysqli_query($conn,"select * from tblproduct_master where seller_id=".$_SESSION['id']);
                $row=mysqli_num_rows($q);
    
                
                ?>



                    <div class="h5 mb-0 font-weight-bold text-gray-800">
                    <?php 
                    if($row<10)
                    {
                        echo "0".$row;
                    }
                    else
                    {
                        echo $row;
                    }
                    
                    ?></div>
                </div>
                <div class="col-auto">
                    <i class="fa fa-user fa-2x text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</div>


                  <!-- Driver Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4" id="drivers">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Total Orders</div>

                                                <?php
                
                                                
                                                 $d=mysqli_query($conn,"select * from tblorder_details where product_id in (select product_id from tblproduct_master where seller_id=".$_SESSION['id'].")");
                                                 $row1=mysqli_num_rows($d);
                
                                                ?>




                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                    if($row1<10)
                    {
                        echo "0".$row1;
                    }
                    else
                    {
                        echo $row1;
                    }
                    
                    ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>



                        <!-- User Card Example -->
                  <div class="col-xl-3 col-md-6 mb-4" id="users">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                                                Pending Orders</div>

                                                <?php
                
                                                
                                                 $u=mysqli_query($conn,"select * from tblorder_details where is_approved=0 and dispatch_date is NULL and product_id in (select product_id from tblproduct_master where seller_id=".$_SESSION['id'].")");
                                                 $row2=mysqli_num_rows($u);
                
                                                ?>




                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            <?php 
                    if($row2<10)
                    {
                        echo "0".$row2;
                    }
                    else
                    {
                        echo $row2;
                    }
                    
                    ?>
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-users fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>




</div>


                    <div id="load-table">
                    </div>

    <div class="row">

        <div class="col-lg-6">

        <!-- Area Chart -->
    <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Month Wise Earning</h6>
                                </div>
                                <div class="card-body">
                                    <div id="day_chart">
                                        
                                    </div>
                                </div>
                            </div>

        </div>

        <div class="col-lg-6">

        <!-- Area Chart -->
    <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Product Wise Earning</h6>
                                </div>
                                <div class="card-body">
                                    <div>
                                        <?php
                                        include('s_chart.php');
                                        ?>
                                    </div>
                                </div>
                            </div>

        </div>

    </div>
                    

    </div>

    <?php

include('seller_fff.php');

?>

</body>

</html>