<?php
include "../backend/dbconfig.php";
function generateRandomString($length = 8) {
    $characters = '012345678909876543210';
    $charactersLength = strlen($characters);
    $randomString = '';
    for ($i = 0; $i < $length; $i++) {
        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }
    return $randomString;
}
		 $token = generateRandomString();
         $formnum ="REG".$token;
         $_SESSION["formid"] = $formnum;
?>

<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content=" Owutech Admission Advisor :: Registration Form">

<title>:: Owutech Admission Advisor :: Registration Form</title>
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
       
            <div class="col-lg-4 col-sm-12 offset-4" >
                <form class="card auth_form" method="POST" action="../backend/add.php"  enctype="multipart/form-data">
                    <div class="header">
                    <img class="logo" src="assets/images/logo.png" alt="">
                        <h5>Admission Registration Form  </h5>
                        <br>
                        <br>
                        <strong> <p>Form Number : <?php echo $formnum?> </p></strong>
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
                        <strong><p>Upload Passport </p></strong>
                        <input type="file" name ="picx" max-size="1000" accept ="image/png, image/jpg, image/jpeg" required = "yes" >
                         <label for="file"><strong><small>Passport Photograph - Not more than 100kb : PNG, JPG only</small> </strong></label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Upload Passport :: Proceed</button>
                        <a href="welcome.php" class="btn btn-danger btn-block waves-effect waves-light">Cancel Application</a>                        
                       
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