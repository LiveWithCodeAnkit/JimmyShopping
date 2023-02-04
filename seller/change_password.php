<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Forgot Password</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">


<?php
include('conn.php');
$id=$_GET['c'];
if(isset($_POST['btnrp']))
{
    $old=$_POST['txtoldp'];
    $new=$_POST['txtnp'];

    $q=mysqli_query($conn,"select * from seller_master where seller_id=$id");
    $row=mysqli_fetch_array($q);
    if($old==$row['seller_password'])
    {
        $i=mysqli_query($conn,"update seller_master set seller_password='$new' where seller_id=$id");
        ?>
        <script>
            alert("Your Password Is Successfully Changed");
        </script>
        <?php
        header('location:Seller_home.php');
    }
    else
    {
    ?>
    <script>
        alert("Your Old Password Is Doesn't Match");
    </script>
    <?php    
    }
}


?>



        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Change Your Password?</h1>
                                        
                                    </div>
                                    <form class="user" method="post">
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Enter Old Password" name="txtoldp">
                                        </div>

                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                placeholder="Enter New Password" name="txtnp">
                                        </div>

                                        <button type="submit" name="btnrp" class="btn btn-primary btn-user btn-block">Reset Password</button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="regis_seller.php">Create an Account!</a>
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