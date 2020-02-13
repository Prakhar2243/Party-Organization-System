<?php   include "connection.php";
        include "function.php";?>
   <?php 
    global $conn;
    session_start();
    
    if(isset($_SESSION['userid'])){
        $userInSession = $_SESSION['userid'];
?>
        


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home | Party Invite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/general.css">
	
</head>
<body>

   <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="home.php"><img src="css/images/logo.PNG" height = "50px" width="70px"    alt="Evite"></a>
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Accounts
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Account Setting</a>
          
          <div class="dropdown-divider"></div>
          <a class="dropdown-item" href="index.php">Log Out</a>
<!--          <a class="dropdown-item"  onclick = <?php echo 'logOut()';?>>Log Out</a>-->
        </div>
      </li>
    </ul>
    
    
    <div class = "my-2 my-lg-0">
        <ul class="navbar-nav mr-auto">
        <li>
       <a class="nav-link" href="events.php">Create Events <span class="sr-only">(current)</span></a></li>
        <li>
       <a class="nav-link" href="invites.php">Invites <span class="sr-only">(current)</span></a></li>
        <li>
       <a class="nav-link" href="friends.php">Friends <span class="sr-only">(current)</span></a></li>
        </ul>
        
    </div>
  </div>
</nav>

   <br>
   
 <div class = "container">
            <?php echo"<p>Welcome $userInSession</p>"; ?>
            
            
  <div class="row">
    <div class="col-8">
      <div class="row">
    <div class="col-6">
    <h5>Current Event</h5>
    
<!--    your events section starts-->
   
   <?php
                $table = $_SESSION['userid'];
                $table2 = $table;
                $table .= "history";
                $query = "SELECT * from $table";
                
                $select_all_posts_query = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($select_all_posts_query)){
                        $eventId = $row['event_id'];
                        $eventStatus = $row['status'];
                        $rating = $row['rating'];
                        $reponse = $row['head_count'];
                        $eventName = "SELECT * from event WHERE event_id = $eventId";
                        $EventNameRetrived = mysqli_query($conn, $eventName);
                        
                        $iRow = mysqli_fetch_assoc($EventNameRetrived);
                        $fullName = $iRow['title'];
                        $formalText = $iRow['message'];
                       
                        
                        $tempQuery = "SELECT * FROM user WHERE username = '$table2'";
                        $currentEventNameRetrived = mysqli_query($conn, $tempQuery);
                        
                        $iRow2 = mysqli_fetch_assoc($currentEventNameRetrived);
                        $UID = $iRow2['user_id'];
                        $current = $iRow2['current'];
                        $current -=1;
                        $temp = ($UID*100)+$current;
                        if($temp == $eventId){
                    ?>        
    <div class="card" style="width: 18rem;">
                      <img src="css/images/birthday.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo "$fullName"; ?></h5>
                        <p class="card-text"><?php echo "$formalText"; ?></p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Event Rating: <?php echo "$rating"; ?> out of 10</li>
                        <li class="list-group-item"> 

                        <a href="responseOfInvites.php" class="card-link">Invited Guest Response>></a>
                        
                        </li>
                        <li class="list-group-item">
<!--                        <a href="#" class="card-link">Show List of People Inivted</a>-->
                        <form action="viewDetailsOfInvite.php" method="post" >
                              <input type="hidden" name="eventId" value="<?php echo $eventId;?>">
                               <input type="submit" value="ViewDetails" name="ViewDetails" class="btn btn-dark">
                               </form></li>
                      </ul>
                      
    </div><br>
        
<?php } }?>
   
<!--   your events section ends-->
    </div>
    
    
    <div class="col-6">
    <!--  Rate the Event section Start-->
   <h5>Your Previous Events</h5>
   <!--    your events section starts-->
   
   <?php
                $table = $_SESSION['userid'];
                $table .= "history";
                $query = "SELECT * from $table";
                
                $select_all_posts_query = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($select_all_posts_query)){
                        $eventId = $row['event_id'];
                        $eventStatus = $row['status'];
                        $rating = $row['rating'];
                        $reponse = $row['head_count'];
                        $eventName = "SELECT * from event WHERE event_id = $eventId";
                        $EventNameRetrived = mysqli_query($conn, $eventName);
                        
                        $iRow = mysqli_fetch_assoc($EventNameRetrived);
                        $fullName = $iRow['title'];
                        $formalText = $iRow['message'];
                       
                        $tempQuery = "SELECT * FROM user WHERE username = '$table2'";
                        $currentEventNameRetrived = mysqli_query($conn, $tempQuery);
                        
                        $iRow2 = mysqli_fetch_assoc($currentEventNameRetrived);
                        $UID = $iRow2['user_id'];
                        $current = $iRow2['current'];
                        $current -=1;
                        $temp = ($UID*100)+$current;
                        if($temp != $eventId){
                    ?>        
    <div class="card" style="width: 18rem;">
                      <img src="css/images/christmas.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo "$fullName"; ?></h5>
                        <p class="card-text"><?php echo "$formalText"; ?></p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item">Event Rating: <?php echo "$rating"; ?> out of 10</li>
                        
                        <li class="list-group-item">
<!--                        <a href="#" class="card-link">Show List of People Inivted</a>-->
                        <form action="viewDetailsOfInvite.php" method="post" >
                              <input type="hidden" name="eventId" value="<?php echo $eventId;?>">
                               <input type="submit" value="ViewDetails" name="ViewDetails" class="btn btn-dark">
                               </form></li>
                      </ul>
                      
    </div><br>
        
<?php } }?>

<!--  Rate the Event section ends-->
    </div>
      
      </div>
      
    </div>
      
<!--      left section-->
    <div class="col-4">
       <div class = "dashboard">
        <h3>Addition Services Required</h3><br>
        <p>View detials of Catering Service, Party Planner and Camera men. </p>
        
<!--        <br><input type="submit" value = "geo-location" class="btn btn-light">  / <input type="submit" value = "Set location" class="btn btn-light">-->
    </div>
    
      
    <div id = "Invite_resources">
        <h4>Catering services present </h4>
        
           <a href="https://www.sulekha.com/catering-services/">sulekha</a> <br>
           <a href="https://dir.indiamart.com/indianservices/catering.html">Indian Mart</a> <br>
           
            
        
        
        <h4> Camera Man</h4>
            <a href="http://www.missionkya.com/photography">missionkya photogrpahy</a> <br>
           <a href="https://www.shaadisaga.com/wedding-photographers">shaadisaga</a> <br>
           <a href="https://www.wedmegood.com/vendors/delhi-ncr/wedding-photographers/">wedmegood</a> <br>
           
        <h4>Party Planner</h4>
            <a href="https://www.planetjashn.com/">Planet Jashn</a> <br>
           <a href="https://www.urbanclap.com/">Urban Clap</a> <br>
        </div>
      </div>
  </div>
</div>
    <br>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
<?php
    }
    else{
        echo "<script> location.href = 'index.php'</script>";
    }
?>