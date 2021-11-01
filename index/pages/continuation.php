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
<meta name="description" content=" Owutech Portal :: Admission Registration Form">

<title>:: Owutech Portal :: Admission Registration Form</title>
<!-- Favicon-->
<link rel="icon" href="assets/images/logo.png" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">  
<script>
var loadFile = function(event) {
	var image = document.getElementById('output');
	image.src = URL.createObjectURL(event.target.files[0]);
};
</script>
</head>

<body class="theme-blush">


<div class="authentication">
    <div class="container">
        <div class="row">
       
        <div class="col-lg-4" style="display: block; margin-left: auto;margin-right: auto;" >
                <form class="card auth_form" method="POST" action="../backend/add.php"  enctype="multipart/form-data">
                    <div class="header">
                    <img class="logo" src="assets/images/logo.png" alt="">
                        <h5>Admission Registration Form  </h5>
                        <br>
                        <br>
                        <strong> <h5 style="color: red;">Form Number : <?php echo $formnum?> </h5></strong>
                        <small >Keep this number, it will be your reference number</small>
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
                        <p><img id="output" width="200" /></p>
                        <input type="file" name ="picx"  id="file"  onchange="loadFile(event)" max-size="1000" accept ="image/png, image/jpg, image/jpeg" required = "yes" >
                         <label for="file"><strong><small>Passport Photograph - Not more than 100kb : PNG, JPG only</small> </strong></label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">Upload Passport :: Proceed</button>
                        <a href="../index.php" class="btn btn-danger btn-block waves-effect waves-light">Cancel Application</a>                        
                       
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