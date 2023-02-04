<html>
<head>
	<script src="//cdn.ckeditor.com/4.5.5/standard/ckeditor.js"></script>
</head>
	<body>
		<?php
					
					error_reporting();
					include('hhh.php');
		?>
		<form method="POST" align=center>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$faqid=$_GET['id'];
			if(isset($_POST['btnup']))
			{
				$question=$_POST['txtcatename'];
				$ans=$_POST['txtans'];
				
				$q=mysqli_query($con,"update tlbfaq set question='$question' , answer='$ans' where faq_id=$faqid");
				if($q)
				{
					echo '<script>window.location.href="faqin.php";</script>';
					//header('location:category_view.php');
					//header('location:http://localhost:7882/jimmyshoping/Admin/category_view.php');
						
				}
				else
				{
						echo '<script>alert("Record Not Updated")</script>'; 
				}
			}
		?>
		<?php
			$con=mysqli_connect("localhost","root","","jimmyshoping") or die("connection fail");
			$faqid=$_GET['id'];
			$q1=mysqli_query($con,"select * from tlbfaq where faq_id=$faqid");
			if(mysqli_num_rows($q1)>0)
			{
				while($row=mysqli_fetch_assoc($q1))
				{
				
			
			
		?>
		
		<table align="center">
				
				<tr style="padding: 20px;">
					<td style="padding: 20px;"><label>Question</label></td>
					<td style="padding: 20px;"><input type="Text" name="txtcatename" size="100" value="<?php echo $row['question'];?>" required></td>
				</tr>
				</div>
				
				<tr style="padding: 20px;">
					<td style="padding: 20px;"><label>Answer</label></td>
					<td style="padding: 20px;"><textarea class="ckeditor" name="txtans" rows="6" cols="70"><?php echo $row['answer'];?></textarea></td>
				</tr>
				
				</table>
				
				<div align=center style="padding:20px;">
					<input type="Submit" name="btnup" value="Update" style="width:167px; height:33px;">
				</div>
			
			<?php
					}
			    }
			
			?>
		
		<?php
					
					
					include('fff.php');
		?>
		</form>
	</body>
</html>