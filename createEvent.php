<?php   include "connection.php";
        include "function.php";
        global $conn;
        session_start();
    $userInSession = $_SESSION['userid'];
echo "userid";
echo "$userInSession";
    

if(isset($_POST['SendInvite'])){
    // INPUT FROM FORM START
            $title = $_POST['title'];
            $partyType = $_POST['partyType'];
            if($partyType == "Family Function"){
                $partyType = "F";
            }
            else{
                $partyType = "B";
            }
            $state = $_POST['state'];
            $city = $_POST['city'];
            $pincode = $_POST['pincode'];
            $place = $_POST['place'];
            $date = $_POST['date'];

// convrt date to sql formate
echo $date."<br>";
$origDate = $date; 
$date = str_replace('/', '-', $origDate );
$newDate = date("Y-m-d", strtotime($date));           
echo $newDate."<br>";
$date = $newDate;
    
            $fromTime = $_POST['fromTime'];
            $toTime = $_POST['toTime'];
            $members = $_POST['members'];
            $message = $_POST['message'];
            $cateringType = $_POST['cateringType'];
            $accom = $_POST['accom'];
     // INPUT FROM FORM ENDS       
            
    
    
    
            $query = "SELECT * from user WHERE username = '$userInSession' ";
            $getUserId = mysqli_query($conn, $query);
    if($getUserId){
            $iRow = mysqli_fetch_assoc($getUserId);
            $UserId = $iRow['user_id'];
            $current = $iRow['current'];
    // creating EVENT ID using this 100 event ids can be created unique to that user
        
            $event_id = ($UserId*100)+$current;
echo $event_id."<br>";
echo $current."<br>";
            $current += 1;
            $query = "UPDATE user SET current='$current' WHERE user_id = '$UserId' ";
            $Result = mysqli_query($conn, $query);
         
            $time = $fromTime." - ".$toTime;
    
// INSERTING DATA INTO EVENT TABLE (STEP1)
            $query = "INSERT INTO event VALUES($event_id, '$partyType', '$title', '$state', '$city', $pincode, '$place', '$cateringType', '$accom', '$date', '$time', $members, '$message')";
            
            $insertEventData = mysqli_query($conn, $query);
            if(!$insertEventData){
                echo "unbable to implement event creation <br>";
            }
    
            $EventId = $event_id;
echo "$event_id<br>";

//UPDATING USER HISTORY TABLE FOR THE EVENT ABOVE CREATED
            $tempTable = $userInSession."history";
            $query = "INSERT INTO $tempTable(event_id, status, rating) VALUES($EventId, '0', '10')";
            $insertEvenDataInUserHistory = mysqli_query($conn, $query);
            if(!$insertEvenDataInUserHistory){
                echo "unbable to insertEvenDataInUserHistory <br>";
            }
    
//NOW GOING THROUG USERNAME TABLE(UNIQUE TO EVERY USER) FOR GOING THROUGH FRINDS LIST    
            $tempTable = $userInSession;
            $query = "SELECT * FROM $tempTable";
            $interatingThroughUserFriendsList = mysqli_query($conn,$query);
        
            if(!$interatingThroughUserFriendsList){
                echo "interatingThroughUserFriendsList <br>";
            }
// START OF INSERTION INTO USERNAME TABLE
            while($row = mysqli_fetch_array($interatingThroughUserFriendsList)){
                $presentFriendId = $row["friend_id"];
                $SendVarForPresentFriend = $presentFriendId."invite";
                $InviteOrNot = $_POST["$SendVarForPresentFriend"];
                
// $name = $row['friend_id'];
//$UniquerInviteList = $name."invite";
                
                if($InviteOrNot=="Invite"){
                    $query = "UPDATE $userInSession SET createdevent1=$EventId, invitation1=1 WHERE friend_id = $presentFriendId";
                    $insertionInFriendTable = mysqli_query($conn, $query);
                    if(!$insertionInFriendTable){echo "unable to insert for $presentFriendId <br>";}
                }
                else{
                    $query = "UPDATE $userInSession SET createdevent1=$EventId, invitation1=0 WHERE friend_id = $presentFriendId";
                    $insertionInFriendTable = mysqli_query($conn, $query);
                    if(!$insertionInFriendTable){echo "unable to insert for $presentFriendId <br>";}
                }
            }
 // END OF INSERTION INTO USERNAME TABLE   
        
//START TO SEND INVITE FOR THOSE INVITED
            $query = "SELECT * FROM $tempTable";
            $sendingRequestNow = mysqli_query($conn,$query);
        if(!$sendingRequestNow){echo "unable to LOOP THROUGH YOUR FRIENDS TABLE <br>";}
        
        
            while($row = mysqli_fetch_array($sendingRequestNow)){
                $presentFriendId = $row["friend_id"];
                $query = "SELECT * from user WHERE user_id = '$presentFriendId' ";
                $result = mysqli_query($conn,$query);
                
                if(!$result){echo"No Such friend exists<br>";}
                
                    $iRow = mysqli_fetch_assoc($result);
                    $Table = $iRow['username'];
                     
                $InviteOrNot = $row["invitation1"];
                if($InviteOrNot == 1){
                    //$query = "INSERT INTO $Table(evnet1, response1) VALUES($EventId,2) WHERE friend_id = $UserId";
                    $query = "UPDATE $Table SET event1=$EventId, response1=2 WHERE friend_id = $UserId";
                    $resultIvite = mysqli_query($conn,$query);
                    if(!$resultIvite){echo"unable to recive  invite FROM $UserId for Friend $Table<br>";}
                    // reponse 1 set to 2 as it is unanswered yet
                }
                
            }
  // INVITATION SENT          
            echo "<script> location.href = 'home.php'</script>";
        }
}
        else{
            //echo "<script> location.href = 'home.php'</script>";
            echo "you dont";    
        }
?>