<?php
include "../include/header.php";
 $formnum = $_SESSION["formid"];
?>


<section class="content">
<?php
							
                            if (isset($_SESSION['reginfo']) && $_SESSION['reginfo'])
                            {
                              printf('<b>%s</b>', $_SESSION['reginfo']);
                              unset($_SESSION['reginfo']);
                            }
                          ?> 
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Registration Form Number : <?php echo $formnum; ?></h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="welcome.php"><i class="zmdi zmdi-home"></i> Owutech</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Admission Advisor</a></li>
                        <li class="breadcrumb-item active">Registration Form</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn"  type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>
    </div>
    
        <div class="container-fluid">
            <!-- Registration Form -->
            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="card">
                    <form method="POST" action="../backend/forma.php" class="card auth_form"  enctype="multipart/form-data" >
                    <!-- Bio Data -->   
                    <div class="body">
                            <section>
                                 <div class="header">
                                     <h2><strong>:: Bio - data :: </strong></h2>
                                     <br>
                                     <br>
                                     <a ><img src="../backend/<?php echo   $_SESSION['passport']?>" class="rounded-circle shadow " width="200" alt="profile-image"></a>
                                     
                                    </div>
                                    <br>
                                    <br>
                                     <div class="row clearfix">
                                   
                                         <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>First name</small></label>
                                              <div class="form-group">
                                                 <input type="text" name="firstname" id="firstname" class="form-control" placeholder="First name" tabindex="1"    >
                                              </div>
                                         </div>
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="othername"><small>Other name</small></label>    
                                             <div class="form-group">
                                                 <input type="text" name="othername" id="othername" class="form-control" placeholder="Other name" tabindex="2"    >
                                             </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                                <label for="lastname"><small>Last name</small></label>
                                                <div class="form-group">
                                                  <input type="text" name="lastname" id="lastname" class="form-control" autocomplete="new-password"  tabindex="3"  placeholder="Last name"  >
                                               </div>
                                      </div>
                                   </div>
                                
                                
                                   <div class="row clearfix">
                                    
                                       <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="gender"><small>Gender</small></label>    
                                             <div class="form-group">
                                                <select  name="gender" id="gender" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="4"   >
                                                    <option value="">select gender</option>
                                                    <option value="MALE">Male</option>
                                                    <option value="FEMALE">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="dateofbirth"><small>Date of Birth</small></label>    
                                            <div class="form-group">
                                                <input type="date" name="dateofbirth" id="dateofbirth" class="form-control" placeholder="00-00-0000"  tabindex="5"   >
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="marital"><small>Marital Status</small></label>    
                                            <div class="form-group">
                                               <select  name="marital" id="marital" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="6"    >
                                                   <option value="">select </option>
                                                   <option value="Single">Single</option>
                                                   <option value="Married">Married</option>
                                                   <option value="alone">Separated / Divorced/ Widow / Widower</option>
                                               </select>
                                           </div>
                                        </div>
                                    </div>
                                
                                
                                    <div class="row clearfix">
                                    
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="country_origin"><small>Nationality</small></label>    
                                            <div class="form-group">
                                                <select type="text" name="country_origin" id="country_origin"  onchange="getstval();"  tabindex="7"   class="form-control show-tick ms select2" data-placeholder="Select"  >
                                                    <option value="">select Nationality</option>
<?php
                               
 $sql_query = "select DISTINCT country from location ORDER BY country ASC " ;
