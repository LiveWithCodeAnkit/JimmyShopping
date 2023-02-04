<html>
<head>
	<style>
		.sel2
		{
			height:190;
			width:250;
			background:#6495ED;
			 border-radius: 15px 50px 30px;
			 
		}
		
		.sel3
		{
			height:190;
			width:250;
			margin-left:290;
			margin-top:-210;
			background:#CD5C5C;
			 border-radius: 15px 50px 30px;
		}
		.sel4
		{
			height:190;
			width:250;
			margin-left:590;
			margin-top:-210;
			background:#DAA520;
			 border-radius: 15px 50px 30px;
		}
		.sel5
		{
			height:190;
			width:250;
			margin-left:890;
			margin-top:-210;
			background:#00FF00;
			 border-radius: 15px 50px 30px;
		}
				
	</style>
</head>
<body>

<?php
					
					//error_reporting(0);
					include('hhh.php'); 
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1">
				<li><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</li>
			</ol>
		</div>
</div>
<div class="sel2" style="margin-left:10px;">
	<h1 style="Arial;color:white;padding:20px;">Total Seller</h1>
	
	<?php
		$con=mysqli_connect("localhost","root","","jimmyshoping") or die("");
		$q1="SELECT seller_id FROM tblseller_master ORDER BY seller_id";
		$q1_run=mysqli_query($con,$q1);
		$row=mysqli_num_rows($q1_run);
		echo "<h1 style='Arial;color:white;margin-left:60px;'>".$row."</h1>";
	?>
</div>
<div class="sel3">
	<h1 style="Arial;color:white;padding:20px;">Total Products</h1>
	<?php
		$con=mysqli_connect("localhost","root","","jimmyshoping") or die("");
		$q2="SELECT product_id FROM tblproduct_master ORDER BY product_id";
		$q2_run=mysqli_query($con,$q2);
		$row=mysqli_num_rows($q2_run);
		echo "<h1 style='Arial;color:white;margin-left:60px;'>".$row."</h1>";
	?>
</div>
<div class="sel4">
	<h1 style="Arial;color:white;padding:20px;">Total user</h1>
	<?php
		$con=mysqli_connect("localhost","root","","jimmyshoping") or die("");
		$q3="SELECT user_id FROM tbluser_master ORDER BY user_id";
		$q3_run=mysqli_query($con,$q3);
		$row=mysqli_num_rows($q3_run);
		echo "<h1 style='Arial;color:white;margin-left:60px;'>".$row."</h1>";
	?>
</div>
<div class="sel5">
	<h1 style="Arial;color:white;padding:20px;">Total orders</h1>
	<?php
		$con=mysqli_connect("localhost","root","","jimmyshoping") or die("");
		$q4="SELECT order_id FROM tblorder_details";
		$q4_run=mysqli_query($con,$q4);
		$row=mysqli_num_rows($q4_run);
		echo "<h1 style='Arial;color:white;margin-left:60px;'>".$row."</h1>";
	?>
</div>
<div style="display: flex; justify-content: center;">
	<?php
		include('chart.php');
	?>
</div>
<?php
					
				
					include('fff.php'); 
?>
</body>
</html>