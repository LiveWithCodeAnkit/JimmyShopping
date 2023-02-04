<html>
	<head>
	</head>
	<body>
<?php
include('hhh.php');
?>
		<form method="POST">
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping");
			if(isset($_POST['btnsub']))
			{
				$abdes=$_POST['txtabout'];
				$q1=mysqli_query($con,"insert into aboutus values(null,'$abdes')");
				if($q1)
				{
						echo"done";
				}
				else
				{
						echo"fail";
				}
			}
		?>
			<div class="page-header">
							<h1>
								Dashboard
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									About Us
								</small>
							</h1>
			</div>
			<table>
				<tr>
								<td><b>About Us :-</b></td>
								<td>
									<textarea name="txtabout" id="about" ></textarea>
								</td>
							</tr>
							<tr>
								
								<td>
								<input type="submit" height="100" name="btnsub" value="Insert"  required="">
													</input>
								</td>
							</tr>
			</table>
		</form>
	</body>
</html>