$result = mysqli_query($con,$sql_query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value"'.$row["country"].'">'.$row["country"].'</option>';
  }
}
?>
                                                </select>
                                            </div>
                                        </div>  
                                   
   
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="state_origin"><small>State of Origin</small></label>    
                                            <div class="form-group">
                                                <select type="text" name="state_origin" id="state_origin" onchange="getlgaval();"  tabindex="8"  class="form-control show-tick ms select2" data-placeholder="Select" >
                                                    <option value="">select </option>
                                                </select>
                                           </div>
                                        </div>
   
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="lga_origin"> <small>LGA - Origin</small> </label>    
                                            <div class="form-group">
                                               <select type="text" name="lga_origin" id="lga_origin" class="form-control show-tick ms select2"  tabindex="9"  data-placeholder="Select" >
                                                   <option value="">select LGA</option>
                                               </select>
                                           </div>
                                        </div>
                             </div>
                        </section>
                    </div>       

                         <!-- Contact Information -->   
                         <div class="body">
                            <section>
                                 <div class="header">
                                     <h2><strong> :: Contact Information :: </strong></h2>
                                 </div><br>
                                     <div class="row clearfix">
                                   
                                         <div class="col-lg-6 col-md-6 col-sm-8">
                                             <label for="app_email"><small> Applicant Email address </small></label>
                                              <div class="form-group">
                                                 <input type="email" name="app_email" id="app_email" class="form-control" placeholder="xyz@abc.com" tabindex="10"    >
                                              </div>
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                             <label for="app_phonenumber"><small>Applicant Phone Number</small></label>    
                                             <div class="form-group">
                                                 <input type="tel" name="app_phonenumber" id="app_phonenumber" minlength="11" maxleength="11" class="form-control" placeholder="08012345678" tabindex="11"    >
                                             </div>
                                      </div>
                                   </div>
                                
                                <br>
                                    <div class="row clearfix">
                                    
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="country_res"><small>Country of Residence</small></label>    
                                            <div class="form-group">
                                                <select type="text" name="country_res" id="country_res"  onchange="getstvalres();"  tabindex="12"  class="form-control show-tick ms select2" data-placeholder="Select"  >
                                                    <option value="">select country</option>
<?php
                               
 $sql_query = "select DISTINCT country from location ORDER BY country ASC " ;
