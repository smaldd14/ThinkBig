<!DOCTYPE HTML>
<!--
	Name: Devin Smaldore
	Date: 3-1-16
	Class: csc2210
	Location: ~/public_html/csc2210/thinkbig/application2.php
	Comments: application form that the user fills out
-->
<html>
   <head>
      <title>Application Form</title>
      <link rel="stylesheet" type="text/css" href="styling.css" />   
      <script type="text/javascript" src="proposal.js">
      </script>
   </head>
   <body>
   <form name="upload" id="upload" action="signaturepage.php" enctype="multipart/form-data" method="post"
            onSubmit="return validate(this);"
            onReset="window.alert('Clearing the form');">
   <div id="container">
      <div id="hpucontainer">
         <img src="https://www.oclc.org/content/dam/oclc/member-stories/images/logos/high_point_logo.png" style="tac">
         </div>
	 <?php include 'navbar.html' ?>
         <h1> Think BIG!</h1>
         <h2 class="tac"><i>Step 1: Complete the Application Form</i></h2>
         <p>Fill out the form below and click the "Submit" button at the bottom of the page.</p>
   
         <table> <!-- table the user will fill out -->
         <tr>
	    <td width="25%" class="lal">Faculty Proposer:</td>
            <td class="lal">First Name: <input type="text" name="facproposerfirst" id="facproposerfirst" value="" size=10/> Last Name: <input type="text" name="facproposerlast" id="facproposerlast" value="" size=10/></td>
	 </tr>
         <tr>
   	    <td width="25%">Department of Proposer:</td>
   	    <td class="lal"><input type="text" name="depofproposer" id="depofproposer" value="" size=60/></td>
         </tr>
         <tr>
            <td width="25%">Office Phone Number:</td>           
	    <td class="lal"><input type="text" name="officephonenum" id="officephonenum" value="" size=15/></td>
         </tr>
         <tr>
            <td width="25%">Email:</td>           
            <td class="lal"><input type="text" name="email" id="email" value="" size=30/>   
	 </tr>
         <tr>
            <td width="25%">Co-Faculty Proposer(s):</td>           
            <td class="lal">(list names, separated by commas)<br><input type="text" name="cofacproposer" id="cofacproposer" value="" size=40/></td>
         </tr>
         <tr>
            <td width="25%">Department(s) of Co-Faculty Proposer(s)</td>           
            <td class="lal">(list departments, separated by commmas)<br><input type="text" name="depofcofacproposer" id="depofcofacproposer" value="" size=40/></td>
         </tr>
         <tr>
            <td width="25%">Project Title:</td>           
            <td class="lal"><input type="text" name="projtitle" id="projtitle" value="" size=30/></td>
         </tr>
         <tr>
            <td width="25%">Project Start Date:</td>
            <td class="lal">(month - day - year)<input type="text" name="startdate" id="startdate" value="" size=30/></td>
         </tr>
         <tr>
            <td width="25%">Expected Date of Completion:</td>
            <td class="lal">(month - day - year)<input type="text" name="enddate" id="enddate" value="" size=30/></td>
         </tr>
         <tr>
            <td width="25%">Amount Requested ($):</td>
            <td class="lal"><input type="text" name="amtrequested" id="amtrequested" value="" size=15/></td>
         </tr>
         <tr>
            <td width="25%">Abstract <br></td>
            <td class="lal"><textarea name="abstracts" id="abstracts" value="" rows=20 cols=60></textarea>
         </tr>
      </table>
      <h2 class="tac"><i>Step 2: Upload your Proposal</i></h2> <!-- The user will upload their proposal here -->
      <p>Your proposal should be in either Word or pdf format. There is a file size limit of 10 megabytes. If your file is larger than 10 megabytes, contact rshore@highpoint.edu for assistance.</p>
      <h3 class="tac">Upload file</h3>
      <fieldset>
      <p>1. Click the Browse button, and select your Word or pdf file. <input type="file" name="uploadfile" id="uploadfile"></p>
      </fieldset>
      <p class="tac"><input type="submit" name="submit" value="Submit" /><input type="reset" name="reset" value="Start Over" /></p>
      </div>
      </form>
   </body>
</html>
