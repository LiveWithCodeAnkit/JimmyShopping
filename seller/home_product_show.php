<div class="container">
<div class="card shadow mb-4">
                        <div class="card-header py-3 bg-gradient-primary" id="prod1">
                            <h6 class="m-0 font-weight-bold text-white">Products</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
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
                                $q=mysqli_query($conn,"select * from tblproduct_master");
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
                                    <td><a class="btn btn-primary" href="seller_product_view.php?id=<?php echo $row['product_id'];?>"><i class="fa fa-pen" aria-hidden="true"></i> View</a></td>
                                   
                                <?php
                                }
                            
                                ?>


</tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    </div>