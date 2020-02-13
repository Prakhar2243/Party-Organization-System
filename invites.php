<?php   include "connection.php";
        include "function.php";?>
   <?php 
    session_start();
    
    if(isset($_SESSION['userid'])){
?>
        



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Invites | Party Invite</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/general.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>

<!--   /////////////////-->
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

<div class="container">
    
             <?php
                $table = $_SESSION['userid'];
                //$table .= "history";
                $query = "SELECT * from $table";
                $select_all_posts_query = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($select_all_posts_query)){
                        
                        $eventId = $row['event1'];
                        if($eventId != NULL){
                        $fromFriend = $row['friend_id'];
                        $response = $row['response1'];
                        $eventName = "SELECT * from event WHERE event_id = $eventId";
                        $EventNameRetrived = mysqli_query($conn, $eventName);
                        
                        $iRow = mysqli_fetch_assoc($EventNameRetrived);
                        
                        $title = $iRow['title'];
                        $formalText = $iRow['message'];
                        $city = $iRow['city'];
                        $building = $iRow['building_name'];
                        $date = $iRow['date'];
                        $time = $iRow['time'];
                        
                        // session variable
                        //$_SESSION['currentFriendId'] = 
                       
                        
                    ?>        

              <div class="row">
<!--              Pending Invites-->
        <?php if($response == 2){ ?>
                <div class="col">
                         <h5>Pending Invites</h5>
                          <div class="card" style="width: 18rem;">
                      <img src="css/images/annaversary.jpg" class="card-img-top" alt="...">
                      <div class="card-body">
                        <h5 class="card-title"><?php echo "$title"; ?></h5>
                        <p class="card-text"><?php echo "$formalText"; ?></p>
                      </div>
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item"><?php echo "$building, $city"; ?></li>
                        <li class="list-group-item"><?php echo "Date: $date<br>Time: $time"; ?> </li>
                        <li class="list-group-item">From <?php echo "$fromFriend"; ?></li>
                      </ul>
                      <div class="card-body">
                      <table>
                          <td>
                              <form action="acceptInvite.php" method="post" >
                              <input type="hidden" name="friendId" value="<?php echo $fromFriend;?>" >
                               <input type="submit" value="Accept" name="Accept" class="btn btn-outline-success">
                               </form>
                         </td>
                         
                          <td>
                              <form action="rejectInvite.php" method="post" >
                              <input type="hidden" name="friendId" value="<?php echo $fromFriend;?>">
                               <input type="submit" value="Reject" name="Reject" class="btn btn-outline-danger">
                               </form>
                       </td>
                      </table>
                       
                       
                        
                      </div>
                    </div>
                </div>
    <?php } ?>
    

    
<!--    Accepted Invites-->
    <?php if($response == 1){ ?> 
                <div class="col">
                 <div class="col"><h5>Accepted Invites</h5>
                  <div class="card" style="width: 18rem;">
              <img src="css/images/annaversary.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo "$title"; ?></h5>
                <p class="card-text"><?php echo "$formalText"; ?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo "$building, $city"; ?></li>
                <li class="list-group-item"><?php echo "Date: $date<br>Time: $time"; ?></li>
                <li class="list-group-item">From <?php echo "$fromFriend"; ?></li>
              </ul>
              <div class="card-body">
                          <form action="viewDetailsOfInvite.php" method="post" >
                              <input type="hidden" name="eventId" value="<?php echo $eventId;?>">
                               <input type="submit" value="ViewDetails" name="ViewDetails" class="btn btn-dark">
                               </form>
<!--                <a href="#" class="card-link">View details>></a>-->
              </div>
            </div>
            </div>
                </div>
    <?php } ?>  
<!--    >Rejected Invites-->
    <?php if($response == 0){ ?> 
            <div class="col">
                 <h5>Rejected Invites</h5>
                  <div class="card" style="width: 18rem;">
              <img src="css/images/annaversary.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo "$title"; ?></h5>
                <p class="card-text"><?php echo "$formalText"; ?></p>
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo "$building, $city"; ?></li>
                <li class="list-group-item"><?php echo "Date: $date<br>Time: $time"; ?></li>
                <li class="list-group-item">From <?php echo "$fromFriend"; ?></li>
              </ul>
              <div class="card-body">
               <form action="viewDetailsOfInvite.php" method="post" >
                              <input type="hidden" name="eventId" value="<?php echo $eventId;?>">
                               <input type="submit" value="ViewDetails" name="ViewDetails" class="btn btn-dark">
                               </form>
<!--                <a href="#" class="card-link">View details>></a>-->
              </div>
            </div>
        </div>
    <?php } ?>   
              <br>
        <?php } }?>
</div>
    






    </div>




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