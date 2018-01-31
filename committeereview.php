<!DOCTYPE html>
<!-- 
   Name: Devin Smaldore
   Date: 3-2-2016 
   Class: CSC-2210
   Location: ~/public_html/class/csc2210/thinkbig/committeereview.php	
   The page displays the committee reviews
-->
<html>
   <head>
      <title>Committee Review</title>
      <link rel="stylesheet" type="text/css" href="styling.css" /> 
      <style>
         fieldset {
            border: 5px solid black;
         }
	 a {
         text-decoration: none;
         }
         a:hover {
               color: #FFE1FF;
               background-color: #3F256B;
               }

      </style> 
   </head>
   <body>
      <form name="process" id="process" action="signaturepage.php" enctype="multipart/form-data" method="post"
            onSubmit="return validate(this);">
      <div id="container">
      <div id="hpucontainer">
         <img src="https://www.oclc.org/content/dam/oclc/member-stories/images/logos/high_point_logo.png" style="tac">
         </div>
         <?php include 'navbar.html' ?>
         <h1> Think BIG!</h1>
         <h2 class="tac"><i>Committee Review</i></h2>
	 <p>The following proposals were previously funded. You are welcome to read the proposals in order to better understand how to organize and write your own Think BIG proposal.</p> 
   </head>
      <body>
      <?php
         require("../include/utility.php"); //includes the file needed to log into the database
         logMsg('simpleConnect embedded PHP page');
         $dbconn = connectToDB();
         $query = "select * from proposal;"; //grabs all entries from the database in the proposal table
         logMsg($query);
         $result = $dbconn->query($query);
         if(!$result) {
            logMsgAndDie('Select command failed:');
         }
         if ($myrow = $result->fetch_row()) //makes sure there are still rows in the table
         {
           do {
      	$year = $myrow[15];
      	logMsg($year);
      	if($year == 2016) {
                 /* grabs all of the informatino in the table and puts it into the correct variable */
	         $facproposerfirst = $myrow[1];
                 $facproposerlast = $myrow[2];
                 $depofproposer = $myrow[3];
                 $officephonenum = $myrow[4];
                 $email = $myrow[5];
                 $cofacproposer = $myrow[6];
                 $depofcofacproposer = $myrow[7];
                 $projtitle = $myrow[8];
                 $startdate = $myrow[9];
                 $enddate = $myrow[10];
                 $amtrequested = $myrow[11];
                 $abstracts = $myrow[12];
                 $url = $myrow[13];
      	   printf("<p><b>$year</b></p>");
                 printf("<fieldset>"); //these few lines display a box like display with all of the information that the user entered
                 printf("<p><b><a href=\"$url\">%s</a></b><br/><br/><b>%s %s</b><br/><br/>%s<br/><br/>%s<br/>%s<br/><br/>%s<br/><br/><b>Start:</b> %s <b>End:</b> %s\n<br/><br/><b>Amount Requested: </b>$%s<br/><br/><b>Abstract:</b> %s</p>", $projtitle,$facproposerfirst,$facproposerlast,$depofproposer,$email,$officephonenum,$cofacproposer,$startdate,$enddate,$amtrequested,$abstracts);
                 printf("</fieldset><br/><br/>");
      	   printf("<p><input type=\"checkbox\" name=\"test\" value=\"1\"> This Proposal should be funded.</p>");
      	}	
           } while ($myrow = $result->fetch_row());
         } else {
              echo "Sorry, no records were found!";
         }
         disconnectDB($dbconn);
      ?>
   <p class="tac"><input type="submit" name="submit" value="Submit" />
   </body>
</html>

