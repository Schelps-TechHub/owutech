<?php
include "dbconfig.php";
   if (isset($_FILES['picx']) && $_FILES['picx']['error'] === UPLOAD_ERR_OK)
  {
    // get details of the uploaded file
    $fileTmpPath = $_FILES['picx']['tmp_name'];
    $fileName = $_FILES['picx']['name'];
    $fileSize = $_FILES['picx']['size'];
    $fileType = $_FILES['picx']['type'];
    $fileNameCmps = explode(".", $fileName);
    $fileExtension = strtolower(end($fileNameCmps));

    $nref = preg_replace("/\s+/", "", $_SESSION["formid"] );
    $nname = str_replace("/", "", $nref);
    
    $neoFileName = $nname.".jpg";
	 $reg =  $_SESSION["formid"] ;
	 $owner = $_SESSION['uniqueid'];
    // check if file has one of the following extensions
    $allowedfileExtensions = array('jpg', 'jpeg', 'png');

    if (in_array($fileExtension, $allowedfileExtensions))
    {
      // directory in which the uploaded file will be moved
      $uploadFileDir = 'image/';
      $dest_path = $uploadFileDir . $neoFileName;

      if(move_uploaded_file($fileTmpPath, $dest_path)) 
      {
          
          $sql= " INSERT INTO  `form_bio` (regnum, passport) VALUES ('$reg', '$neoFileName')";
		
		if(mysqli_query($con, $sql)){	
      $sqll= " INSERT INTO  `form_owner` (regnum, userid, `status`) VALUES ('$reg', '$owner', 0)";
		
      if(mysqli_query($con, $sqll)){	
      }
        $feedback = ' 
        <div class="alert alert-success alert-has-icon">
             <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                <div class="alert-body">
                    <div class="alert-title">Successful</div>
                    <button class="close" data-dismiss="alert">
                              <span>&times;</span>
                            </button>
                            Status : Applicant Passport has been successfully uploaded. Proceed to registration.
                 </div>
        </div>';
                  $_SESSION['reginfo'] = $feedback;
                  $_SESSION['formid'] = $reg;
                  $_SESSION['passport'] = $dest_path;
                  header("Location: ../pages/admissionform.php");
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
				header("Location: ../pages/continuation.php");
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
				header("Location: ../pages/continuation.php");
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
				header("Location: ../pages/continuation.php");
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
				header("Location: ../pages/continuation.php");
      }

	
?>