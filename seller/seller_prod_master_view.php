<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Product</title>
</head>

<body>
    <?php

include('seller_hhh.php');

?>
<div class="container">
                    <div class="table-responsive-lg">
                        <table class="table table-bordered table-hover" id="dataTable">
                            <thead>
                                <tr>
                                    <th scope="col">Product Name</th>
                                    <th scope="col">Company Name</th>
                                    <th scope="col">Product type</th>
                                    
                                    <th scope="col">status</th>
                                    <th scope="col">Action</th>
									
									
									
				
                                </tr>
                            </thead>
                            <tbody>


                                <?php

                                include('conn.php');
                                $q=mysqli_query($conn,"select * from tblproduct_master where seller_id=$seller_id");
                                while($row=mysqli_fetch_array($q))
                                {
                                    if($row['product_status']==0)
                                    {
                                        $temp='inactive';
                                    }
                                    else
                                    {
                                        $temp='active';
                                    }
                                    $sid=$row['subcate_id'];
                                    $q2=mysqli_query($conn,"select subcate_name from tlbsubcategory where subcate_id=$sid");
                                    $res=mysqli_fetch_row($q2);
                                    ?>

                                <tr>
                                  
                                    <td><?php echo $row['product_name']; ?></td>
                                    <td><?php echo $row['company_name']; ?></td>
                                    <td><?php echo $res[0]; ?></td>
                                   
                                    <td><?php echo $temp ?></td>
                                    <td>
                                        <a class="btn btn-primary" style="height:10;" href="seller_product_view.php?id=<?php echo $row['product_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> View</a>
										<a class="btn btn-primary" href="seller_prod_master_edit.php?id=<?php echo $row['product_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> Edit</a>
										<a class="btn btn-primary" href="seller_prod_master_del.php?id=<?php echo $row['product_id'];?>"><i class="fa fa-pen" aria-hidden="true" onclick='return checkdelete()'></i> Delete</a>
									</td>
                                   
                                <?php
                                }
                            
                                ?>
<script>
function checkdelete()
{
    return confirm('are you sure you want to delete');
}
</script>

                            </tbody>
                        </table>
                    </div>
                </div>
          


    <?php

include('seller_fff.php');

?>

</body>

</html>