$result = mysqli_query($con,$sql_query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    echo '<option value"'.$row["country"].'">'.$row["country"].'</option>';
  }
}
?>
                                                </select>
                                            </div>
                                        </div>  
                                   
   
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="state_res"><small>State of Residence</small></label>    
                                            <div class="form-group">
                                                <select type="text" name="state_res" id="state_res" onchange="getlgavalres();"  tabindex="13"  class="form-control show-tick ms select2" data-placeholder="Select" >
                                                    <option value="">select </option>
                                                </select>
                                           </div>
                                        </div>
   
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="lga_res"><small> LGA - Residence </small></label>    
                                            <div class="form-group">
                                               <select type="text" name="lga_res" id="lga_res" class="form-control show-tick ms select2" tabindex="14"   data-placeholder="Select">
                                                   <option value="">select LGA</option>
                                               </select>
                                           </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                   
                                         <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="landmark">Landmark</label>
                                              <div class="form-group">
                                                 <input type="text" name="landmark" id="landmark" class="form-control" placeholder="Nearest Bus Stop"  tabindex="15"  >
                                              </div>
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                             <label for="fulladdress">Street and Full Address</label>    
                                             <div class="form-group">
                                                 <input type="text" name="fulladdress" id="fulladdress" class="form-control" placeholder="1 ABC Street"  tabindex="16"  >
                                             </div>
                                      </div>
                                         <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="town">Town | Area | City</label>
                                              <div class="form-group">
                                                 <input type="text" name="town" id="town"  class="form-control" placeholder="Ikeja"  tabindex="17"  >
                                              </div>
                                         </div>
                                    </div>
                        </section>
                    </div>    
                    
                     <!-- Selected Programme -->   
                     <div class="body">
                            <section>
                                 <div class="header">
                                     <h2><strong> ::  Prospective Programme :: </strong></h2>
                                 </div><br>
                                     <div class="row clearfix">
                                         
                                     <div class="col-lg-4 col-md-4 col-sm-8">
                                     <label for="entrymode"><small>Mode of Entry</small></label>    
                                            <div class="form-group">
                                            <select  name="entrymode" id="entrymode" class="form-control show-tick ms select2"  tabindex="18"  >
                                                    <option value="">select </option>
                                                    <option value="Regular">Regular</option>
                                                </select>
                                            </div>
                                </div>  
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="mode"><small>Preferred Mode of Study</small></label>    
                                             <div class="form-group">
                                                <select  name="mode_study" id="mode" class="form-control show-tick ms select2"  tabindex="18"  onchange="getprog();" >
                                                    <option value="">select </option>
                                                    <?php
                               
                               $sql_query = "select DISTINCT mode from programmes ORDER BY mode ASC " ;
                              $result = mysqli_query($con,$sql_query);
                              if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                  echo '<option value"'.$row["mode"].'">'.strtoupper($row["mode"]).'</option>';
                                }
                              }
                              ?>
                                                </select>
                                            </div>
                                    </div>



                                     <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="prog"><small>Preferred Programme</small></label>    
                                             <div class="form-group">
                                                <select  name="prog" id="prog" class="form-control show-tick ms select2" tabindex="19"   onchange="getcourse();" >
                                                    <option value="">select </option>
                                                   
                                                </select>
                                            </div>
                                    </div>
                                   
                                </div>
                         <div class="row clearfix"> 
                         <div class="col-lg-8 col-md-8 col-sm-8">
                                             <label for="course"><small>Preferred Course of Study</small></label>    
                                             <div class="form-group">
                                                <select  name="course" id="course" class="form-control show-tick ms select2" tabindex="20"   >
                                                    <option value="">select </option>
                                                </select>
                                            </div>
                                    </div>
                                   
                                <div class="col-lg-4 col-md-4 col-sm-8">
                                     <label for="numssce"><small>O'Level - Number of Sitting</small></label>    
                                            <div class="form-group">
                                                <select  name="numssce" id="numssce" class="form-control show-tick ms select2"  tabindex="21" >
                                                    <option value="">select </option>
                                                    <option value="1">One Sitting</option>
                                                    <option value="2">Two Sitting</option>
                                                    <option value="1">Awaiting Result</option>
                                                </select>
                                            </div>
                                </div>

                               
                            </div>
                           
                            
                                </section>
                                <section>
                                 <div class="header">
                                     <h2><strong>:: Academic Records :: </strong></h2>
                                 </div>
                                 <br>
                                     <div class="row clearfix">
                                   
                                         <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="examyear1"><small>Exam year</small></label>
                                              <div class="form-group">
                                                 <select type="text" name="examyear1" id="examyear1" class="form-control show-tick ms select2" data-placeholder="Select" tabindex="22"    >
                                                     <option value="">select</option>
<?php
$y = date("Y");
for ($x = 1990; $x <= $y; $x++) {

  echo '<option value="'.$x.'">'.$x.'</option> <br>';
}
?>
                                                 </select>
                                                </div>
                                         </div>
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="examnum1"><small>Exam Number</small></label>    
                                             <div class="form-group">
                                                 <input type="text" name="examnum1" id="examnum1" class="form-control" placeholder="Exam Number - 1" tabindex="23"    >
                                             </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                                <label for="examtype1"><small>Exam Type</small></label>
                                                <div class="form-group">
                                                  <select type="text" name="examtype1" id="examtype1" class="form-control show-tick ms select2" data-placeholder="Select"    tabindex="24" >
                                                      <option value ="">Select</option>
                                                      <option value ="WAEC SSCE">WAEC SSCE</option>
                                                      <option value ="NECO SSCE">NECO SSCE</option>
                                                      <option value ="WAEC GCE">WAEC GCE</option>
                                                      <option value ="NECO GCE">NECO GCE</option>
                                                      <option value ="NABTEB">NABTEB</option>
                                                  </select>
                                               </div>
                                      </div>
                                   </div>
                                
                                
                                <div class="row clearfix">
                                   
                                   <div class="col-lg-4 col-md-4 col-sm-8">
                                       <label for="examyear2"><small>Exam year - for 2nd Sitting</small></label>
                                        <div class="form-group">
                                           <select type="text" name="examyear2" id="examyear2" class="form-control show-tick ms select2" data-placeholder="Select" tabindex="25"    >
                                           <option value="">select</option>
