<?php
include "../backend/dbconfig.php";

if(!isset($_SESSION['uniqueid'])){
    header('Location: ../pages/user_login.php');
  }
  
  if(isset($_SESSION['uniqueid']) && isset($_SESSION['token'])){
  $id = $_SESSION['uniqueid'];
  $token = $_SESSION['token'];
  
  $sql ="SELECT * from `log` where userid = '$id' and token = '$token'";
  $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $status = $row['status'];
  $yes = 1;
  if($yes != $status){ 
  header('Location: ../pages/user_login.php');
  }
  
  }
  else {
  header('Location: ../pages/user_login.php');
  }

  

?>
<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Responsive Bootstrap 4 and web Application ui kit.">
<title>:: Owutech Admission Advisor :: Home</title>
<link rel="icon" href="favicon.ico" type="image/x-icon"> <!-- Favicon-->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/plugins/jvectormap/jquery-jvectormap-2.0.3.min.css"/>
<link rel="stylesheet" href="assets/plugins/charts-c3/plugin.css"/>
<link rel="stylesheet" href="assets/plugins/jquery-steps/jquery.steps.css">
<link rel="stylesheet" href="assets/plugins/morrisjs/morris.min.css" />
<link rel="stylesheet" href="assets/plugins/jquery-datatable/dataTables.bootstrap4.min.css">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/css/style.min.css">
<script> 
         function tg() { 
        document.getElementById("dbut").click();
        window.print();
        } </script>
</head>

<body class="theme-blush">

<!-- Page Loader -->
<div class="page-loader-wrapper">
    <div class="loader">
        <div class="m-t-30"><img class="zmdi-hc-spin" src="assets/images/logo.png" width="48" height="48" alt="Aero"></div>
        <p>Owutech Admission Advisor...</p>
    </div>
</div>

<!-- Overlay For Sidebars -->
<div class="overlay"></div>


<!-- Right Icon menu Sidebar -->
<div class="navbar-right">
    <ul class="navbar-nav">
      
        <li><a href="../backend/logout.php" class="mega-menu" title="Sign Out"><i class="zmdi zmdi-power"></i></a></li>
    </ul>
</div>

<!-- Left Sidebar -->
<aside id="leftsidebar" class="sidebar">
    <div class="navbar-brand">
        <button id="dbut" class="btn-menu ls-toggle-btn" type="button"><i class="zmdi zmdi-menu"></i></button>
      
    </div>
    <div class="menu">
        <ul class="list">
            <li>
                <div class="user-info">
                    <a class="image" href="profile.php"><img src="assets/images/logo.png" alt="User"></a>
                    <div class="detail">
                        <h4><?php echo $id ?></h4>
                        <small>Admission Advisor</small>                        
                    </div>
                </div>
            </li>
            <li class="active open"><a href="welcome.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class=" open"><a href="profile.php"><i class="zmdi zmdi-home"></i><span>My Profile</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Registration Form</span></a>
                <ul class="ml-menu">
                    <li><a href="continuation.php">New Application</a></li>
                    <li><a href="myforms.php">Registration Forms</a></li>                   
                </ul>
            </li>
            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Admission Letter</span></a>
                <ul class="ml-menu">
                    <li><a href="#">Check Admission Status</a></li>
                    <li><a href="#">Print Admission Letter</a></li>                   
                </ul>
            </li>
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->

<!-- Main Content -->