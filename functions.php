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


    function allguests()
    {
    	    $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql = "SELECT * FROM Guest ORDER BY Status AND Name";
               
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
        <?php if($status=='PENDING')
        { ?>
        <td><span class="label label-primary"><?php echo $status; ?></span></td>
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
if (($_POST['email2']!=null||$_POST['email2']!="")) {
            $email = $_POST['email2'];
            var_dump($email);
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql3 = " SELECT e.Event_ID, g.Guest_ID, g.Email FROM Event AS e, Guest AS g WHERE g.Email='$email' AND e.Date=(SELECT min(Date) FROM Event WHERE Date>=(SELECT CURDATE())) ";
            mysqli_select_db($conn,$dbname);
            $retval3 = mysqli_query($conn,$sql3);

            if(! $retval3 ) {
               die('Could not enter data:'.mysqli_error($conn));
            }
            
            while($row = mysqli_fetch_array($retval3))
            {
            $eid = $row['Event_ID'];
            $gid = $row['Guest_ID'];        
            $gmail = $row['Email'];
            }
            if($gmail==''||$gmail==null)
            {
                return "failure";
                die();
            }
            $sql = "INSERT INTO EventManager (EventID,GuestID,Email) VALUES ('$eid','$gid','$gmail')";

            $sql2= "UPDATE Guest SET Status='CONFIRM' WHERE Email='$email'";
            
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
            return "success";
          	}
          	else{
                return "failure";
            }
			

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
               
            $sql= "UPDATE Request SET Status='APPROVED' WHERE Email='$email2'";
            $sql2= "SELECT * FROM Request WHERE Email='$email2'";  
            mysqli_select_db($conn,$dbname);
            
            

            $retval2 = mysqli_query($conn,$sql2);
            $row = mysqli_fetch_array($retval2);
            if($row['Status']=='APPROVED'){
                return 'already';
                die();
            }
            $retval = mysqli_query($conn,$sql);
            
            $email=$row['Email'];
            $name=$row['Name'];
            var_dump($email);
            var_dump($name);
            
            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            $sql3 = "INSERT INTO Guest(Name,Email,Status) VALUES ('$name','$email','PENDING')";
            $retval3 = mysqli_query($conn,$sql3);
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
               
            $sql = "SELECT * FROM Request WHERE Status='REQUESTED' ORDER BY request_ID DESC ";
               
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
            $Id= $row['Request_ID'];
            ?>

            <form id="form-req">
            <input type="hidden" name="email2" value="<?php echo $email; ?>">
            </form>
           
      <tr>
      
        <td><?php echo $name; ?></td>
        <td><?php echo $email; ?></td>


        <td><button type="button" class="btn btn-success accept"  data-id=<?php echo $Id; ?> name="accept">ACCEPT</button></td>
      	<td><button type="button" class="btn btn-danger decline"  data-id=<?php echo $Id; ?> name="decline">DECLINE</button></td>
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
               
            $sql = "SELECT * FROM Request WHERE Status='APPROVED' ORDER BY Name";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);

            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            ?>
            <div class="row">
            <div class="col-sm-6">
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
        <td><span class="label label-warning"><?php echo $status; ?></span></td>
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
			<div class="col-sm-6">
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
            $email2=urlencode($email2);
            $token=urlencode($token);
            if(! $retval ) {
               die('Could not enter data: '.mysqli_error($conn));
               alert("Already Registered User..");
            }

     		mysqli_close($conn);
            $link = '&token='.$token.'&user_id='.$email2.'&>';
            
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
               
            $sql = "SELECT DISTINCT g.Name, em.Email FROM Guest AS g, EventManager AS em WHERE g.Guest_ID=em.GuestID AND em.EventID=(SELECT min(EventID) FROM EventManager ) ORDER BY g.Guest_ID";
               
            mysqli_select_db($conn,$dbname);
            $retval = mysqli_query($conn,$sql);

            if(! $retval ) {
               die('Could not get data: '.mysqli_error($conn));
              echo "<script>alert('Failure.');</script>";
            }
            ?>
            <div>
            
            <table class="table" style="font-size: 18px">
    		<thead>
      		<tr>
        	<th><b>NAME</b></th>
        	<th><b>EMAIL</b></th>
      		</tr>
    		</thead>
	   		<tbody>

    		<?php
            while($row = mysqli_fetch_array($retval)) {
            $name = $row['Name'];
            $email = $row['Email'];
            ?>
      <tr>
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



function login()
{   
    var_dump($_POST['email']);
        var_dump($_POST['password']);
    if (($_POST['email']!=null||$_POST['email']!="")&&($_POST['password']!=null||$_POST['password']!=""))
    {
        if (($_POST['password']=="12345")&&($_POST['email']=="operator@abc.in")){
            return "success";
        }
        else
        {
            return "failure";
        }
    }
    else {
        return "failure";
    }
}






function editevent()
    {
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql = "SELECT * FROM Event ORDER BY Date DESC ";
               
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
            <th>Theme</th>
            <th>Date</th>
            <th>Venue</th>
            </tr>
            </thead>
            <tbody>

            <?php
            while($row = mysqli_fetch_array($retval)) {
            $theme = $row['Theme'];
            $date = $row['Date'];
            $venue=$row['Venue'];
            $Id= $row['Event_ID'];
            ?>

            <form id="form-edit">
            <input type="hidden" name="email" value="<?php echo $theme; ?>">
            </form>
           
      <tr>
      
        <td><?php echo $theme; ?></td>
        <td><?php echo $date; ?></td>
        <td><?php echo $venue; ?></td>

        <td><button type="button" class="btn btn-danger delete"  data-id=<?php echo $Id; ?> name="accept">DELETE</button></td>
      </tr>
            <?php } 
            ?>
                </tbody>
              </table>
              </div>
<?php
mysqli_close($conn);
    }



function deleteevent()
{
            if (($_POST['id']!=null||$_POST['id']!="")) {
            $id = $_POST['id'];
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
            $sql= "DELETE FROM Event WHERE Event_ID='$id'"; 
            mysqli_select_db($conn,$dbname);
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


function eventedit2()
{
    if (($_POST['theme']!=null||$_POST['theme']!="")&&($_POST['date']!=null||$_POST['date']!="")&&($_POST['venue']!=null||$_POST['venue']!="")) {
            $theme = $_POST['theme'];
            $date = $_POST['date'];
            $venue = $_POST['venue'];
            $id = $_POST['id'];
            $dbhost = 'localhost';
            $dbuser = 'root';
            $dbpass = '';
            $dbname = 'rsvp';
            $conn = mysqli_connect($dbhost,$dbuser,$dbpass);
        
            if(! $conn ) {
               die('Could not connect: '.mysqli_error());
            }
               
                           
            $sql = "UPDATE Event SET Theme='$theme', Date='$date', Venue='$venue' WHERE Event_ID='$id'";
               
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



?>



