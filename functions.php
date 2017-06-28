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
   			$sql = 'SELECT * FROM Event WHERE Date=(SELECT min(Date) FROM Event WHERE Date>=(SELECT CURDATE()))';
		   	mysqli_select_db($conn, $dbname);
		   	$retval = mysqli_query($conn,$sql);

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
		      	<p style="font-size: 100px; text-shadow: 2px 2px 2px "><?php echo $theme ?></p>
		    	<p style="font-size: 48px; text-shadow: 2px 2px 2px"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp&nbsp<?php echo $date ?></p>
		     	<p style="font-size: 48px; text-shadow: 2px 2px 2px"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp&nbsp<?php echo $venue ?></p>
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
	// var_dump($_POST['theme']);
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
             return "success";           
       }
       else{ 
       return "failure";}
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
            return "success";
            }
            else
            {
            	return "failure";
            }
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




function addrequest()
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
               
                           
            $sql = "INSERT INTO Request (Name,Email) VALUES('$name2','$email2')";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('Could not enter data: '.mysqli_error($conn));
               alert("Already Registered User..");
            }
            
            mysqli_close($conn);

            return "success";
            }
            else {return 'failure';}
            
}


function acceptrequest()
{
			if (($_POST['email2']!=null||$_POST['email2']!="")) {
            $email2 = $_POST['email2'];
			$dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql= "UPDATE Request SET Status='CONFIRM' WHERE Email='$email2'";
            $sql2= "SELECT Status FROM Request WHERE Email='$email2'";  
            mysqli_select_db($conn,$dbname);
            $retval2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_array($retval2);
            if($row['Status']=='CONFIRM'){
            	return 'already';
            	die();
            }
            $retval = mysqli_query($conn,$sql);
            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }

            return "success";
        }
        else{
        	return "failure";
        }

}


function declinerequest()
{
			if (($_POST['email2']!=null||$_POST['email2']!="")) {
            $email2 = $_POST['email2'];
			$dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql= "UPDATE Request SET Status='REJECTED' WHERE Email='$email2'";
            $sql2= "SELECT Status FROM Request WHERE Email='$email2'";  
            mysqli_select_db($conn,$dbname);
            $retval2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_array($retval2);
            if($row['Status']=='REJECTED'){
            	return 'already';
            	die();
            }
            $retval = mysqli_query($conn,$sql);
            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }

            return "success";
        }
        else{
        	return "failure";
        }

}


function approve()
    {
    	    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql = "SELECT * FROM Request WHERE Status='REQUESTED' ORDER BY request_ID DESC LIMIT 1";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);

            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            ?>
            <div>
            <br><br>
            <table class="table">
    		<thead>
      		<tr>
        	<th>Name</th>
        	<th>Email</th>
      		</tr>
    		</thead>
	   		<tbody>

    		<?php
            while($row = mysqli_fetch_array($retval)) {
            $name = $row['Name'];
            $email = $row['Email'];
            ?>

            <form id="form-req">
            <input type="hidden" name="email2" value="<?php echo $email; ?>">
            </form>
           
      <tr>
      
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>

        <td><button type="button" class="btn btn-success" id="accept" name="accept">ACCEPT</button></td>
      	<td><button type="button" class="btn btn-danger" id="decline" name="decline">DECLINE</button></td>
      </tr>
            <?php } 
            ?>
                </tbody>
			  </table>
			  </div>
<?php
mysqli_close($conn);
    }


function approved()
    {
    	    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql = "SELECT * FROM Request WHERE Status='CONFIRM' ORDER BY Name";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);

            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            ?>
            <div class="container">
            <div class="row">
            <div class="col-sm-3">
            <br><br>
            <table class="table">
    		<thead>
      		<tr>
        	<th>Name</th>
        	<th>Email</th>
      		<th>Status</th>
      		</tr>
    		</thead>
	   		<tbody>

    		<?php
            while($row = mysqli_fetch_array($retval)) {
            $name = $row['Name'];
            $email = $row['Email'];
            $status = $row['Status'];
            ?>
      <tr>
      
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><span class="label label-success"><?php echo $status; ?></span></td>
</tr>
            <?php } 
            ?>
                </tbody>
			  </table>
			  </div>

			 <?php
			$sql2 = "SELECT * FROM Request WHERE Status='REJECTED' ORDER BY Name";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql2);

            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            ?>
			<div class="col-sm-2">
            <br><br>
            <table class="table">
    		<thead>
      		<tr>
        	<th>Name</th>
        	<th>Email</th>
      		<th>Status</th>
      		</tr>
    		</thead>
	   		<tbody>

    		<?php
            while($row = mysqli_fetch_array($retval)) {
            $name = $row['Name'];
            $email = $row['Email'];
            $status = $row['Status'];
            ?>
      <tr>
      
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
        <td><span class="label label-danger"><?php echo $status; ?></span></td>
</tr>
            <?php } 
            ?>
                </tbody>
			  </table>
			  </div>
			  </div>
			  </div>

<?php
mysqli_close($conn);
    }










function generatelink()
{
	if (($_POST['email']!=null||$_POST['email']!="")) {
            $email2 = $_POST['email'];
            $token = openssl_random_pseudo_bytes(16);
			$token = bin2hex($token);
			//var_dump($token);
 
			$dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            //var_dump($email2);               
            $sql = "UPDATE Guest SET token='$token' WHERE Email='$email2'";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);
            
            if(! $retval ) {
               die('Could not enter data: '.mysqli_error($conn));
               alert("Already Registered User..");
            }

     		mysqli_close($conn);
            $link = 'token='.$token.'&user_id='.$email2.'';
            ?>
            <?php
            return $link;
            
            }
            else {return 'failure';}
            
}




function GuestList()
    {
    	    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql = "SELECT em.RSVP_ID,em.GuestID, g.Name, em.Email FROM Guest AS g, EventManager AS em WHERE g.Guest_ID=em.GuestID AND em.EventID=(SELECT min(EventID) FROM EventManager) ORDER BY g.Guest_ID";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);

            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            ?>
            <div>
            <br><br>
            <table class="table">
    		<thead>
      		<tr>
        	<th>RSVP ID</th>
        	<th>GUEST ID</th>
        	<th>NAME</th>
        	<th>EMAIL</th>
      		</tr>
    		</thead>
	   		<tbody>

    		<?php
            while($row = mysqli_fetch_array($retval)) {
            $name = $row['Name'];
            $email = $row['Email'];
            $rsvpid = $row['RSVP_ID'];
            $gid = $row['GuestID']
            ?>
      <tr>
        <td><?php echo $rsvpid; ?></td>
        <td><?php echo $gid; ?></td>      
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>
      </tr>
            <?php } 
            ?>
                </tbody>
			  </table>
			  </div>
<?php
mysqli_close($conn);
    }




	function prev_event()
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
			$sql = 'SELECT * FROM Event WHERE Date <=(SELECT CURDATE())';
		   	mysqli_select_db($conn, $dbname);
		   	$retval = mysqli_query($conn,$sql);

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
		      	<hr style="border-width: 5px">
		      	<p style="font-size: 60px; text-shadow: 2px 2px 2px "><?php echo $theme ?></p>
		    	<p style="font-size: 35px; text-shadow: 2px 2px 2px"><i class="fa fa-calendar" aria-hidden="true"></i>&nbsp&nbsp<?php echo ($date) ?></p>
		     	<p style="font-size: 35px; text-shadow: 2px 2px 2px"><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp&nbsp<?php echo $venue ?></p>
		      </div>

      <?php
    }
     mysqli_close($conn);
    }



?>



