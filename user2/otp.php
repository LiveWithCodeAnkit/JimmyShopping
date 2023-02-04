<?php
include('hhh.php');
?>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">OTP Verfication page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- login -->
	<div class="login">
		<div class="container">
			<h2>Verfiy Otp</h2>
		
			<div class="login-form-grids animated wow slideInUp" data-wow-delay=".5s">
				<form method="post">
					<input type="text" placeholder="Enter your 4 digit OTP sent to your email..." name="txtotp" required=" " >
					<div class="forgot">
						<a href="#">Didn't Recieve OTP? Resend</a>
					</div>
					<input type="submit" name="btnverify" value="Verify">
				</form>
			</div>
			<h4>For New People</h4>
			<p><a href="registered.php">Register Here</a> (Or) go back to <a href="index.php">Home<span class="glyphicon glyphicon-menu-right" aria-hidden="true"></span></a></p>
		</div>
	</div>
    <?php
										$conn=mysqli_connect("localhost","root","","jimmyshoping") or die("connection not establish");
                                        error_reporting(0);
                                        $uid=$_GET['uid'];
                                        session_start();
                                        if(isset($_POST['btnverify']))
                                        {	
                                            $q=mysqli_query($conn,"select * from tbluser_master where user_id=$uid");
                                            $row=mysqli_fetch_array($q);
                                            $otp=$row[12];
                                            if($otp==$_POST['txtotp'])
                                            {
                                                $q2=mysqli_query($conn,"update tbluser_master set user_status=1 where user_id=$uid");
                                                if($q2)
                                                {
                                                    $_SESSION['loggedin']=true;
			                                        $_SESSION['userid']=$row[0];
                                                    echo '<script>alert("verification succesfull")</script>';
		                                            echo '<script>window.location.href="index.php";</script>';
                                                }
                                                else
                                                {
                                                    echo '<script>alert("something is wrong")</script>';
                                                }
                                            }
                                            else
                                            {
                                                echo '<script>alert("wrong otp please try again")</script>';
                                            }
                                        }
include('fff.php');
?>