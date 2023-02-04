																<?php
																error_reporting(1);
																
																$con=mysqli_connect("localhost","root","","jimmyshoping");
																$abid=$_GET['id'];
																$q=mysqli_query($con,"delete from aboutus where ab_id=$abid");
																if($q)																	
																	header('location:about.php');
																else
																	echo '<script>alert("Not deleted...")</script>';
																?>