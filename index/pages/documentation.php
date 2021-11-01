<?php
include "../backend/dbconfig.php";
if(!isset($_SESSION['formid']) &&  !isset($_SESSION['formid'])){
    header('Location: ../index.php');
  }

  else {
    $formnum = $_SESSION['formid'];
  }
 
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
  
        function getolevelsize() {
    var uploadField = document.getElementById("olevel");
if(uploadField.files[0].size > 102400){
       alert("O level File is too big!");
       uploadField.value = "";
    };
};
</script>
<script>
  
        function getoriginsize() {
    var uploadField = document.getElementById("origin");
if(uploadField.files[0].size > 102400){
       alert("Certificate of Origin File is too big!");
       uploadField.value = "";
    };
};
</script>
<script>
  
        function getbirthsize() {
    var uploadField = document.getElementById("birth");
if(uploadField.files[0].size > 102400){
       alert("Birth Certificate File is too big!");
       uploadField.value = "";
    };
};
</script>
</head>

<body class="theme-blush">


<div class="authentication">
    <div class="container">
        <div class="row">
       
            <div class="col-lg-6" style="display: block; margin-left: auto;margin-right: auto;" >
                <form class="card auth_form" method="POST" action="../backend/docupload.php"  enctype="multipart/form-data">
                    <div class="header">
                    <img class="logo" src="assets/images/logo.png" alt="">
                        <h5>Admission Registration Form  </h5>
                        
                       
                        <strong> <h5>Document Upload</h5></strong>
                        <strong> <h6 style="color: red;">Form Number : <?php echo $formnum?> </h6></strong>
                        
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
                        <strong><p style="color: red;">1. Upload O level Results</p></strong>
                        <br> <label for="file"><strong><small>  :: Not more than 100kb : PDF only</small> </strong></label>
                        <input type="file" name ="olevel" id ="olevel" accept ="application/pdf" onchange = "getolevelsize();" required = "yes" >
                         
                        </div>
                        <div class="input-group mb-3">
                        <strong><p style="color: red;">2. Upload Certificate of Origin </p></strong>
                        <br><label for="file"><strong><small> :: Not more than 100kb : PDF only</small> </strong></label>
                        <input type="file" name ="origin" id ="origin" accept ="application/pdf" onchange = "getoriginsize();" required = "yes" >
                         
                        </div>
                        <div class="input-group mb-3">
                        <strong><p style="color: red;">3. Upload Birth Certificate  </p></strong>
                        <br> <label for="file"><strong><small>  :: Not more than 100kb : PDF only</small> </strong></label>
                        <input type="file" name ="birth"  id ="birth"  accept ="application/pdf" onchange = "getbirthsize();" required = "yes" >
                         
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