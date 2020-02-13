<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['CancelRequest'])){
        
            $friendId = $_POST['friendId'];
            $friendUserName = $_POST['friendUserName'];
        
        // delete from current user sent table 
            $tempTable = $table."sent";
            $query = "DELETE FROM $tempTable WHERE friend_id= $friendId";
            //$query = "UPDATE $table SET response1 = 1 WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to DELETE invitation";
            }
        
        // inserting into friends table for showing it has recived a  request.
        
            $nquery = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn,$nquery);
        if($result){
                $iRow = mysqli_fetch_assoc($result);
                $fullName = $iRow['user_id'];

                $tempTable = $friendUserName."recived";
                $query = "DELETE FROM $tempTable  WHERE friend_id = $fullName";
                $result = mysqli_query($conn, $query);
                    if(!$result){
                        echo"unalbe to DELETE afterward invitation";
                    }
                    else{
                        echo "<script> location.href = 'findFriend.php'</script>";
                    }
                }
        else{
            echo "no record recived";
            }
    }else{
        echo "better luck next Time";
    }
?>

