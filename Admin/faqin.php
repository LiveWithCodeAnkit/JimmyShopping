<html>
<head>
	<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
</head>
	<body>
		<?php
					
					error_reporting();
					include('hhh.php');
		?>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			if(isset($_POST['btnin']))
			{
				$ques=$_POST['txtq'];
				$ans=$_POST['txta'];
				
				$q1=mysqli_query($con,"insert into tlbfaq values(null,'$ques','$ans','0')");
				if($q1)
				{
						echo '<script>alert("Inserted")</script>'; 
				}
				else
				{
					echo '<script>alert(" not Inserted")</script>'; 
				}
			}
		?>
		<form method="POST">
			<table align=center>
				<tr>
					<td style="padding:20px;">Quetion</td>
					<td style="padding:20px;"><input type="text" name="txtq" placeholder="Enter Question Here..." size="100"></td>
				</tr>
				<tr>
					<td style="padding:20px;">Answer</td>
					<td style="padding:20px;"><textarea class="ckeditor" name="txta" id="txta" placeholder="Enter Answer Here..."></textarea></td>
				</tr>
				<tr align=center>
					<td colspan=2><input type="submit" name="btnin" value="Publish"></td>
				</tr>
			</table>
		</form>
		<?php
			include('faqview.php');
		?>
		<?php
					
					
					include('fff.php');
		?>
	</body>
<html>