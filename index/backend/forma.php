<?php
include "dbconfig.php";
//biodata info

 
      
   
$fname = mysqli_real_escape_string($con,$_POST['firstname']); 
$oname = mysqli_real_escape_string($con,$_POST['othername']);  
$lname = mysqli_real_escape_string($con,$_POST['lastname']);  
$gender = mysqli_real_escape_string($con,$_POST['gender']);  
$dob = mysqli_real_escape_string($con,$_POST['dateofbirth']);  
$marital = mysqli_real_escape_string($con,$_POST['marital']);  
$nation = mysqli_real_escape_string($con,$_POST['country_origin']);  
$stateorg = mysqli_real_escape_string($con,$_POST['state_origin']);  
$lgaorg = mysqli_real_escape_string($con,$_POST['lga_origin']);  
$regnum = $_SESSION["formid"];  


    //proceed to contact information
 $email = mysqli_real_escape_string($con,$_POST['app_email']); 
 $phone = mysqli_real_escape_string($con,$_POST['app_phonenumber']); 
 $country = mysqli_real_escape_string($con,$_POST['country_res']); 
  $stateres = mysqli_real_escape_string($con,$_POST['state_res']); 
   $lgares = mysqli_real_escape_string($con,$_POST['lga_res']); 
 $landmark = mysqli_real_escape_string($con,$_POST['landmark']); 
 $fulladd = mysqli_real_escape_string($con,$_POST['fulladdress']); 
  $town = mysqli_real_escape_string($con,$_POST['town']); 

                                               

   //proceed to programme details
  $course = mysqli_real_escape_string($con,$_POST['course']); 
  $entry = mysqli_real_escape_string($con,$_POST['entrymode']); 
  $ssce = mysqli_real_escape_string($con,$_POST['numssce']); 
 
  //academic records
  $examnum1 = mysqli_real_escape_string($con,$_POST['examnum1']);
  $examtype1 = mysqli_real_escape_string($con,$_POST['examtype1']);
  $examyear1 = mysqli_real_escape_string($con,$_POST['examyear1']);
  $examnum2 = mysqli_real_escape_string($con,$_POST['examnum2']);
  $examtype2 = mysqli_real_escape_string($con,$_POST['examtype2']);
  $examyear2 = mysqli_real_escape_string($con,$_POST['examyear2']);
  $subject1 = mysqli_real_escape_string($con,$_POST['subject1']);
  $grade1 = mysqli_real_escape_string($con,$_POST['grade1']);
  $subject2 = mysqli_real_escape_string($con,$_POST['subject2']);
  $grade2 = mysqli_real_escape_string($con,$_POST['grade2']);
  $subject3 = mysqli_real_escape_string($con,$_POST['subject3']);
  $grade3 = mysqli_real_escape_string($con,$_POST['grade3']);
  $subject4 = mysqli_real_escape_string($con,$_POST['subject4']);
  $grade4 = mysqli_real_escape_string($con,$_POST['grade4']);
  $subject5 = mysqli_real_escape_string($con,$_POST['subject5']);
  $grade5 = mysqli_real_escape_string($con,$_POST['grade5']);
  $subject6 = mysqli_real_escape_string($con,$_POST['subject6']);
  $grade6 = mysqli_real_escape_string($con,$_POST['grade6']);
  $last_inst = mysqli_real_escape_string($con,$_POST['last_inst']);
  $last_year = mysqli_real_escape_string($con,$_POST['last_year']);
  $last_credential = mysqli_real_escape_string($con,$_POST['last_credential']);
     
  //Next of Kin
  $kin_name = mysqli_real_escape_string($con,$_POST['kin_name']);
  $kin_relate = mysqli_real_escape_string($con,$_POST['kin_relate']);
  $kin_phone = mysqli_real_escape_string($con,$_POST['kin_phone']);
  $kin_add = mysqli_real_escape_string($con,$_POST['kin_add']);

  //Sponsor Details

  $sponsor_name = mysqli_real_escape_string($con,$_POST['sponsor_name']);
  $sponsor_job = mysqli_real_escape_string($con,$_POST['sponsor_job']);
  $sponsor_phone = mysqli_real_escape_string($con,$_POST['sponsor_phone']);
  $sponsor_add = mysqli_real_escape_string($con,$_POST['sponsor_add']);
  $referal = mysqli_real_escape_string($con,$_POST['referal']);
   if($referal != ""){
       $owner = $referal;
   }
   else{
    $owner = 'SELF';  
   }
 
     mysqli_autocommit($con,FALSE);

   // Insert multiple 
   mysqli_query($con, "UPDATE `form_bio` SET 
   firstname = '$fname',
    othername = '$oname', 
    surname = '$lname', 
    gender = '$gender', 
    dateofbirth= '$dob', 
    marital = '$marital', 
    nationality = '$nation', 
    stateorigin = '$stateorg', 
    lgaorigin = '$lgaorg' where regnum = '$regnum'");
   mysqli_query($con, " INSERT INTO  `form_contact` 
(regnum, emailadd, phonenum, country, res_state, res_lga, landmark, address,town)  
  VALUES  ('$regnum','$email','$phone', '$country', '$stateres','$lgares', '$landmark', '$fulladd', '$town')");
    mysqli_query($con, " INSERT INTO  `form_prog`
 (regnum, progid, entry, olevel)
  VALUES  ('$regnum','$course','$entry', '$ssce')");
   mysqli_query($con, " INSERT INTO  `form_sponsor`
   (regnum, sponsor_name, sponsor_job, sponsor_phone, sponsor_add)
    VALUES  ('$regnum','$sponsor_name','$sponsor_job', '$sponsor_phone', '$sponsor_add')");
 mysqli_query($con, " INSERT INTO  `form_kin`
     (regnum, kin_name, kin_relate, kin_phone, kin_add)
      VALUES  ('$regnum','$kin_name','$kin_relate', '$kin_phone', '$kin_add')");

mysqli_query($con, " INSERT INTO  `form_inst`
(regnum, inst_name, inst_year, inst_cert)
 VALUES  ('$regnum','$last_inst','$last_year', '$last_credential')");

mysqli_query($con, " INSERT INTO  `form_grades`
(regnum, subjectid, grade)
 VALUES  ('$regnum','$subject1','$grade1')");
mysqli_query($con, " INSERT INTO  `form_grades`
(regnum, subjectid, grade)
 VALUES  ('$regnum','$subject2','$grade2')");
 mysqli_query($con, " INSERT INTO  `form_grades`
 (regnum, subjectid, grade)
  VALUES  ('$regnum','$subject3','$grade3')");
  mysqli_query($con, " INSERT INTO  `form_grades`
  (regnum, subjectid, grade)
   VALUES  ('$regnum','$subject4','$grade4')");
   mysqli_query($con, " INSERT INTO  `form_grades`
   (regnum, subjectid, grade)
    VALUES  ('$regnum','$subject5','$grade5')");

mysqli_query($con, " INSERT INTO  `form_exam`
(regnum, examyear, examregnum, examtype)
 VALUES  ('$regnum', '$examyear1','$examnum1','$examtype1')");

 if($examtype2 != "" && $examnum2 != "" && $examyear2 != "" ){
    mysqli_query($con, " INSERT INTO  `form_exam`
    (regnum, examyear, examregnum, examtype)
     VALUES  ('$regnum', '$examyear2','$examnum2','$examtype2')");   
 }
 mysqli_query($con, "UPDATE  `form_owner` set userid = '$owner', `status` = 1 where regnum = '$regnum'");

   if (mysqli_commit($con)) {
 echo ' <div class="alert alert-success alert-has-icon">
 <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
     <div class="alert-body">
         <div class="alert-title"> Success </div>
             <button class="close" data-dismiss="alert">
                     <span>&times;</span>
             </button>
            Successfully Recorded Bio-data, Contact and Programme Details for  '.$fname." ".$lname.'
         </div>
    </div>';
                                                                                                                                                         
    $_SESSION['formid'] = $regnum;
}

else{
    echo ' 
    <div class="alert alert-warning alert-has-icon">
        <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
            <div class="alert-body">
                <div class="alert-title">Error</div>
                    <button class="close" data-dismiss="alert">
                            <span>&times;</span>
                    </button>
                   Unable to record all your entries, try again! '.$regnum.'
                </div>
           </div>';		                                                                                                            	                                    
}


                                                                                                                              