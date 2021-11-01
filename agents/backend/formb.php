<<?php
include "../backend/dbconfig.php";
?>
<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>:: Owutech Admission Advisor :: Home</title>
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/loader.svg" width="48" height="48" alt="Aero"></div>
        <p>Owutech Admission Advisor...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>


<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
      
        <li><a href="sign-in.html" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
        <a href="index.html"><img src="assets/images/logo.png" width="25" alt="Aero"><span class="m-l-10"> Owutech :: </span></a>
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.html"><img src="assets/images/profile_av.jpg" alt="User"></a>
                    <div class="detail">
                        <h4>Michael</h4>
                        <small>Admission Advisor</small>                        
                    </div>
                </div>
            </li>
            <li class="active open"><a href="index.html"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class=" open"><a href="index.html"><i class="zmdi zmdi-home"></i><span>My Profile</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Registration Form</span></a>
                <ul class="ml-menu">
                    <li><a href="admissionform.php">New Application</a></li>
                    <li><a href="chat.html">Registration Forms</a></li>                   
                </ul>
            </li>
            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Admission Letter</span></a>
                <ul class="ml-menu">
                    <li><a href="mail-inbox.html">Check Admission Status</a></li>
                    <li><a href="chat.html">Print Admission Letter</a></li>                   
                </ul>
            </li>
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->

<?php
$formnum  = $_SESSION["formid"] ;
?>
<section class="content">
<div id="feedback">

</div> 
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Registration Form Number : <?php echo $formnum; ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Owutech</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admission Advisor</a></li>
                        <li class="breadcrumb-item active">Registration Form - Page 2</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
    </div>

        <div class="container-fluid">
            <!-- Registration Form -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                    <form method="POST" action="../backend/formd.php"  enctype="multipart/form-data" >
                    <!-- Bio Data -->   
                    <div class="body">
                          
                   
                    <div class="col-lg-4 col-md-4 col-sm-8">
                                         <div class="card">
                                                <div class="header">
                                                  
                                                </div>
                                   <div class="body">
                                                
                                    <input type="file" name ="file" required = "yes" class="dropify" data-max-file-size="100K" data-allowed-file-extensions="jpg jpeg png">
                                      <label for="file"><small>Passport Photograph - Not more than 100kb : PNG, JPG only</small></label>
                               </div>
                          </div> 
                      </div>
                      
                                     


<div class="col-lg-6 col-md-6 col-sm-8">
  <input type = "submit" class="btn btn-raised btn-success btn-lg btn-block btn-round waves-effect" value="Upload Passport"/>
</div>
   
    


                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Stater Page</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Aero</a></li>
                        <li class="breadcrumb-item active">Pages</li>
                        <li class="breadcrumb-item active">Stater Page</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Stater</strong> page</h2>
                        </div>
                        <div class="body">
                        <form method="POST" action="../backend/formd.php"  enctype="multipart/form-data" >
                    <!-- Bio Data -->   
                    <div class="body">
                          
                   
                    <div class="col-lg-4 col-md-4 col-sm-8">
                                         <div class="card">
                                                <div class="header">
                                                  
                                                </div>
                                   <div class="body">
                                                
                                    <input type="file" name ="file" required = "yes" class="dropify" data-max-file-size="100K" data-allowed-file-extensions="jpg jpeg png">
                                      <label for="file"><small>Passport Photograph - Not more than 100kb : PNG, JPG only</small></label>
                               </div>
                          </div> 
                      </div>
                      
                                     


<div class="col-lg-6 col-md-6 col-sm-8">
  <input type = "submit" class="btn btn-raised btn-success btn-lg btn-block btn-round waves-effect" value="Upload Passport"/>
</div>
   
    


                    </div>
                    </form>  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js -->
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<script src="assets/plugins/dropify/js/dropify.min.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/forms/dropify.js"></script>
</body>


</html>