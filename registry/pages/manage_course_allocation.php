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
                    <h2>Manage Course Allocation</h2>
                    <ul class="breadcrumb">
                        <li class="breadcrumb-item"><a href="welcome.php"><i class="zmdi zmdi-home"></i> Registry Office</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Course Allcoation</a></li>
                        <li class="breadcrumb-item active">Allocation Category</li>
                    </ul>
                    <button class="btn btn-primary btn-icon mobile_menu" type="button"><i class="zmdi zmdi-sort-amount-desc"></i></button>
                </div>
                <div class="col-lg-5 col-md-6 col-sm-12">                
                    <button class="btn btn-primary btn-icon float-right right_icon_toggle_btn" type="button"><i class="zmdi zmdi-arrow-right"></i></button>                                
                </div>
            </div>
        </div>

							
                    
			
        <div class="container-fluid">
           <?php
    
      if(isset($_SESSION['report'])){
        echo "
         
            <p>".$_SESSION['report']."</p> 
        
        ";
        unset($_SESSION['report']);
      }
    ?>
			 <div class="row">					
								
           	<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-info card-view">
							<div class="panel-wrapper">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font center weight-500 font-14 block text-center txt-dark"><strong><center>ND 1 <?php echo $csession; ?> Courses</center></strong></span>
								
									<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
										 <span id="lblstats_disk_usage_count">		
											<input type="hidden" name="leveltoallocate" value="1">
										 <a href="../backend/actions.php?leveltoallocate=1" type="submit" class="btn btn-primary">Manage Allocation</a>
										 </span>
									</div>
							
								
								</div>
                            </div>
                        </div>
					</div>
       

						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-info card-view">
							<div class="panel-wrapper">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font center weight-500 font-14 block text-center txt-dark"><strong><center>ND 2 <?php echo $csession; ?> Courses</center></strong></span>
									
									<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
										 <span id="lblstats_disk_usage_count">		
											<input type="hidden" name="leveltoallocate" value="2">
										 <a href="../backend/actions.php?leveltoallocate=2" type="submit" class="btn btn-primary">Manage Allocation</a>
										 </span>
									</div>
								
								</div>
                            </div>
                        </div>
					</div>
					
					
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-info card-view">
							<div class="panel-wrapper">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font center weight-500 font-14 block text-center txt-dark"><strong><center>HND 1 <?php echo $csession; ?> Courses</center></strong></span>	
									<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
										 <span id="lblstats_disk_usage_count">		
											<input type="hidden" name="leveltoallocate" value="3">
										 <a href="../backend/actions.php?leveltoallocate=3" type="submit" class="btn btn-primary">Manage Allocation</a>
										 </span>
									</div>
							
								
								</div>
                            </div>
                        </div>
					</div>
					
						<div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
							<div class="panel panel-info card-view">
							<div class="panel-wrapper">
                                <div class="panel-body sm-data-box-1">
									<span class="uppercase-font center weight-500 font-14 block text-center txt-dark"><strong><center> HND 2 <?php echo $csession; ?> Courses</center></strong></span>
										
									<div class="cus-sat-stat weight-500 txt-success text-center mt-5">
										 <span id="lblstats_disk_usage_count">		
											<input type="hidden" name="leveltoallocate" value="4">
										 <a href="../backend/actions.php?leveltoallocate=4" type="submit" class="btn btn-primary">Manage Allocation</a>
										 </span>
									</div>
							
								
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


<script src="assets/bundles/mainscripts.bundle.js"></script><!-- Custom Js --> 
<script src="assets/js/pages/tables/jquery-datatable.js"></script>
</body>


</html>