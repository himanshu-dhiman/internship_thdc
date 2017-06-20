<!DOCTYPE html>
<html>

<head>
  <title>RSVP-HOME</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="major.js"></script>
  <script type="text/javascript" >

  function ValidateForm3() {

var x=document.forms["myForm3"]["email"].value;
if (x==null || x=="")
 {
  alert("Email must be filled out");
  return false;
 }
}
</script>

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
           <!--     <li class="active"><a href="#">Contacts</a></li>
                <li class="active"><a href="#">Blog</a></li> -->
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="New_Event.php"><span class="glyphicon glyphicon-user"></span> New Event</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <div style="text-align: center;">
    <h2>------------------------UPCOMING EVENT------------------------</h2>
    <br>
    <?php 
        include 'functions.php';
        show_event();
    ?>
     
    <div style="text-align: right;">
      <a href="allevents.php">See all</a>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-6">
      <h1 style="text-align: center; font-family: "> RSVP  </h1>
      <form class="form-horizontal" method="POST" name="myForm3" id="form-rsvp" > 
        <br>
        <br>
          <div class="form-group">
            <label class="control-label col-sm-2" for="date">EMAIL :</label>
            <div class="col-sm-10">
              <input type="email" class="form-control" id="email" placeholder="Email" name="email">
            </div>
          </div>
          <br>
          <div style="text-align: center;">
            <button type="button" class="btn btn-success" id="sub1" name="sub1" onclick="return ValidateForm3()"> Submit </button>
          </div>
      </form>   
    </div>
    <div class="col-sm-6"> 
    
-   <?php
    rsvp();
    ?>       
    </div>
  </div>
</body>
</html>