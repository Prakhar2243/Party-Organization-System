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
    <title>Create Event | Party Invite</title>
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


<div class = "container">
    <form action = 'createEvent.php' name = "eventForm" method="post" onsubmit="return checkFiels()">
<div class="row ">
    <div class="col">
<!--// start of form bootstrap-->

        
          <div class="form-group row">
            <label for="inputEmail3" class="col-sm-2 col-form-label">PartyType</label>
            <div class="col-sm-10">
<!--              <input type="email" class="form-control" id="inputEmail3" placeholder="Email">-->
              <select name="partyType" id="" class="form-control">
                        <option value="Business_Metting"> Informal Business Metting</option>
                        <option value="Family_Function">Family Function</option>
                    </select>
            </div>
          </div>
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Specific party name"
              name = "title">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">State</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" placeholder="State" name = "state">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">City</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" placeholder="City name" name = "city">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">PinCode</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputPassword3" placeholder="pincode" name="pincode" max = "999999" min = "100000">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Place</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" placeholder="venue" name="place">
            </div>
          </div>
          
        <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Date</label>
            <div class="col-sm-10">
              <input type="date" class="form-control" id="inputPassword3" placeholder="Date" name = "date">
            </div>
          </div>      
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">From</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Time AM/PM" name = "fromTime">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Till</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="inputPassword3" placeholder="Time AM/PM" name="toTime">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Members</label>
            <div class="col-sm-10">
              <input type="number" class="form-control" id="inputPassword3" placeholder="Memebers permitted on one card" name="members" min = "1">
            </div>
          </div>
          
          <div class="form-group row">
            <label for="inputPassword3" class="col-sm-2 col-form-label">Message</label>
            <div class="col-sm-10">
              
              <textarea type="textarea" class="form-control" id="inputPassword3" placeholder="Event specific details" name="message"></textarea>
               
            </div>
          </div>
          
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Catering type</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cateringType" id="gridRadios1" value="Non-Veg" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Non-veg
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="cateringType" id="gridRadios2" value="Veg">
                  <label class="form-check-label" for="gridRadios2">
                    Veg
                  </label>
                </div>

              </div>
            </div>
          </fieldset>
          
          <fieldset class="form-group">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Housing</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="accom" id="gridRadios1" value="A" checked>
                  <label class="form-check-label" for="gridRadios1">
                    Available
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input" type="radio" name="accom" id="gridRadios2" value="N">
                  <label class="form-check-label" for="gridRadios2">
                    Not Available
                  </label>
                </div>

              </div>
            </div>
          </fieldset>
          
          

<!--// end of form-->

   
    
    </div>
    <div class="col">
    <p>Select friends to send invite too.</p>
    <div class="overflow-auto" style="height:650px;width:100%;border:1px solid #ccc;font:16px/26px Georgia, Garamond, Serif;overflow:auto;">
       
       
        
           <div id = "friend_bluePrint">
      
       <?php
                $table = $_SESSION['userid'];
                $query = "SELECT * from $table";
                
                $select_all_posts_query = mysqli_query($conn, $query);
                
                    while($row = mysqli_fetch_array($select_all_posts_query)){
                        $name = $row['friend_id'];
                        $nquery = "SELECT username FROM User WHERE user_id = $name";
                        $fullName = mysqli_query($conn,$nquery);
                        
                        $iRow = mysqli_fetch_assoc($fullName);
                        $fullName = $iRow['username'];
                    ?>
       
<!--
        <ul>
            <li>Photo</li>
            <li><?php echo "$fullName with user id $name";?></li>
            
            <li><?php $UniquerInviteList = $name."invite";?> 
               <input type="radio" name="<?php echo $UniquerInviteList?>" value="Invite" > Invite<br>
                <input type="radio" name="<?php echo $UniquerInviteList?>" value="Skip" checked> Skip<br>
                
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
                <p class="card-text">
                      <?php $UniquerInviteList = $name."invite";?> 
                       <input type="radio" name="<?php echo $UniquerInviteList?>" value="Invite" > Invite<br>
                        <input type="radio" name="<?php echo $UniquerInviteList?>" value="Skip" checked> Skip<br>
                  </p>
                
              </div>
            </div>
          </div>
        </div>
        
    
 <?php } ?>  
   </div>
    
    </div>
    
        
        </div>
<!--
    response layout of stuff
     <div id = "Invite_response_dashboard">
        <h1>How will your card will look</h1><br>
         <div class="card" style="width: 18rem;">
              <img src="css/images/diwali.jpg" class="card-img-top" alt="...">
              <div class="card-body">
                <h5 class="card-title"><?php echo "$title";?></h5>
                <p class="card-text"><?php echo "$message";?></p>
                
              </div>
              <ul class="list-group list-group-flush">
                <li class="list-group-item"><?php echo "$place,<br>$city,$state,<br>($pincode)";?></li>
                <li class="list-group-item"><?php echo "$date<br>$fromTime - $toTime";?></li>
                <li class="list-group-item">From <?php echo "$userInSession";?></li>
              </ul>
              <div class="card-body">
                <a href="#" class="card-link" >Accept</a>
                <a href="#" class="card-link" >Decline</a>
              </div>
            </div>
        
-->
<!--
        <div id = "Left_card">
        
        
        <p>display visualiztion of card which was submitted above</p>   
        <a href="">Select Guest list</a>
        
        
        </div>
        <hr>
        <div id = "right_guest_response">
            <p>Right Side Response list</p>
          <ol>
           
            <li>Premium guest invited and responded</li>
            <li>Gold guest invited and responded</li>
            <li>Regular guest invited and responded</li>
        </ol>
        </div>
-->
       
        </div>   
        <hr> 
         <div class="container">
<!--    reponse layout end here-->
  <div class="form-group row">
    <input type="submit" class="btn btn-dark" value="SendInvite" onclick = "checkFiels()" name ="SendInvite">
          </div>
  </div>
   
   
        </form>
</div> 

   <br>
    <script src = "js/createEventScript.js">
    </script>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>


<?php    }
    else{
        echo "<script> location.href = 'index.php'</script>";
    }
?>