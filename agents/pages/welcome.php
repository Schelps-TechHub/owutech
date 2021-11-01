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
                    <h2>Admission Advisor</h2>
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
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon traffic">
                        <div class="body">
                            <h6>Registration<br> Forms</h6>
                            <h2> <?php
                            $sql = "SELECT count('id') FROM form_owner where userid = '$id'";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                           echo $row['0'];
                            ?>
                                <small class="info"> Forms</small></h2>
                            <small>as at today <?php echo date("d-m-Y");?></small>
                            <div class="progress">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon email">
                        <div class="body">
                        <h6>Submitted<br> Forms</h6>
                            <h2><?php
                            $sql = "SELECT count('id') FROM form_owner where userid = '$id' and `status` = 1";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                           echo $row['0'];
                            ?> <small class="info"> Forms</small></h2>
                            <small>as at today <?php echo date("d-m-Y");?></small>
                            <div class="progress">
                                <div class="progress-bar l-blue" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon email">
                        <div class="body">
                        <h6>Unsubmitted<br> Forms</h6>
                            <h2><?php
                            $sql = "SELECT count('id') FROM form_owner where userid = '$id' and `status` = 0";
                            $result = mysqli_query($con,$sql);
                            $row = mysqli_fetch_array($result);
                           echo $row['0'];
                            ?> <small class="info"> Forms</small></h2>
                            <small>as at today <?php echo date("d-m-Y");?></small>
                            <div class="progress">
                                <div class="progress-bar l-amber" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12">
                    <div class="card widget_2 big_icon domains">
                        <div class="body">
                        <h6>Admission <br> Letters</h6>
                            <h2>0 <small class="info">applicants</small></h2>
                            <small>as at today <?php echo date("d-m-Y");?></small>
                            <div class="progress">
                                <div class="progress-bar l-green" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%;"></div>
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
</body>


</html>