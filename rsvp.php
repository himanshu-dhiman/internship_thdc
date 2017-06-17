<?php
if (isset($_POST['email'])) {
            $email2 = $_POST['email'];
            
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
                           
            $sql = "UPDATE Guest SET Status='CONFIRM' WHERE Email='$email2'";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('Could not enter data: '.mysqli_error($conn));
            }
            
            
            mysqli_close($conn);
          }
      ?>