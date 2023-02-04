<?php
include('hhh.php');
$pid=$_GET['pid'];
$r=mysqli_query($conn,"select avg(rating) as avg from tblreview_master where product_id=$pid");
$rres=mysqli_fetch_assoc($r);
$q=mysqli_query($conn,"select * from tblproduct_master where product_id=$pid");
$row=mysqli_fetch_array($q);
$q2=mysqli_query($conn,"select * from tblproduct_image where product_id=$pid and default_img=1");
$row2=mysqli_fetch_array($q2);
$x2=$row2['productimg_url'];
$q3=mysqli_query($conn,"select * from tblproduct_details where product_id=$pid");
$row3=mysqli_fetch_array($q3);
$x=$row3['product_description'];
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Product page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->

	<div class="products">
		<div class="container">
			<div class="agileinfo_single">
				
				<div class="col-md-4 agileinfo_single_left">
					<img id="example" src="images/<?php echo $x2;?>" alt=" " style="border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 150px;" class="img-responsive">
				</div>
				<div class="col-md-8 agileinfo_single_right">
				<h2><?php echo $row['product_name'];?></h2>
				<div class="stars">
				<i class="fa fa-star blue-star" aria-hidden="true"></i>
																<?php 
																if($rres['avg']!=null){
																	echo number_format((float)$rres['avg'], 1, '.', '');
																}
																else{
																	echo "(No Ratings)";
																}
																?>
															</div>
					<div class="w3agile_description">
						<h4>Description :</h4>
						<p><?php echo $x;?></p>
					</div>
					<div class="snipcart-item block">
						<div class="snipcart-thumb agileinfo_single_right_snipcart">
							<h4 class="m-sing"><?php $p=$row['product_price']-($row['product_price'] * ($row['product_discount'] / 100)); echo $p; ?>₹ <span><?php echo $row['product_discount']; ?>%</span></h4>
						</div>
						<div class="snipcart-details">
							<form action="#" method="post">
									<a class="btn btn-primary" href="addtocart.php?pid=<?php echo $pid;?>" style="padding: 10px;">Add to Cart</a>
									<input type="submit" name="wishlist" value="Add to Wishlist" class="btn btn-primary" style="padding: 10px;">		
							</form>
						</div>
					</div>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
	</div>
	<?php
	if(isset($_POST['wishlist']))
	{
		if(isset($_SESSION['userid']))
		{
			$uid=$_SESSION['userid'];
			$wc=mysqli_query($conn,"select * from tbl_wishlist where user_id=$uid and product_id=$pid");
			$wrow=mysqli_num_rows($wc);
			if($wrow>0)
			{
				echo '<script>alert("item already in wishlist.");</script>';
			}
			else{
				$wdate=date('Y-m-d');
				$w=mysqli_query($conn,"insert into tbl_wishlist values(null,$uid,$pid,'$wdate')");
				if($w)
				{
					echo '<script>alert("item added to your wishlist.");</script>';
				}
				else{
					echo '<script>alert("couldn\'t add item to the wishlist.");</script>';
				}
			}

		}
		else{
			echo "<script>alert('you have to login first'); window.location.href='login.php';</script>";
		}
	}
	?>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<!------ Include the above in your HEAD tag ---------->

<!--
Author : Maniruzzaman Akash
Email  : manirujjamanakash@gmail.com
-->

<!--To Work with icons-->
<!-- <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous"> -->
<?php
$r1=mysqli_query($conn,"select * from tblreview_master where product_id=$pid");
$rres1=mysqli_num_rows($r1);
if($rres1>0)
{
	?>
<div class="container">
	<h2 class="text-center">User Ratings And Reviews</h2>
	</div>

	<?php
	while($rrow=mysqli_fetch_array($r1))
	{
		$count=1;
		$ruser=mysqli_query($conn,"select * from tbluser_master where user_id=".$rrow['user_id']);
		$urow=mysqli_fetch_array($ruser);
?>
<div class="container">
	<div class="card">
	    <div class="card-body">
	        <div class="row">
        	    <!-- <div class="col-md-2">
        	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
        	        <p class="text-secondary text-center">15 Minutes Ago</p>
        	    </div> -->
        	    <div class="col-md-10">
        	        <p>
        	            <a class="float-left" href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong><?php echo $urow['user_name']; ?></strong></a>
						<?php while($count<=$rrow['rating'])
						{?>
        	            <span class="float-right"><i class="fa fa-star blue-star"></i></span>
						<?php
						$count++;
						}?>
                        
        	       </p>
        	       <div class="clearfix"></div>
        	        <p><?php echo $rrow['review']; ?></p>
        	        <!-- <p>
        	            <a class="float-right btn btn-outline-primary ml-2"> <i class="fa fa-reply"></i> Reply</a>
        	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
        	       </p> -->
        	    </div>
	        </div>
	        	<!-- <div class="card card-inner">
            	    <div class="card-body">
            	        <div class="row">
                    	    <div class="col-md-2">
                    	        <img src="https://image.ibb.co/jw55Ex/def_face.jpg" class="img img-rounded img-fluid"/>
                    	        <p class="text-secondary text-center">15 Minutes Ago</p>
                    	    </div>
                    	    <div class="col-md-10">
                    	        <p><a href="https://maniruzzaman-akash.blogspot.com/p/contact.html"><strong>Maniruzzaman Akash</strong></a></p>
                    	        <p>Lorem Ipsum is simply dummy text of the pr make  but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
                    	        <p>
                    	            <a class="float-right btn btn-outline-primary ml-2">  <i class="fa fa-reply"></i> Reply</a>
                    	            <a class="float-right btn text-white btn-danger"> <i class="fa fa-heart"></i> Like</a>
                    	       </p>
                    	    </div>
            	        </div>
            	    </div>
	            </div> -->
	</div>
	</div>
</div>
<br><br>
<?php
	}
}
?>
    <?php
    include('fff.php');
?>