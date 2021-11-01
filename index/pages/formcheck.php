<?php
include "../backend/dbconfig.php";

?>

<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content=" Owutech Portal :: Admission Registration Form">

<title>:: Owutech Portal :: Print Admission Form</title>
<!-- Favicon-->
<link rel="icon" href="assets/images/logo.png" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">  
 
</head>

<body class="theme-blush">


<div class="authentication">
    <div class="container">
        <div class="row">
       
        <div class="col-lg-4" style="display: block; margin-left: auto;margin-right: auto;" >
                <form class="card auth_form" method="POST" action="../backend/checkprint.php"  enctype="multipart/form-data">
                    <div class="header">
                    <img class="logo" src="assets/images/logo.png" alt="">
                        <h5>Complete Registration Form  </h5>
                        <br>
                       
                        <?php
							
                            if (isset($_SESSION['reginfo']) && $_SESSION['reginfo'])
                            {
                              printf('<b>%s</b>', $_SESSION['reginfo']);
                              unset($_SESSION['reginfo']);
                            }
                          ?>
                    </div>
                    <div class="body">
                    <div class="input-group mb-3">
                            <input type="text" class="form-control" name="regnum" placeholder="Enter Reg Number ...REG********" minlength="11" maxlength="11" >
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-search"></i></span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-warning btn-block waves-effect waves-light">Search Records </button>
                        <a href="../index.php" class="btn btn-danger btn-block waves-effect waves-light">Cancel </a>                        
                       
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Developed for Owutech by <a href="https://schelps.com.ng"> SCHELPS</a></span>
                </div>
            </div>
           
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
</body>


</html>