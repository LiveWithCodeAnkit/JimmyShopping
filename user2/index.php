<?php
include('hhh.php');
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
		<h2>Latest Products</h2>
		<form id="my_form" action="" method="POST">
		<div style="padding: 20px">
		<select name="order" id="order" onchange="update(this.value)">
		<?php
		if(!isset($_SESSION['order']))
		{
            echo '<option selected disabled>-----ORDER BY-----</option>';
			echo '<option value="1">Price:low to high</option>';
			echo '<option value="2">Price:high to low</option>';
			echo '<option value="3">Latest</option>';
					
		}
		elseif($_SESSION['order']==1)
		{
					
			echo '<option selected disabled>-----ORDER BY-----</option>';
			echo '<option value="1" selected disabled>Price:low to high</option>';
			echo '<option value="2">Price:high to low</option>';
			echo '<option value="3">Latest</option>';
					
		}
		elseif($_SESSION['order']==2)
		{
			
			echo '<option selected disabled>-----ORDER BY-----</option>';
			echo '<option value="1">Price:low to high</option>';
			echo '<option value="2" selected disabled>Price:high to low</option>';
			echo '<option value="3">Latest</option>';
		}
		elseif($_SESSION['order']==3)
		{
			echo '<option selected disabled>-----ORDER BY-----</option>';
			echo '<option value="1">Price:low to high</option>';
			echo '<option value="2">Price:high to low</option>';
			echo '<option value="3" selected disabled>Latest</option>';
		} 
		?>
        </select>
		<input type="submit" name="s1" id="s1" style="visibility: hidden">
		</div>
		</form>
	<script>
	function update()
	{
		var form = document.getElementById("my_form");
		var order=jQuery('#order').val();
		jQuery.ajax({
            url:'order.php',
            type:'post',
            data:'val='+order});
		form.submit();
	}
    </script>
			<div class="grid grid_5">
				
							<?php
								if(isset($_SESSION['order']))
								{
									$order=$_SESSION['order'];
								}
								else
								{
									$order=0;
								}
								switch ($order){
									case "1":
										$q=mysqli_query($conn,"select * from tblproduct_master where product_status=1 order by product_price");
										break;
									case "2":
										$q=mysqli_query($conn,"select * from tblproduct_master where product_status=1 order by product_price desc");
										break;
									case "3":
										$q=mysqli_query($conn,"select * from tblproduct_master where product_status=1 order by product_id desc");
										break;	
									default:
										$q=mysqli_query($conn,"select * from tblproduct_master where product_status=1 order by product_id desc");
								}
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
											<!--div class="agile_top_brand_left_grid_pos">
												<img src="images/offer.png" alt=" " class="img-responsive" />
											</div>-->
											<div class="agile_top_brand_left_grid1">
												<figure>
													<div class="snipcart-item block" >
														<div class="snipcart-thumb">
															<div class="embed-responsive embed-responsive-4by3"><a href="single.php?pid=<?php echo $pid; ?>"><img title=" " alt=" " class="card-img-top embed-responsive-item" style="@media (min-width: 992px) {.card-img-top {height: 1vw; object-fit: cover;}}" src="images/<?php echo $x2;?>" /></a></div> <!--border: 1px solid #ddd; border-radius: 4px; padding: 5px; width: 100%;-->
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
															<h4><?php $p=$row['product_price']-($row['product_price'] * ($row['product_discount'] / 100)); echo $p; ?>₹ <span><?php echo $row['product_price']; ?>₹ </span></h4>
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
         <img class="first-slide" src="images/b1.jpg" alt="First slide">
       
        </div>
        <div class="item">
          <img class="second-slide " src="images/b3.jpg" alt="Second slide">
         
        </div>
        <div class="item">
         <img class="third-slide " src="images/b1.jpg" alt="Third slide">
          
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