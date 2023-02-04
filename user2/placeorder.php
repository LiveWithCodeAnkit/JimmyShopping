<?php
include('hhh.php');
$uid=$_SESSION['userid'];
$total=$_GET['total'];
$dc=$_GET['dc'];
?>
<script language="javascript" type="text/javascript">
function getXMLHTTP() 
{ 
  var xmlhttp=false; 
  xmlhttp=new XMLHttpRequest();  
  return xmlhttp;
}
function getScat(sid) 
{ 
  var strURL="city.php?cid="+sid;
  var req = getXMLHTTP();
  
  if (req) 
  {
     req.onreadystatechange = function(){
       if (req.readyState == 4  && req.status == 200) 
       {
            //alert(req.responseText);
            document.getElementById('city').innerHTML=req.responseText;
	   }
     }
  	req.open("GET", strURL, true);
    req.send();
  } 
}
//mobile no. validation
function isNumber(evt) {
  evt = (evt) ? evt : window.event;
  var charCode = (evt.which) ? evt.which : evt.keyCode;
  if (charCode > 31 && (charCode < 48 || charCode > 57)) {
    alert("Please enter only Numbers.");
    return false;
  }

  return true;
}

function ValidateNo() {
  var phoneNo = document.getElementById('txtPhoneNo');

  if (phoneNo.value == "" || phoneNo.value == null) {
    alert("Please enter your Mobile No.");
    return false;
  }
  if (phoneNo.value.length < 10 || phoneNo.value.length > 10) {
    alert("Mobile No. is not valid, Please Enter 10 Digit Mobile No.");
    return false;
  }

  alert("Success ");
  return true;
}
</script>
<?php
$a=mysqli_query($conn,"select * from tbluser_master where user_id=$uid");
$arow=mysqli_fetch_array($a);
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
                <li><a href="checkout.php"><span class="fa fa-cart-arrow-down" aria-hidden="true"></span>Cart Page</a></li>
				<li class="active">Place Order Page</li>
			</ol>
		</div>
</div>

