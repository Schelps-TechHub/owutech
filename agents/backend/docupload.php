<?php
include "dbconfig.php";
   if (isset($_FILES['olevel']) && isset($_FILES['origin']) && isset($_FILES['birth']) && $_FILES['olevel']['error'] === UPLOAD_ERR_OK && $_FILES['origin']['error'] === UPLOAD_ERR_OK && $_FILES['birth']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $olevelTmpPath = $_FILES['olevel']['tmp_name'];
    $olevelName = $_FILES['olevel']['name'];
    $olevelSize = $_FILES['olevel']['size'];
    $olevelType = $_FILES['olevel']['type'];
    $olevelNameCmps = explode(".", $olevelName);
    $olevelExtension = strtolower(end($olevelNameCmps));

      // get details of the uploaded file
      $originTmpPath = $_FILES['origin']['tmp_name'];
      $originName = $_FILES['origin']['name'];
      $originSize = $_FILES['origin']['size'];
      $originType = $_FILES['origin']['type'];
      $originNameCmps = explode(".", $originName);
      $originExtension = strtolower(end($originNameCmps));

        // get details of the uploaded file
    $birthTmpPath = $_FILES['birth']['tmp_name'];
    $birthName = $_FILES['birth']['name'];
    $birthSize = $_FILES['birth']['size'];
    $birthType = $_FILES['birth']['type'];
    $birthNameCmps = explode(".", $birthName);
    $birthExtension = strtolower(end($birthNameCmps));

   
    $reg =  $_SESSION["formid"] ;  
    $olevel = $reg."_Olevel.pdf";
    $birth = $reg."_Birth_Certificate.pdf";
    $origin = $reg."_Certificate_Origin.pdf";

    // check if file has one of the following extensions
    $allowedfileExtensions = array('pdf');

    if (in_array($olevelExtension, $allowedfileExtensions) &&  in_array($originExtension, $allowedfileExtensions) && in_array($birthExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = '../../index/backend/docs/';
      $dest_path1 = $uploadFileDir.$olevel;
      $dest_path2 = $uploadFileDir.$birth;
      $dest_path3 = $uploadFileDir.$origin;

      if(move_uploaded_file($olevelTmpPath, $dest_path1)&& move_uploaded_file($birthTmpPath, $dest_path2) && move_uploaded_file($originTmpPath, $dest_path3) ) 
      {
          
          $sql= " INSERT INTO  form_doc (regnum, olevel, birth_cert, cert_origin) VALUES ('$reg', '$olevel', '$birth', '$origin')";
		
		if(mysqli_query($con, $sql)){	
      $sql= " UPDATE  `form_owner` SET `status` = 11 where regnum = '$reg'";
		
      if(mysqli_query($con, $sql)){	
      }
       
                  $_SESSION['formid'] = $reg;
                  header("Location: ../pages/printform.php");
		}

      else 
      {
       
        $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Status : Unable to upload Applicant Passport
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
				header("Location: ../pages/documentation.php");
		}
      }
          
    
    
      else 
      {
       
        $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Status : File could not be uploaded, try again.
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
          header("Location: ../pages/documentation.php");
      }
    
	}

      else 
      {
   
        $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Status : File Format not supported.
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
          header("Location: ../pages/documentation.php");
      }

}

      else 
      {
        
        $feedback = ' 
        <div class="alert alert-warning alert-has-icon">
             <div class="alert-icon"><i class="
             far fa-hand-paper"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Ooops!</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Status : File could not be uploaded, try again.
                 </div>
        </div>';
          $_SESSION['reginfo'] = $feedback;
          header("Location: ../pages/documentation.php");
      }

	
?>