<?php
include('hhh.php');
?>
<script language="javascript" type="text/javascript">
function getXMLHTTP() 
{ 
  var xmlhttp=false; 
  xmlhttp=new XMLHttpRequest();  
  return xmlhttp;
}
function getScat(sid) 
{ 
  var strURL="city.php?cid="+sid;
  var req = getXMLHTTP();
  
  if (req) 
  {
     req.onreadystatechange = function(){
       if (req.readyState == 4  && req.status == 200) 
       {
            //alert(req.responseText);
            document.getElementById('city').innerHTML=req.responseText;
	   }
     }
  	req.open("GET", strURL, true);
    req.send();
  } 
}
</script>
<script type = "text/javascript">
   <!--
      // Form validation code will come here.
      function validate() {
      
         if( document.myForm.fullname.value == "" ) {
            alert( "Please provide your name!" );
            document.myForm.fullname.focus() ;
            return false;
         }
		 if( document.myForm.addr.value == "" ) {
            alert( "Please provide your Address!" );
            document.myForm.addr.focus() ;
            return false;
         }
         if( document.myForm.email.value == "" ) {
            alert( "Please provide your Email!" );
            document.myForm.email.focus() ;
            return false;
         }
         if( document.myForm.phno.value == "" || isNaN( document.myForm.phno.value ) ||
            document.myForm.phno.value.length != 10 ) {
            
            alert( "Please provide a Phone no. in onlu 10 charactor only numbers." );
            document.myForm.phno.focus() ;
            return false;
         }
         if( document.myForm.pass.value == "" ) {
            alert( "Please provide your Password!" );
            return false;
         }
         return( true );
    }
   //-->
   		function validateEmail() {
         	var emailID = document.myForm.email.value;
         	atpos = emailID.indexOf("@");
         	dotpos = emailID.lastIndexOf(".");
         
        	if (atpos < 1 || ( dotpos - atpos < 2 )) {
            	alert("Please enter correct email ID");
            	document.myForm.email.focus() ;
            	return false;
         	}
			return true;
      	}
		function CheckPassword(){ 
			var inputtxt=document.myForm.pass;
			var decimal=  /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
			if(inputtxt.value.match(decimal)) 
			{ 
				if(inputtxt==document.myForm.pasc)
				{
					return true;
				}
				else
				{
					alert("password and confirm password not matching");
					return false;
				}
				
			}
			else
			{
				alert('Password should contain atleast 1 uppercase 1 lowercase and 1 special charector!')
				return false;
			}
		} 

</script>
<div class="breadcrumbs">
		<div class="container">
			<ol class="breadcrumb breadcrumb1 animated wow slideInLeft" data-wow-delay=".5s">
				<li><a href="index.php"><span class="glyphicon glyphicon-home" aria-hidden="true"></span>Home</a></li>
				<li class="active">Registration Page</li>
			</ol>
		</div>
	</div>
<!-- //breadcrumbs -->
<!-- register -->
	<div class="register">
		<div class="container">
			<h2>Register Here</h2>
			<div class="login-form-grids">
				<h5>profile information</h5>
				<form action="" method="post" name="myForm" enctype="multipart/form-data">
					<input type="text" placeholder="Full Name..." name="fullname" id="fullname" required=" ">
                    <br>
                    <select name="gender" id="gender" required>
                    <option value='' disabled selected>--Select Gender--</option>
                    <option>Male</option>
                    <option>Female</option>
                    </select>
                    <br><br>
                    <textarea rows='3' cols='50' name="addr" placeholder="Enter Full Address with Pincode..."></textarea>
                    <br><br>
					<select name="state" id="state" onChange="getScat(this.value)" required>
                    <option value='' disabled selected>--Select State--</option>
					<?Php
                                // connection to database
                                $sql=mysqli_query($conn,"select * from tlbstate"); // Query to collect data from table 
                                while($data = mysqli_fetch_row($sql))
                                {
                                    echo "<option value=$data[0]>".$data[1]."</option>"; // displaying data in option menu
                                }
                                
                    ?>
                    </select>
                    <br><br>
                    <select name="city" id="city" required>
                    <option value='' disabled selected>--Select City--</option>
                    </select>
                    <br><br>
                    <div class="form-group">
                    Add Profile Pic...
                    <input type="file" class="form-control form-control-user" name="image">
					</div>
				<!--</form>-->
				<!--<div class="register-check-box">
					<div class="check">
						<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>Subscribe to Newsletter</label>
					</div>
				</div>-->
				<h6>Login information</h6>
					<!--<form action="#" method="post" enctype="multipart/form-data">-->
					<input type="text" placeholder="Email Address" name="email" id="email   " required=" " ><br>
                    <input type="text" placeholder="Phone No." name="phno" id="phno" required=" " >
					<input type="password" placeholder="Password" name="pass" id="pass" required=" " >
					<input type="password" placeholder="Password Confirmation" name="pasc" id="pasc" required=" " >
					<!--<div class="register-check-box">
						<div class="check">
							<label class="checkbox"><input type="checkbox" name="checkbox"><i> </i>I accept the terms and conditions</label>
						</div>
					</div>-->
					<input name="btnsubmit" type="submit" onclick="return validateEmail() && CheckPassword() && validate()"  value="Register">
				</form>
			</div>
			<?php
			if(isset($_POST["btnsubmit"]))
			{
				$fullname=$_POST['fullname'];
				$gender=$_POST['gender'];
                $address=$_POST['addr'];
				$state=$_POST['state'];
				$city=$_POST['city'];
				$filename=$_FILES["image"]['name'];
				$filetemp=$_FILES["image"]['tmp_name'];
				$email=$_POST['email'];
				$phno=$_POST['phno'];
				$pass=$_POST['pass'];
				$pasc=$_POST['pasc'];
				$rdate=date('Y-m-d');
				$q2=mysqli_query($conn,"select * from tbluser_master where user_email='$email' or user_phone=$phno	");
				$row2=mysqli_num_rows($q2);
				if($row2>0)
				{
					echo '<script>alert("email or phone no. already registered please enter different email or phone no."); window.location.href="registered.php";</script>';
					exit("");
				}
				if($pass==$pasc)  
				{	
					$q=mysqli_query($conn,"insert into tbluser_master values(null,'$fullname','$gender','$state','$city','$email','$phone','$address','$pass','$filename',0,'$rdate',null)");								
					if($q)
					{	
						move_uploaded_file($filetemp,"Profile/".$filename);
						echo '<script>alert("Please login to verify your account")</script>';
						echo '<script>window.location.href="login.php";</script>';
					}
					else	
					{
						echo '<script>alert("Sorry coulden\'t register please check your details and try again")</script>';
					}
				}
				else
				{
					echo '<script>alert("Confirm Password isn\'t Matching")</script>';
				}
			}
			?>
			<div class="register-home">
				<h4> Already have an account ></h4><br>
				<a href="login.php">LogIn</a>
			</div>
		</div>
	</div>
    <?php
    include('fff.php');
    ?>