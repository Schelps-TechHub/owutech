<?php
include "../backend/dbconfig.php";
?>

<!-- Main Content -->

<?php

 $formnum = $_SESSION['formid'];
                          
 $sql = "select * from form_bio where regnum = '$formnum'" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
  // output data of each row
 $firstname = $row["firstname"];
 $othername = $row["othername"];
 $surname = $row["surname"];
 $gender = $row["gender"];
 $dob = $row["dateofbirth"];

  //Programme

 $sql = "select form_prog.progid, form_prog.entry, form_prog.olevel, programmes.progid, programmes.program, programmes.course, programmes.mode  from form_prog LEFT JOIN programmes on form_prog.progid = programmes.progid where regnum = '$formnum'" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
 $mode = $row["mode"];
 $entry = $row["entry"];
 $olevel = $row["olevel"];
 $program = $row["program"];
 $course = $row["course"];

?>
<!doctype html>
<html class="no-js " lang="en">


<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=Edge">
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
<meta name="description" content=" Owutech Portal :: Admission Registration Form">

<title>:: Owutech Portal :: Print Admission Form</title>
<!-- Favicon-->
<link rel="icon" href="assets/images/logo.png" type="image/x-icon">
<!-- Custom Css -->
<link rel="stylesheet" href="assets/plugins/bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" href="assets/css/style.min.css">  
<script> 
         function tg() { 
            $('#butt').hide();
            $('#addition').show();
        window.print();
        $('#butt').show();
        $('#addition').hide();
        } </script>
</head>

<body class="theme-blush">


<section style="display: block; text-align:center; margin-left: auto;margin-right: auto;" class="col-lg-10 col-md-12 col-sm-12" class="content">
<?php
							
                            if (isset($_SESSION['reginfo']) && $_SESSION['reginfo'])
                            {
                              printf('<b>%s</b>', $_SESSION['reginfo']);
                              unset($_SESSION['reginfo']);
                            }
                          ?>
    
        <div class="row">
        <img class="logo" style="display: block; margin-left: auto;margin-right: auto;" src="assets/images/logo.png" alt="">
       
    </div>
    <div class="row"> 
    <h4 style="display: block; margin-left: auto;margin-right: auto;">Owu College of Management Technology</h4> 
   </div> 
    <div class="row"> 
    <h5 style="display: block; margin-left: auto;margin-right: auto;"><u>Provisional Admission Notice</u></h5> 
   </div> 
     
    
    
        <div class="container-fluid">
            <!-- Registration Form -->
            <div class="row clearfix">
                <div class="col-lg-8 col-md-8 col-sm-12">
                    <div class="card">
                    <form method="POST"  class="card auth_form"   >
                    <!-- Bio Data -->   
                    <div class="body">
                            <section>
                            
                                     <div class="header">
                                 <a ><img src="../backend/<?php echo   $_SESSION['passport']?>"  width="100" height="100" alt="profile-image"></a><br>
                                   
                                    </div>
                                    
                                     <div class="row clearfix">
                                     <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Applicant Number</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo $formnum ?></strong></p>
                                              </div>
                                      </div>
                                         <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Full Name</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo strtoupper($firstname." ".$othername." ".$surname) ?></strong></p>
                                              </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Gender</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo  strtoupper($gender)?></strong></p>
                                              </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Date of Birth</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo $dob?></strong></p>
                                              </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Course</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo  strtoupper($course)?></strong></p>
                                              </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Programme of Study</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo  strtoupper($program)?></strong></p>
                                              </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Mode of Study</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo strtoupper($mode)?></strong></p>
                                              </div>
                                      </div>
                                      <div class="col-lg-4 col-md-4 col-sm-8">
                                             <label for="firstname"><small>Mode of Entry</small></label>
                                              
                                         </div>
                                        <div class="col-lg-6 col-md-6 col-sm-8">
                                                
                                             <div class="form-group">
                                                 <p><strong><?php echo  strtoupper($entry)?></strong></p>
                                              </div>
                                      </div>
                                        
                                   </div>
                                
                                
                        </section>
                    </div>       

                    </form>
                </div>
            </div>
           <div class="col-lg-4 col-md-10 col-sm-10">
           
                    <div class="card pricing pricing-item">
                        <div class="pricing-deco l-green">
                            <svg class="pricing-deco-img" enable-background="new 0 0 300 100" height="100px" id="Layer_1" preserveAspectRatio="none" version="1.1" viewBox="0 0 300 100" width="300px" x="0px" xml:space="preserve" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns="http://www.w3.org/2000/svg" y="0px">
                                <path class="deco-layer deco-layer--1" d="M30.913,43.944c0,0,42.911-34.464,87.51-14.191c77.31,35.14,113.304-1.952,146.638-4.729&#x000A;	c48.654-4.056,69.94,16.218,69.94,16.218v54.396H30.913V43.944z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--2" d="M-35.667,44.628c0,0,42.91-34.463,87.51-14.191c77.31,35.141,113.304-1.952,146.639-4.729&#x000A;	c48.653-4.055,69.939,16.218,69.939,16.218v54.396H-35.667V44.628z" fill="#FFFFFF" opacity="0.6"></path>
                                <path class="deco-layer deco-layer--3" d="M43.415,98.342c0,0,48.283-68.927,109.133-68.927c65.886,0,97.983,67.914,97.983,67.914v3.716&#x000A;	H42.401L43.415,98.342z" fill="#FFFFFF" opacity="0.7"></path>
                                <path class="deco-layer deco-layer--4" d="M-34.667,62.998c0,0,56-45.667,120.316-27.839C167.484,57.842,197,41.332,232.286,30.428&#x000A;	c53.07-16.399,104.047,36.903,104.047,36.903l1.333,36.667l-372-2.954L-34.667,62.998z" fill="#FFFFFF"></path>
                            </svg>
                            <div class="pricing-price"><span class="pricing-currency">&#8358;</span>1000 <span class="pricing-period">only</span>
                            </div>
                            <h3 class="pricing-title">Portal Enrolment Fee</h3>
                        </div>
                        <div class="body">
                            <ul class="feature-list list-unstyled">
                                <li>1. Pay &#8358;1,000 Portal Enrolment Fee</li>
                                <li>2. Complete Online Documentation</li>
                                <li>3. Print Admission Letter</li>
                               
                                <li><button class="btn btn-success">Proceed to Pay ==></button></li>
                            </ul>
                        </div>
                    </div>
                
           </div>


        </div>
    </div>
</section>
</div>
        </div>
    </div>

</body>
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