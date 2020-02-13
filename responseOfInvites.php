<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    $query = "SELECT * FROM $table";
    $totalFriends = 0;
    $acceptedInvites = 0;
    $rejectedInvites = 0;
    $notInvted = 0;
    $noResponseInvite = 0;
    $Result = mysqli_query($conn,$query);
    if(!$Result){ echo "unable to process your query";}
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    
    <title>Response List | Party Invite</title>
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
  
  <a class="nav-link" href="index.php">Log Out</a>
  
</nav>
   <br><br>
    <table class="table">
  <thead>
    <tr>
      <th scope="col">Photo</th>
      <th scope="col">Name</th>
      <th scope="col">Status</th>
      <th scope="col"> Invite</th>
    </tr>
  </thead>
  <tbody>
     
<?php
      while($row = mysqli_fetch_array($Result)){
            $name = $row['friend_id'];
          
           $nquery = "SELECT username FROM User WHERE user_id = $name";
            $fullName = mysqli_query($conn,$nquery);
            $iRow = mysqli_fetch_assoc($fullName);
            $fullName = $iRow['username'];
          $inviteRe = $row['invitation1']
?>
      <tr>
          <td><img src="css/images/male.png" height = "100px" width="100px" alt="..."></td>
          <td><?php echo "$fullName"; ?>
          
          
       
<!--
          $totalFriends = 0;
    $acceptedInvites = 0;
    $rejectedInvites = 0;
    $notInvted = 0;
    $noResponseInvite = 0;
-->
          
          </td>
          <td>
             <?php 
                if($inviteRe == 0){
                 echo '<button type="button" class="btn btn-outline-danger">Not Invited</button>';
                    $totalFriends++;
                    $notInvted++;
                }
                else if($inviteRe == 1){
                 echo '<button type="button" class="btn btn-outline-secondary">No Response Yet</button>';
                    $totalFriends++;
                    $noResponseInvite++;
                }
                else if($inviteRe == 2){
                    echo '<button type="button" class="btn btn-outline-success">Accepted</button>';
                    $totalFriends++;
                    $acceptedInvites++;
                }
                else{
                 echo '<button type="button" class="btn btn-outline-warning">Rejected</button>';
                    $totalFriends++;
                    $rejectedInvites++;
                }
              
              ?>
        </td>
          <td>
          
          <?php 
                if($inviteRe == 0){?>
<!--                 echo '<button type="button" class="btn btn-outline-danger">Not Invited</button>';-->
                   <form action="sendInviteFromHomePage.php" method="post" >
                        <input type="hidden" name="friendId" value="<?php echo $name;?>" >
                        <input type="hidden" name="friendUserName" value="<?php echo $fullName;?>" >
                        <input type="submit" value="sendInvite" name="sendInvite" class="btn btn-light">
                    </form>
            <?php    }
                else{ ?>
                    <form action="cancelInviteFromHomePage.php" method="post" >
                        <input type="hidden" name="friendId" value="<?php echo $name;?>" >
                        <input type="hidden" name="friendUserName" value="<?php echo $fullName;?>" >
                        <input type="submit" value="cancelInvite" name="cancelInvite" class="btn btn-dark">
                    </form>
       <?php         }
           ?>
<!--
           <form action="cancelInviteFromHomePage.php" method="post" >
            <input type="hidden" name="friendId" value="<?php echo $name;?>" >
            <input type="hidden" name="friendUserName" value="<?php echo $fullName;?>" >
            <input type="submit" value="cancelInvite" name="cancelInvite" class="btn btn-dark">
        </form>
-->
          
          </td>
      </tr>

<?php }       ?>
  </tbody>
  
</table>
<br>
    <table class = "table">
        <thead class = "thead-dark">
            <tr>
                <th scope = "col"> CATEGORY</th>
                <th scope = "col">COUNT</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row"> Total Firned</th>
                <td><?php echo "$totalFriends";?></td>
            </tr>
            <tr>
                <th scope="row">Accepted Invites</th>
                <td><?php echo "$acceptedInvites";?></td>
            </tr>
            <tr>
                <th scope="row">Rejected Invites</th>
                <td><?php echo "$rejectedInvites";?></td>
            </tr>
            <tr>
                <th scope="row">No Response Yet</th>
                <td><?php echo "$noResponseInvite";?></td>
            </tr>
            <tr>
                <th scope="row">Not Invited</th>
                <td><?php echo "$notInvted";?></td>
            </tr>
        </tbody>
        
    </table>

<!--
      $totalFriends = 0;
    $acceptedInvites = 0;
    $rejectedInvites = 0;
    $notInvted = 0;
    $noResponseInvite = 0;
-->

</div>
</body>
</html>
    

