<?php  
include "dbconfig.php";

if(isset($_GET['regnum'])){
    $formid = $_GET['regnum'];
    
//select form owner in the database
    $sql = "SELECT * FROM form_owner where regnum ='$formid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $owner = $row["userid"];
    $regnum = $row["regnum"];
    $status = $row["status"];

    // user
    $userid = 	$_SESSION['uniqueid'];

//compare userid and ownerid 
    if ($userid == $owner){
        if($status == 11){
        $_SESSION['formid'] =  $regnum;
        $_SESSION['passport'] = 'image/'.$regnum.".jpg";
        header("Location: ../pages/printform.php");
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
                            Denied : Unauthorised Form Access
                 </div>
        </div>';
                 $_SESSION['reginfo'] = $feedback;
        header("Location: ../pages/myform.php");
    }
}
else{
    header("Location: ../pages/myform.php");
}
?>