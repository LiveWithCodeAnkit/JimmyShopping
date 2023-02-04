<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
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
            var select = document.getElementById("s2");
            var length = select.options.length;
            for (i = length-1; i >= 0; i--) {
                select.options[i] = null;
            }
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
 <form class="user" method="post" enctype="multipart/form-data">

    <?php
		include('seller_hhh.php');
		error_reporting(1);
        $pedit=$_GET['id'];
        $q=mysqli_query($conn,"select * from tblproduct_master where product_id=$pedit");
        if(isset($_POST['btnupd']))
        {
				$pname=$_POST['txtprod_name'];
                $scatid=$_POST['s2'];
				$cname=$_POST['txtcom_name'];
				$ptype=$_POST['s1'];
				$qty=$_POST['txtprod_qty'];
				$price=$_POST['txtprod_price'];
				$disc=$_POST['txtprod_disc'];
				$gst=$_POST['txtgst'];
				$mdate=date('Y-m-d');
                $q=mysqli_query($conn,"update tblproduct_master set subcate_id='$scatid' , product_name='$pname' , company_name='$cname' , product_type='$ptype' , product_qty='$qty' , product_price='$price' , product_discount='$disc' , gst='$gst' , modify_date='$mdate' where product_id=$pedit");
		        if($q)
			    {
				    echo '<script>window.location.href="seller_prod_master_view.php";</script>';
			    }
		        else
			    {
				    echo '<script>alert("Record Not Updated")</script>'; 
			    }
		 
        }
?>
	<?php
				//$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection Not Estalabish");
				//$cateid=$_GET['id'];
				$q1=mysqli_query($conn,"select * from tblproduct_master where product_id=$pedit");
		        $row=mysqli_fetch_assoc($q1);
					
	?>
    <div class="row justify-content-center">

        <div class="col-lg-10">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Add Product </h6>

                </div>
                <div class="card-body">


                   
                        <div class="form-group">
                            <label for="brand">Product Name</label>
                            <input type="text" class="form-control" id="product" 
                                placeholder="Product Name.." name="txtprod_name"  value="<?php echo $row['product_name'];?>" >
                        </div>


                        <div class="form-group">
                            <label for="ctype">Company Name</label>
                            <input type="text" class="form-control" id="company name" placeholder="Company Name.." name="txtcom_name" value="<?php echo $row['company_name'];?>" required>
                        </div>
						
                        <div>
						    Select Category first <select name="s1" id="s1" onChange="getScat(this.value)">
                             
                            <?Php
                                $catid=$row['product_type'];
                                $sql=mysqli_query($conn,"select * from tlbcategory where cate_status=1");
                                while($data = mysqli_fetch_row($sql))
                                {
                                    if($data[0]==$catid)
                                    {
                                        echo "<option selected value=$data[0]>".$data[1]."</option>";
                                    }
                                    else{
                                        echo "<option value=$data[0]>".$data[1]."</option>"; // displaying data in option menu
                                    }
                                }
                                
                            ?>
                            </select> <br><br>
                        </div>  
                            <?php 
                                $subcateid=$row['subcate_id'];
                                //echo $subcateid;
                            ?>
                        <div>
                            Select Subcategory <select name="s2" id="s2">
                                <?Php
                                    $sq=mysqli_query($conn,"select * from tlbsubcategory where cate_id=$catid and subcate_status=1");
                                    while($result = mysqli_fetch_assoc($sq))
                                    {
                                        if($result['subcate_id']==$subcateid)
                                        {
                                            echo "<option selected value='".$result['subcate_id']."'>".$result['subcate_name']."</option>";
                                        }
                                        else{
                                            echo "<option value='".$result['subcate_id']."'>".$result['subcate_name']."</option>";
                                        }
                                    }
                                ?>
                            </select><br><br>  
                            </div>
						<div class="form-group">
                            <label for="ctype">Product Qty</label>
                            <input type="number" class="form-control" id="prod_qty" placeholder="Product Qty.." name="txtprod_qty" value="<?php echo $row['product_qty'];?>"  required>
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Product Price</label>
                            <input type="number" class="form-control" id="prod_price" placeholder="Product Price.." name="txtprod_price" value="<?php echo $row['product_price'];?>" required>
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Product Discount</label>
                            <input type="number" class="form-control" id="prod_disc" placeholder="Product Descount.." name="txtprod_disc" value="<?php echo $row['product_discount'];?>" >
                        </div>
						
						<div class="form-group">
                            <label for="ctype">Product Tax</label>
                            <input type="text" class="form-control" id="gst" placeholder="Product Tax.." name="txtgst" value="<?php echo $row['gst'];?>" >
                        </div>
						
                        <div class="d-flex justify-content-around">
                            <button type="submit" class="btn btn-primary w-25" name="btnupd">
                                <i class="fa fa-pen"></i> Update
                            </button>
                                
                                <a href="seller_prod_master_view.php" class="btn btn-primary w-25"><i class="fa fa-eye"></i> View</a>
                            </button>
                        </div>

                    </form>



                </div>
            </div>

        </div>
    </div>
		
 

    <?php
include('seller_fff.php');
?>
</body>

</html>