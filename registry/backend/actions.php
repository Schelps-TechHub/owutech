<?php
include "dbconfig.php";
 
 
//adding new course
if (isset($_POST['savecourse'])) {
$name = $_POST['coursename'];
$code = $_POST['coursecode'];
$unit = $_POST['courseunit'];
//$department = $_POST['departmentid'];
$semester = $_POST['semesterid'];
$level = $_POST['levelid'];	
$programme = $_POST['programme'];	

$name = test_input($name);
$code = test_input($code);
$unit = test_input($unit);
//$department = test_input($department);
$semester = test_input($semester);
$level = test_input($level);
$programme = test_input($programme);
//$usergender = test_input($usergender);

$name = strtolower(stripslashes(strtolower($name)));
$code = strtolower(stripslashes(strtolower($code)));
$unit = strtolower(stripslashes(strtolower($unit)));
//$department = strtolower(stripslashes(strtolower($department)));
$semester = strtolower(stripslashes(strtolower($semester)));
$level = strtolower(stripslashes(strtolower($level)));
$programme = strtolower(stripslashes(strtolower($programme)));

$name = $con->real_escape_string($_POST['coursename']);
$code = $con->real_escape_string($_POST['coursecode']);
$unit = $con->real_escape_string($_POST['courseunit']);
//$department = $con->real_escape_string($_POST['departmentid']);
$semester = $con->real_escape_string($_POST['semesterid']);
$level = $con->real_escape_string($_POST['levelid']);
$programme = $con->real_escape_string($_POST['programme']);


//$slugify = str_replace(" ", "-", $categoryname);
//$slugify = strtolower($slugify);

$predup = mysqli_query($con, "SELECT * FROM `course` WHERE course_code = '$code' AND levelid = '$level' AND semesterid = '$semester' ");
if($predup->num_rows > 0) {
 echo'<div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Oops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                 This course alredy exist. Please check for duplicate record!
                 </div>
        </div>';
				
		
} else {
 // Check extension
//$created = date("Y-m-d H:i:s"); 
$sql_result = mysqli_query($con, "INSERT INTO `course` (course_name, course_code, course_unit, semesterid, levelid, status) VALUES('$name', '$code', '$unit', '$semester', '$level', '1')");
	if ($sql_result) {
			 echo '<div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                  Course Created Successfully!
                 </div>
        </div>
		';
			
}
else {
echo'  <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                  An error occured: Error Adding Course!
                 </div>
        </div>';
			
		
	}
	
}
}

//setting course allocation	
if (isset($_GET['leveltoallocate']))  {
    //print_r($_POST);
      $selectedlevel= $con->real_escape_string($_GET['leveltoallocate']);

$predup = mysqli_query($con, "SELECT * FROM `level` WHERE id = '$selectedlevel'");
if ($predup->num_rows > 0) {

 $_SESSION['selectedlevel'] = $selectedlevel;
			header('location: ../pages/allocate_courses.php'); 
		
} else {
		
$_SESSION['report'] = '<div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Operation Failed!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
             A Fatal Error Has Been Encountered! Please try again later
                 </div>
        </div>';

			header('location: ../pages/manage_course_allocation.php'); 	
			
    } 
}



//course allocation
if (isset($_POST['allocatecourse'])) {
$courseid = $_POST['courseid'];
$staffid = $_POST['staffid'];
$sessionid = $_POST['sessionid'];
$semesterid = $_POST['semesterid'];
$levelid = $_POST['levelid'];	

$courseid = test_input($courseid);
$staffid = test_input($staffid);
$sessionid = test_input($sessionid);
$semesterid = test_input($semesterid);
$levelid = test_input($levelid);
//$usergender = test_input($usergender);
$courseid = strtolower(stripslashes(strtolower($courseid)));
$staffid = strtolower(stripslashes(strtolower($staffid)));
$sessionid = strtolower(stripslashes(strtolower($sessionid)));
//$department = strtolower(stripslashes(strtolower($department)));
$semesterid = strtolower(stripslashes(strtolower($semesterid)));
$levelid = strtolower(stripslashes(strtolower($levelid)));

$courseid = $con->real_escape_string($courseid);
$staffid = $con->real_escape_string($staffid);
$sessionid = $con->real_escape_string($sessionid);
//$department = $con->real_escape_string($_POST['departmentid']);
$semesterid = $con->real_escape_string($semesterid);
$levelid = $con->real_escape_string($levelid);

$predup = mysqli_query($con, "SELECT * FROM `course_allocation` WHERE courseid = '$courseid' AND sessionid = '$sessionid'");
if ($predup->num_rows > 0) {

echo'  <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                 This course alredy been allocated to a lecturer. To re-allocate course, delete previous allocation in the table below
                 </div>
        </div>';
		
} else {
 // Check extension
//$created = date("Y-m-d H:i:s"); 
$sql_result = mysqli_query($con, "INSERT INTO `course_allocation` (staffid, courseid, sessionid, levelid, semesterid) VALUES('$staffid', '$courseid', '$sessionid', '$levelid', '$semesterid')");
	if ($sql_result) {

echo'  <div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Success!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                 Course has been allocated successfully
                 </div>
        </div>';
$_SESSION['redirect'] = 'yes';
}
else {

echo'  <div class="alert alert-danger alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
               An Unknown error occured. Please try again later
                 </div>
        </div>';
		
	}
	
}
}



//delete Allocation
if (isset($_GET['delete_allocation'])) {	
$delete_allocation = $con->real_escape_string($_GET['delete_allocation']);
//filter user input
$delete_allocation = test_input($delete_allocation);
//prevent sql injection here


if ($delete_allocation == '0' || $delete_allocation ==' ' ) {

$_SESSION['report'] = '<div class="alert alert-danger alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Operation Failed!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
           You are not getting something right
                 </div>
        </div>';

	header('location: ../pages/allocate_courses.php');  
 }
//find if allocation has alreadyy beeen deleted
$find = mysqli_query($con,"SELECT * FROM course_allocation WHERE allot_id = '$delete_allocation'");
if ($find->num_rows == 0) {

$_SESSION['report'] = '<div class="alert alert-danger alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Operation Failed!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
          Seems You are not getting something right. Try again later
                 </div>
        </div>';
		

			header('location: ../pages/allocate_courses.php'); 
}else {
$keep = mysqli_query($con,"DELETE FROM course_allocation WHERE allot_id = '$delete_allocation'");
	if ($keep) {
	
$_SESSION['report'] = '<div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Deleted Successfully!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
        You have successfully deleted an allocation. You can now re-allocate this course to another lecturer!
                 </div>
        </div>';
	
			header('location: ../pages/allocate_courses.php'); 
} else {

$_SESSION['report'] = '<div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Operation Failed!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
      An error occured while deleting course alloaction! Try again later
                 </div>
        </div>';
			header('location: ../pages/allocate_courses.php');
		
	}
	
}


}
    ?>