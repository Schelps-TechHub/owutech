<?php
include "../include/header.php";

 $sql ="SELECT * from `form_bio` where regnum = '$id'";
  $result = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($result);
    $fname = $row['firstname'];
    $oname = $row['othername'];
    $lname = $row['surname'];
    $gender = $row['gender'];
    $dob = $row['dateofbirth'];
    $sql ="SELECT * from `form_contact` where regnum = '$id'";
    $result = mysqli_query($con,$sql);
      $row = mysqli_fetch_array($result);   
    $phone = $row['phonenum'];
    $email = $row['emailadd'];
    $land = $row['landmark'];
    $add = $row['address'];
    $town = $row['town'];
    $res_state = $row['res_state'];
    $res_lga = $row['res_lga'];
    $country = $row['country'];
?>


<section class="content">
<strong><p style="text-align: right;"> <?php echo $semester." ". $session;?></p></strong>
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                   
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="welcome.php"><i class="zmdi zmdi-home"></i> Owutech</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Student Portal</a></li>
                        <li class="breadcrumb-item active">Profile</li>
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
                        <div id="feedback">

                        </div>
                    <form method="POST" action="../backend/forma.php" class="card auth_form"  enctype="multipart/form-data" >
                    <!-- Bio Data -->   
                    <div class="body">
                            <section>
                                 <div class="header">
                                     <h2><strong>:: Bio - data :: </strong></h2>
                                     <br>
                                     <div class="row clearfix">
                                   
                                         <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>First name</small></label>
                                              <div class="form-group">
                                                 <input type="text" name="firstname" disabled id="profile_firstname" class="form-control" value = "<?php echo $fname?>" placeholder="First name" tabindex="1"    >
                                              </div>
                                         </div>
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="othername"><small>Other name</small></label>    
                                             <div class="form-group">
                                                 <input type="text" name="othername" disabled id="profile_othername" class="form-control" value = "<?php echo $oname?>"  placeholder="Other name" tabindex="2"    >
                                             </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                                <label for="lastname"><small>Last name</small></label>
                                                <div class="form-group">
                                                  <input type="text" name="lastname" disabled id="profile_lastname" class="form-control" value = "<?php echo $lname?>"  tabindex="3"  placeholder="Last name"  >
                                               </div>
                                      </div>
                                   </div>
                                
                                
                                   <div class="row clearfix">
                                     <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="dateofbirth"><small>Username</small></label>    
                                            <div class="form-group">
                                                <input type="text" name="pass" id="pass" class="form-control" disabled value="<?php echo $id?>"  tabindex="4"   >
                                            </div>
                                        </div>
                                       <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="gender"><small>Gender</small></label>    
                                             <div class="form-group">
                                                <select  name="gender" id="profile_gender" disabled class="form-control show-tick ms select2" data-placeholder="Select"  tabindex="5"   >
                                                   
                                                    <option value = "<?php echo $gender?>"><?php echo $gender?></option>
                                                    <option value="MALE">Male</option>
                                                    <option value="FEMALE">Female</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="dateofbirth"><small>Date of Birth</small></label>    
                                            <div class="form-group">
                                                <input type="date" name="dateofbirth" id="profile_dateofbirth" disabled class="form-control" value="<?php echo $dob?>"  tabindex="6"   >
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
                                                 <input type="email" name="app_email" id="profile_email" class="form-control" disabled value="<?php echo $email?>" tabindex="7"    >
                                              </div>
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                             <label for="app_phonenumber"><small>Applicant Phone Number</small></label>    
                                             <div class="form-group">
                                                 <input type="tel" name="app_phonenumber" id="profile_phonenumber" minlength="11" maxlength="11" class="form-control" value="<?php echo $phone?>" tabindex="8"    >
                                             </div>
                                      </div>
                                   </div>
                                
                                <br>
                                    <div class="row clearfix">
                                    
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="country_res"><small>Country of Residence</small></label>    
                                            <div class="form-group">
                                                <select type="text" name="country_res" id="country_origin"  onchange="getstval();"  tabindex="9"  class="form-control show-tick ms select2" data-placeholder="Select"  >
                                                <option value="<?php echo $country?>"><?php echo $country?> </option>    
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
                                                <select type="text" name="state_res" id="state_origin" onchange="getlgaval();"  tabindex="10"  class="form-control show-tick ms select2" data-placeholder="Select" >
                                                <option value="<?php echo $res_state?>"><?php echo $res_state?> </option>
                                                <option value="">select State</option>
                                                </select>
                                           </div>
                                        </div>
   
                                        <div class="col-lg-4 col-md-4 col-sm-8">
                                            <label for="lga_res"><small> LGA - Residence </small></label>    
                                            <div class="form-group">
                                               <select type="text" name="lga_res" id="lga_origin" class="form-control show-tick ms select2" tabindex="11"   data-placeholder="Select">
                                                   
                                                   <option value="<?php echo $res_lga?>"><?php echo $res_lga?> </option>
                                               </select>
                                           </div>
                                        </div>
                                    </div>

                                    <div class="row clearfix">
                                   
                                         <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="landmark">Landmark</label>
                                              <div class="form-group">
                                                 <input type="text" name="landmark" id="profile_landmark" class="form-control" value="<?php echo $land?>" tabindex="12"  >
                                              </div>
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                             <label for="fulladdress">Street and Full Address</label>    
                                             <div class="form-group">
                                                 <input type="text" name="fulladdress" id="profile_fulladdress" class="form-control" value="<?php echo $add?>" tabindex="13"  >
                                             </div>
                                      </div>
                                         <div class="col-lg-3 col-md-3 col-sm-8">
                                             <label for="town">Town | Area | City</label>
                                              <div class="form-group">
                                                 <input type="text" name="town" id="profile_town"  class="form-control" value="<?php echo $town?>" tabindex="14"  >
                                              </div>
                                         </div>
                                    </div>
                        </section>
                    </div>    
                    
                  

                         
                                
                     <!-- Selected Programme -->   
                     <div class="body">
                            <section>
                                
                         <div class="row clearfix"> 

                                  <div class="col-lg-6 col-md-6 col-sm-8">
                                    <button onclick="profile_update();" class="btn btn-raised btn-success btn-lg btn-block btn-round waves-effect"><h6>Update Form </h6> </button>
                                </div>
                                 
                                      
                              
                         </div>
                            
                           
                            
                        </section>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="processagent" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4  class="title" id="defaultModalLabel" style="display: block; margin-left: auto;margin-right: auto;">Add New Admission Agent</h4>
            </div>
            <div class="modal-body"> 
                <div class="header">
                   </div>
                                    
                 <form method="POST"  class="card auth_form"  >         
                                <div class="row clearfix" style="display: block; margin-left: auto;margin-right: auto;">  
                                <div class="col-lg-8 col-md-8">
                                    <label> Agent Username</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-smartphone"></i></span>
                                        </div>
                                        <input type="text" class="form-control key" id ="agentid" maxlength="12"  minlength="6">
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-8">
                                    <label>Agent Password</label>
                                    <div class="input-group masked-input mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="zmdi zmdi-key"></i></span>
                                        </div>
                                        <input type="text" class="form-control key" id ="agentpwd" maxlength="12"  minlength="6" >
                                    </div>
                                </div>
                                </div>
                       
               
            <div class="modal-footer">
                <button type="submit" onclick="addagent();" class="btn btn-success  waves-effect">Create Agent Account</button>
                <button type="button" class="btn btn-danger waves-effect" data-dismiss="modal">Cancel</button>
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