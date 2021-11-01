<?php
include "../backend/dbconfig.php";
?>

<!-- Main Content -->

<?php

 $formnum = $_SESSION['formid'];
                          
 $sql = "select * from form_bio where regnum = '$formnum'" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
  // output data of each row
 $firstname = $row["firstname"];
 $othername = $row["othername"];
 $surname = $row["surname"];
 $gender = $row["gender"];
 $dob = $row["dateofbirth"];
 $marital = $row["marital"];
 $nation = $row["nationality"];
 $stateorg = $row["stateorigin"];
 $lgaorg = $row["lgaorigin"];

 $sql = "select * from form_contact where regnum = '$formnum'" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
  // output data of each row
 $email = $row["emailadd"];
 $phonenum = $row["phonenum"];
 $country = $row["country"];
 $restate = $row["res_state"];
 $relga = $row["res_lga"];
 $landmark = $row["landmark"];
 $address = $row["address"];
 $town = $row["town"];


 //Programme

 $sql = "select form_prog.progid, form_prog.entry, form_prog.olevel, programmes.progid, programmes.program, programmes.course, programmes.mode  from form_prog LEFT JOIN programmes on form_prog.progid = programmes.progid where regnum = '$formnum'" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
 $mode = $row["mode"];
 $entry = $row["entry"];
 $olevel = $row["olevel"];
 $program = $row["program"];
 $course = $row["course"];

 //Next of Kin 
 $sql = "select * from form_kin where regnum = '$formnum'" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
  // output data of each row
 $kname = $row["kin_name"];
 $relate = $row["kin_relate"];
 $kphone = $row["kin_phone"];
 $kadd = $row["kin_add"];

 //Sponsor Information 
 $sql = "select * from form_sponsor where regnum = '$formnum'" ;
 $result=mysqli_query($con,$sql);
 $row=mysqli_fetch_array($result);
  // output data of each row
 $sponsor = $row["sponsor_name"];
 $sjob = $row["sponsor_job"];
 $sphone = $row["sponsor_phone"];
 $sadd = $row["sponsor_add"];

//Sponsor Information 
$sql = "select * from form_inst where regnum = '$formnum'" ;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
 // output data of each row
$inst = $row["inst_name"];
$insty = $row["inst_year"];
$instc = $row["inst_cert"];


//rEFERRAL 
$sql = "SELECT * from form_owner where regnum = '$formnum'" ;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
 // output data of each row
$owner = $row["userid"];
$regtime = $row["rectime"];

//rEFERRAL 
$sql = "SELECT * from form_doc where regnum = '$formnum'" ;
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result);
 // output data of each row
$olevel = $row["olevel"];
$birth_cert = $row["birth_cert"];
$cert_origin = $row["cert_origin"];


?>
<!DOCTYPE html>
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

<title>OWUTECH Admission - 2021/2022 Academic Session: Application Form</title>
<meta name="description" content="Owu College Of Management And Technology (OWUTECH) Admission Applicaiton Form">
<meta name="author" content="Adeyemi F.O">
<link rel="shortcut icon" href="favicon.ico">
<link rel="icon" href="assets/images/logo.png" type="image/x-icon">
<meta name="viewport" content="width=device-width,initial-scale=1">

<style type="text/css">


