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
//collect data
$regnum = mysqli_real_escape_string($con,$_POST['uniqueid']);
$regpwd = mysqli_real_escape_string($con,$_POST['uniquekey']);



// check if your username exist
$sql = "SELECT count('regnum') FROM `pass_pin` WHERE regnum  = '$regnum'";
$result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result);
            $count = "$row[0]";

if($count == 1){
// check password
$sql = "SELECT pwd, access FROM `pass_pin` WHERE regnum  = '$regnum'";
$result=mysqli_query($con,$sql);
            $row=mysqli_fetch_array($result);
            $pwd = "$row[pwd]";
            $access = "$row[access]";

// compare pwd
 if (password_verify($regpwd, $pwd)) {
    if($access == 1){
    $sql= "UPDATE capslog SET status = 0 where userid = '$regnum' ";
    if(mysqli_query($con, $sql)){
    } 
   

         $sql= "INSERT INTO  capslog (userid, token, `status`, ip, country, region, city, timezone, `type`, browser)  
         VALUES ('$regnum','$token', '$status', '$uip','$country', '$region', '$city', '$timezone', '$mytype', '$browser')";
            if(mysqli_query($con, $sql)){	
            }
$feedback = ' 
<div class="alert alert-success alert-has-icon">
     <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
        <div class="alert-body">
            <div class="alert-title">Success</div>
            <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
           Welcome back :: '.$regnum.'
         </div>
</div>';

$_SESSION['acctinfo'] = $feedback;
$_SESSION['uniqueid'] = $regnum;
$_SESSION['token'] = $token;
header('Location: ../../student/pages/welcome.php');
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
                   Error 102 :: Unauthorised Portal Access, Contact School ICT Center
                  </div>
                </div>';
                $sql= "INSERT INTO  capslog (userid, token, `status`, ip, country, region, city, timezone, `type`, browser)  
                VALUES ('$regnum','$token', 0, '$uip','$country', '$region', '$city', '$timezone', '$mytype', '$browser')";
                   if(mysqli_query($con, $sql)){	
                   }
                $_SESSION['reginfo'] = $feedback;
            header('Location: ../../index');
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
                    Error 101 :: Incorrect Login Username or Password
                  </div>
                </div>';
                $sql= "INSERT INTO  capslog (userid, token, `status`, ip, country, region, city, timezone, `type`, browser)  
                VALUES ('$regnum','$token', 0, '$uip','$country', '$region', '$city', '$timezone', '$mytype', '$browser')";
                   if(mysqli_query($con, $sql)){	
                   }
                $_SESSION['reginfo'] = $feedback;
            header('Location: ../../index');
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
                    Error 101 :: Incorrect Login Username or Password
                  </div>
                </div>';
                $sql= "INSERT INTO  capslog (userid, token, `status`, ip, country, region, city, timezone, `type`, browser)  
                VALUES ('$regnum','$token', 0, '$uip','$country', '$region', '$city', '$timezone', '$mytype', '$browser')";
                   if(mysqli_query($con, $sql)){	
                   }
                $_SESSION['reginfo'] = $feedback;
            header('Location: ../../index');
}