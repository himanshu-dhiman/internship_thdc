<!DOCTYPE html>
<html>
<head>
  <title>All Events</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body class="container">
<div style="text-align: center;">

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
                 <!-- <li class="active"><a href="#">Contacts</a></li>
                  <li class="active"><a href="#">Blog</a></li> -->
            </ul>
      <!--      <ul class="nav navbar-nav navbar-right">
                  <li><a href="#"><span class="glyphicon glyphicon-user "></span> Sign Up</a></li>
                  <li><a href="#"><span class="glyphicon glyphicon-log-in "></span> Login</a></li>
              </ul>-->
              </div>
            </div>
        </nav>
      </div>
    </div>
    <div style="text-align: center;">
      <h2>------------------------ALL EVENTS------------------------</h2>
      <br><br>
    </div>

<?php 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'rsvp';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   $sql = 'SELECT * FROM Event ORDER BY Date';
   mysqli_select_db($conn, $dbname);
   $retval = mysqli_query($conn,$sql);
   
   if(! $retval ) {
      die('Could not get data: ' . mysqli_error($conn));
   }
   
   while($row = mysqli_fetch_array($retval)) {
      $theme = $row['Theme'];
      $date = $row['Date'];
      $venue = $row['Venue'];
      ?>
      <div>
      <p>_______________________________________________</p>
      <h4>----- Theme ----- </h5><?php echo $theme ?>
      <h4>----- Date ----- </h5><?php echo $date ?>
      <h4>----- Venue ----- </h5><?php echo $venue ?>
      <p>_______________________________________________</p>
      </div>
      <?php } 
   mysqli_close($conn);
?>
</div>
</body>
</html>