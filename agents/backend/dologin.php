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

//log info
	$agentid = mysqli_real_escape_string($con,$_POST['uniqueid']); 
	$agentpwd = mysqli_real_escape_string($con,$_POST['uniquekey']);  
	
	if ($agentid != ""  && $agentpwd != "" ){
	    
	  
	  $stat = 1;
            
	     $sql = "SELECT count('userid') FROM `users_tbl` WHERE userid  = '$agentid' OR  email  = '$agentid'";
			$result=mysqli_query($con,$sql);
                        $row=mysqli_fetch_array($result);
                        $count = "$row[0]";

        if($count == $stat){
            
	$sql = "SELECT * FROM `users_tbl` WHERE userid  = '$agentid' OR  email = '$agentid'";
			$result=mysqli_query($con,$sql);
             $row=mysqli_fetch_array($result);
                        $agent = "$row[userid]";
                        $mypass = "$row[passpin]";
                        $firstname = "$row[firstname]";
                        $lastname = "$row[lastname]";
						
	if ($agentpwd == $mypass) {
		
		$sql= "UPDATE capslog SET status = 0 where userid = '$acctnum' ";
		if(mysqli_query($con, $sql)){
		}
					
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
     $sql= "INSERT INTO  log (userid, token, status, ip, country, region, city, timezone, type, browser)  
     VALUES ('$agent','$token', '$status', '$uip','$country', '$region', '$city', '$timezone', '$mytype', '$browser')";
		if(mysqli_query($con, $sql)){	
		
      $feedback = ' 
      <div class="alert alert-success alert-has-icon">
           <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
              <div class="alert-body">
                  <div class="alert-title">Success</div>
                  <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                          </button>
                  Successfully Logged in '.$firstname." ".$lastname.'
               </div>
      </div>';
				$_SESSION['acctinfo'] = $feedback;
				$_SESSION['uniqueid'] = $agent;
				$_SESSION['token'] = $token;
				header("Location: ../pages/welcome.php");
		}

      else 
      {
        $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    We are unable to log into your account at the moment. Do try again!
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
				header("Location: ../pages/user_login.php");
      }
	  
	  }

      else 
      {
        $feedback = ' 
        <div class="alert alert-danger alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    The Password you entered is incorrect
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
          header("Location: ../pages/user_login.php");
      }
      
        }
	else 
      {
        $feedback = ' 
        <div class="alert alert-danger alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    Incorrect Admission Advisor Id / Email Address
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
          header("Location: ../pages/user_login.php");
      }
    }
	else 
      {
        $feedback = ' 
        <div class="alert alert-danger alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    Incomplete Login Details'.$agentid.' Try Again
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
          header("Location: ../pages/user_login.php");
      }
 

?>