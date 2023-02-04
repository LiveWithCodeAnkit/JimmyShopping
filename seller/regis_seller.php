
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>JimmyShoping Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
    <script type = "text/javascript">
      // Form validation code will come here.
      function validate() {
      
         if( document.myForm.txtfname.value == "" ) {
            alert( "Please provide your first name!" );
            document.myForm.txtfname.focus() ;
            return false;
         }
         if( document.myForm.txtlname.value == "" ) {
            alert( "Please provide your last name!" );
            document.myForm.txtlname.focus() ;
            return false;
         }
         if( document.myForm.txtcom_name.value == "" ) {
            alert( "Please provide your company name!" );
            document.myForm.txtcom_name.focus() ;
            return false;
         }
		 if( document.myForm.txtcom_add.value == "" ) {
            alert( "Please provide your Company Address!" );
            document.myForm.txtcom_add.focus() ;
            return false;
         }
         if( document.myForm.txtemail.value == "" ) {
            alert( "Please provide your Email!" );
            document.myForm.txtemail.focus() ;
            return false;
         }
         if( document.myForm.txtphoneno.value == "" || isNaN( document.myForm.txtphoneno.value ) ||
            document.myForm.txtphoneno.value.length != 10 ) {
            
            alert( "Please provide a Phone no. FIx 10 charactors only numbers." );
            document.myForm.txtphoneno.focus() ;
            return false;
         }
         if( document.myForm.txtpass.value == "" ) {
            alert( "Please provide your Password!" );
            return false;
         }
         if( document.myForm.txtaadhar_no.value == "" || isNaN( document.myForm.txtaadhar_no.value ) ||
            document.myForm.txtaadhar_no.value.length != 12 ) {
            
            alert( "Please provide a Aadhar No. Fix 12 charactors only numbers." );
            document.myForm.txtaadhar_no.focus() ;
            return false;
         }
         return( true );
    }
   //-->
   		function validateEmail() {
         	var emailID = document.myForm.txtemail.value;
         	atpos = emailID.indexOf("@");
         	dotpos = emailID.lastIndexOf(".");
         
        	if (atpos < 1 || ( dotpos - atpos < 2 )) {
            	alert("Please enter correct email ID");
            	document.myForm.txtemail.focus() ;
            	return false;
         	}
			return true;
      	}
		function CheckPassword(){ 
			var inputtxt=document.myForm.txtpass;
			var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			if(inputtxt.value.match(decimal)) 
			{ 
					return true;
				
			}
			else
			{
				alert('Password should contain atleast 1 uppercase 1 lowercase and 1 special charector!')
				return false;
			}
		} 

</script>
</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <!--<div class="col-lg-5 d-none d-lg-block bg-register-image"></div>-->
					
                    <div class="col-lg-10">
                        <div class="p-5">
                        <div class="text-center">
                        <h1 class="h4 mb-4" style="color: darkblue;text-weight:bold; text-shadow: 2px 1px;">JimmyShopping-Seller</h1></div>
                            <div class="text-center">
                               <h2 class="h4 text-gray-900 mb-4">Create Seller Account</h2>
                            </div>
							
                            <form class="user" method="post" name="myForm" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="text" class="form-control form-control-user" id="exampleFirstName"
                                            placeholder="First Name" name="txtfname" required>
                                    </div>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="exampleLastName"
                                            placeholder="Last Name" name="txtlname" required>
                                    </div>
									
                                </div>
									
									<div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleCompanyName"
                                            placeholder="Company Name" name="txtcom_name"required>
                                    </div>
									
									<div class="form-group">
                                    <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                                        placeholder="Email Address" name="txtemail" required>
									</div>
									
									
									<div class="form-group">
                                        <input type="number" class="form-control form-control-user" id="examplePhoneNo"
                                            placeholder="Phone NO" name="txtphoneno" required>
                                    </div>
									 <div class="form-group row">
									<div class="col-sm-6 mb-3 mb-sm-0">
											<input type="password" class="form-control form-control-user"
												id="exampleInputPassword" placeholder="Password" name="txtpass" required>
										</div>
										<div class="col-sm-6">
											<input type="text" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password" name="txtcpass" required>
										</div>
									</div>
									
									<div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="exampleCompanyAddress"
                                            placeholder="Company Address"  name="txtcom_add" required>
									</div>
									
									<div class="form-group">
                                    <input type="file" class="form-control" style="border: 1px solid #ccc; display: inline-block; padding: 6px 12px; cursor: pointer; border-radius: 20px;" name="image">
									</div>
									
								<div class="form-group row">
								
									<div class="col-sm-6">
                                        <input type="text" class="form-control form-control-user" id="examplePancardNo"
                                            placeholder="Pancard NO"  name="txtpancard_no"required>
                                    </div>
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <input type="number" class="form-control form-control-user" id="exampleAadhaarCard No"
                                            placeholder="AadhaarCard NO" name="txtaadhar_no"required>
                                    </div>
                                    	
                                </div>
									
                              
                                <button class="btn btn-primary btn-user btn-block" type="submit" onclick="return validateEmail() && CheckPassword() && validate()" name="btnsignup">
                                    SignUp
                                </button>
                                <hr>
                               <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                    <i class="fab fa-google fa-fw"></i> Register with Google
                                </a>
                                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                    <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                                </a>-->
                            </form>
							
							
							<?php
									$conn=mysqli_connect("localhost","root","","jimmyshoping")or die("Connection Not Estalabish");

									if(isset($_POST["btnsignup"]))
									{
										$first=$_POST["txtfname"];
										$last=$_POST["txtlname"];
										$com_name=$_POST['txtcom_name'];
										$phone=$_POST['txtphoneno'];
										
										$adhar=$_POST['txtaadhar_no'];
										$pancard=$_POST['txtpancard_no'];
										$email=$_POST['txtemail'];
										$com_add=$_POST['txtcom_add'];
										$pass=$_POST['txtpass'];
										$cpass=$_POST['txtcpass'];
										$filename=$_FILES["image"]['name'];
										$filetemp=$_FILES["image"]['tmp_name'];
										$dat=date("Y/m/d");
										$q2=mysqli_query($conn,"select * from tblseller_master where seller_email='$email' or seller_phone_no=$phone");
				                        $row2=mysqli_num_rows($q2);
                                        if($row2>0)
				                        {
					                        echo '<script>alert("email or phone no. already registered please enter different email or phone no."); window.location.href="regis_seller.php";</script>';
					                        exit("");
				                        }
										if(ctype_alpha($first) === false and ctype_alpha($last)=== false) 
										{
											echo '<script>alert("Digits and special charecter not allow")</script>'; 	
												
										}
										else
										{
												if($pass==$cpass)  
												{

													$q=mysqli_query($conn,"insert into tblseller_master values(null,1,'$first','$last','$com_name','$email','$phone','$pass','$com_add','$filename','$pancard','$adhar','$dat',0)");
													
													if($q)
														{	
															move_uploaded_file($filetemp,"Images/".$filename);
															echo '<script>window.location.href="seller_login.php";</script>';
															
														}
														else	
														{
															echo "Sorry Not Register";
														}
												}
												else
												{
													echo"<script>alert('Confirm Password Doesn\'t Match');</script>";
												}
										}
									}
											
                            ?>
							
							
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgetpass.php">Forgot Password?</a>
                            </div>
                            <div class="text-center">
                                <a class="small" href="seller_login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>