<?php
$y = date("Y");
for ($x = 1990; $x <= $y; $x++) {

echo '<option value="'.$x.'">'.$x.'</option> <br>';
}
?>
                                           </select>
                                          </div>
                                   </div>
                                  <div class="col-lg-4 col-md-4 col-sm-8">
                                       <label for="examnum2"><small>Exam Number - for 2nd Sitting</small></label>    
                                       <div class="form-group">
                                           <input type="text" name="examnum2" id="examnum2" class="form-control" placeholder="Exam Number - 2nd Sitting" tabindex="26"    >
                                       </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-sm-8">
                                          <label for="examtype2"><small>Exam Type - for 2nd Sitting</small></label>
                                          <div class="form-group">
                                            <select type="text" name="examtype2" id="examtype2" class="form-control show-tick ms select2" data-placeholder="Select"    tabindex="27" >
                                                <option value ="">Select</option>
                                                <option value ="WAEC SSCE">WAEC SSCE</option>
                                                <option value ="NECO SSCE">NECO SSCE</option>
                                                <option value ="WAEC GCE">WAEC GCE</option>
                                                <option value ="NECO GCE">NECO GCE</option>
                                                <option value ="NABTEB">NABTEB</option>
                                            </select>
                                         </div>
                                </div>
                             </div>

                                   <div class="row clearfix">
                                    
                                   <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="subject1"><small>Subject 1</small></label>    
                                             <div class="form-group">
                                                <select  name="subject1" id="subject1" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="28"   >
                                               
                                                   <?php
                                                    $sql_query = "select * from subjectlist where subject = 'MATHEMATICS' " ;
                                                    $result = mysqli_query($con,$sql_query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                      // output data of each row
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["subjectid"].'">'.$row["subject"].'</option>';
                                                      }
                                                    }
                                                   ?> 
                                                    
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-8">
                                            <label for="grade1"><small>Grade</small></label>    
                                            <div class="form-group">
                                                <select  name="grade1" id="grade1" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="29"   >
                                                <option value="">select </option>    
                                                    <option value="A1">A1</option>
                                                    <option value="B2">B2</option>
                                                    <option value="B3">B3</option>
                                                    <option value="C4">C4</option>
                                                    <option value="C5">C5</option>
                                                    <option value="C6">C6</option>
                                                    <option value="D7">D7</option>
                                                    <option value="E8">E8</option>
                                                    <option value="F9">F9</option>
                                                    <option value="AR">AR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="subject2"><small>Subject 2</small></label>    
                                             <div class="form-group">
                                                <select  name="subject2" id="subject2" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="30"   >
                                               
                                                <?php
                                                    $sql_query = "select * from subjectlist where subject = 'ENGLISH LANGUAGE' " ;
                                                    $result = mysqli_query($con,$sql_query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                      // output data of each row
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["subjectid"].'">'.$row["subject"].'</option>';
                                                      }
                                                    }
                                                   ?> 
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-8">
                                            <label for="grade2"><small>Grade</small></label>    
                                            <div class="form-group">
                                                <select  name="grade2" id="grade2" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="31"   >
                                                <option value="">select </option>    
                                                     <option value="A1">A1</option>
                                                    <option value="B2">B2</option>
                                                    <option value="B3">B3</option>
                                                    <option value="C4">C4</option>
                                                    <option value="C5">C5</option>
                                                    <option value="C6">C6</option>
                                                    <option value="D7">D7</option>
                                                    <option value="E8">E8</option>
                                                    <option value="F9">F9</option>
                                                    <option value="AR">AR</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row clearfix">
                                        <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="subject3"><small>Subject 3</small></label>    
                                             <div class="form-group">
                                                <select  name="subject3" id="subject3" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="32"   >
                                                <option value="">select subject</option>
                                                <?php
                                                    $sql_query = "select * from subjectlist where subject != 'ENGLISH LANGUAGE' and subject != 'MATHEMATICS' ORDER BY subject ASC " ;
                                                    $result = mysqli_query($con,$sql_query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                      // output data of each row
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["subjectid"].'">'.$row["subject"].'</option>';
                                                      }
                                                    }
                                                   ?> 
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-3 col-md-3 col-sm-8">
                                            <label for="grade3"><small>Grade</small></label>    
                                            <div class="form-group">
                                                <select  name="grade3" id="grade3" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="33"   >
                                                <option value="">select </option>        
                                                    <option value="A1">A1</option>
                                                    <option value="B2">B2</option>
                                                    <option value="B3">B3</option>
                                                    <option value="C4">C4</option>
                                                    <option value="C5">C5</option>
                                                    <option value="C6">C6</option>
                                                    <option value="D7">D7</option>
                                                    <option value="E8">E8</option>
                                                    <option value="F9">F9</option>
                                                    <option value="AR">AR</option>
                                                </select>
                                            </div>
                                        </div>
                                     </div>
                                   

                                    
                                    <div class="row clearfix">
                                    <div class="col-lg-3 col-md-3 col-sm-8">
                                          <label for="subject4"><small>Subject 4</small></label>    
                                          <div class="form-group">
                                             <select  name="subject4" id="subject4" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="34"   >
                                             <option value="">select subject</option>   
                                             <?php
                                                    $sql_query = "select * from subjectlist where subject != 'ENGLISH LANGUAGE' and subject != 'MATHEMATICS' ORDER BY subject ASC " ;
                                                    $result = mysqli_query($con,$sql_query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                      // output data of each row
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["subjectid"].'">'.$row["subject"].'</option>';
                                                      }
                                                    }
                                                   ?>
                                             </select>
                                         </div>
                                     </div>

                                     <div class="col-lg-3 col-md-3 col-sm-8">
                                         <label for="grade4"><small>Grade</small></label>    
                                         <div class="form-group">
                                             <select  name="grade4" id="grade4" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="35"   >
                                             <option value="">select </option>        
                                                    <option value="A1">A1</option>
                                                    <option value="B2">B2</option>
                                                    <option value="B3">B3</option>
                                                    <option value="C4">C4</option>
                                                    <option value="C5">C5</option>
                                                    <option value="C6">C6</option>
                                                    <option value="D7">D7</option>
                                                    <option value="E8">E8</option>
                                                    <option value="F9">F9</option>
                                                    <option value="AR">AR</option>
                                             </select>
                                         </div>
                                     </div>
                                     </div>
                                     <div class="row clearfix">
                                     <div class="col-lg-3 col-md-3 col-sm-8">
                                          <label for="subject5"><small>Subject 5</small></label>    
                                          <div class="form-group">
                                             <select  name="subject5" id="subject5" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="36"   >
                                             <option value="">select subject</option>
                                             <?php
                                                    $sql_query = "select * from subjectlist where subject != 'ENGLISH LANGUAGE' and subject != 'MATHEMATICS' ORDER BY subject ASC " ;
                                                    $result = mysqli_query($con,$sql_query);
                                                    if (mysqli_num_rows($result) > 0) {
                                                      // output data of each row
                                                      while($row = mysqli_fetch_assoc($result)) {
                                                        echo '<option value="'.$row["subjectid"].'">'.$row["subject"].'</option>';
                                                      }
                                                    }
                                                   ?>
                                             </select>
                                         </div>
                                     </div>
                                   

                                     <div class="col-lg-3 col-md-3 col-sm-8">
                                         <label for="grade5"><small>Grade</small></label>    
                                         <div class="form-group">
                                             <select  name="grade5" id="grade5" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="37"   >
                                             <option value="">select </option>    
                                                    <option value="A1">A1</option>
                                                    <option value="B2">B2</option>
                                                    <option value="B3">B3</option>
                                                    <option value="C4">C4</option>
                                                    <option value="C5">C5</option>
                                                    <option value="C6">C6</option>
                                                    <option value="D7">D7</option>
                                                    <option value="E8">E8</option>
                                                    <option value="F9">F9</option>
                                                    <option value="AR">AR</option>
                                             </select>
                                         </div>
                                     </div>
                                     </div>
                                
                               
                             <div class="row clearfix">
                             <div class="col-lg-6 col-md-6 col-sm-8">
                                             <label for="last_inst"><small>Last Institution Attended</small></label>    
                                             <div class="form-group">
                                                 <input type="text" name="last_inst" id="last_inst" class="form-control" placeholder="Full Name of Last Institution Attended"  tabindex="40"  >
                                             </div>
                              </div>     
                              <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="last_year"><small>Year Attended</small></label>
                                              <div class="form-group">
                                                 <select type="text" name="last_year" id="last_year" class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="41"  >
                                                     <option value="">select</option>
