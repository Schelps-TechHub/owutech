<?php
session_start();
$host = "localhost"; /* Host name */
$user = "root"; /* User */
$password = ""; /* Password */
$dbname = "caps_owu"; /* Database name */

$con = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$con) {
 die("Connection failed: " . mysqli_connect_error());
}

//actuvesesseion
$query_session ="select * from  sessiontbl where status = '1'";
    $result_session = mysqli_query($con, $query_session);
    $row_session = mysqli_fetch_array($result_session);
    $csession_id = $row_session['sessionid']; 
    $csession = $row_session['session'];
	
//active semester	
$query_semseter ="select * from semester where active = 1";
    $result_semseter = mysqli_query($con, $query_semseter);
    $row_semseter = mysqli_fetch_array($result_semseter);
    $csemseter_id = $row_semseter['id']; 
    $csemseter = $row_semseter['semester_name'];

function select_option($name, $id, $table, $con){ //Select name and id
  $sql = "SELECT * FROM $table";
  $result = $con->query($sql) OR die(mysqli_error($con));
  $options = "";

  while($row= $result->fetch_assoc()){
    $name2 = $row ["$name"];
    $id2 = $row ["$id"];
    $options .= "<option value='$id2' >".$name2.'</option>';
  }
   return $options;
}

function select_programme($name, $id, $table, $con){ //Select name and id
  $sql = "SELECT * FROM $table";
  $result = $con->query($sql) or die(mysqli_error($con));
  $options = "";

  while($row= $result->fetch_assoc()){
    $name2 = $row ["$name"];
    $id2 = $row ["$id"];
    $options .= "<option value='$id2' >".$name2.' - '.$row ["institution"].' ('.$row ["mode"].') </option>';
  }
   return $options;
}

function test_input($data) {
	global $con;
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
  
}

 //get value of id22
  function valueOfid($id, $field,$table){
global $con;
	 $query = "SELECT $field
                FROM $table WHERE id = '$id'"; 
    $data = mysqli_query($con, $query);
    //$seerow = mysqli_fetch_array($data);
 $seerow = mysqli_fetch_array($data);
                $name1 = $seerow["$field"];
                //echo $name1;
    return $name1;
}


//custom select for course allocation
function courseallocation($table, $glevel, $semester, $con)
{

$query = "SELECT * FROM $table WHERE levelid = '$glevel' AND semesterid = '$semester' ORDER BY id";
$sql = mysqli_query($con, $query) or die(mysqli_error($con));
        while($row = mysqli_fetch_array($sql))
        {		$name0 = $row["id"];
                $name1 = $row["course_code"].' - '.$row["course_name"];
                $display = '<option value = "'.$name0.'">'.$name1.'</option>';
                echo $display;
        }

}



# drop down from database
function selectstaff($table, $con)
{

$query = "SELECT * FROM $table";
$sql = mysqli_query($con, $query) or die(mysqli_error($con));
        while($row = mysqli_fetch_array($sql))
        {			$name0 = $row["userid"];
                $name1 = $row["firstname"]; 
				$name2 = $row["lastname"];
				$name3 = $row["othername"];
                $display = '<option value = "'.$name0.'">'.$name1.' '.$name2.' '.$name3.'</option>';
                echo $display;
        }

}