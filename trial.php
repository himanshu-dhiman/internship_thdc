<?php 

if (isset($_POST['theme']))
 {

   $theme2 = $_POST['theme'];
   $date2 = $_POST['date'];
   $venue2 = $_POST['venue'];
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
            

            $sql = "INSERT INTO Event (Theme,Date,Venue) VALUES('$theme2','$date2','$venue2')";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('Could not enter data: '.mysqli_error($conn));
            }
            mysqli_close($conn);
            
       } 

