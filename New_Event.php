<!DOCTYPE html>
<html>
  <head>
 	  <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 	  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="major.js"></script>
    <script type="text/javascript">
function ValidateForm1() {

var x=document.forms["myForm"]["theme"].value;
var y=document.forms["myForm"]["date"].value;
var z=document.forms["myForm"]["venue"].value;
var EnteredDate = document.getElementById("date").value;
var year = EnteredDate.substring(0, 4);
var month = EnteredDate.substring(5, 7);
var date = EnteredDate.substring(8, 10);
var myDate = new Date(year, month - 1, date);
var today = new Date();

if (x==null || x=="")
 {
  alert("Theme must be filled out");
  return false;
 }
else

if (y==null || y=="") {
  alert("Date must be filled out");
  return false;
}
else
if (myDate < today) {
                alert("Please Enter valid Date. ");
                document.forms["myForm"]["date"].value='';
                
            }
else
if (z==null || z=="")
 {
  alert("Venue must be filled out");
  return false;
 }
}

function ValidateForm2() {

var x=document.forms["myForm2"]["name"].value;
var y=document.forms["myForm2"]["email"].value;
if (x==null || x=="")
 {
  alert("Name must be filled out");
  return false;
 }
else
if (y==null || y=="") {
  alert("Email must be filled out");
  return false;
}
}

function checkDate() {
            var EnteredDate = document.getElementById("date").value; //for javascript

            var date = EnteredDate.substring(0, 2);
            var month = EnteredDate.substring(3, 5);
            var year = EnteredDate.substring(6, 10);

            var myDate = new Date(year, month - 1, date);

            var today = new Date();

            
        }

</script>

<title>
  		Edit Event Details
  	</title>
	</head>
  <body class="container">
   
          
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
 				  <nav class="navbar navbar-inverse">
   					<div class="container-fluid">
     					<div class="navbar-header">
       					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
         					<span class="icon-bar"></span>
         					<span class="icon-bar"></span>
         					<span class="icon-bar"></span>                        
       					</button>
     						<a class="navbar-brand" href="index.php">RSVP</a>
     					</div>
     					<div class="collapse navbar-collapse" id="myNavbar">
       					<ul class="nav navbar-nav">
       						<li class="active"><a href="index.php">Home</a></li>
       				<!--		<li class="active"><a href="#">Contacts</a></li>
       						<li class="active"><a href="#">Blog</a></li> -->
     						</ul>
<!--     						<ul class="nav navbar-nav navbar-right">
      						<li><a href="#"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
       						<li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
       					</ul>-->
     					</div>
     				</div>
   				</nav>
   			</div>
   		</div>

   		<div class="row">
   			<div class="col-sm-12">
   				<h1 style="text-align: center; "> EDIT EVENT DETAILS </h1>
    				<form class="form-horizontal" method="POST" name="myForm" action="#" id="form-search" > 
    					<br>
    					<br>
   						<div class="form-group">
     						<label class="control-label col-sm-2" for="theme">Theme :</label>
   							<div class="col-sm-10">
     							<input type="text" class="form-control" id="theme" placeholder="Enter Theme" name="theme">
   							</div>
     					</div>
   						<br>
   						<div class="form-group">
     						<label class="control-label col-sm-2" for="date">Date :</label>
   							<div class="col-sm-10">
     							<input type="date" class="form-control" id="date" placeholder="Date of Event" name="date">
   							</div>
     					</div>
   						<br>
   						<div class="form-group">
          						<label class="control-label col-sm-2" for="">Venue :</label>
          							<div class="col-sm-10">
            							<input type="text" class="form-control" id="venue" placeholder="Details of Venue" name="venue">
          							</div>
        					</div>
        					<br>
    						<br>
    						
                <div style="text-align: center;">
                <button type="button" class="btn btn-success" id="sub" name="sub" onclick="return ValidateForm1()"> Submit </button>
              </div>
    				</form>		
    			</div>
    		</div>



    		<div class="row">
    			<div class="col-sm-12">
    				<div style="text-align: center;">
    					<br>
            <p>----------------------------------------</p>
              <h1>NEW GUEST</h1>
    				</div>
    				<br>
    				<br>
    				<form class="form-horizontal" name="myForm2"method="POST" action="#" id="form-search1">
    					<div class="form-group">
          					<label class="control-label col-sm-2" for="">Name : </label>
          						<div class="col-sm-10">
            						<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
          						</div>
        				</div>
        				<br>
       					<div class="form-group">
          					<label class="control-label col-sm-2" for="">Email : </label>
          						<div class="col-sm-10">
            						<input type="email" class="form-control" id="email" placeholder="Email" name="email">
          						</div>
        				</div>
        				<br>
        				<div style="text-align: center;">
    						<br>
    						<button type="button" class="btn btn-success" id="guest" name="guest" onclick="return ValidateForm2()"> Submit </button>
    					</div>
    				</div>
    				</form>
    			</div>
    		</div>
    	</div>
      
</body>
</html>