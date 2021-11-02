<?php
include "dbconfig.php";

	//collect posted data from javascript
	$payable = mysqli_real_escape_string($con,$_POST['payable']);  
	$formid = mysqli_real_escape_string($con,$_POST['formid']);  
	$feeid = mysqli_real_escape_string($con,$_POST['feeid']);  
	$tref = mysqli_real_escape_string($con,$_POST['tref']);  
    $uip =  $_SERVER['REMOTE_ADDR'];
    $url = $_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']; 
    $start= date("Y-m-d h:i:s");
   
   
   $sql= "INSERT INTO  `all_transaction` (tref, userid, feeid, payable, paystatus, rectime)  
    VALUES ('$tref','$formid', '$feeid','$payable',0,'$start')";
    if(mysqli_query($con, $sql)){
    

                $sql= "INSERT INTO  activities (userid, act_page, activity, act_status, ip)  
                 VALUES ('$formid','$url', 'Enrolment Payment Initiated', 1, '$uip')";
	            	if(mysqli_query($con, $sql)){
                 }
                    echo 'alert("Proceed to Pay")';
        }
        else{
            $sql= "INSERT INTO  activities (userid, act_page, activity, act_status,ip)  
     VALUES ('$formid','$url', ' Enrolment Payment Initiated',0, '$uip')";
		if(mysqli_query($con, $sql)){
        }
        echo 'alert("Proceed to Pay")';
        }

?>