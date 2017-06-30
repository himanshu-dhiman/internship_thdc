<!DOCTYPE html>
<html>
<head>
	<title>RSVP DETAILS</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <script src="https://use.fontawesome.com/ffc2c94a85.js"></script> 
  <link href="https://fonts.googleapis.com/css?family=Tangerine" rel='stylesheet'>
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
                <li class="active"><a href="index.php"><span class="glyphicon glyphicon-user"></span>ADMINISTRATOR LOGIN</a></li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </div>

    <div class="container">
    <div class="row">
    <div class="col-sm-6">
    <?php 
    $email=urldecode($_GET['user_id']);
    $token=urldecode($_GET['token']);
    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);

        
            if(! $conn ) 
            {
               die('Could not connect: '.mysqli_error());
            }

        $sql2 = " UPDATE Guest SET Status='CONFIRM' WHERE Email='$email'";
        mysqli_select_db($conn, $dbname);
        $retval2 = mysqli_query($conn,$sql2);
        
        $sql = "SELECT * FROM Guest WHERE Email='$email'";
        mysqli_select_db($conn, $dbname);
        $retval = mysqli_query($conn,$sql);

        if(! $retval )
        {
         die('Could not get data: ' . mysqli_error($conn));
        }
       
        $row = mysqli_fetch_array($retval);
          $name = $row['Name'];
          $email = $row['Email'];
          $status = $row['Status'];
          ?>

            <div>
            <hr style="border-width: 5px">
            <p style="font-size: 30px; text-shadow: 2px 2px 2px; text-align: center;" >Thanks for Joining</p>

            <p style="font-size: 60px; text-shadow: 2px 2px 2px "><i class="fa fa-id-card-o" aria-hidden="true"></i>&nbsp&nbsp<?php echo $name ?></p>
          <p style="font-size: 35px; text-shadow: 2px 2px 2px"><i class="fa fa-envelope" aria-hidden="true"></i>
          &nbsp&nbsp<?php echo $email ?></p>
          <p style="font-size: 35px; text-shadow: 2px 2px 2px"><i class="fa fa-check-square" aria-hidden="true"></i>&nbsp&nbsp<?php echo $status ?></p>
          </div>
          <br><br>

        <form id="form-manage" method="POST">
        <input type=hidden class="form-control" name="email2" value="<?php echo $email ?>">
        </form>
        <button class="btn btn-primary btn-lg btn-block" id="manage">DONE</button>
      <?php
     mysqli_close($conn);
?>

</div>
</div>
</div>
</body>
</html>