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
    <div class="body_scroll">
        <div class="block-header">
            <div class="row">
                <div class="col-lg-7 col-md-6 col-sm-12">
                    <h2>Admission Office</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="welcome.php"><i class="zmdi zmdi-home"></i> Admission Office</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Manage Agents</a></li>
                        <li class="breadcrumb-item active">View Agents</li>
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
                        <div class="row clearfix">
                        <div class="col-lg-6">
                            <h2><strong>Admission Advisors </strong> Add and Manage Agents </h2>
                        </div> 
                        <div class="col-lg-6">
                        <button data-toggle="modal" data-target="#processagent" class="btn btn-raised btn-primary" style="float: right;"><h6>Add New Agent</h6> </button> 
                        </div> 
                        </div>
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                            
                                            <th>S/N</th>
                                            <th>Agent Username</th>
                                            <th>Fullname</th>
                                            <th>Submitted Forms</th>
                                            <th>Incomplete Forms</th>
                                            <th>Unfilled Forms</th>
                                            <th>Manage</th>
                                        </tr>
                                    </thead>
                                    <tfoot>
                                        <tr>
                                            <th>S/N</th>
                                            <th>Agent Username</th>
                                            <th>Fullname</th>
                                            <th>Submitted Forms</th>
                                            <th>Incomplete Forms</th>
                                            <th>Unfilled Forms</th>
                                            <th>Manage</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
 <?php
 $count = 1;
  $query=$conn->prepare("SELECT users_access.userid, users_access.agent,
   users_tbl.userid, users_tbl.firstname, users_tbl.othername, users_tbl.lastname, users_tbl.regtime 
    FROM users_access 
  LEFT JOIN users_tbl ON users_access.userid = users_tbl.userid 
  where agent = 1 ORDER BY users_tbl.regtime  DESC");
 $query->setFetchMode(PDO::FETCH_OBJ);
 $query->execute();
  while($row=$query->fetch())
  {
      
      
  ?>                              

<?php
 $userid =  $row->userid;
 $firstname =  $row->firstname;
 $othername =  $row->othername;
 $lastname =  $row->lastname;
    $sql = "SELECT COUNT('id') as complete from form_owner where userid = '$userid' and `status` = 11" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
  // output data of each row
 $complete = $row["complete"];
 $sql = "SELECT COUNT('id') as incomplete from form_owner where userid = '$userid' and `status` = 1" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
  // output data of each row
 $incomplete = $row["incomplete"];
 $sql = "SELECT COUNT('id') as ncomplete from form_owner where userid = '$userid' and `status` = 0" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_assoc($result);
  // output data of each row
 $ncomplete = $row["ncomplete"];

$button = '<a href="studentinfo.php?ref='.$userid.'" type = "button" class="btn btn-raised btn-default btn-lg btn-block btn-round waves-effect"> Manage Agent </a>';
  
   
echo '
                                        <tr>
                                        <td>'.$count++.'</td>
                                            <td>'.$userid.'</td>
                                            <td>'.$firstname." ".$othername." ".$lastname.'</td>
                                            <td><p>'.$complete.'</p></td>
                                            <td><p>'.$incomplete.'</p></td>
                                            <td><p>'.$ncomplete.'</p></td>
                                            
                                           <td>'.$button.'</button> 
                                        </tr>';
                                        ?>
                                        <?php }?>
                                        
                                    </tbody>
                                </table>
                            </div>
                        </div>
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