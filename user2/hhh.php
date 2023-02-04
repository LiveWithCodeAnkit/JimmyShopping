<!--
author: W3layouts
author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>JimmyShopping-user</title>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Super Market Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, 
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<!-- //for-mobile-apps -->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- font-awesome icons -->
<link href="css/font-awesome.css" rel="stylesheet"> 
<!-- //font-awesome icons -->
<!-- js -->
<script src="js/jquery-1.11.1.min.js"></script>
<!-- //js -->
<link href='//fonts.googleapis.com/css?family=Raleway:400,100,100italic,200,200italic,300,400italic,500,500italic,600,600italic,700,700italic,800,800italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
<!-- start-smoth-scrolling -->
<!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->
<script type="text/javascript" src="js/move-top.js"></script>
<script type="text/javascript" src="js/easing.js"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){		
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>
<!-- start-smoth-scrolling -->
</head>
	
<body>
<?php
include('conn.php');
date_default_timezone_set('Asia/Kolkata');
session_start();
?>
<!-- header -->
<div class="logo_products">
		<div class="container">
		<!--<div class="w3ls_logo_products_left1">
				<ul class="phone_email">
					<li><i class="fa fa-phone" aria-hidden="true"></i>Order online or call us : (+0123) 234 567</li>
				</ul>
			</div>-->
			<div class="w3ls_logo_products_left">
				<h1><a href="index.php">JimmmyShopping</a></h1>
			</div>
		<div class="w3l_search">
		<?php
		if(isset($_SESSION['userid']))
		{
			$user=mysqli_query($conn,"SELECT * from tbluser_master WHERE user_id=".$_SESSION['userid']);
			$userrow=mysqli_fetch_array($user);
		?>
			 <div class="topbar-divider d-none d-sm-block"></div>

<!-- Nav Item - User Information -->
	<!-- <li class="nav-item dropdown no-arrow"> -->
		<!-- <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"></a>
			<span class="mr-2 d-none d-lg-inline text-gray-600 small"> -->
			<div class="col-md-3 p-1 grey"><img class='img-thumbnail img-circle' src='Profile/<?php echo $userrow['user_pic'] ?>'></div>
			<?php echo $userrow['user_name'];?>
			<?php 	 
				} 
			?>
			<!-- <form action="#" method="post">
				<input type="search" name="Search" placeholder="Search for a Product..." required="">
				<button type="submit" class="btn btn-default search" aria-label="Left Align">
					<i class="fa fa-search" aria-hidden="true"> </i>
				</button>
				<div class="clearfix"></div>
			</form> -->
		</div>
			
			<div class="clearfix"> </div>
		</div>
	</div>
	<div class="agileits_header">
	<div class="container">	
			<!--<div class="w3l_offers">
				<p>SALE UP TO 70% OFF. USE CODE "SALE70%" . <a href="products.php">SHOP NOW</a></p>
			</div>-->
			<div class="">
				<div class="nav navbar-nav">
					<ul>
					<table>
					<?php
					if(!isset($_SESSION['userid']))
					{
						?>
							<tr>
								<td style="padding:10px;"><li><a href="registered.php"><h4 style="color: white;">Create Account</h4></a></li></td>
								<td style="padding:10px;"><li><a href="login.php"><h4 style="color: white;">LogIn</h4></a></li></td>
							</tr>
							
						<?php 
						}
						else{
						?>
						<tr>
								<td style="padding:10px;"><li><a href="orderhistory.php"><h4 style="color: white;">Orders</h4></a></li></td>
								<td style="padding:10px;"><li><a href="logout.php" onclick="return checkdelete()"><h4 style="color: white;">Logout</h4></a></li></td>
						</tr>
						</table>
						<?php
						}
						?>
						</table>
					</ul>
				</div>
			</div>
			<script>
/*function checksession()
{
    return confirm('you need to log out first');
}*/
</script>
			<div class="product_list_header">  
					<form action="checkout.php" method="post" class="last"> 
						<!--<input type="hidden" name="cmd" value="_cart">
						<input type="hidden" name="display" value="1">-->
						<button class="w3view-cart" type="submit" name="submit" value=""><i class="fa fa-cart-arrow-down" aria-hidden="true"></i></button>
					</form>  
			</div>
			<div class="clearfix"> </div>
		</div>
	</div>
<!-- //header -->
<!-- navigation -->
	<div class="navigation-agileits">
		<div class="container">
			<nav class="navbar navbar-default">
							<!-- Brand and toggle get grouped for better mobile display -->
							<div class="navbar-header nav_2">
								<button type="button" class="navbar-toggle collapsed navbar-toggle1" data-toggle="collapse" data-target="#bs-megadropdown-tabs">
									<span class="sr-only">Toggle navigation</span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
									<span class="icon-bar"></span>
								</button>
							</div> 
							<div class="collapse navbar-collapse" id="bs-megadropdown-tabs">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.php" class="act">HOME</a></li>	
									<!-- Mega Menu -->
									<?php
										$q=mysqli_query($conn,"select * from tlbcategory where cate_status=1");
										while($row=mysqli_fetch_array($q))
										{
									?>
									<li class="dropdown">
										<a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo strtoupper($row['cate_name']); ?><b class="caret"></b></a>
										<ul class="dropdown-menu multi-column columns-3">
											<div class="row">
												<div class="multi-gd-img">
													<ul class="multi-column-dropdown">
														<h6>All <?php echo $row['cate_name']; ?></h6>
														<?php
															$q2=mysqli_query($conn,"select * from tlbsubcategory where subcate_status=1 and cate_id=".$row['cate_id']);
															while($row2=mysqli_fetch_array($q2))
															{
														?>
														<li><a href="category.php?scid=<?php echo $row2['subcate_id']; ?>"><?php echo strtoupper($row2['subcate_name']); ?></a></li>
														<?php
														}
														?>
													</ul>
												</div>	
												
											</div>
											
										</ul>
									</li>
									<?php
									}
									?>
									<?php
									if(isset($_SESSION['userid']))
									{
										?>
										<li class="active"><a href="wishlist.php" class="act">WISHLIST</a></li>	
									<?php
									}
									?>
								</ul>
							</div>
							</nav>
<script>
function checkdelete()
{
    return confirm('are you sure you want to logout?');
}
</script>
			</div>
		</div>
		
<!-- //navigation -->