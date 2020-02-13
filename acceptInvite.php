<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['Accept'])){
            $friendId = $_POST['friendId'];
    // accpting invite from friend and updating in current user table
            $query = "UPDATE $table SET response1 = 1 WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to accept 1 invitation";
            }
        
    // fetching friends user name
            $query = "SELECT * FROM user WHERE user_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to find frined";
            }
            $iRow = mysqli_fetch_assoc($result);
            $userName = $iRow['username'];
    
    // fetchin current user id
        $query2 = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn, $query2);
            if(!$result){
                echo"unalbe to accept invitation";
            }
            $iRow = mysqli_fetch_assoc($result);
            $currentUserId = $iRow['user_id'];
        
    // updating friends table from whom invite came from.  
            $query = "UPDATE $userName SET invitation1 = 2 WHERE friend_id = $currentUserId";
            $result = mysqli_query($conn, $query);
//            $result = mysqli_fetch_assoc($result);
            if(!$result){
                echo"unalbe to accept 2 invitation";
            }
        
            echo "<script> location.href = 'invites.php'</script>";
//            else{
//                echo "SUCCESS";
//            }
//        $query = "UPDATE $userName SET invitation1 = 3 WHERE friend_id = $currentUserId";
//            $result = mysqli_query($conn, $query);
//        if(!$result){
//                echo"unalbe to accept 2  invitation";
//            }
        
        
    }else{
        echo "better luck next Time";
    }
?>

