<?php
include "dbconfig.php";
if(!empty($_GET['stateid'])) {
        $stateid = $_GET["stateid"];     
		
        $sql_query = "select lga from location where state = '$stateid' ORDER BY lga ASC " ;
        $result = mysqli_query($con,$sql_query);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row

?>
 <option value="">Select LGA </option>
<?php
          while($row = mysqli_fetch_assoc($result)) {
           
?>
<option value="<?php echo $row["lga"] ?>"><?php echo $row["lga"]?></option>
<?php

}
}
}
?>
<?php
if(!empty($_GET['modeid'])) {
        $mode = $_GET["modeid"];     
		$_SESSION["mode"] = $mode;
        $sql_query = "select DISTINCT program from programmes where mode = '$mode' ORDER BY program ASC " ;
        $result = mysqli_query($con,$sql_query);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row

?>
 <option value="">Select Programme </option>
<?php
          while($row = mysqli_fetch_assoc($result)) {
           
?>
<option value="<?php echo $row["program"] ?>"><?php echo strtoupper($row["program"])?></option>
<?php

}
}
}
?>

<?php
if(!empty($_GET['progid'])) {
        $prog = $_GET["progid"];     
		$mode = $_SESSION["mode"] ;
        $sql_query = "select DISTINCT course, progid from programmes where program = '$prog' and mode = '$mode' ORDER BY course ASC " ;
        $result = mysqli_query($con,$sql_query);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row

?>
 <option value="">Select Course </option>
<?php
          while($row = mysqli_fetch_assoc($result)) {
           
?>
<option value="<?php echo $row["progid"] ?>"><?php echo strtoupper($row["course"])?></option>
<?php

}
}
}
?>