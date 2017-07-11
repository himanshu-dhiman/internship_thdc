<!DOCTYPE html>
<html>

<head>
  <title>RSVP-HOME</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/ffc2c94a85.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
  <script type="text/javascript" src="major.js"></script>
  <link rel="stylesheet" href="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/css/bootstrapValidator.min.css"/>
  <script type="text/javascript" src="http://cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.3/js/bootstrapValidator.min.js"> </script>
  
</head>

<body class="container" style="font-family:'Merienda',serif;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-sm-12">
        <nav class="navbar navbar-inverse">
          <div class="container-fluid" style="font-family: 'Josefin Sans'">
            <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>                        
              </button>
              <a class="navbar-brand" href="index.php">ColoredCow</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav navbar-right">
                <li class="active"><a href="#" data-toggle="modal" data-target="#admin"><span class="glyphicon glyphicon-user"></span> <b>ADMINISTRATOR LOGIN</b></a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>
    <hr style="border-width: 6px">
    <div class="row">
    <div class="col-sm-6">
    <div>
    <br>
    <?php 
        include 'functions.php';
        show_event();
    ?>
     </div>
     <div style="text-align: right;">
      <br>
      <button type="button" class="btn btn-link" style="font-family: 'Josefin Sans'" id="prev" onclick="location.href='allevents.php';"><b>* ALL FUTURE EVENTS *</b></button>
    </div>
     </div>
    <div class="col-sm-6">
      <div style="text-align: center; font-family: 'Josefin Sans';">
      <br><br><h1>
        Got an Invitation ?
      </h1>
        <button type="button" class="btn btn-primary btn-lg btn-block" data-toggle="modal" data-target="#rsvpmodal"><b>* RSVP Here *</b></button>
    </div>
  </div>
    <div class="col-sm-6"> 
      <div style="text-align: center; font-family:'Josefin Sans';">
       <br><br><br> <h1 > Wanna Join Us ? </h1>
          <button type="button" class="btn btn-info btn-lg btn-block" data-toggle="modal" data-target="#requestmodal" ><b>* REQUEST 'n Get Invitation *</b></button>
      </div>  
    </div>
  </div>
  

    <div class="modal fade" id="rsvpmodal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="font-family: 'Josefin Sans';">
          <div class="modal-header" style="background-color: #CACACA">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>RSVP</b></h4>
          </div>
          <div class="modal-body">
            <form class="form-horizontal" method="POST" name="myForm" action="#" id="form-rsvp"
              data-fv-framework="bootstrap"
              data-fv-icon-valid="glyphicon glyphicon-ok"
              data-fv-icon-invalid="glyphicon glyphicon-remove"
              data-fv-icon-validating="glyphicon glyphicon-refresh" > 
              <label>EMAIL :</label>
              <div>
                <input type="email" class="form-control" id="email" placeholder="Enter your Email..." name="email">
              </div>
              </form>
          </div>
          <div class="modal-footer" style="background-color: #CACACA">
            <button type="button" class="btn btn-success" id="sub1" name="sub1" data-dismiss="modal" >GENERATE LINK</button>
          </div>
        </div>
        
      </div>
    </div>

      <div class="modal fade" id="requestmodal" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="font-family: 'Josefin Sans';">
          <div class="modal-header" style="background-color: #CACACA">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>REQUEST 'n GET INVITATION<b></h4>
          </div>
          <div class="modal-body" >
          <form class="form-horizontal" method="POST" name="myForm" action="#" id="form-request"
              data-fv-framework="bootstrap"
              data-fv-icon-valid="glyphicon glyphicon-ok"
              data-fv-icon-invalid="glyphicon glyphicon-remove"
              data-fv-icon-validating="glyphicon glyphicon-refresh" > 
             <label>NAME :</label>
              <div >
                <input type="text" class="form-control" id="name" placeholder="Enter your Name" name="name">
              </div>
              <br>
            <label>EMAIL :</label>
              <div>
                <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email">
              </div>
              <br>
              </form>
              </div>
          <div class="modal-footer" style="background-color: #CACACA">
            <button type="button" class="btn btn-success" id="sub2" name="sub2" data-dismiss="modal">GET INVITATION</button>
          </div>
        </div>
        </div>
    </div>


     <div class="modal fade" id="admin" role="dialog">
      <div class="modal-dialog">
        <div class="modal-content" style="font-family:'Josefin Sans';">
          <div class="modal-header" style="background-color: #CACACA">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title"><b>ADMINISTRATOR LOGIN</b></h4>
          </div>
          <div class="modal-body" >
            <form class="form-horizontal" method="POST" name="myForm" action="#" id="form-login"
              data-fv-framework="bootstrap"
              data-fv-icon-valid="glyphicon glyphicon-ok"
              data-fv-icon-invalid="glyphicon glyphicon-remove"
              data-fv-icon-validating="glyphicon glyphicon-refresh" data-toggle="validator">
              <label>EMAIL :</label>
              <div >
                <input type="email" class="form-control" id="email" placeholder="Enter your Email" name="email">
              </div>
              <br>
            <label>PASSWORD :</label>
              <div>
                <input type="password" class="form-control" id="password" placeholder="Enter your Password" name="password">
              </div>
          </form>
          </div>
          <div class="modal-footer" style="background-color: #CACACA">
            <button type="button" class="btn btn-success" id="sub3" name="sub3" data-dismiss="modal">LOGIN</button>
          </div>
          
        </div>      
      </div>
    </div>


    
    </div>
</body>
</html>