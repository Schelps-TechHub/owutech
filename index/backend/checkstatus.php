<?php
include "dbconfig.php";
//biodata info

$regnum = mysqli_real_escape_string($con,$_POST['regnum']);

$sql = "SELECT COUNT('regnum') as cnt from form_owner where regnum = '$regnum'" ;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$num = $row["cnt"];
if($num >= 1){
 // output data of each row
 
    $sql = "SELECT admission_status from form_owner where regnum = '$regnum'" ;
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    $status = $row["admission_status"];
    //successful
    if($status == 1){

      $sql = "SELECT * FROM `all_transaction` WHERE userid  = '$regnum' and feeid = 1 and paystatus = 1";
			$result=mysqli_query($con,$sql);
             $row=mysqli_fetch_array($result);
                        $paystatus = "$row[paystatus]";
                        $tref = "$row[tref]";

                        if($paystatus == 1){ 
                          $feedback = ' 
                          <div class="alert alert-success alert-has-icon">
                               <div class="alert-icon"><i class="
                               far fa-hand-paper"></i></div>
                                  <div class="alert-body">
                                      <div class="alert-title">Congratulations!</div>
                                      <button class="close" data-dismiss="alert">
                                                <span>&times;</span>
                                              </button>
                                              Status : Your Admission Application is Successful and Portal Enrolment Fee Payment successfully recorded
                                   </div>
                          </div>';
                          $_SESSION['userid'] =  $regnum;
                          $_SESSION['tref'] = $tref;
                          $_SESSION['reginfo'] = $feedback;
                          header("Location: ../../student/pages/onboard.php");
                      }
        else{ $feedback = ' 
        <div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Congratulations!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Status : Your Admission Application is Successful
                 </div>
        </div>';
        $_SESSION['formid'] =  $regnum;
        $_SESSION['passport'] = 'image/'.$regnum.".jpg";
        $_SESSION['reginfo'] = $feedback;
        header("Location: ../pages/admprocess.php");
    }
  }
    //pending
    elseif($status == 0) {
        $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Status : Your Admission Application is Pending. Check back Later
                 </div>
        </div>';
                 $_SESSION['reginfo'] = $feedback;
				header("Location: ../pages/checkadmission.php");
    }
 }
 //record not found
 else{
    $feedback = ' 
    <div class="alert alert-danger alert-has-icon">
         <div class="alert-icon"><i class="
         far fa-hand-paper"></i></div>
            <div class="alert-body">
                <div class="alert-title">Ooops!</div>
                <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Status : Registration Number not recognised
             </div>
    </div>';
             $_SESSION['reginfo'] = $feedback;
             header("Location: ../pages/checkadmission.php");
}
?>