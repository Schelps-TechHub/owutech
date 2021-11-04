<?php
include "../backend/dbconfig.php";

if(!isset($_SESSION['uniqueid'])){
    header('Location: ../../index');
  }
  
  if(isset($_SESSION['uniqueid']) && isset($_SESSION['token'])){
  $id = $_SESSION['uniqueid'];
  $token = $_SESSION['token'];
  
  $sql ="SELECT * from `capslog` where userid = '$id' and token = '$token'";
  $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $status = $row['status'];
  $yes = 1;
  if($yes != $status){ 
  header('Location: ../../index');
  }
  
  }
  else {
  header('Location: ../../index');
  }

  

?>

<?php
$sql ="SELECT * from form_bio where regnum = '$id'";
$result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $firstname = $row['firstname'];
  $othername = $row['othername'];
  $surname = $row['surname'];
  $passport = $row['passport'];

  $sql ="SELECT `session` from `sessiontbl` where `status` = 1";
$result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $session = $row['session'];

  $sql ="SELECT `semester` from `semestertbl` where `status` = 1";
$result = mysqli_query($con,$sql);
  $row = mysqli_fetch_array($result);
  $semester = $row['semester'];
?>
<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content="Owu College of Management Technology :: Admission Advisor">
<title>:: Owutech Student Portal :: <?php echo$firstname." ".$othername." ".$surname ?></title>
<link rel="icon" href="assets/images/logo.png" type="image/x-icon"> <!-- Favicon-->
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
        <p>Owutech Student Portal...</p>
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
                    <a class="image" href="profile.php"><img src="../../index/backend/image/<?php echo$passport ?>" alt="User"></a>
                    <div class="detail">
                        <h4><?php echo$firstname." ".$othername." ".$surname ?></h4>
                        <small><?php echo$id ?></small>                        
                    </div>
                </div>
            </li>
            <li class="active open"><a href="welcome.php"><i class="zmdi zmdi-home"></i><span>Dashboard</span></a></li>
            <li class=" open"><a href="profile.php"><i class="zmdi zmdi-home"></i><span>My Profile</span></a></li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Course Registration</span></a>
                <ul class="ml-menu">
                    <li><a href="continuation.php">Cousre Registration</a></li>
                    <li><a href="myforms.php">Print Course Forms</a></li>                   
                </ul>
            </li>
            
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Documentation</span></a>
                <ul class="ml-menu">
                    <li><a href="#">Student Information Form</a></li>
                    <li><a href="#">Print Admission Letter</a></li>                   
                </ul>
            </li>
            <li><a href="javascript:void(0);" class="menu-toggle"><i class="zmdi zmdi-apps"></i><span>Payments</span></a>
                <ul class="ml-menu">
                    <li><a href="#">School Fees</a></li>
                    <li><a href="#">Payment Receipts</a></li>                   
                </ul>
            </li>
            <li class=" open"><a href="profile.php"><i class="zmdi zmdi-home"></i><span>My Results</span></a></li>
            
        </ul>
    </div>
</aside>

<!-- Right Sidebar -->

<!-- Main Content -->