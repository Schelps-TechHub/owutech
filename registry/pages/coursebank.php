<?php
include "../include/header.php";
?>
<section class="content">
<?php
							
                            if (isset($_SESSION['response']) && $_SESSION['response'])
                            {
                              printf('<b>%s</b>', $_SESSION['response']);
                              unset($_SESSION['response']);
                            }
                          ?> 
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Course Bank</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="welcome.php"><i class="zmdi zmdi-home"></i> Course Module</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Courses</a></li>
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
                      <!--display feedback-->
					   <div id="feedback">

                        </div>
						
						<div class="header pull-left">
                            <button type="button" class="btn btn-primary waves-effect m-r-20 pull-right" data-toggle="modal" data-target="#defaultModal">Add New Course</button>
                             
                        </div>
                        <div class="body">
                            <div class="table-responsive" id="div">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            
														<th>Coure Title</th>
														<th>Course Code</th>
														<th>Course Unit</th>
														<th>Level</th>
														<th>Semster </th>
														<th>Status</th>
														<th>Action</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            
                                           
														<th>Coure Title</th>
														<th>Course Code</th>
														<th>Course Unit</th>
														<th>Level</th>
														<th>Semster </th>
														<th>Status</th>
														<th>Action</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
 <?php
  $userid = 	$_SESSION['uniqueid'];
                                 
$sql_query = "SELECT * FROM course c, semester s, level l WHERE c.semesterid = s.id AND c.levelid = l.id" ;
$result = mysqli_query($con,$sql_query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {
   if ($row['status'] == 1 ) {
$cstat = '<button type="button" class="btn btn-raised m-b-10 btn-success waves-effect" data-placement-from="bottom" data-placement-align="center" data-animate-enter="" data-animate-exit="" data-color-name="alert-success"> Active </button>';
	}	
else {
$cstat = '<button type="button" class="btn btn-raised m-b-10 btn-danger waves-effect" data-placement-from="bottom" data-placement-align="left" data-animate-enter="" data-animate-exit="" data-color-name="alert-danger"> Inactive </button>';
}	

  
   
echo "
                                        <tr>
                                            
                                            <td>".$row['course_name']."</td>
                          <td>".$row['course_code']."</td>
                          <td>".$row['course_unit']."</td>
						   <td>".$row['level_name']." </td>
                          <td>".$row['semester_name']."</td>
                          <td>".$cstat."</td>
                         <td><span onclick='function();' class='label label-info'><p><i class='zmdi zmdi-hc-fw'></i> <span>edit</span></p> </span></td>
                                        </tr>";
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



<div class="modal fade" id="defaultModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="title" id="defaultModalLabel">Add New Course</h4>
            </div>
            <div class="modal-body"> 



                                    <div class="modal-body">
				 <form action="../backend/actions.php" method="post">
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Course Title:</span>
                                           <input type="text" name="coursename" id="coursename" placeholder="E.g: Introduction To Maths" class="form-control" required="required"/>
                                        </div>
                                        <div class="form-group input-group">
                                            <span class="input-group-addon">Course Code:</span>
                                          <input type="text" placeholder="E.g: MTH 101" name="coursecode" id="coursecode" class="form-control" required="required" />
                                        </div> 

										 <div class="form-group input-group">
										<span class="input-group-addon">Course Unit:</span>
                                    <select name="courseunit" id="courseunit" class="form-control show-tick ms select2" data-placeholder="Select">
                                      	<option value="">-- select --</option>
                                       <option value="0">0</option>
									<option value="1">1</option>
									<option value="2">2</option>
									<option value="3">3</option>
									<option value="4">4</option>
									<option value="5">5</option>
									<option value="6">6</option>
                                    </select>
									
										</div>
										
									
									
									<div class="form-group input-group">
										<span class="input-group-addon">Semster:</span>
                                    <select name="semesterid" id="semesterid" class="form-control show-tick ms select2" data-placeholder="Select">
                                     	<option value="select">- select semester -</option>
										<?php  echo select_option('semester_name', 'id', 'semester', $con); ?>
                                    </select>
									
										</div>
										
                                     
									 
									 	<div class="form-group input-group">
										<span class="input-group-addon">Level:</span>
                                    <select name="levelid" id="levelid" class="form-control show-tick ms select2" data-placeholder="Select">
                                     	<option value="select">- select level -</option>
        <?php  echo select_option('level_name', 'id', 'level', $con); ?>
                                    </select>
									
										</div>
										
									<div class="form-group input-group">
										<span class="input-group-addon">Programmes:</span>
                                    <select name="programme" id="programme" class="form-control show-tick ms select2" data-placeholder="Select">
                                     	<option value="select">- select programme -</option>
        <?php  echo select_programme('course', 'progid', 'programmes', $con); ?>
                                    </select>
									
										</div>
										
										
                                        <div class="clearfix"></div>
                                                                                                              
                                     </div>
                                     <div class="modal-footer">
                                             <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                             <button onclick="add_course();" name="savecourse" id="savecourse" class="btn btn-primary">Add Course</button>
                                         </div>
                                </form>


								</div>
           
        </div>
    </div>
</div>
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
            $('#savecourse').on('click', function (e) {
                $("#div").load(" #div > *");
            });
        });
        </script>
</html>