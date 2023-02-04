<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Master</title>
</head>
<script language="javascript" type="text/javascript">
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
     req.onreadystatechange = function(){
       if (req.readyState == 4  && req.status == 200) 
       {
            //alert(req.responseText);
            document.getElementById('s2').innerHTML=req.responseText;
	   }
     }
  	req.open("GET", strURL, true);
    req.send();
  } 
}
</script>

<body>

<?php
include('seller_hhh.php');
date_default_timezone_set('Asia/Kolkata');
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
						<div>
                        Select Category first <select name="s1" id="s1" onChange="getScat(this.value)"> 
                            <option value='' disabled selected> --Select Category-- </option> 
                            <?Php
                                // connection to database
                                $sql=mysqli_query($conn,"select * from tlbcategory where cate_status=1"); // Query to collect data from table 
                                while($data = mysqli_fetch_row($sql))
                                {
                                    echo "<option value=$data[0]>".$data[1]."</option>"; // displaying data in option menu
                                }
                                
                            ?>
                            </select>  <br><br> 
                        </div>  
                        <div>
                        Select Subcategory <select name="s2" id="s2"> 
                            <option value='' disabled selected> --Select Subcategory-- </option> 
                            </select><br><br></div>
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
                        Add Product Pic...
                    <input type="file" class="form-control" name="image">
					</div>   
						<div class="form-group">
                            <label for="ctype">Product Qty</label>
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
                            <label for="ctype">Product Tax</label>
                            <input type="number" class="form-control" id="gst" placeholder="Product Tax.." name="txtgst">
                        </div>
                        <div class="form-group">
                            <label for="ctype">Product Details</label>
                            <textarea rows = "5" cols = "60" name = "txtdetails" id="details" class="form-control" placeholder="Product details and specs..."></textarea>
                            <!--<input type="textarea" class="form-control" id="details" placeholder="product details and specs." name="txtdetails">-->
                        </div>
						
					<!--	<div class="form-group">
                            <label for="ctype">Create Date</label>
                            <input type="date" class="form-control" id="create_date" placeholder="Create Date.." name="txtcreate_date" required>
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Modify Date</label>
                            <input type="date" class="form-control" id="modify_date" placeholder="Modify Date.." name="txtmodify_date">
                        </div>-->

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
                $subcate=$_POST['s2'];
				$ptype=$_POST['s1'];
				$qty=$_POST['txtprod_qty'];
				$price=$_POST['txtprod_price'];
				$disc=$_POST['txtprod_disc'];
				$gst=$_POST['txtgst'];
				$cdate=date('Y-m-d');
				$mdate=date('Y-m-d');
                $filename=$_FILES["image"]['name'];
				$filetemp=$_FILES["image"]['tmp_name'];
                $details=$_POST['txtdetails'];
				//$pattern1 = '/^\d+(:?[.]\d{2})$/';
				$s=mysqli_query($conn,"select * from tblproduct_master where product_name like '$pname' and company_name like '$cname' and seller_id=$seller_id");
                $sres=mysqli_num_rows($s);
				/*if (ctype_alpha($pname) === false )
                {
                    echo "<script>alert('Digits  Negative value and  Special Character Not Allow Please Enter Valid Data')</script>";
                }*/
				if ($price <= 0 ) 
				{		
						echo "<script>alert('Check Price Not Equal To 0 Or Negative Value')</script>";
				}
				elseif ($qty <= 0) 
				{
						echo "<script>alert('Check Qty Not Equal To 0 Or Negative Value')</script>";
				}
                elseif ($disc < 0) 
				{
						echo "<script>alert('Check Discount, It Can Not Be Negative Value')</script>";
				}
				else
				{
						$du=mysqli_query($conn,"select * from tblproduct_master where product_name like '$pname' and company_name like '$cname' and seller_id=$seller_id");
						if(mysqli_num_rows($du)>0)
						{
							echo '<script>alert("Dublicate Value")</script>';
						}
						else
						{
							$q=mysqli_query($conn,"insert into tblproduct_master values(null,'$subcate','$seller_id','$pname','$cname','$ptype','$qty','$price','$disc','$gst','$cdate','$mdate',0)");
							if($q)
							{
								$det=mysqli_query($conn,"select product_id from tblproduct_master where product_name='$pname' and company_name='$cname' and seller_id='$seller_id'");
								$res=mysqli_fetch_row($det);
								$q2=mysqli_query($conn,"insert into tblproduct_details values(null,'$res[0]','$details')");
								if($q2)
								{
									echo '<script>alert("Product Inserted Succesfully")</script>';
								}
								else
								{
									echo '<script>alert("product Details are not inserted")</script>';
								}
								$q3=mysqli_query($conn,"insert into tblproduct_image values(null,$res[0],'$filename',1,1)");
								if($q3)
								{	
									move_uploaded_file($filetemp,"../user2/images/".$filename);
								}
							}
							else
							{
								echo '<script>alert("product is not inserted")</script>'; 
							}
						}
				}
			}
			include('seller_fff.php');
	    ?>
</body>

</html>