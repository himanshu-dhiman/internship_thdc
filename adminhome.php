<!DOCTYPE html>
<html>

<head>
  <title>RSVP-ADMIN PORTAL</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/ffc2c94a85.js"></script> 
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
 
  <script type="text/javascript" src="major.js"></script>
</head>

<body class="container" style="font-family: 'Josefin Sans';">
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
              <a class="navbar-brand" href="index.php">ColoredCow</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
              <ul class="nav navbar-nav">
                <li class="active"><a href="index.php">HOME</a></li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-user"></span><b>LOGOUT</b></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div>
      <ul class="nav nav-tabs">
        <li class="active"><a data-toggle="tab" href="#home">EVENTS</a></li>
        <li><a data-toggle="tab" href="#menu1">GUESTS</a></li>
      </ul>

      <div class="tab-content">
        <div id="home" class="tab-pane fade in active">
          <hr style="border-width: 6px">
          <div style="font-family: 'Merienda'">
            <div class="row">
              <div class="col-sm-6">
                <br>
                <?php 
                  include 'functions.php';
                  show_event();
                ?>
              </div>
              <br><br><br>
              <div class="col-sm-6">
                <button type="button" class="btn btn-primary btn-lg btn-block" style="font-family: 'Josefin Sans'" data-toggle="modal" data-target="#addevent"><b>* ADD AN EVENT *</b></button>
                <br>
                <button type="button" class="btn btn-primary btn-lg btn-block" style="font-family: 'Josefin Sans'" id="prev" onclick="location.href='previous.php';"><b>* PREVIOUS EVENTS *</b></button>
                <br>
                <button type="button" class="btn btn-primary btn-lg btn-block" style="font-family: 'Josefin Sans'" data-toggle="collapse" data-target="#demo3"><b>* DELETE AN EVENT *</b></button>
                <div id="demo3" class="collapse" style="font-family: 'Josefin Sans'">
                  <?php 
                    editevent();
                ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div id="menu1" class="tab-pane fade">
        
        <div class="row">
        <hr style="border-width: 6px">
        <div class="col-sm-6">
        <br>
        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#addguest"><b>* INVITE GUEST *</b></button><br>
        <hr style="border-width: 3px;">
        <p style="font-family: 'Josefin Sans'; font-size: 28px; text-align: center; text-shadow: 1px 1px 1px"><b>INVITED GUESTS</b></p>
        <?php allguests();
         ?>
         </div>
         <div class="col-sm-6">
          <br>
          <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="collapse" data-target="#demo1"><b>* INVITATION REQUESTS *</b></button>
          <div id="demo1" class="collapse">
            <?php 
              approve();
          ?>
          </div>
          <br>
          <hr style="border-width: 3px;">
          <p style="font-family: 'Josefin Sans'; font-size: 28px; text-align: center; text-shadow: 1px 1px 1px"><b>REQUESTS RESPONDED</b></p>
        <?php approved();
         ?>
        
           
         </div> 

        </div>
    </div>
    </div>
    </div>




<div class="modal fade" id="addevent" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="font-family:'Josefin Sans';">
          <div class="modal-header" style="background-color: #CACACA">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>ADD AN EVENT</b></h4>
          </div>
          <div class="modal-body" >
            <form class="form-horizontal" method="POST" name="myForm" action="#" id="form-search"
              data-fv-framework="bootstrap"
              data-fv-icon-valid="glyphicon glyphicon-ok"
              data-fv-icon-invalid="glyphicon glyphicon-remove"
              data-fv-icon-validating="glyphicon glyphicon-refresh" >
             <div class="form-group">
                  <label class="control-label col-sm-2" for="Theme">Theme :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="theme" placeholder="Enter Theme" name="theme" data-fv-row=".col-xs-4"
                    data-fv-notempty="true"
                    data-fv-notempty-message="The first name is required"/>
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="date">Date :</label>
                  <div class="col-sm-8">
                    <input type="date" class="form-control" id="date" placeholder="Date of Event" name="date">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="inputError">Venue :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="venue" placeholder="Details of Venue" name="venue">  
                  </div>
                </div>
                </form>
          </div>
          <div class="modal-footer" style="background-color: #CACACA">
            <button type="button" class="btn btn-success" id="sub" name="sub" data-dismiss="modal";"><b>ADD EVENT</b></button>
          </div>
          
        </div>      
      </div>
    </div>
   


    <div class="modal fade" id="addguest" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="font-family:'Josefin Sans';">
          <div class="modal-header" style="background-color: #CACACA">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>INVITE GUEST</b></h4>
          </div>
          <div class="modal-body" >
            <form class="form-horizontal" method="POST" name="myForm" action="#" id="form-search1"
              data-fv-framework="bootstrap"
              data-fv-icon-valid="glyphicon glyphicon-ok"
              data-fv-icon-invalid="glyphicon glyphicon-remove"
              data-fv-icon-validating="glyphicon glyphicon-refresh" >
                <br>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="date">Name :</label>
                  <div class="col-sm-8">
                    <input type="text" class="form-control" id="name" placeholder="Enter Guest's Name" name="name">
                  </div>
                </div>
                <br>
                <div class="form-group">
                  <label class="control-label col-sm-2" for="inputError">Email :</label>
                  <div class="col-sm-8">
                    <input type="email" class="form-control" id="email" placeholder="Enter Guest's Email" name="email">  
                  </div>
                </div>
                </form>
          </div>
          <div class="modal-footer" style="background-color: #CACACA">
            <button type="button" class="btn btn-success" id="guest" name="guest" data-dismiss="modal"><b>ADD GUEST</b></button>
          </div>
          
        </div>      
      </div>
    </div>

     

</div>
</body>
</html>