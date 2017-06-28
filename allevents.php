<!DOCTYPE html>
<html>
<head>
  <title>All Events</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/ffc2c94a85.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Merienda" rel='stylesheet'>
  <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'>
</head>
<body class="container" style="font-family: 'Merienda'">
<div style="text-align: center;">

 <div class="container-fluid">
      <div class="row">
        <div class="col-sm-12">
          <nav class="navbar navbar-inverse">
            <div class="container-fluid" style="font-family: 'Josefin Sans';">
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
              </div>
            </div>
        </nav>
      </div>
    </div>
    <div style="text-align: center; font-family: 'Merienda'">
      <h1><span class="label label-default">* ALL EVENTS *</span></h1>
      <br><br>
    </div>
<div class="row">
<?php 
    $dbhost = 'localhost';
    $dbuser = 'root';
    $dbpass = '';
    $dbname = 'rsvp';

    $conn = mysqli_connect($dbhost, $dbuser, $dbpass);
   
   if(! $conn ) {
      die('Could not connect: ' . mysqli_error());
   }
   
   $sql = 'SELECT * FROM Event WHERE Date>=(SELECT CURDATE()) ORDER BY Date';
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
        <div class="col-sm-6">
           <div>
            <p style="font-size: 45px; text-shadow: 2px 2px 2px "><?php echo $theme ?></p>
          <p style="font-size: 25px; text-shadow: 1px 1px 1px"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp&nbsp<?php echo $date ?></p>
          <p style="font-size: 25px; text-shadow: 1px 1px 1px"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp&nbsp<?php echo $venue ?></p>
          <hr style="border-width: 5px">
          <br>
          </div>
          </div>
      <?php } 
   mysqli_close($conn);
?>
</div>
</div>
</body>
</html>