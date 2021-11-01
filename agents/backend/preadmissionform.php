<?php  
include "dbconfig.php";

if(isset($_GET['regnum'])){
    $formid = $_GET['regnum'];
    
//select form owner in the database
    $sql = "SELECT userid FROM form_owner where regnum ='$formid'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result);
    $owner = $row["userid"];

    // user
    $userid = 	$_SESSION['uniqueid'];

//compare userid and ownerid 
    if ($userid == $owner){

        $_SESSION['formid'] = $formid;
        $_SESSION['passport'] = 'image/'.$formid.'.jpg';
        header("Location: ../pages/admissionform.php");
        
    }
    else{
        header("Location: ../pages/myform.php");
    }
}
else{
    header("Location: ../pages/myform.php");
}
?>