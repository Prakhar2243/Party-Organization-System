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
    <title>Find Friend | Party Invite</title>
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


<!--

<div id = "Search_bar">
        <p> text bar and search </p>
    </div>
    <hr>
-->
   <br>
    <div class = "container">
   
<nav class="navbar  navbar-expand-lg navbar-light bg-light">
    <div class="navbar-nav">
      <a class="nav-item nav-link" href="friends.php">Friends</a>
      <a class="nav-item nav-link" href="findFriend.php">Find Friends</a>
    </div>
</nav>
     <br>   
        
<div class="row">
    <div class="col">
          <div id = "friend_bluePrint">
      <p> Unanwered Request</p>
       <?php
                $table1 = $_SESSION['userid'];
                $table2 = $table1."sent";
                
       $query = "SELECT user_id FROM user WHERE EXISTS (SELECT $table2.friend_id FROM $table2 WHERE user.user_id = $table2.friend_id)";
        
                $select_all_posts_query = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($select_all_posts_query)){
                        
                        $name = $row['user_id'];
                        if($table1 == $name)
                            continue;
                        else{
                        $nquery = "SELECT username FROM User WHERE user_id = $name";
                        $fullName = mysqli_query($conn,$nquery);
                        
                        $iRow = mysqli_fetch_assoc($fullName);
                        $fullName = $iRow['username'];
                    ?>
       
<!--
        <ul>
            <li>Photo</li>
            <li><?php //echo "$fullName with user id $name";?></li>
            
            <li> 
              <input type="submit" value = "Send Request">
               
                              <form action="CancelFriendRequest.php" method="post" >
                              <input type="hidden" name="friendId" value="<?php echo $name;?>" >
                              <input type="hidden" name="friendUserName" value="<?php echo $fullName;?>" >
                               <input type="submit" value="CancelRequest" name="CancelRequest">
                               </form>
                         
                
            </li>
        </ul>
-->
        
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="css/images/male.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo "$fullName";?></h5>
                <p class="card-text"><small class="text-muted"><?php echo "User id $name";?></small></p>
                
                      <form action="CancelFriendRequest.php" method="post" >
                              <input type="hidden" name="friendId" value="<?php echo $name;?>" >
                              <input type="hidden" name="friendUserName" value="<?php echo $fullName;?>" >
                               <input type="submit" value="CancelRequest" name="CancelRequest" class="btn btn-dark">
                               </form>
                 
                
              </div>
            </div>
          </div>
        </div>
    
 <?php }} ?> 
    
    </div>
    </div>
    
    <div class="col">
          <div id = "friend_bluePrint">
      <p>send freind request</p>
       <?php
                $table1 = $_SESSION['userid'];
                $table2 = $table1."sent";
                $table3 = $table1."recived";

// incorrect query 
// incorrect query 
// incorrect query 
        
           //     $query = "select user_id FROM user WHERE user_id NOT IN (SELECT friend_id from $table1)";
//                OR  (select friend_id from $table2) OR  (SELECT friend_id from $table3) )";
                
       $query = "SELECT user_id FROM user WHERE NOT EXISTS ((SELECT $table1.friend_id FROM $table1 WHERE user.user_id = $table1.friend_id)UNION (SELECT $table3.friend_id FROM $table3 WHERE user.user_id = $table3.friend_id)UNION (SELECT $table2.friend_id FROM $table2 WHERE user.user_id = $table2.friend_id))EXCEPT(SELECT user_id FROM user WHERE username='$table1')";
        
        //UNION (SELECT $table2.friend_id FROM $table2 WHERE user.user_id = $table2.friend_id)
        
                $select_all_posts_query = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($select_all_posts_query)){
                        
                        $name = $row['user_id'];
                        if($table1 == $name)
                            continue;
                        else{
                        $nquery = "SELECT username FROM User WHERE user_id = $name";
                        $fullName = mysqli_query($conn,$nquery);
                        
                        $iRow = mysqli_fetch_assoc($fullName);
                        $fullName = $iRow['username'];
                    ?>
       
<!--
        <ul>
            <li>Photo</li>
            <li><?php// echo "$fullName with user id $name";?></li>
            
            <li> 
              <input type="submit" value = "Send Request">
               
                              <form action="sendFriendRequest.php" method="post" >
                              <input type="hidden" name="friendId" value="<?php echo $name;?>" >
                              <input type="hidden" name="friendUserName" value="<?php echo $fullName;?>" >
                               <input type="submit" value="SendRequest" name="SendRequest">
                               </form>
                         
                
            </li>
        </ul>
-->
        
        <div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="css/images/male.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo "$fullName";?></h5>
                <p class="card-text"><small class="text-muted"><?php echo "User id $name";?></small></p>
                
                      <form action="sendFriendRequest.php" method="post" >
                              <input type="hidden" name="friendId" value="<?php echo $name;?>" >
                              <input type="hidden" name="friendUserName" value="<?php echo $fullName;?>" >
                               <input type="submit" value="SendRequest" name="SendRequest" class="btn btn-dark">
                               </form>
                
                
              </div>
            </div>
          </div>
        </div>
    
 <?php }} ?> 
    
    </div>
    </div>
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