.inputtext{font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;border:1px solid #04abe7}
.inputbtn{font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;border:2px solid #04abe7;background-color:#04abe7;color:white;}
body {
	background-image: url(images/result_online_backdrop.png);
	font-family:Verdana, Arial, Helvetica, sans-serif;
}
.heading { margin:0; padding: 2px 0; font-size: 14px; font-weight: bold; color: #fced11;}
.header { color: #FFFFFF; font-weight: bold; font-size:12px; background-color: #04abe7;}
table {width:100%; background-color: #fff; font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;}

table.wrapper {margin: 0 auto; background-color: #fff; background-image:url(images/unaab_bglogo.jpg); width: 750px;}

.tableHeader {border-bottom:1px dotted green;font-size:14px; padding-bottom: 0}
.tableLabel {font-size:9px; padding: 0 0 5px 5px}

.tableData, .tableText {border-bottom:1px dotted #04abe7; padding: 1px 0 0 0}
.results .tableData {text-align:center; padding: 0 5px}
.results .tableText {text-align:left; padding: 0 5px;}
.table1Data {border-bottom:1px dotted #04abe7; padding-bottom: 0; padding: 12px 0 0 0}
.table1DataHeader {padding-top: 12px}
.tableDataHeader {border-bottom:1px dotted #04abe7; padding-bottom: 0}
.tableData, .tableText {border-bottom:1px dotted #04abe7;border-left:1px solid #04abe7; padding-bottom: 0}

#control {float:right; font-size:11px; margin: 2px 0 0 0;}
#div page {margin: 0 auto; width: 750px;}


</style>
</head>

<body style="zoom: 1;">
<div id="page">
<table class="wrapper" border="0">
	<tbody><tr>
		<td>
		<!--logo -->
		<table width="750px">
			<tbody><tr>
				<td><center><img name="logo" src="assets/images/logo.png" width="100"   height="100" alt="logo"></center></td>
			</tr>
			<tr>
				<td class="heading" style="color:black;"><h3><center>OWU COLLEGE OF MANAGEMENT TECHNOLOGY<br><font color="#fced11">Admission Registration Form</font></h3></td>
			</tr>
			
			<tr>
				<td><div id="control">.:: <a href="#" onclick="window.print()">Print</a> ::.</div></td>
			</tr>
		</tbody></table>  

        <!--Applicant Personal Information -->    
		<table width="750" border="0" style="border:2px solid #04abe7; border-bottom:0 solid #04abe7;" cellpadding="4px"> 
			<tbody><tr bgcolor="#04abe7">
				<td colspan="4" class="header">BIO - DATA </td>
			</tr>		  
			<tr> 
				<td width="212" class="tableHeader"><?php echo $firstname ?></td> 
				<td width="196" class="tableHeader"><?php echo $othername ?></td> 
				<td width="224" class="tableHeader"><strong><?php echo $surname ?></strong></td> 
			</tr> 
			<tr> 
				<td width="212" class="tableLabel">First Name</td> 
				<td width="196" class="tableLabel">Other Name</td> 
				<td width="224" class="tableLabel">Last Name</td> 
			  </tr> 
		</tbody></table>
	
		<!--Bio Data-->
		<table width="750" border="0" cellpadding="6" cellspacing="0" style="border:2px solid #04abe7;">
			<tbody><tr>
				<td class="table1DataHeader" width="110"><strong>Form Number:</strong></td>
				<td width="450" class="table1Data"><?php echo $formnum; ?></td>
				<td rowspan="9" align="center" valign="middle" style="border-left:2px solid #04abe7;border-top:1px solid #ffffff;"><img name="no_photo" src="../backend/<?php echo   $_SESSION['passport']?>" width="150"   height="150" alt=""></td>
			</tr>
			<tr>
				<td class="table1DataHeader"><strong>Marital Status:</strong></td>
				<td class="table1Data"><?php echo $marital ?></td>
			</tr>
			
			<tr>
				<td class="table1DataHeader"><strong>Gender:</strong></td>
				<td class="table1Data"><?php echo $gender ?></td>
			</tr>
			<tr>
				<td class="table1DataHeader"><strong>Date of Birth:</strong></td>
				<td class="table1Data"><?php echo $dob ?></td>
			</tr>
			<tr>
				<td class="table1DataHeader"><strong>Nationality:</strong></td>
				<td class="table1Data"><?php echo $nation ?></td>
			</tr>
			<tr>
				<td class="table1DataHeader"><strong>State / LGA:</strong></td>
				<td class="table1Data"><?php echo $stateorg ?> / <?php echo $lgaorg ?></td>
			</tr>
			

		</tbody></table>



<!--CONTACT INFORMATION -->
		<table width="750" border="0" cellpadding="4" class="results" style="border:2px solid #04abe7;">
			<tbody>
			<tr valign="top">
				<td>
					<table width="450" border="0" cellpadding="4" style="border:1px solid #04abe7;">
						<tbody><tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">CONTACT INFORMATION  </span></td>
						</tr>
						<tr>
							<td width="150" class="tableDataHeader"><strong>Email address</strong></td>
							<td width="150" class="tableData"><?php echo $email ?></td>
													</tr>
						<tr>
							<td width="150" class="tableDataHeader"><strong>Phone Number</strong></td>
							<td width="150" class="tableData"><?php echo $phonenum ?></td>
													</tr>
						<tr>
							<td width="150" class="tableDataHeader"><strong>Country </strong></td>
							<td width="150" class="tableData"><?php echo $country ?></td>	
													</tr>
						<tr>
							<td width="150" class="tableDataHeader"><strong>State of Residence</strong></td>
							<td width="150" class="tableData"><?php echo $restate ?></td>	
													</tr>
						<tr>
							<td width="150" class="tableDataHeader"><strong>LGA - Residence</strong></td>
							<td width="150" class="tableData"><?php echo $relga ?></td>
													</tr>
						<tr>
							<td width="150" class="tableDataHeader"><strong>Landmark</strong></td>
							<td width="150" class="tableData"><?php echo $landmark ?></td>
													</tr>
						
							<tr>
								<td width="150" class="tableDataHeader"><strong>Street and Full Address</strong></td>
								<td width="150" class="tableData"><?php echo $address ?></td>	
							</tr>
							<tr>
								<td width="150" class="tableDataHeader"><strong>Town | Area | City</strong></td>
								<td width="150" class="tableData"><?php echo $town ?></td>	
							</tr>											</tbody></table>
					
				</td>
				<td>
			
					<br>
				</td>
				<td>
					<table class="deinfo" width="250" border="0" valign="top" cellpadding="4" style="border:1px solid #04abe7;">
						<tbody><tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">PROSPECTIVE PROGRAMME</span></td>
						</tr>
						<tr>
							<td width="100" class="tableDataHeader"><strong>Mode of Entry</strong></td>
							<td width="150" class="tableData"><?php echo strtoupper($entry) ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader"><strong>Mode of Study</strong></td>
							<td width="150" class="tableData"><?php echo strtoupper($mode) ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader"><strong>Programme</strong></td>
							<td width="150" class="tableData"><?php echo strtoupper($program) ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader"><strong>Course of Study</strong></td>
							<td width="150" class="tableData"><?php echo strtoupper($course) ?></td>	
						</tr>
					</tbody></table>
					
					<table class="deinfo" width="250" border="0" valign="top" cellpadding="4" style="border:1px solid #04abe7;">
						<tbody><tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">LAST INSTITUTION ATTENDED</span></td>
						</tr>
						<tr>
							<td width="100" class="tableDataHeader"><strong>Name</strong></td>
							<td width="150" class="tableData"><?php echo $inst ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader"><strong>Year Attended</strong></td>
							<td width="150" class="tableData"><?php echo $insty ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader"><strong>Certificate</strong></td>
							<td width="150" class="tableData"><?php echo $instc ?></td>	
						</tr>
					</tbody></table>
					
					
				</td>
			</tr>
			</tbody></table>
			
			
			
		
		
		<!--if applicant is using one sitting--->
		<table width="750" border="0" cellpadding="4" class="results" style="border:2px solid #04abe7;">
			<tbody>
			<tr>
				<td width="750" class="header" colspan="4" style="border:1px solid #04abe7; padding: 5px;"><strong>ACADEMIC RECORDS (SSCE O'Level Result :: Number of Sitting - <?php echo strtoupper($olevel) ?>)</strong></td>
			</tr>
			
			<tr valign="top">
			<!-- first sitting-->
				<td>
					<table width="450" border="0" cellpadding="4" style="border:1px solid #04abe7;">
						<tbody><tr bgcolor="#04abe7">
							<td colspan="3" class="tableDataHeader"><span class="header">First Sitting</span></td>
						</tr>
						<tr>
							<td width="250" class="tableDataHeader"><strong>Subject</strong></td>
							<td width="250" class="tableData"><strong>Grade</strong></td>
													</tr>
						
                        <?php
$sql_query = "select form_grades.subjectid, form_grades.grade, subjectlist.subject, subjectlist.subjectid from form_grades left join subjectlist on form_grades.subjectid = subjectlist.subjectid where regnum = '$formnum'  " ;
$result = mysqli_query($con,$sql_query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

echo '   
<tr>
							<td width="250" class="tableDataHeader">'.$row["subject"].'</td>
							<td width="250" class="tableData">'.$row["grade"].'</td>
						</tr>
 ';
                                        ?>
										 <?php
                                          }
                                        }
                                        ?>					
							</tbody></table>
							
					<table width="250" border="0" cellpadding="4" style="border:1px solid #04abe7;font-family:Verdana, Arial, Helvetica, sans-serif;font-size:12px;">
						<tbody>
						

                        <?php
$sql_query = "select * from form_exam where regnum = '$formnum' ORDER BY regtim ASC " ;
$result = mysqli_query($con,$sql_query);
if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_assoc($result)) {

echo '  
<tr>
							<td width="250" class="tableDataHeader"><strong>Examination Number</strong></td>
							<td width="250" class="tableText"><strong>'.$row["examregnum"].'</strong></td>
													</tr>
						<tr>
							<td width="250" class="tableDataHeader">Examination Centre</td>
							<td width="250" class="tableText">'.$row["examtype"].'</td>
							
						</tr>
                        <tr>
							<td width="250" class="tableDataHeader">Examination Year</td>
							<td width="250" class="tableText">'.$row["examyear"].'</td>
							
						</tr>
';
                  ?>
<?php
  }
}
?>
					</tbody>
					</table>
				</td>
				<!--UTME Subject-->
				
				
			</tr>
				


			</tbody></table>
		
		
		
		<!--Result-->
		<br><br><table width="750" border="0" cellpadding="4" class="results" style="border:2px solid #04abe7;">
			<tbody><tr valign="top">
				<td>
					<table width="450" border="0" cellpadding="4" style="border:1px solid #04abe7;">
						<tbody><tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">SIGNIFICANT OTHER / NEXT OF KIN</span></td>
						</tr>
						<tr>
							<td width="150" class="tableDataHeader">Fullname </td>
							<td width="150" class="tableData"><?php echo $kname ?></td>
													</tr>
						<tr>
							<td width="150" class="tableDataHeader">Relationship</td>
							<td width="150" class="tableData"><?php echo $relate ?></td>
													</tr>
						<tr>
							<td width="150" class="tableDataHeader">Phone Number</td>
							<td width="150" class="tableData"><?php echo $kphone ?></td>	
													</tr>
						<tr>
							<td width="150" class="tableDataHeader">Full Address</td>
							<td width="150" class="tableData"><?php echo $kadd ?></td>	
													</tr>
																</tbody></table>
					
				</td>
			
				<td>
					<table class="deinfo" width="250" border="0" valign="top" cellpadding="4" style="border:1px solid #04abe7;">
						<tbody><tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">SPONSOR INFORMATION</span></td>
						</tr>
						<tr>
							<td width="100" class="tableDataHeader">Fullname</td>
							<td width="150" class="tableData"><?php echo $sponsor ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader">Occupation</td>
							<td width="150" class="tableData"><?php echo $sjob ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader">Phone Number</td>
							<td width="150" class="tableData"><?php echo $sphone ?></td>	
						</tr>
						<tr>
							<td width="100" class="tableDataHeader">Full Address</td>
							<td width="150" class="tableData"><?php echo $sadd?></td>	
						</tr>
					</tbody></table>
				</td>
			</tr>
			<tr>
				<td width="750" class="header" colspan="4" style="border:1px solid #04abe7; padding: 5px;"><strong>ATTESTATION</strong></td>
			</tr>
			<tr>
				<td colspan="4" style="border:1px solid #04abe7; padding: 5px; font-size:13px">
				<ol>
				<li> I declare that the stated information above is to the best of my knowledge and belief, accurate in every details and;</li>
<li> That if I am admitted, I shall abide by the rules and regulations of Owu College of Management Technology.</li>
<li> That if I do not have five credits with English and Mathematics compulsory, my certificate shall be witheld</li>
<li>That I have never been expelled from any Institution of learning for any misdemeanour.</li>
</ol>
				</td>
			</tr>		


<tr>
				<td width="750" class="header" colspan="4" style="border:1px solid #04abe7; padding: 5px;"><strong>ADDITIONAL INFORMATION</strong></td>
			</tr>
			<tr>
				<td colspan="4" style="border:1px solid #04abe7; padding: 5px; font-size:13px">
				<strong><center style="color:red;">Additional Registration Documents to be submitted at the Admission Office</center></strong>
				<ul>
				<li> Admission Registration Form Print Out</li>
<li> SSCE O'Level Result - Statement of Result(s) / Certificate</li>
<li>  Birth Certificate / Age Declaration</li>
<li>Certificate Of Origin</li>
<li>Affidavit of Good Conduct</li>
<li> Deposit Slip / Evidence of Payment of &#8358;15,000 Admission Processing Fee</li>
</ul>
				</td>
			</tr>

					
			<tr><td colspan="3" style="font-family:Verdana, Arial, Helvetica, sans-serif;font-size:11px;color:#777777;border-top:1px solid #04abe7; ">
				<small><center>.:: Filled and Submitted by ::<?php echo $owner?> on <?php echo $regtime?><center></small>
			</td>
		</tr></tbody></table>
           
        <table class="deinfo" width="250" border="0" valign="top" cellpadding="4" style="border:1px solid #04abe7;">
						<tbody>
                        <tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">SUPPORTING DOCUMENT - <?php echo $olevel?></span></td>
						</tr>
						<tr>
							<td ><iframe src="../backend/docs/<?php echo $olevel?>" height="600" width="800"  title="description"></iframe></td>
						</tr>

                        <tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">SUPPORTING DOCUMENT - <?php echo $birth_cert?></span></td>
						</tr>
						<tr>
							<td ><iframe src="../backend/docs/<?php echo $birth_cert?>" height="600" width="800"  title="description"></iframe></td>
						</tr>
						<tr bgcolor="#04abe7">
							<td colspan="2" class="tableDataHeader"><span class="header">SUPPORTING DOCUMENT - <?php echo $cert_origin?></span></td>
						</tr>
						<tr>
							<td ><iframe src="../backend/docs/<?php echo $cert_origin?>" height="600" width="800"  title="description"></iframe></td>
						</tr>
					</tbody>
                </table>
	</td>
	</tr>
</tbody></table>

             
   

</body></html>