<?php
include "dbconfig.php";
  
$agentid = mysqli_real_escape_string($con,$_POST['agentid']);
$agentpwd = mysqli_real_escape_string($con,$_POST['agentpwd']);

//check if username exist
            
$sql = "SELECT count('userid') FROM `users_tbl` WHERE userid  = '$agentid'";
   $result=mysqli_query($con,$sql);
               $row=mysqli_fetch_array($result);
               $count = "$row[0]";

if($count == 0){
    $sql = "INSERT INTO `users_tbl` ( userid, passpin) VALUES ('$agentid', '$agentpwd' ) ";
    if(mysqli_query($con, $sql)){
       $feedback = ' 
        <div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    Successfully Created Admission Agent account with Username :: '.$agentid.'
                 </div>
        </div>';

        $_SESSION['acctinfo'] = $feedback;

        echo $_SESSION['acctinfo'];
    }
    else{
        echo ' Unable to create admission agent account';
    }
}
else{
    echo ' Username already exist. Choose another Agent Username and Try Again.';
} 