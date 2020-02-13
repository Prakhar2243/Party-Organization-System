<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['Reject'])){
// updating current user tabable        
            $friendId = $_POST['friendId'];
            $query = "UPDATE $table SET response1 = 0 WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to accept  1 invitation";
            }

// fetching friend's user name        
        $query = "SELECT * FROM user WHERE user_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to accept invitation";
            }
            $iRow = mysqli_fetch_assoc($result);
            $userName = $iRow['username'];
// fetching current user id        
        $query2 = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn, $query2);
            if(!$result){
                echo"unalbe to accept invitation";
            }
            $iRow = mysqli_fetch_assoc($result);
            $currentUserId = $iRow['user_id'];
// updating friends table from whom invite camme froom.      
            $query = "UPDATE $userName SET invitation1 = 3 WHERE friend_id = $currentUserId";
            $result = mysqli_query($conn, $query);
        if(!$result){
                echo"unalbe to accept 2  invitation";
            }
        
            echo "<script> location.href = 'invites.php'</script>";
         //echo"unalbe to accepted";
    }
else{
        echo "better luck next Time";
    }
?>


