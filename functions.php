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
               
            $sql = "SELECT * FROM Guest ORDER BY Guest_ID DESC LIMIT 5";
               
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
        	<th>Staus</th>
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

        <td><?php echo $status; ?></td>
      </tr>
            <?php } 
            ?>
                </tbody>
			  </table>
            	</div>
<?php
mysqli_close($conn);
                     
            
          
    }

?>