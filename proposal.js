/*
 * Name: Devin Smaldore
 * Date: 2-26-16
 * Class: CSC-2210
 * Location: ~/public_html/csc2210/thinkbig/submitproposal/proposal.js
 * Comments: The page the validates all of my fields
 */

/* validatefacproposerfirst - verifies fname is not empty
 *  * precondition: facproposerfirst - a text based input
 *   * postcondition: true/false  
 *    */
function validatefacproposerfirst(facproposerfirst)
{
   if(facproposerfirst.value == "") {
      alert("Please enter the first name");
      facproposerfirst.focus();
      return false;
   }
   return true;
}


/* validatefacproposerlast - verifies lname is not empty
 *  * precondition: facproposerlast - a text based input
 *   * postcondition: true/false  
 *    */
function validatefacproposerlast(facproposerlast)
{
   if(facproposerlast.value == "") {
      alert("Please enter the last name");
      facproposerlast.focus();
      return false;
   }
   return true;
}

function validatedepofproposer(depofproposer)
{
   if(depofproposer.value == "") {
      alert("Please enter the Department of Proposer");
      depofproposer.focus();
      return false;
   }
   return true;
}


function validateofficephonenum(officephonenum)
{
   var re = new RegExp(/^\d{10}$|^\d{3}-\d{3}-\d{4}$/);
   if(!re.test(officephonenum.value))
   {
      alert("Office Phone number has a problem.\n Ex. 000-111-2222");
      officephonenum.value="";
      officephonenum.focus();
      return false;
   }
   return true;
}


function validateemail(email)
{
   var re = new RegExp(/^\w{0,20}@\w{0,20}\.\w{0,4}$/);
   if(!re.test(email.value)) {
      alert("Enter a valid email address.");
      email.value="";
      email.focus();
      return false;
   }
   return true;
}


function validatecofacproposer(cofacproposer)
{
   if(cofacproposer.value == "") {
      alert("Please enter the Co-Faculty Proposer.");
      cofacproposer.focus();
      return false;
   }
   return true;
}


function validatedepofcofacproposer(depofcofacproposer)
{
   if(depofcofacproposer.value == "") {
      alert("Please enter the Department of\n Co-Faculty Proposer.");
      depofcofacproposer.focus();
      return false;
   }
   return true;
}


function validateprojtitle(projtitle)
{
   if(projtitle.value == "") {
      alert("Please enter the Project Title.");
      projtitle.focus();
      return false;
   }
   return true;
}


function validatestartdate(startdate)
{
   var dateCheck = new RegExp(/^(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])-(19|20)\d{2}$/) ;
   if(!dateCheck.test(startdate.value)) {
      alert("Please enter a correct start date - mm-dd-yyyy");
      startdate.value="";
      startdate.focus();
      return false;
   }
   return true;
}


function validateyear(startdate)
{
   var checkyear = new RegExp(/^\d{2}\/d{2}\/2016/);
   if(checkyear.test(startdate.value))
      return true;
   return false;
}


function validateenddate(enddate)
{
   var dateCheck = new RegExp(/^(0[1-9]|1[0-2])-(0[1-9]|1\d|2\d|3[01])-(19|20)\d{2}$/) ;
   if(!dateCheck.test(enddate.value)) {
      alert("Please enter a correct end date - mm-dd-yyyy");
      enddate.value="";
      enddate.focus();
      return false;
   }
   return true;
}


function validateamtrequested(amtrequested)
{
   if(amtrequested.value == "")
   {
      alert("Enter a valid integer");
      amtrequested.value="";
      amtrequested.focus();
      return false;
   }
   return true;
}


function validateabstracts(abstracts)
{
   if(abstracts.value == "") {
      alert("Please enter something in the abstract form.");
      abstracts.focus();
      return false;
   }
   return true;
}


function validatefile(uploadfile)
{
   if(uploadfile.files.length == 0) {
      alert("Please enter the file to upload.");
      uploadfile.focus();
      return false;
   }
   return true;
}


/* validate - verifies all items in an html form
 *  *  * precondition: the form to process from the current document 
 *   *   * postcondition: true/false  
 *    *    */
function validate(form)
{
   if(!validatefacproposerfirst(form.facproposerfirst)) return false;
   if(!validatefacproposerlast(form.facproposerlast)) return false;
   if(!validatedepofproposer(form.depofproposer)) return false;
   if(!validateofficephonenum(form.officephonenum)) return false;
   if(!validateemail(form.email)) return false;
   if(!validatecofacproposer(form.cofacproposer)) return false;
   if(!validatedepofcofacproposer(form.depofcofacproposer)) return false;
   if(!validateprojtitle(form.projtitle)) return false;
   if(!validatestartdate(form.startdate)) return false;
   if(!validateenddate(form.enddate)) return false;
   if(!validateamtrequested(form.amtrequested)) return false;
   if(!validateabstracts(form.abstracts)) return false;
   if(!validatefile(form.uploadfile)) return false;

   return true;
}

