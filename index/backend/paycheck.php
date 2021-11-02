<?php
include "dbconfig.php";

if (isset($_GET['tx_ref'])&&isset($_GET['status'])) {
  $ref = $_GET['tx_ref'];
  $state = $_GET['status'];

  $query = array(
      "SECKEY" => "FLWSECK_TEST-c08364f6b70e72c086ca0cc07303a1c0-X",
      "txref" => $ref
  ); 
    //validate transaction ref
	$sql = "SELECT * FROM `all_transaction` WHERE tref  = '$ref'";
			$result=mysqli_query($con,$sql);
             $row=mysqli_fetch_array($result);
                        $userid = "$row[userid]";
                        $payable = "$row[payable]";
               

                
          
                  $data_string = json_encode($query);
                          
                  $ch = curl_init('https://ravesandboxapi.flutterwave.com/flwv3-pug/getpaidx/api/v2/verify');                                                                      
                  curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
                  curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);                                              
                  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json'));
          
                  $response = curl_exec($ch);
          
                  $header_size = curl_getinfo($ch, CURLINFO_HEADER_SIZE);
                  $header = substr($response, 0, $header_size);
                  $body = substr($response, $header_size);
          
                  curl_close($ch);
          
                  $resp = json_decode($response, true);
          
               
                    // transaction data

$paymentstatus = $resp['data']['status'];
$transref = $resp['data']['txref'];
$chargeamount = $resp['data']['amount'];
$chargeResponsecode = $resp['data']['chargecode'];

if (($chargeResponsecode == "00" || $chargeResponsecode == "0") && ($paymentstatus ==  $state) && ($transref == $ref)  && ($chargeamount == $payable)) {
    
    $sql= "UPDATE `all_transaction` SET paystatus = 1 WHERE tref  = '$ref'";
		if(mysqli_query($con, $sql)){
		
        $_SESSION['tref'] = $ref;
        $_SESSION['userid'] = $userid;
        $_SESSION['reginfo'] =  ' 
<div class="alert alert-success alert-has-icon">
     <div class="alert-icon"><i class="
     far fa-hand-paper"></i></div>
        <div class="alert-body">
            <div class="alert-title">Success!</div>
            <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
           Status :: Your Payment has been successfully processed. Proceed to portal enrolment
         </div>
</div>';
          header("Location: ../../student/pages/onboard.php");
    }
}
else{
    $sql= "UPDATE `all_transaction` SET paystatus = 2 WHERE tref  = '$ref'";
		if(mysqli_query($con, $sql)){
		}

$_SESSION['reginfo'] =  ' 
<div class="alert alert-warning alert-has-icon">
     <div class="alert-icon"><i class="
     far fa-hand-paper"></i></div>
        <div class="alert-body">
            <div class="alert-title">Ooops!</div>
            <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
           Sorry! Your Payment Failed. Do try again!
         </div>
</div>';
          header("Location: ../pages/pricing.php");
    }
}
else{
    $sql= "UPDATE `all_transaction` SET status = 2 WHERE tref  = '$ref'";
		if(mysqli_query($con, $sql)){
		}

$_SESSION['reginfo'] =  ' 
<div class="alert alert-warning alert-has-icon">
     <div class="alert-icon"><i class="
     far fa-hand-paper"></i></div>
        <div class="alert-body">
            <div class="alert-title">Ooops!</div>
            <button class="close" data-dismiss="alert">
                      <span>&times;</span>
                    </button>
           Sorry! Your Payment record was not found
         </div>
</div>';
          header("Location: ../pages/pricing.php");
    }


?>