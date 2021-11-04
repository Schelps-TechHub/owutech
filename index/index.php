<?php
include "backend/dbconfig.php";
?>
<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content=" Owu College of Management Technology">

<title>:: Owutech Portal</title>
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
        <div class="col-lg-8 col-sm-12">
        <div class="header" >
                        <img class="logo" style="display: block; margin-left: auto;margin-right: auto;" src="assets/images/logo.png" alt="">
                        <br>
                        <h5 style="text-align: center;"> New Student :: Begin Application</h5>
                        <br>
                        <br>
                        <br>
        </div>
        <div class="row clearfix">
                <div class="col-lg-4 col-md-12">
                    <div class="card small_mcard_1">
                        <div class="user">
                            <img src="assets/images/landingpage/apply.jpg" alt="profile-image">
                            <div class="details">                                
                                
                            <a href="./pages/continuation.php" type="button"  class="btn btn-primary">Apply</a>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="progress-container progress-primary">
                                <span class="progress-badge"></strong>Fill Registration Form</strong></span>
                                <div class="progress">
                                <div class="progress-bar progress-bar-primary" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card small_mcard_1">
                        <div class="user">
                            <img src="assets/images/landingpage/print.png" alt="profile-image">
                            <div class="details">                                
                               
                                <a href="./pages/formcheck.php" type="button"  class="btn btn-warning">Continue</a>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="progress-container progress-warning">
                                <span class="progress-badge"><strong>Complete Registration  </strong></span>
                                <div class="progress">
                                <div class="progress-bar progress-bar-warning" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="card small_mcard_1">
                        <div class="user">
                            <img src="assets/images/landingpage/check.jpg" alt="profile-image">
                            <div class="details">                                
                                
                            <a href="./pages/checkadmission.php" type="button"  class="btn btn-success">Check</a>
                            </div>
                        </div>
                        <div class="footer">
                            <div class="progress-container progress-success">
                                <span class="progress-badge"><strong> Check Admission Status </strong> </span>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;">
                                        <span class="progress-value"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>        
        </div>
            <div class="col-lg-4 col-sm-12">
                <form method="POST" action="../student/backend/dologin.php" class="card auth_form">
                    <div class="header">
                        <img class="logo" src="assets/images/logo.png" alt="">
                        <h5> Existing Student :: Log in</h5>
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
                            <input type="text" class="form-control" placeholder="Username" required="yes" name="uniqueid">
                            <div class="input-group-append">
                                <span class="input-group-text"><i class="zmdi zmdi-account-circle"></i></span>
                            </div>
                        </div>
                        <div class="input-group mb-3">
                            <input type="password" class="form-control" placeholder="Password" required="yes" autocomplete="new-password" name="uniquekey">
                            <div class="input-group-append">                                
                                <span class="input-group-text"><a href="forgot-password.html" class="forgot" title="Forgot Password"><i class="zmdi zmdi-lock"></i></a></span>
                            </div>                            
                        </div>
                        <div class="checkbox">
                            <input id="remember_me" type="checkbox" required="yes">
                            <label for="remember_me">Remember Me</label>
                        </div>
                        <button type="submit" class="btn btn-primary btn-block waves-effect waves-light">SIGN IN</button>                        
                       
                    </div>
                </form>
                <div class="copyright text-center">
                    &copy;
                    <script>document.write(new Date().getFullYear())</script>,
                    <span>Developed for Owu College of Management Technology by <a href="https://schelps.com.ng"> SCHELPS</a></span>
                </div>
            </div>
           
        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script>
<script src="assets/bundles/vendorscripts.bundle.js"></script>
</body>


</html>