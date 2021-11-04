<?php
include "dbconfig.php";

//Get IP details
$browser =  $_SERVER['HTTP_USER_AGENT'];
$uip =  $_SERVER['REMOTE_ADDR'];
$LocationArray = json_decode( file_get_contents('https://ipwhois.app/json/8.8.4.4'), true);
$country = $LocationArray['country'];	
$city = $LocationArray['city'];
$region = $LocationArray['region'];
$timezone =  $LocationArray['timezone_gmt'];

//collect data
$regpwd = mysqli_real_escape_string($con,$_POST['regpwd']);
$regnum = $_SESSION['userid'];

$pin = password_hash($regpwd, PASSWORD_BCRYPT);

// insert into database
$sql= "INSERT INTO  `pass_pin` 
(regnum, pwd, access)  
VALUES ('$regnum','$pin', 1)";
if(mysqli_query($con, $sql)){

    function generateRandomString($length = 16) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
             $token = generateRandomString();
             $status = 1;
             $mytype = "student";

         $sql= "INSERT INTO  capslog (userid, token, `status`, ip, country, region, city, timezone, `type`, browser)  
         VALUES ('$regnum','$token', '$status', '$uip','$country', '$region', '$city', '$timezone', '$mytype', '$browser')";
            if(mysqli_query($con, $sql)){	
  
$feedback = ' 
<div class="alert alert-success alert-has-icon">
     <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Success</div>
            <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
            Portal Enrolment Access Successfully Created for '.$regnum.'
         </div>
</div>';

$_SESSION['acctinfo'] = $feedback;
$_SESSION['uniqueid'] = $regnum;
$_SESSION['token'] = $token;
header('Location: ../pages/welcome.php');
}
}
else{
  $feedback =  '
    <div class="alert alert-warning alert-has-icon">
                  <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                  <div class="alert-body">
                  <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
                    <div class="alert-title">Error</div>
                    Unable to complete Portal Enrolment. Try Again Later
                  </div>
                </div>';
                $_SESSION['reginfo'] = $feedback;
            header('Location: ../pages/onboard.php');
}
