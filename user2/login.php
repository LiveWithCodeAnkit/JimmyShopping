<?php
include('hhh.php');

?>
<script type = "text/javascript">
function validateEmail() {
         	var emailID = document.myForm.txtuname.value;
         	atpos = emailID.indexOf("@");
         	dotpos = emailID.lastIndexOf(".");
         
        	if (atpos < 1 || ( dotpos - atpos < 2 )) {
            	alert("Please enter correct email ID");
            	document.myForm.txtuname.focus() ;
            	return false;
         	}
			return true;
      	}

</script>
<!-- breadcrumbs -->
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Login Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Login Form</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post" name="myForm">
					<input type="email" placeholder="Enter Email Address..." name="txtuname" required=" " >
					<input type="password" placeholder="Password..." name="txtpass" required=" " >
					<!-- <div class="forgot">
						<a href="#">Forgot Password?</a>
					</div> -->
					<input type="submit" name="btnlogin" onclick="return validateEmail()" value="Login">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="registered.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
	<?php
										$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("connection not establish");
                                        error_reporting(0);
                                        session_start();
                                        if(isset($_POST['btnlogin']))
                                        {
                                            $uname=$_POST['txtuname'];
                                            $pass=$_POST['txtpass'];	
                                            $q=mysqli_query($conn,"select * from tbluser_master where user_email='$uname' and user_pass='$pass'");
                                            $row=mysqli_fetch_array($q);
                                            $res=mysqli_num_rows($q);
                                            if($res>0)
                                            {
                                                if($row['user_status']==1)
                                                {
        	                                       
			                                        $_SESSION['userid']=$row[0];
		                                            echo '<script>window.location.href="index.php";</script>';
                                                }
                                                else
                                                {
													echo '<script>alert("You have not done email verification yet please enter the otp on the next page")</script>';
													$otp=rand(1000,9999);
													$uid=$row[0];
													$q2=mysqli_query($conn,"update tbluser_master set user_otp=$otp where user_id=$uid");
													if(!$q2)
													{
														echo '<script>alert("something error")</script>';
													}
													$to_email = $row[5];
													$subject = "JimmyShopping.com Otp verfication";
													$body = $otp." is your otp for verifying your account on JimmyShopping.com";
													$headers = "From: jimmyshopping@services.com";
													if (mail($to_email, $subject, $body, $headers)) 
													{
														echo '<script>window.location.href="otp.php?uid='.$uid.'";</script>';
													}
													else 
													{
    													echo '<script>alert("Otp sending failed please check your mail Id...")</script>';
													}
                                                }
                                            }
                                            else
                                            {
                                                echo '<script>alert("Invalid Username Or Password")</script>'; 
                                            }
                                        }
                                    ?>
<?php
include('fff.php');
?>