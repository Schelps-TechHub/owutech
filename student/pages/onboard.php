<?php
include "../backend/dbconfig.php";
if(isset($_SESSION['tref']) && isset($_SESSION['userid'])){
   
    $tref = $_SESSION['tref'];
    $formid = $_SESSION['userid'];
    $sql = "SELECT * FROM `all_transaction` WHERE tref  = '$tref' and feeid = 1";
			$result=mysqli_query($con,$sql);
             $row=mysqli_fetch_array($result);
                        $paystatus = "$row[paystatus]";
                        $userid = "$row[userid]";

if ($paystatus == '1' && $userid == $formid){

    $sql = "SELECT * FROM form_bio WHERE regnum  = '$formid'";
			$result=mysqli_query($con,$sql);
             $row=mysqli_fetch_array($result);
                        $firstname = "$row[firstname]";
                        $othername = "$row[othername]";
                        $surname = "$row[surname]";
                        $passport = "$row[passport]";
}
else {
    
$_SESSION['reginfo'] =  ' 
<div class="alert alert-warning alert-has-icon">
     <div class="alert-icon"><i class="
     far fa-hand-paper"></i></div>
        <div class="alert-body">
            <div class="alert-title">Ooops!</div>
            <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
           Sorry! Your Payment has not been completed
         </div>
</div>';
    header('Location: ../../index/pages/checkadmission.php');
  }
  }
  else {
      
$_SESSION['reginfo'] =  ' 
<div class="alert alert-warning alert-has-icon">
     <div class="alert-icon"><i class="
     far fa-hand-paper"></i></div>
        <div class="alert-body">
            <div class="alert-title">Ooops!</div>
            <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
           Sorry! You have not made payment for Portal Enrolment
         </div>
</div>';
    header('Location: ../../index/pages/checkadmission.php');
  }
?>


<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content=" Owutech Portal :: New Student Enrolment">

<title>:: Owutech Portal :: Onboard New Student</title>
<!-- Favicon-->
<link rel="icon" href="assets/images/logo.png" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">  
<script>
    function checkpwd(){
       var a = document.getElementById("regpwd").value;
   var b = document.getElementById("regpwdb").value;
   var c = document.getElementById("createpwd");
   if( a.length >= 20){
    alert("Password must not be more than 20 characters"); 
    c.disabled = true;
   }
   if( a.length <= 5){
    alert("Password must be more than 5 characters"); 
    c.disabled = true;
   }
   if (a != b){
    alert("Password must be thesame");
    c.disabled = true;
   }
   else if(a === b){
    c.disabled = false;
   }

    }
  
</script>
 
</head>

<body class="theme-blush">


<div class="authentication">
    <div class="container">
        <div class="row">
       
        <div class="col-lg-4" style="display: block; margin-left: auto;margin-right: auto;" >
                <form class="card auth_form" method="POST" action="../backend/onboard.php">
                    <div class="header">
                    <img class="logo" src="assets/images/logo.png" alt="">
                       <strong> <h5>Create Portal Password </h5></strong>
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
                    <img class="logo" src="../../index/backend/image/<?php echo $passport ?>" alt="">
                    <br><br>
                    <p> <?php echo strtoupper($firstname." ".$othername." ".$surname) ?></p>
                    <div class="input-group mb-3">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="zmdi zmdi-laptop"></i></span>
                     </div>   
                    <input type="text" class="form-control" name="regnum" value="<?php echo $formid ?>" disabled >
                           
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-append">
                      <span class="input-group-text"><i class="zmdi zmdi-key"></i></span>
                     </div>   
                    <input type="password" class="form-control" id="regpwd"  name="regpwd" placeholder="Enter Password ********" minlength="6" maxlength="20" onchange="checkpwd();" >
                           
                    </div>
                    <div class="input-group mb-3">
                    <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-key"></i></span>
                            </div>     
                    <input type="password" class="form-control" id="regpwdb" placeholder="Re - Enter Password ********" minlength="6" maxlength="20" onchange="checkpwd();" >
                            
                    </div>

                    <div class="checkbox">
                    
                    <input id="remember_me" type="checkbox" onclick="showpwd()">
                   <label for="remember_me">Show Password</label>
                    </div>
                        <button type="submit" id="createpwd" disabled class="btn btn-success btn-block waves-effect waves-light">Create Password </button>                       
                       
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
<script>
    function showpwd() {
  var x = document.getElementById("regpwd");
  var y = document.getElementById("regpwdb");
  if (x.type === "password") {
    x.type = "text";
    y.type = "text";
  } else {
    x.type = "password";
    y.type = "password";
  }
}
    </script>
</body>


</html>