<!DOCTYPE html>
<!-- 
   Name: Devin Smaldore
   Date: 2-29-2016 
   Class: CSC-2210
   Location: ~/public_html/class/csc2210/exams/uploadfile
   The page demonstrates how to collect data from the user and 
   send it to the server where it is processed with another php script.
-->
<html>
   <head>    
      <title>Reviewing...</title>
      <link rel="stylesheet" type="text/css" href="styling.css" /> 
   </head>
   <body>
      <div id="container">
      <div id="hpucontainer">
         <img src="https://www.oclc.org/content/dam/oclc/member-stories/images/logos/high_point_logo.png" style="tac">
      </div>
      <?php include 'navbar.html' ?>
         <h1> Think BIG!</h1>
         <h2 class="tac"><i>Thank you for Reviewing!</i></h2>
         <h3>Click one of the links to return to the Think Big website.</h3>
      <?php
         require("../include/utility.php");
         if($_SERVER["REQUEST_METHOD"]=="POST") 
         {
	    $dbconn = connectToDB();
            $checked = $_POST['test'];
            for($i=0;$i<count($checked);$i++) {
               $id = cleanInput($checked[$i]);
               $query = "UPDATE proposal SET approval=1 WHERE id=$id;";
               $result = $dbconn->query($query);
               logMsg($query);
               if(!$result) {
                  logMsgAndDie('Update command failed:');
               }
               else {
                    logMsg("Update successful on movieid $id");
               }
            }
            printf("Thank you for your participation!");
            disconnectDB($dbconn);
         }

	    if($_POST['test'] == 1) {
	       
            $facproposerfirst = cleanInput($_POST["facproposerfirst"]);
            $facproposerlast = cleanInput($_POST["facproposerlast"]);
            $depofproposer = cleanInput($_POST["depofproposer"]);
            $officephonenum = cleanInput($_POST["officephonenum"]);
            $email = cleanInput($_POST["email"]);
            $cofacproposer = cleanInput($_POST["cofacproposer"]);
            $depofcofacproposer = cleanInput($_POST["depofcofacproposer"]);
            $projtitle = cleanInput($_POST["projtitle"]);
            $startdate = cleanInput($_POST["startdate"]);
	    $mysqlDate = date('Y-m-d',strtotime($startdate));
            $enddate = cleanInput($_POST["enddate"]);
	    $mysqlDate = date('Y-m-d',strtotime($enddate));
            $amtrequested = cleanInput($_POST["amtrequested"]);
            $abstracts = cleanInput($_POST["abstracts"]);
	    
	    if($_FILES['uploadfile']['type'] != 'application/pdf' && $_FILES['uploadfile']['type'] != 'application/doc' && $_FILES['uploadfile']['type'] != 'application/docx') {
               logMsg("Not a pdf/doc/docx");
               $target_file = 'Error: Not a pdf/doc/docx';
               } else {
                  //Process the file   
                  if($_FILES['uploadfile']['size'] > 1000000) {
                     logMsg("File too large");
                     $target_file = 'Error: File too large';
                  } else {
                     //Process the file
                     $target_dir = "proposals/2016/";
                     $target_file = $target_dir . basename($_FILES["uploadfile"]["name"]);
                     $new_filename = str_replace(' ','',basename($_FILES["uploadfile"]["name"]));
                     $target_dir = "proposals/2016/";
         	     $fileType = pathinfo($_FILES["uploadfile"]["name"],PATHINFO_EXTENSION);
	             $target_file = $target_dir . $facproposerlast ."_". $facproposerfirst ."_proposal." .$fileType;
                     move_uploaded_file($_FILES["uploadfile"]["tmp_name"], $target_file);
                  }
               }

            $dbconn = connectToDB();
       
	    $query = "INSERT INTO proposal (facproposerfirst,facproposerlast,depofproposer,officephonenum,email,cofacproposer,depofcofacproposer,projtitle,startdate,enddate,amtrequested,abstracts,url) values ('$facproposerfirst','$facproposerlast','$depofproposer','$officephonenum','$email','$cofacproposer','$depofcofacproposer','$projtitle','$startdate','$enddate','$amtrequested','$abstracts','$target_file');";
            
            logMsg($query);
            $result = $dbconn->query($query);
            if(!$result) {
               logMsgAndDie('Select command failed:',$dbconn);
            }
            else {
               logMsg('insert successful');
            }
            disconnectDB($dbconn);
         }
	 printf("<fieldset>");
	 printf("<p><b>%s</b><br/><br/><b>%s %s</b><br/><br/>%s<br/><br/>%s<br/>%s<br/><br/>%s<br/><br/><b>Start:</b> %s <b>End:</b> %s\n<br/><br/><b>Amount Requested: </b>$%s<br/><br/><b>Abstract:</b> %s</p>", $projtitle,$facproposerfirst,$facproposerlast,$depofproposer,$email,$officephonenum,$cofacproposer,$startdate,$enddate,$amtrequested,$abstracts);
	 printf("</fieldset>");
	 printf("<br/><br/><br/>________________________________________________________________________\n");
	 printf("<h1>Signatures</h1>");
	 printf("<fieldset>");
	 printf("<p class=\"lal\"><b>Department</b><span style=\"float:right;\"><b>Signature of Dept. Chair</b></span></p><br/><br/>\n");
	 printf("<p class=\"lal\">Department of %s <span style=\"float:right;\">_____________________________________</span></p>\n", $depofcofacproposer); 
	 printf("</fieldset>");
      ?>
      <p><i><br/><br/>Thank you for participating!</i></p>
   </div>
   </body>
</html>

