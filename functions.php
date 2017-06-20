<?php 
      function show_event()
      {
      		$dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) 
            {
               die('Could not connect: '.mysqli_error());
            }
   			$sql = 'SELECT * FROM Event WHERE Date=(SELECT min(Date) FROM Event)';
		   	mysqli_select_db($conn, $dbname);
		   	$retval = mysqli_query($conn,$sql);

   			$sql2 = 'DELETE FROM Event WHERE Date <=(SELECT CURDATE())';
		   	mysqli_select_db($conn, $dbname);
		   	$retval2 = mysqli_query($conn,$sql2);
		   


		  	if(! $retval )
		  	{
		     die('Could not get data: ' . mysqli_error($conn));
		   	}
		   
		   	while($row = mysqli_fetch_array($retval))
		   	{
		      $theme = $row['Theme'];
		      $date = $row['Date'];
		      $venue = $row['Venue'];
		      ?>

		      <div>
		      <p>____________________________________________</p>
		      <h4>----- Theme -----</h4><?php echo $theme ?>
		      <h4>----- Date -----</h4><?php echo $date ?>
		      <h4>----- Venue -----</h4><?php echo $venue ?>
		      <p>____________________________________________</p><br>
		      </div>

      <?php
    }
     mysqli_close($conn);
    }   


    function rsvp()
    {
    	    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
           
               $email = @$_POST['email'];
               
            $sql = "SELECT * FROM Guest ORDER BY Guest_ID DESC LIMIT 10";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            ?>
            <div>
            <table class="table">
    		<thead>
      		<tr>
        	<th>Name</th>
        	<th>Guest_ID</th>
        	<th>Status</th>
      		</tr>
    		</thead>
	   		<tbody>

    		<?php
            while($row = mysqli_fetch_array($retval)) {
            $name = $row['Name'];
            $guestid = $row['Guest_ID'];
            $status = $row['Status'];
            ?>
           
      <tr>
        <td><?php echo $name; ?></td>
        <td><?php echo $guestid; ?></td>
        <?php if($status=='PENDING')
        { ?>
        <td><span class="label label-danger"><?php echo $status; ?></span></td>
        <?php } else if($status=='CONFIRM'){
        	?>
        <td><span class="label label-success"><?php echo $status; ?></span></td>
      <?php } ?>
      </tr>
            <?php } 
            ?>
                </tbody>
			  </table>
            	</div>
<?php
mysqli_close($conn);
    }

function addevent()
{
	var_dump($_POST['theme']);
if (($_POST['theme']!=null||$_POST['theme']!="")&&($_POST['date']!=null||$_POST['date']!="")&&($_POST['venue']!=null||$_POST['venue']!=""))
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
       return "success";
}


function addguest()
{
	if (($_POST['name']!=null||$_POST['name']!="")&&($_POST['email']!=null||$_POST['email']!="")) {
              $name2 = $_POST['name'];
              $email2 = $_POST['email'];
            
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
                           
            $sql = "INSERT INTO Guest (Name,Email) VALUES('$name2','$email2')";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('Could not enter data: '.mysqli_error($conn));
               alert("Already Registered User..");
            }
            
            mysqli_close($conn);
            }
            return "success";
}



function eventManager()
{
	var_dump("email");
if (($_POST['email']!=null||$_POST['email']!="")) {
            $email2 = $_POST['email'];
            var_dump($email2);
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql3 = " SELECT e.Event_ID, g.Guest_ID, g.Email FROM Event AS e, Guest AS g WHERE g.Email='$email2' AND e.Date=(SELECT min(Date) FROM Event) ";
            mysqli_select_db($conn,$dbname);
            $retval3 = mysqli_query($conn,$sql3);

            if(! $retval3 ) {
               die('Could not enter data: 24324324'.mysqli_error($conn));
            }
            
            while($row = mysqli_fetch_array($retval3))
            {
            $eid = $row['Event_ID'];
            $gid = $row['Guest_ID'];        
            $gmail = $row['Email'];
            }

            $sql = "INSERT INTO EventManager (EventID,GuestID,Email) VALUES ('$eid','$gid','$gmail')";

            $sql2= "UPDATE Guest SET Status='CONFIRM' WHERE Email='$email2'";
            
            mysqli_select_db($conn,$dbname);
            
            $retval = mysqli_query($conn,$sql);
            
            $retval2 = mysqli_query($conn,$sql2);
            var_dump($retval2);


            if(! $retval ) {
               die('Could not enter data: '.mysqli_error($conn));
            }
            if(! $retval2 ) {
               die('Could not enter data: '.mysqli_error($conn));
            }
            
            mysqli_close($conn);
          	}
          	return "success";
			

 }     
?>



