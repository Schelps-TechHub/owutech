<?php
include "dbconfig.php";
if(!empty($_GET['regnum'])) {
        $regnum = $_GET["regnum"];  
}

//delete file 
$file = $regnum.'.jpg';
$dir = "../../index/backend/image";
$path = $dir.'/'.$file;
unlink($path);
// delete from Database
$sql= "DELETE from form_owner where regnum = '$regnum' ";
if(mysqli_query($con, $sql)){
    $sql= "DELETE from form_bio where regnum = '$regnum' ";
    if(mysqli_query($con, $sql)){  
        $feedback = ' 
        <div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    Successfully deleted form with Reg. Number : '.$regnum.'
                 </div>
        </div>';
}
else {
    $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    Unable to delete form with Reg. Number : '.$regnum.'
                 </div>
        </div>';
}
}
else {
    $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                    Unable to delete form with Reg. Number : '.$regnum.'
                 </div>
        </div>';
}
$_SESSION['acctinfo'] = $feedback;
header("Location: ../pages/mgapplicant.php");