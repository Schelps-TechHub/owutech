<?php
include "../include/header.php";
?>
<section class="content">
<?php
							
                            if (isset($_SESSION['acctinfo']) && $_SESSION['acctinfo'])
                            {
                              printf('<b>%s</b>', $_SESSION['acctinfo']);
                              unset($_SESSION['acctinfo']);
                            }
                          ?>    
<div class="">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Registry Office</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="welcome.php"><i class="zmdi zmdi-home"></i> Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>
                </div>
            </div>
        </div>
        <div class="container-fluid">


        <div class="row clearfix">
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="<?php
                            $sql = "SELECT count('regnum') FROM  form_bio";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                           echo $row['0'];
                            ?> " data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#00adef" readonly>
                            <p>Students</p>
                         
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="3" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#ee2558" readonly>
                            <p>Falculties</p>
                            
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="<?php
                            $sql = "SELECT count('progid') FROM programmes";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                           echo $row['0'];
                            ?>" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#8f78db" readonly>
                            <p>Departments</p>
                           
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-4 col-sm-6 col-6 text-center">
                    <div class="card">
                        <div class="body">                            
                            <input type="text" class="knob" value="<?php
                            $sql = "SELECT count('id') FROM course where `status` = 1";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                           echo $row['0'];
                            ?>" data-linecap="round" data-width="100" data-height="100" data-thickness="0.08" data-fgColor="#f67a82" readonly>
                            <p>Courses</p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
           
           
          
            
        </div>
    </div>
</section>


<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js ( jquery.v3.2.1, Bootstrap4 js) --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- slimscroll, waves Scripts Plugin Js -->

<script src="assets/bundles/jvectormap.bundle.js"></script> <!-- JVectorMap Plugin Js -->
<script src="assets/bundles/sparkline.bundle.js"></script> <!-- Sparkline Plugin Js -->
<script src="assets/bundles/c3.bundle.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script>
<script src="assets/js/pages/index.js"></script>

<script src="assets/bundles/countTo.bundle.js"></script>
<script src="assets/bundles/knob.bundle.js"></script>
<script src="assets/bundles/sparkline.bundle.js"></script>

<!-- Custom Js -->
<script src="assets/js/pages/widgets/infobox/infobox-1.js"></script>
<script src="assets/js/pages/charts/jquery-knob.js"></script>
</body>


</html>