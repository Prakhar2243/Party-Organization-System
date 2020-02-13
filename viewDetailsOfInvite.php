<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['ViewDetails'])){
        
        $eventId= $_POST['eventId'];
        $query = "SELECT * FROM event WHERE event_id = $eventId";
        $Result = mysqli_query($conn,$query);
        if($Result){
        $iRow = mysqli_fetch_assoc($Result);
        //$fullName = $iRow['username'];
        $type = $iRow['type'];
            if($type == 'B'){
                $type = "Informal Business Metting";
            }
            else{
                $type = "Family Function";
            }
        $title = $iRow['title'];
        $state = $iRow['state'];
        $city = $iRow['city'];
        $pincode = $iRow['pincode'];
        $building_name = $iRow['building_name'];
            
        $accomodation = $iRow['accomodation'];
        $date = $iRow['date'];
        $timings = $iRow['time'];
        $max_people = $iRow['max_people'];
        $message = $iRow['message'];
        $catering_type = $iRow['catering_type'];
            
            
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Event Details | Party Invite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/general.css">
</head>


<body>
  <br>
   <div class="container">
   
<nav class="nav">
  <a class="nav-link active" href="home.php">Home</a>
  <a class="nav-link" href="invites.php">Go To Invites</a>
  <a class="nav-link" href="index.php">Log Out</a>
  
</nav>
   <br><br>
    <table class="table">
<!--
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">First</th>
      <th scope="col">Last</th>
      <th scope="col">Handle</th>
    </tr>
  </thead>
-->
  <tbody>
    <tr>
      <th scope="row">Event Type:</th>
      <td> <?php echo"$type";?></td>
    </tr>
     
     <tr>
      <th scope="row">Event Name:</th>
      <td><?php echo"$title";?></td>
    </tr>
    
    <tr>
      <th scope="row">Date: </th>
      <td><?php echo"$date";?></td>
    </tr>
    
    <tr>
      <th scope="row">Timings: </th>
      <td><?php echo"$timings";?></td>
    </tr>
     
     <tr>
      <th scope="row">Venue:</th>
      <td><?php echo" State : $state <br> City : $city <br> locality Name : $building_name <br>  Pincode : $pincode <br> ";?></td>
    </tr>
     
    <tr>
      <th scope="row">Invite Message: </th>
      <td><?php echo"$message";?></td>
    </tr>
     
     <tr>
      <th scope="row">Accomdation Availablity:</th>
      <td><?php echo"$accomodation";?></td>
    </tr>
     
     <tr>
      <th scope="row">People permitted per card</th>
      <td><?php echo"$max_people";?></td>
    </tr>
    
    
    <tr>
      <th scope="row">Catering Type</th>
      <td><?php echo"$catering_type";?></td>
    </tr>
    
  </tbody>
</table>

</div>
</body>
</html>
    
 <?php    }}else{
        echo "better luck next Time";
    }
?>
