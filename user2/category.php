<?php
include('hhh.php');
$scid=$_GET['scid'];
$subcate=mysqli_query($conn,"select * from tlbsubcategory where subcate_id=".$scid);
$subcaterow=mysqli_fetch_array($subcate);
?>
<!-- main-slider -->
<ul id="demo1">
			<li>
				<img src="images/11.jpg" alt="" />
				<!--Slider Description example-->
				<div class="slide-desc">
					<h3>Buy All Kinds Of Products Here</h3>
				</div>
			</li>
			<li>
				<img src="images/22.jpg" alt="" />
				  <div class="slide-desc">
					<h3>Whole Lots Products Are Now On Line With Us</h3>
				</div>
			</li>
			
			<li>
				<img src="images/44.jpg" alt="" />
				<div class="slide-desc">
					<h3>Easy Buy Aything</h3>
				</div>
			</li>
		</ul>
	<!-- //main-slider -->
	<!-- //top-header and slider -->
	<!-- top-brands -->
	<div class="top-brands">
		<div class="container">
		<h2><?php echo $subcaterow['subcate_name'];?>'s</h2>
			<div class="grid grid_5">
				<div class="bs-example bs-example-tabs" role="tabpanel" data-example-id="togglable-tabs">
					<!--<ul id="myTab" class="nav nav-tabs" role="tablist">
						<li role="presentation" class="active"><a href="#expeditions" id="expeditions-tab" role="tab" data-toggle="tab" aria-controls="expeditions" aria-expanded="true">Advertised offers</a></li>
						<li role="presentation"><a href="#tours" role="tab" id="tours-tab" data-toggle="tab" aria-controls="tours">Today Offers</a></li>
					</ul>
					<div id="myTabContent" class="tab-content">
						<div role="tabpanel" class="tab-pane fade in active" id="expeditions" aria-labelledby="expeditions-tab">
							<div class="agile-tp">
								<h5>Advertised this week</h5>
								<p class="w3l-ad">We've pulled together all our advertised offers into one place, so you won't miss out on a great deal.</p>
							</div>-->
							<?php
								$q=mysqli_query($conn,"select * from tblproduct_master where product_status=1 and subcate_id=".$scid);
                                $pres=mysqli_num_rows($q);
                                if($pres>0)
                                {
								$x=1;
								while($row=mysqli_fetch_array($q))
								{
									$pid=$row['product_id'];
									$r=mysqli_query($conn,"select avg(rating) as avg from tblreview_master where product_id=$pid");
									$rres=mysqli_fetch_assoc($r);
									$q2=mysqli_query($conn,"select * from tblproduct_image where product_id=$pid and default_img=1");
									$row3=mysqli_num_rows($q2);
									if($row3>=1)
									{
										$row2=mysqli_fetch_array($q2);
										$x2=$row2['productimg_url'];
								?>
							<div class="agile_top_brands_grids">
								
								<div class="col-md-4 top_brand_left">
										<div class="agile_top_brand_left_grid">
									<div class="hover14 column">
											<!--<div class="agile_top_brand_left_grid_pos">
												<img src="images/offer.png" alt=" " class="img-responsive" />
											</div>-->
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
														<div class="embed-responsive embed-responsive-4by3"><a href="single.php?pid=<?php echo $pid; ?>"><img title=" " alt=" " class="card-img-top embed-responsive-item" style="@media (min-width: 992px) {.card-img-top {height: 1vw; object-fit: cover;}}" src="images/<?php echo $x2;?>" /></a></div>
															<p><?php echo $row['product_name']; ?></p>
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
															<h4><?php $p=$row['product_price']-($row['product_price'] * ($row['product_discount'] / 100)); echo $p; ?>₹ <span><?php echo $row['product_price']; ?>₹</span></h4>
														</div>
														<div class="snipcart-details top_brand_home_details">
															<form action="#" method="post">
																<fieldset>
																	
																	<a class="btn btn-primary" href="addtocart.php?pid=<?php echo $pid;?>">Add to Cart</a>
																</fieldset>
															</form>
														</div>
													</div>
												</figure>
											</div>
										</div>
									</div>
								</div>
								
							
								<?php
								if($x%3==0)
								{
									?>
								<div class="clearfix"> </div>
								<?php
								}
								?>
							</div>
							<?php
								$x++;
								}
							}
                        }
                        else{
                            echo '<div align=center><h4 style="padding: 50px;"> SORRY NO "'.strtoupper($subcaterow['subcate_name']).'" AVAILABLE AT THIS TIME😑.</div>';
                        }
							?>
							
							
					</div>
				</div>
			</div>
		</div>
	</div>
<!-- //top-brands -->
 <!-- Carousel
    ================================================== -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
      <!-- Indicators -->
      <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="item active">
         <a href="beverages.php"> <img class="first-slide" src="images/b1.jpg" alt="First slide"></a>
       
        </div>
        <div class="item">
         <a href="personalcare.php"> <img class="second-slide " src="images/b3.jpg" alt="Second slide"></a>
         
        </div>
        <div class="item">
          <a href="household.php"><img class="third-slide " src="images/b1.jpg" alt="Third slide"></a>
          
        </div>
      </div>
    
    </div><!-- /.carousel -->	
<!--banner-bottom-->
				<div class="ban-bottom-w3l">
					<div class="container">
					<div class="col-md-6 ban-bottom3">
							<div class="ban-top">
								<img src="images/p2.jpg" class="img-responsive" alt=""/>
								
							</div>
							<div class="ban-img">
								<div class=" ban-bottom1">
									<div class="ban-top">
										<img src="images/p3.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="ban-bottom2">
									<div class="ban-top">
										<img src="images/p4.jpg" class="img-responsive" alt=""/>
										
									</div>
								</div>
								<div class="clearfix"></div>
							</div>
						</div>
						<div class="col-md-6 ban-bottom">
							<div class="ban-top">
								<img src="images/111.jpg" class="img-responsive" alt=""/>
								
								
							</div>
						</div>
						
						<div class="clearfix"></div>
					</div>
				</div>

<?php
    include('fff.php');
?>