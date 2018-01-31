<!DOCTYPE html>
<!-- 
   Name: Devin Smaldore
   Date: 3-2-2016 
   Class: CSC-2210
   Location: ~/public_html/class/csc2210/thinkbig/prevfundedproposals/php	
   The page displays the previously funded proposals
-->
<html>
   <head>
      <title>Previously Funded Proposals</title>
      <link rel="stylesheet" type="text/css" href="styling.css" /> 
      <style>
         fieldset {
            border: 5px solid black;
         }
      </style> 
   </head>
   <body>
      <div id="container">
      <div id="hpucontainer">
         <img src="https://www.oclc.org/content/dam/oclc/member-stories/images/logos/high_point_logo.png" style="tac">
         </div>
         <?php include 'navbar.html' ?>
         <h1> Think BIG!</h1>
         <h2 class="tac"><i>Funded Think BIG Proposals</i></h2>
	 <p>The following proposals were previously funded. You are welcome to read the proposals in order to better understand how to organize and write your own Think BIG proposal.</p> 
   </head>
   <body>
<?php
   require("../include/utility.php");
   logMsg('simpleConnect embedded PHP page');
   $dbconn = connectToDB();
   $query = "select * from proposal;";
   logMsg($query);
   $result = $dbconn->query($query);
   if(!$result) {
      logMsgAndDie('Select command failed:');
   }
   if ($myrow = $result->fetch_row())
   {
     do {
	$approval = $myrow[14];
	if($approval == 1) {
     logMsg('good');
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
           $year = $myrow[15];
           printf("<fieldset>");
           printf("<p><b>%s</b><br/><br/><b>%s</b><br/><br/><b>%s %s</b><br/><br/>%s<br/><br/>%s<br/>%s<br/><br/>%s<br/><br/><b>Start:</b> %s <b>End:</b> %s\n<br/><br/><b>Amount Requested: </b>$%s<br/><br/><b>Abstract:</b> %s<br/><br/><b>File:</b> %s</p>", $year,$projtitle,$facproposerfirst,$facproposerlast,$depofproposer,$email,$officephonenum,$cofacproposer,$startdate,$enddate,$amtrequested,$abstracts,$url);
           printf("</fieldset><br/><br/>");
	}	
     } while ($myrow = $result->fetch_row());
   } else {
        echo "Sorry, no records were found!";
   }
   disconnectDB($dbconn);
?>
   </body>
</html>