<form class="form-horizontal" role="form" name="form1" method="post" enctype="multipart/form-data">
    <section class="bleezy-checkout-area section_100">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="bleezy-checkout-form checkout-form-right">
                    <br><br>
                        <h3 style="position:relative; left: -17px">Shipping Details</h3>
                        <br><br>
                        <form>
                            <div class="form-group">
                                <!--<div class="col-md-6">-->
                                    <label for="name23" >Full Name</label>
                                    <input type="text" class="form-control" placeholder="Full Name..." value="<?php echo $arow['user_name']; ?>" name="txtname" id="name23" required>
                                <!--</div>-->
                            </div>
                            <div class="form-group">
                                <label for="ctype">Shipping Address</label>
                                <textarea rows = "5" cols = "60" name = "shippingaddr" id="details" class="form-control" placeholder="Enter Shipping Address With Pincode..."  required><?php echo $arow['user_add']; ?></textarea>
                            </div>
							<div class="form-group">
                                <label for="ctype">Billing Address</label>
                                <textarea rows = "5" cols = "60" name = "billingaddr" id="details" class="form-control" placeholder="Enter Billing Address With Pincode..." required><?php echo $arow['user_add']; ?></textarea>
                            </div>
							<div class="form-group">
                                <!--<div class="col-md-12">-->
                                    <label for="Town2" >State *</label>
                                    <select name="state" class="form-control" id="state" onChange="getScat(this.value)" required>
                                        <option value='' disabled selected>--Select State--</option>
					            <?Php
                                // connection to database
                                    $sql=mysqli_query($conn,"select * from tlbstate"); // Query to collect data from table 
                                    while($data = mysqli_fetch_row($sql))
                                    {
                                        if($data[0]==$arow['state_id'])
                                        {
                                            echo "<option value=$data[0] selected>".$data[1]."</option>"; // displaying data in option menu
                                        }
                                        else
                                        {
                                            echo "<option value=$data[0]>".$data[1]."</option>"; // displaying data in option menu
                                        }
                                    }
                                
                                ?>
                                    </select>
                                <!--</div>-->
                            </div>
                            <div class="form-group">
                                <!--<div class="col-md-12">-->
                                    <label for="Town2" >Town / City *</label>
                                    <select name="city" id="city" class="form-control" required>
                                        <!--<option value='' disabled selected>--Select City--</option>-->
                                        <?Php
                                        $sq=mysqli_query($conn,"select * from tlbcity where state_id=".$arow['state_id']);
                                        while($result = mysqli_fetch_assoc($sq))
                                        {
                                            if($result['city_id']==$arow['city_id'])
                                            {
                                                echo "<option selected value='".$result['city_id']."'>".$result['city_name']."</option>";
                                            }
                                            else{
                                                echo "<option value='".$result['city_id']."'>".$result['city_name']."</option>";
                                            }
                                        }
                                ?>
                                    </select>
                                <!--</div>-->
                            </div>
                            <div class="form-group">
                                <!--<div class="col-md-6">-->
                                    <label for="info2" >Email ID *</label>
                                    <input type="email" class="form-control" placeholder="Email ID..." name="email" id="info2" value="<?php echo $arow['user_email']; ?>" required>
                                <!--</div>-->
                                <!--<div class="col-md-6">-->
                                    <label for="info2" >Mobile Number *</label>
                                    <input type="text" name="phno" class="form-control" placeholder="Mobile Number..." id="info12" onkeypress="return isNumber(event)" value="<?php echo $arow['user_phone']; ?>" required>
                                <!--</div>-->
                            </div>
                            <br><br>    
                            
                        </form>
                    </div>
                </div>
                <div class="col-md-6" style="padding:50px;">
                    <div class="calculate-shipping-bottom margin-top">
                        <h3 style="padding:10px;">Cart Totals</h3>
                         <table>
                            <tbody>
                                <tr>
                                    <td style="padding:10px;">Cart Subtotal</td>
                                    <td style="padding:10px;"><?php echo $total;?></td>
                                </tr>
                                <tr>
                                    <td style="padding: 10px;">Delivery Charges</td>
                                    <td style="padding:10px;"><?php echo $dc; ?></td>
                                </tr>
                                <tr>
                                    <td style="padding:10px;">Order Total</td>
                                    <td style="padding:10px;"><?php $total=$total+$dc; echo $total; ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="bleezy-payment">
                        <h3 style="padding:10px;">Payment Mode<h3>
                        <div class="payment">
                        <table>
                        <tr>
                            <td style="padding:10px;"><input type="checkbox" name="pmode" value="cash on delivery" checked></td>
                            <td><h4>Cod(cash on delivery)</h4></td>
                            </table>
                            <!--<img src="../user/cod.jpg" alt="credit card" />-->
                        </div>
                    </div>
                    <div class="proceed-checkout">
                        <div class="col-md-offset-3 col-md-9">
								<button class="btn btn-info" name="btncheckout" type="submit" onclick="ValidateNo();">
												<i class="ace-icon fa fa-check bigger-110"></i>
											    checkout
								</button>
						</div>
                        <?php
                        if(isset($_POST["btncheckout"]))
                        {
                            mysqli_commit($conn);
                            $fullname=$_POST['txtname'];
                            $shipadd=$_POST['shippingaddr'];
                            $billadd=$_POST['billingaddr'];
                            $state=$_POST['state'];
                            $city=$_POST['city'];
                            //$filename=$_FILES["image"]['name'];
                            //$filetemp=$_FILES["image"]['tmp_name'];
                            $email=$_POST['email'];
                            $phno=$_POST['phno'];
                            if(!isset($_POST['pmode']))
                            {
                                echo '<script>alert("please select payment mode"); window.location.href("placeorder.php?total='.$total.'");</script>';
                                exit('');
                            }
                            else{
                                $pmode=$_POST['pmode'];
                            }
                            //$pasc=$_POST['pasc'];
                            $odate=date('Y-m-d');
                            $q=mysqli_query($conn,"select * from tblcart_master where user_id=$uid");
                            while($row=mysqli_fetch_array($q))
                            {
                                $qty=$row['product_qty'];
                                $pid=$row['product_id'];
                                $q2=mysqli_query($conn,"select * from tblproduct_master where product_id=$pid");
                                $row2=mysqli_fetch_array($q2);
                                $qty2=$row2['product_qty'];
                                if($qty>$qty2)
                                {
                                    echo '<script>alert("Product \"'.$row2['product_name'].'\" quantity exceeds quantity available at seller please remove the product from the cart."); window.location.href="checkout.php";</script>';
                                    exit('');
                                }
                            }
                            $q3=mysqli_query($conn,"insert into tblorder_master values(null,$uid,'$fullname','$odate','$shipadd','$billadd',$city,$state,'$email','$phno','$total','$pmode',0)");
                            if($q3)
                            {
                                $q4=mysqli_query($conn,"select * from tblorder_master where user_id=$uid ORDER BY order_id DESC");
                                while($row4=mysqli_fetch_row($q4)){
                                    $oid=$row4[0];
                                    break;
                                }
                                $q8=mysqli_query($conn,"select * from tblcart_master where user_id=$uid");
                                while($row8=mysqli_fetch_array($q8))
                                {
                                        $cid=$row8['cart_id'];
                                        $qty=$row8['product_qty'];
                                        $pid=$row8['product_id'];
                                        $q2=mysqli_query($conn,"select * from tblproduct_master where product_id=$pid");
                                        $row2=mysqli_fetch_array($q2);
                                        $price1=$row2['product_price'];
                                        $disc=$row2['product_discount'];
                                        $tax=$row2['gst'];
                                        $price=$price1 - ($price1 * ($disc / 100));
                                        $price=$price + ($price * ($tax /100));
                                        $qty2=$row2['product_qty'];
                                        $tamt=$qty*$price;
                                        $uqty=$qty2-$qty;
                                        $dc1=0;
                                        if($tamt<500)
                                        {
                                            $dc1=50;
                                        }
                                        $q5=mysqli_query($conn,"insert into tblorder_details values(null,$oid,$pid,$qty,$tamt,null,0,0,$dc1,0,0,null,null,null)");
                                        if($q5)
                                        {
                                            $q6=mysqli_query($conn,"delete from tblcart_master where cart_id=$cid");
                                            $q7=mysqli_query($conn,"update tblproduct_master set product_qty=$uqty where product_id=$pid");
                                            if($q6 && $q7)
                                            {
                                                //echo '<script>alert("Order Succesfully Placed."); window.location.href("index.php");</script>';
                                                mysqli_commit($conn);
                                            }
                                            else{
                                                mysqli_rollback($conn);
                                                echo '<script>alert("there is a problem in placing order.");</script>';
                                                exit('');
                                            }
                                        }
                                        else{
                                            mysqli_rollback($conn);
                                            echo '<script>alert("there is a problem 2 in placing order.");</script>';
                                            exit('');
                                        }
                                }
                            }
                            else{
                                mysqli_rollback($conn);
                                echo '<script>alert("there is a problem 3 in placing order.");</script>';
                                exit('');
                            }
                            echo '<script>alert("Order Succesfully Placed."); window.location.href="index.php";</script>';
                        }
                        ?>
						
                    </div>
                </div>
            </div>
        </div>
    </section>
</form>

</div>
<?php
include('fff.php');
?>