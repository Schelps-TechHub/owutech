<?php
include "dbconfig.php";
//biodata info

 
      
   
$fname = mysqli_real_escape_string($con,$_POST['firstname']); 
$oname = mysqli_real_escape_string($con,$_POST['othername']);  
$lname = mysqli_real_escape_string($con,$_POST['lastname']);  
$gender = mysqli_real_escape_string($con,$_POST['gender']);  
$dob = mysqli_real_escape_string($con,$_POST['dateofbirth']);   
  
$userid = $_SESSION["uniqueid"];  


    //proceed to contact information
 $email = mysqli_real_escape_string($con,$_POST['email']); 
 $phone = mysqli_real_escape_string($con,$_POST['phonenumber']);
 $landmark = mysqli_real_escape_string($con,$_POST['landmark']); 
 $fulladd = mysqli_real_escape_string($con,$_POST['fulladdress']); 
  $town = mysqli_real_escape_string($con,$_POST['town']); 
  $lga = mysqli_real_escape_string($con,$_POST['lga']);

  $sql = "UPDATE `users_tbl` SET 
   firstname = '$fname',
    othername = '$oname', 
    lastname = '$lname', 
    gender = '$gender', 
    dateofbirth= '$dob', 
    phonenumber = '$phone', 
    email = '$email', 
    lga = '$lga', 
    landmark = '$landmark', 
    fulladress = '$fulladd', 
    town = '$town' where userid = '$userid'";
    if(mysqli_query($con, $sql)){	
		
        echo ' 
        <div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    Successfully Updated your profile 
                 </div>
        </div>';
    }
    else{
       echo ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    We are unable to update profile at the moment. Do try again!
                 </div>
        </div>';
    }

    ?>