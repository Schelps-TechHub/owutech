<?php
include "../include/header.php";
?>
<section class="content">
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>My Registration Forms</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html"><i class="zmdi zmdi-home"></i> Admission Registration Forms</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);"> Registration Forms</a></li>
                        <li class="breadcrumb-item active">All Forms</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
            

            <!-- Exportable Table -->
            <div class="row clearfix">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="header">
                            <h2><strong>Registration </strong> Forms </h2>
                            
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            
                                            <th>Passport</th>
                                            <th>Registration Number</th>
                                            <th>Fullname</th>
                                            <th>Application Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                            <th>Passport</th>
                                            <th>Registration Number</th>
                                            <th>Fullname</th>
                                            <th>Application Details</th>
                                            <th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
 <?php
  $userid = 	$_SESSION['uniqueid'];
                                 
$sql_query = "SELECT form_owner.regnum as regid, form_owner.status, form_bio.regnum, form_bio.firstname, form_bio.othername, form_bio.surname, form_bio.passport, form_prog.regnum, form_prog.progid, programmes.course, programmes.program FROM form_owner 
LEFT JOIN form_bio ON form_owner.regnum = form_bio.regnum
LEFT JOIN form_prog ON form_owner.regnum = form_prog.regnum 
LEFT JOIN programmes ON form_prog.progid = programmes.progid
where `userid` = 'schelps';  " ;
$result = mysqli_query($con,$sql_query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
    if($row["status"] == 11){
$button = '<a href="../backend/preprintform.php?regnum='.$row["regid"].'" type = "button" class="btn btn-raised btn-success btn-lg btn-block btn-round waves-effect"> View and Print Form </a>';
    }
    if($row["status"] == 1){
        $button = '<a href="../backend/preprintform.php?regnum='.$row["regid"].'" type = "button" class="btn btn-raised btn-primary btn-lg btn-block btn-round waves-effect"> Form Filled, Upload Documents </a>';
            }
    elseif($row["status"] == 0){
        $button = '<a href="../backend/preadmissionform.php?regnum='.$row["regid"].'" type = "button" class="btn btn-raised btn-warning btn-lg btn-block btn-round waves-effect"> Passport Uploaded, Fill Form </a>';
            }
echo '
                                        <tr>
                                            
                                            <td><img src="../../index/backend/image/'.$row['passport'].'"  width="100" alt="profile-image"></td>
                                            <td>'.$row["regid"].'</td>
                                            <td>'.$row["firstname"]." ".$row["othername"]." ".$row["surname"].'</td>
                                            <td>'.$row["course"].'<br>'.$row["program"].'</td>
                                           <td>'.$button.'</button> 
                                        </tr>';
                                        ?>
                                        <?php }}?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>


<!-- Jquery Core Js --> 
<script src="assets/bundles/libscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 
<script src="assets/bundles/vendorscripts.bundle.js"></script> <!-- Lib Scripts Plugin Js --> 

<!-- Jquery DataTable Plugin Js --> 
<script src="assets/bundles/datatablescripts.bundle.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/dataTables.buttons.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.bootstrap4.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.colVis.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.flash.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.html5.min.js"></script>
<script src="assets/plugins/jquery-datatable/buttons/buttons.print.min.js"></script>

<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>


</html>