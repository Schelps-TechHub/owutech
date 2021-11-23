<?php
include "../include/header.php";
?>
<section class="content">
<?php
if(isset($_SESSION['selectedlevel'])){
$glevel =  $_SESSION['selectedlevel'];
}else{
	$_SESSION['report'] = " <script>Swal.fire(
  'Operation Failed',
  'A Fatal Error Has Been Encountered! Please try again later',
  'warning'
)</script>";

			header('location: manage_course_allocation'); 	
}
					?>
					
		<?php
    
      if(isset($_SESSION['report'])){
        echo "
         
            <p>".$_SESSION['report']."</p> 
        
        ";
        unset($_SESSION['report']);
      }
    ?>
	<?php
    
  
         // header( "refresh:5;url=wherever.php" );
      
       
   
    ?>
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Course Allocation</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="coursebank.php"><i class="zmdi zmdi-home"></i> Course Module</a></li>
                        <li class="breadcrumb-item"><a href="manage_course_allocation.php">Course Allocation</a></li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

        <div class="container-fluid">
             <!--display feedback-->
					   <div id="feedback">

                        </div>
			<?php
    
      if(isset($_SESSION['report'])){
        echo "
         
            <p>".$_SESSION['report']."</p> 
        
        ";
        unset($_SESSION['report']);
      }
    ?>

             <div class="col-lg-12">
			
							
							
                    <div class="alert alert-info"><h2> <?php echo valueOfid($glevel, 'level_name','level').' '. $csemseter.' '.$csession; ?>  Course Allocation</h2></div>           
 </div>
 
<form>
<div class="form-row">
                                    <div class="col-md-5 mb-3">
                                        <label for="validationServer01">Course</label>
                                      <select name="courseid" id="courseid" class="form-control show-tick ms select2" required>
											<option selected disabled  value="">Select Course</option>
                                           <?php 
										echo courseallocation('course',$glevel, $csemseter_id, $con);
											?>
                                            </select>
                                        
                                    </div>
                                    <div class="col-md-5 mb-3">
                                        <label for="validationServer02">Lecturer</label>
                                       <select name="staffid" id="staffid" class="form-control show-tick ms select2" required>
											<option selected disabled value="">Select Lecturer</option>
                                           <?php echo selectstaff('users_tbl', $con);
										   ?>
                                            </select>
                                    </div>
									
									<input name="sessionid" id="sessionid" type="hidden" value="<?php echo $csession_id; ?>">
										<input name="levelid" id="levelid" type="hidden" value="<?php echo $glevel; ?>">
										<input name="semesterid" id="semesterid" type="hidden" value="<?php echo $csemseter_id; ?>">
										<input name="allocatecourse" id="allocatecourse" type="hidden" value="allocatecourse">
										
                                    <div class="col-md-2 mb-3">
                                        <label for="validationServerUsername">Allocate</label>
                                        <div class="input-group">
                                          <button onclick="allocate_course();" id="allocate" class="btn btn-info bt-lg">Allocate Course</button>
                                        </div>
                                    </div>
                                </div>
								
								
	





<div class="row" id="div">
  	
    
      <div class="table-responsive">
											<table id="datable_1" class="table table-hover display  pb-30" >
												<thead>
													<tr>
														<th>S/N</th>
														<th>Coure Title</th>
														<th>Course Code</th>
														<th>Course Unit</th>
														<th>Allocated To</th>
														<th>Phone Number</th>
														<th>Action</th>
													</tr>
												</thead>
												<!--<tfoot>
													<tr>
														<th>#</th>
														<th>Course</th>
														<th>Level</th>
														<th>Semester</th>
														<th>Session</th>
														<th>Action</th>
													</tr>
												</tfoot>-->
												<tbody>
												
												<?php
$result3 = mysqli_query($con,"SELECT * FROM course_allocation ca, users_tbl stf, course c  WHERE ca.courseid = c.id AND ca.sessionid = '$csession_id' AND ca.staffid = stf.userid AND ca.levelid = '$glevel' AND ca.semesterid = '$csemseter_id'");

										if ($result3->num_rows > 0) 
										{
											$number = 1;
    while($row = mysqli_fetch_array($result3)){	
	if ($row['status'] == 1 ) {
$cstat = "<span class='label label-success'>Active</span>";
	}	
else {
$cstat = "<span class='label label-warning'>Inactive</span>";
}			
	
	echo "
	 <tr ng-repeat='reg in registration' class='ng-scope'>

                          <td>".$number."</td>
                          <td>".$row['course_name']."</td>
                          <td>".$row['course_code']."</td>
                          <td>".$row['course_unit']."</td>
                         <td>".$row['firstname']." ".$row['lastname']." ".$row['othername']." </td>
						  <td>".$row['phonenumber']." </td>
                        <td> <a href='../backend/actions.php?delete_allocation=".$row['allot_id']."'><span onclick='function();' class='label label-danger'><i class='fa fa-trash'></i> Re-Allocate</span></a></td>
                                                </tr>";
						  ++$number;
        }
	
										} else {					?>
	 
									   <td class="ng-binding" colspan="7"> <div class="alert alert-info" role="alert">
                                      No Course allocation data found
                                    </div></td>
												
									
										<?php } ?>	
										
												</tbody>
											</table>
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
<script src="assets/js/pages/forms/form-wizard.js"></script>
<script src="assets/js/feed.js"></script>
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>

<script type="text/javascript">
        $(window).on('load', function (e) {
            $('#allocate').on('click', function (e) {
                $("#div").load(" #div > *");
            });
        });
        </script>
</html>