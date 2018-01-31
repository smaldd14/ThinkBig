<!DOCTYPE html>
   <!--
	Name: Devin Smaldore
	Date: 2-5-16
	Class: csc2210
	Location: ~/public_html/csc2210/thinkbig/checklist.php
	Comments: checklist page.
   -->
<html>
   <head>
      <title> Checklist</title>
      <link rel="stylesheet" type="text/css" href="styling.css" /> <!-- links in the styling of the webpage --> 
   </head>
   <body>
      <div id="container">
      <div id="hpucontainer">
         <img src="https://www.oclc.org/content/dam/oclc/member-stories/images/logos/high_point_logo.png" style="tac">
      </div>
         <?php include 'navbar.html' ?>
          <h1> Think BIG!</h1>
          <h2 class="tac"><i>Checklist for Development/Evaluation of Think Big Proposals</i></h2>
          <?php 
               $fh = fopen("checklist.data","r") or
                     die("File does not exist or you lack permission to open it.");
               echo "<ol>\n";
               $line = fgets($fh); //get one line from the data file
               while(!feof($fh)){ //keeps reading in lines from data file until EOF
                  echo "<li>" . "<input type=\"checkbox\">" . $line . "</li>\n";
                  $line = fgets($fh);
               }
               echo "</ol>\n";
               fclose($fh);
          ?>
      </div>
   </body>
</html>
