<!DOCTYPE html>
   <!--
	Name: Devin Smaldore
	Date: 2-5-16
	Class: csc2210
	Location: ~/public_html/csc2210/thinkbig/faq.php
	Comments: Frequently asked questions page.
   -->
<html>
   <head>
      <title> FAQs</title>
      <link rel="stylesheet" type="text/css" href="styling.css" /> 
   </head>
   <body>
      <div id="container">
      <div id="hpucontainer">
      <img src="https://www.oclc.org/content/dam/oclc/member-stories/images/logos/high_point_logo.png" style="tac">
      </div>
	 <?php include 'navbar.html' ?>
         <h1> Think BIG!</h1>
         <h2 class="tac"><i>Think Big Grant - FAQ's</i></h2>
   	 <?php
               $fh = fopen("faq.data","r") or
                     die("File does not exist or you lack permission to open it.");
               $line = fgets($fh); //get one line from the data file
               while(!feof($fh)){ //keeps reading in lines until EOF
                  echo "<p>" . $line . "</p>\n";
                  $line = fgets($fh);
               }
               fclose($fh);
            ?>
      </div>
   </body>
</html>
