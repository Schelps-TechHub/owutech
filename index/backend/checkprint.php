<?php
include "dbconfig.php";
//biodata info

$regnum = mysqli_real_escape_string($con,$_POST['regnum']);

$sql = "SELECT COUNT('regnum') as cnt from form_owner where regnum = '$regnum'" ;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_assoc($result);
$num = $row["cnt"];
if($num == 1){

$sql = "SELECT * from form_owner where regnum = '$regnum'" ;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
 // output data of each row
 	
    $regnum = $row["regnum"];
    $status = $row["status"];
    if($status == 11){
        $_SESSION['formid'] =  $regnum;
        $_SESSION['passport'] = 'image/'.$regnum.".jpg";
        header("Location: ../pages/printout.php");
    }
    elseif($status == 1){
        $_SESSION['formid'] =  $regnum;
        $_SESSION['passport'] = 'image/'.$regnum.".jpg";
        header("Location: ../pages/documentation.php");
    }
    elseif($status == 0){
        $_SESSION['formid'] =  $regnum;
        $_SESSION['passport'] = 'image/'.$regnum.".jpg";
        header("Location: ../pages/admissionform.php");
    }
  
 }
 else{
    $feedback = ' 
    <div class="alert alert-warning alert-has-icon">
         <div class="alert-icon"><i class="
         far fa-hand-paper"></i></div>
            <div class="alert-body">
                <div class="alert-title">Ooops!</div>
                <button class="close" data-dismiss="alert">
                          <span>&times;</span>
                        </button>
                        Status : Registration Form Number not found
             </div>
    </div>';
             $_SESSION['reginfo'] = $feedback;
            header("Location: ../pages/formcheck.php");
}
?>