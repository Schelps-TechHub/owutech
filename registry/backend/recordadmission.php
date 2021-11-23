<?php
include "dbconfig.php";
  
$regnum = mysqli_real_escape_string($con,$_POST['regnum']); 

//Get active session
$sql = "SELECT `session` from `sessiontbl` where `status` = 1" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
  // output data of each row
 $session = $row["session"];
//set admission status
$sql =  "UPDATE `form_owner` SET `admission_status` = '1' where regnum = '$regnum'";
  if(mysqli_query($con, $sql)){
      //record new level
    $sql= " INSERT INTO  `std_level` (userid, `level`, `session`) VALUES ('$regnum', 100,'$session')";
		
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
                Successfully Processed Admission for Applicant with Reg Num: '.$regnum.'
             </div>
    </div>';
    $_SESSION['acctinfo'] = $feedback;
    echo $_SESSION['acctinfo'];
}
else{
    $feedback = ' 
    <div class="alert alert-danger alert-has-icon">
         <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Error</div>
                <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
               Unable to Process Admission for Applicant with Reg Num: '.$regnum.'
             </div>
    </div>';
    $_SESSION['acctinfo'] = $feedback;
    echo $_SESSION['acctinfo'];
}

?>