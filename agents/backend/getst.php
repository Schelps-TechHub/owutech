<?php
include "dbconfig.php";
if(!empty($_GET['cntid'])) {
        $cntid = $_GET["cntid"];     
		
        $sql_query = "select DISTINCT state from location where country = '$cntid' ORDER BY state ASC " ;
        $result = mysqli_query($con,$sql_query);
        if (mysqli_num_rows($result) > 0) {
          // output data of each row

?>
 <option value="">Select State of Origin </option>
<?php
          while($row = mysqli_fetch_assoc($result)) {
           
?>
<option value="<?php echo $row["state"] ?>"><?php echo $row["state"]?></option>
<?php

}
}
}
?>