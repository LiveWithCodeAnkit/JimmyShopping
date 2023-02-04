<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Master</title>
    <script type="text/javascript" language="javascript">
       function getXMLHTTP() 
        { 
            var xmlhttp=false; 
            xmlhttp=new XMLHttpRequest();  
            return xmlhttp;
        }
        function getScat(cid) 
        { 
            var strURL="sub_category.php?cid="+cid;
            var req = getXMLHTTP();
            if (req) 
            {
                req.onreadystatechange = function() 
                {
                    if (req.readyState == 4  && req.status == 200) 
                    { 
	                    document.getElementById('s2').innerHTML=req.responseText; 
	                }
                }
  	            req.open("GET", strURL, true);
                req.send();
            } 
        }
    </script>
</head>

<body>
<form method="post">
<?php
include('seller_hhh.php');
$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
?>
    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">ADD PRODUCT</h6>

                </div>
                <div class="card-body">


                    <form class="user" method="post" enctype="multipart/form-data">
                        <div class="form-group">
                            <label for="brand">Product Name</label>
                            <input type="text" class="form-control" id="product" 
                                placeholder="Product Name.." name="txtprod_name">
                        </div>


                        <div class="form-group">
                            <label for="ctype">Company Name</label>
                            <input type="text" class="form-control" id="company name" placeholder="Company Name.." name="txtcom_name" required>
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Product Type</label>
                            <input type="text" class="form-control" id="prod_type" placeholder="Product Type.." name="txtprod_type" required>
                        </div>
						<div>
                        Select Category first <select name="s1" id="s1" onChange="getScat(this.value)"> 
                            <option value='' disabled selected> --Select One-- </option> 
                            <?Php
                                // connection to database
                                $sql=mysqli_query($conn,"select * from tlbcategory"); // Query to collect data from table 
                                while($data = mysqli_fetch_array($sql))
                                {
                                    echo "<option value='". $data['cate_id'] ."'>". $data['cate_name'] ."</option>";  // displaying data in option menu
                                }
                                
                            ?>
                            </select>  <br> 
                        </div>
                        <div>
                        Select Subcategory <select name="s2" id="s2"> 
                            <option value='' disabled selected> --Select subcaegory-- </option>
                            </select>  <br> 
                        </div>
						<div class="form-group">
                        <br> <label for="ctype">Product Qty</label>
                            <input type="number" class="form-control" id="prod_qty" placeholder="Product Qty.." name="txtprod_qty" required>
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Product Price</label>
                            <input type="number" class="form-control" id="prod_price" placeholder="Product Price.." name="txtprod_price"required>
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Product Discount</label>
                            <input type="number" class="form-control" id="prod_disc" placeholder="Product Descount.." name="txtprod_disc">
                        </div>
						
						<div class="form-group">
                            <label for="ctype">GST NO</label>
                            <input type="text" class="form-control" id="gst" placeholder="Gst No.." name="txtgst">
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Create Date</label>
                            <input type="date" class="form-control" id="create_date" placeholder="Create Date.." name="txtcreate_date" required>
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Modify Date</label>
                            <input type="date" class="form-control" id="modify_date" placeholder="Modify Date.." name="txtmodify_date">
                        </div>
						
						

                        
                        <div class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-outline-primary w-25" name="btnadd">
                                <i class="fa fa-plus-square"></i> ADD
                            </button>
                                
                                <a href="seller_prod_master_view.php" class="btn btn-outline-primary w-25"><i class="fa fa-eye"></i> View</a>
                            </button>
                        </div>

                    </form>



                </div>
            </div>

        </div>
    </div>
	 <?php

		if(isset($_POST["btnadd"]))
			{
				$pname=$_POST['txtprod_name'];
				$cname=$_POST['txtcom_name'];
				$ptype=$_POST['txtprod_type'];
				$qty=$_POST['txtprod_qty'];
				$price=$_POST['txtprod_price'];
				$disc=$_POST['txtprod_disc'];
				$gst=$_POST['txtgst'];
				$cdate=$_POST['txtcreate_date'];
				$mdate=$_POST['txtmodify_date'];
				
				$q=mysqli_query($conn,"insert into tblproduct_master values(null,1,1,'$pname','$cname','$ptype','$qty','$price','$disc','$gst','$cdate','$mdate',0,0)");

				if($q)
					{
						
						echo"Product Inserted Successfully";
					}
				else
					{
						echo"Product Not Inserted!!";
					}
			}
			
	?>
				

   <?php
		include('seller_fff.php');
	?>
</form>
</body>

</html>