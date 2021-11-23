<?php  
include "dbconfig.php";

if(isset($_GET['regnum'])){
    $formid = $_GET['regnum'];
    


        $_SESSION['formid'] = $formid;
        $_SESSION['passport'] = 'image/'.$formid.'.jpg';
        header("Location: ../pages/printform.php");
        

}
else{
    header("Location: ../pages/mgapplicant.php");
}
?>