<?php
$y = date("Y");
for ($x = 1990; $x <= $y; $x++) {

  echo '<option value="'.$x.'">'.$x.'</option> <br>';
}
?>
                                                 </select>
                                                </div>
                                </div>
                                
                                <div class="col-lg-3 col-md-3 col-sm-8">
                                     <label for="last_credential"><small>Certificate Obtained</small></label>    
                                            <div class="form-group">
                                                <select  name="last_credential" id="last_credential" class="form-control show-tick ms select2" tabindex="42"  >
                                                    <option value="">select </option>
                                                    <option value="ssce">SSCE</option>
                                                    <option value="nd">ND</option>
                                                    <option value="nce">NCE</option>
                                                    <option value="hnd">HND</option>
                                                    <option value="bsc">BSC</option>
                                                </select>
                                            </div>
                                </div>
                             </div>
                        </section>
                    </div>       

                         <!-- Contact Information -->   
                         <div class="body">
                            <section>
                                 <div class="header">
                                     <h2><strong> :: Significant Other / Next of Kin :: </strong></h2>
                                 </div><br>
                                     <div class="row clearfix">
                                   
                                         <div class="col-lg-8 col-md-8 col-sm-8">
                                             <label for="kin_name"><small> Fullname - Next of Kin </small></label>
                                              <div class="form-group">
                                                 <input type="text" name="kin_name" id="kin_name" class="form-control" placeholder="Next of Kin - Full name " tabindex="43"    >
                                              </div>
                                         </div>

                                         <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="kin_relate"><small>Relationship - Next of Kin</small></label>    
                                            <div class="form-group">
                                                <select type="text" name="kin_relate" id="kin_relate"   class="form-control show-tick ms select2" data-placeholder="Select" tabindex="44" >
                                                    <option value="">select </option>
                                                    <option value="Father">Father </option>
                                                    <option value="Mother">Mother </option>
                                                    <option value="Spouse">Spouse </option>
                                                    <option value="Sibling">Sibling </option>
                                                    <option value="Child">Child </option>
                                                    <option value="Others">Others </option>
                                                </select>
                                           </div>
                                        </div>

                                        
                                   </div>
                                
                                
                                    <div class="row clearfix">
                                    
                                    <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="kin_phone"><small> Phone Number - Next of Kin</small></label>    
                                             <div class="form-group">
                                                 <input type="tel" name="kin_phone" id="kin_phone" class="form-control" minlength="11" maxleength="11" placeholder="08012345678" tabindex="45">
                                             </div>
                                      </div>
   
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                             <label for="kin_add"><small> Full Address - Next of Kin</small></label>    
                                             <div class="form-group">
                                                 <input type="text" name="kin_add" id="kin_add" class="form-control" placeholder="Full Address - Next of Kin" tabindex="46">
                                             </div>
                                      </div>
                                    </div>

                   

                          <!-- Sponsor Information -->   
                       
                                 <div class="header">
                                     <h2><strong> ::  Sponsor Information :: </strong></h2>
                                 </div><br>
                                     <div class="row clearfix">
                                   
                                         <div class="col-lg-8 col-md-8 col-sm-8">
                                             <label for="sponsor_name"><small> Fullname - Sponsor </small></label>
                                              <div class="form-group">
                                                 <input type="text" name="sponsor_name" id="sponsor_name" class="form-control" placeholder="Sponsor - Full name " tabindex="47" >
                                              </div>
                                         </div>

                                         <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="sponsor_job"><small> Occupation - Sponsor </small></label>
                                              <div class="form-group">
                                                 <input type="text" name="sponsor_job" id="sponsor_job" class="form-control" placeholder="Sponsor - Occupation " tabindex="48" >
                                              </div>
                                         </div> 

                                        
                                   </div>
                                
                              
                                    <div class="row clearfix">
                                    
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="sponsor_phone"><small> Phone Number -  Sponsor</small></label>    
                                             <div class="form-group">
                                                 <input type="tel" name="sponsor_phone" id="sponsor_phone" class="form-control" minlength="11" maxleength="11" placeholder="08012345678" tabindex="49">
                                             </div>
                                      </div>
   
                                      <div class="col-lg-8 col-md-8 col-sm-8">
                                             <label for="sponsor_add"><small> Full Address - Sponsor</small></label>    
                                             <div class="form-group">
                                                 <input type="text" name="sponsor_add" id="sponsor_add" class="form-control" placeholder="Sponsor - Full Address" tabindex="50">
                                             </div>
                                      </div>
                                    </div>

                                    <br>

                        </section>
                    </div> 
                   
                     <!-- Selected Programme -->   
                     <div class="body">
                            <section>

                            <div class="row clearfix">
                         <div class="col-lg-4 col-md-4 col-sm-8">
                             <label for="referral"><small> Referral Code - Optional </small></label>    
                                <div class="form-group">
                                 <input type="text" name="referral" id="referral" class="form-control" placeholder="referral code" tabindex="50">
                                   </div>
                               </div>
                        </div>
                                 <div class="header">
                                     <h2><strong>  ::  Attestation :: </strong></h2>
                                 </div><br>
                                
               
                         <div class="row clearfix"> 


                        <div class="checkbox">
                            <input id="declared" type="checkbox" required="yes" tabindex="51">
                            <label for="declared">
                                <p>1. I declare that the stated information above is to the best of my knowledge and belief, accurate in every details and;</p></small>
                            </label>
                        </div>

                        <div class="checkbox">
                            <input id="declared2" type="checkbox" required="yes" tabindex="52">
                            <label for="declared2">
                                <p>2. That if I am admitted, I shall abide by the rules and regulations of Owu College of Management Technology. </p></small>
                            </label>
                        </div>
                        <div class="checkbox">
                            <input id="declared3" type="checkbox" required="yes" tabindex="53">
                            <label for="declared3">
                                <p>3. That if I do not have five credits with English and Mathematics compulsory, my certificate shall be witheld.</p>
                                </label>
                        </div>

                        <div class="checkbox">
                            <input id="declared4" type="checkbox" required="yes" tabindex="54">
                            <label for="declared4">
                                <p>4. That I have never been expelled from any Institution of learning for any misdemeanour.</p></small>
                            </label>
                        </div>

                         </div>
                         <div class="row clearfix"> 

                                  <div class="col-lg-6 col-md-6 col-sm-8">
                                    <button tabindex="55" onclick ="pushdata();"class="btn btn-raised btn-success btn-lg btn-block btn-round waves-effect"><h6>Submit Form and Print </h6> </button>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-8">
                                    <button type="reset" class="btn btn-raised btn-warning btn-lg btn-block btn-round waves-effect"><h6>Cancel Form </h6> </button>
                                </div>   
                                      
                              
                         </div>
                            
                           
                            
                        </section>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js -->

<script src="assets/plugins/jquery-validation/jquery.validate.js"></script> <!-- Jquery Validation Plugin Css -->
<script src="assets/plugins/jquery-steps/jquery.steps.js"></script> <!-- JQuery Steps Plugin Js -->

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js -->
<script src="assets/js/pages/forms/form-wizard.js"></script>
<script src="assets/js/feed.js"></script>
</body>


</html>