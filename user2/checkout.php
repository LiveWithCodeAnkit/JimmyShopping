<?php
include('hhh.php');
if(!isset($_SESSION['userid']))
{
	echo "<script>alert('you have to login first'); window.location.href='login.php';</script>";
}
$uid=$_SESSION['userid'];

$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("Connection Not Estalabish");
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Cart Page</li>
			</ol>
		</div>
</div>
<!-- //breadcrumbs -->
<!-- checkout -->
<?php
	$q=mysqli_query($conn,"select * from tblcart_master where user_id=$uid");
	$sres=mysqli_num_rows($q);
	$total=0;
?>
	<div class="checkout">
		<div class="container">
			<h2>Your shopping cart contains: <span STYLE="font-size:6mm"><?php echo $sres;?> Products</span></h2>
			<form method="post">
			<div class="checkout-right">
				<table class="timetable_sub">
					<thead>
						<tr>
							<th>No.</th>	
							<th>Product</th>
							<th>Quantity</th>
							<th>Product Name</th>
							<th>Price</th>
							<th>Tax</th>
							<th>Total</th>
							<th>Remove</th>
						</tr>
					</thead>
					<?php
					$cnt=1;
					$dc=0;
					while($row=mysqli_fetch_array($q))
					{
						$pid=$row['product_id'];
						$qty=$row['product_qty'];
						$q2=mysqli_query($conn,"select * from tblproduct_master where product_id=$pid");
						$row2=mysqli_fetch_array($q2);
						$q3=mysqli_query($conn,"select * from tblproduct_image where product_id=$pid and default_img=1");
						$row3=mysqli_fetch_array($q3);
						$x=$row3['productimg_url'];
						$price=$row2['product_price']-($row2['product_price'] * ($row2['product_discount'] / 100));
					?>
					<tr class="rem1">
						<td class="invert"><?php echo $cnt; $cnt++;?></td>
						<td class="invert" style="width: 30%; height: 40%;"><a href="single.php"><img src="images/<?php echo $x;?>" alt=" " style="width: 20%; height: auto;"/></a></td>
						<td class="invert">
							 <div class="quantity"> 
								<div class="quantity-select">                           
									<a href="updatecart2.php?cid=<?php echo $row['cart_id'];?>"><div class="entry value-minus">&nbsp;</div></a>
									<?php echo $qty;?>
									<a href="updatecart.php?cid=<?php echo $row['cart_id'];?>"><div class="entry value-plus active"></div></a>
								</div>
							</div>
						</td>
						<td class="invert"><?php echo $row2['product_name']; ?></td>
						<td class="invert"><?php $tamt1=$qty*$price; echo $price;?>₹</td>
						<td class="invert"><?php echo $row2['gst'];?>%</td>
						<td class="invert"><?php $tamt=$tamt1+($tamt1 *($row2['gst']/100)); echo $tamt;?>₹</td>
						<td class="invert">
							<a href="cartdel.php?cid=<?php echo $row['cart_id'];?>" onclick='return checkdelete()'><div class="rem">
								<div class="close1"> </div>
							</div></a>
							
						</td>
					</tr>
					<?php $total=$total+$tamt;
						if($tamt<500)
						{
							$dc=$dc+50;
						}
					}
					 ?>
					
								<!--quantity-->
									<script>
									$('.value-plus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)+1;
										divUpd.text(newVal);
									});

									$('.value-minus').on('click', function(){
										var divUpd = $(this).parent().find('.value'), newVal = parseInt(divUpd.text(), 10)-1;
										if(newVal>=1) divUpd.text(newVal);
									});
									</script>
								<!--quantity-->
				</table>
			</div>
			</form>
			<div class="checkout-left">	
				<div class="checkout-left-basket">
					
					<ul>
						<!--<li>Product1 <i>-</i> <span>$15.00 </span></li>
						<li>Product2 <i>-</i> <span>$25.00 </span></li>
						<li>Product3 <i>-</i> <span>$29.00 </span></li>-->
						<li>Total Delivery Charges <i>-</i> <span><?php echo $dc; ?>₹</span></li>
						<li>Total <i>-</i> <span><?php echo $total+$dc; ?>₹</span></li>
					</ul>
				</div>
				<br>
				<br>
				<!--<textarea rows='3' cols='100' name="addr" placeholder="Enter Full Shipping Address with Pincode..."></textarea>-->
				<div class="checkout-right-basket">
					<a href="placeorder.php?total=<?php echo $total; ?>&dc=<?php echo $dc; ?>" class="btn btn-warning btn-rounded btn-lg active">Place Order</a>	
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php
	/*if(isset($_POST["btnporder"]))
	{
		$odate=date('Y-m-d');
		$o=mysqli_query($conn,"insert into tblorder_master values(null,$uid,0,$odate,'$city','$email',$total,0,0)");
	}*/
	?>
<script>
function checkdelete()
{
    return confirm('are you sure you want to remove this product from cart?');
}
</script>
    <?php
    include('fff.php');
    ?>