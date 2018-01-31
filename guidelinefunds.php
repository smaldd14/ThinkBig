<!DOCTYPE html>
   <!--
        Name: Devin Smaldore
        Date: 1-29-16
        Class: csc2210
        Location: ~/public_html/csc2210/thinkbig/guidlinefunds.php
        Comments: making this guidlines for Funds page.
   -->
<html>
   <head>
      <title> Guidelines for Funds</title>
      <link rel="stylesheet" type="text/css" href="styling.css" /> 
   </head>
   <body>
      <div id="container">
      <div id="hpucontainer">
         <img src="https://www.oclc.org/content/dam/oclc/member-stories/images/logos/high_point_logo.png" style="tac">
         </div>
	 <?php include 'navbar.html' ?>
         <h1> Think BIG!</h1>
         <h2 class="tac"><i>Guidelines for the Use of Think BIG Grant Funds</i></h2>
            <?php
               $fh = fopen("guidelinefunds.data","r") or
                     die("File does not exist or you lack permission to open it.");
               echo "<ol>\n";
               $line = fgets($fh); //get one line from the data file
               while(!feof($fh)){ //keeps reading in lines until EOF
                  echo "<li>" . $line . "</li>\n";
                  $line = fgets($fh);
               }
               echo "</ol>\n";
               fclose($fh);
            ?>
      </div>
   </body>
</html>
