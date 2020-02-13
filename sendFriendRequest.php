<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['SendRequest'])){
        
            $friendId = $_POST['friendId'];
            $friendUserName = $_POST['friendUserName'];
        
        // inserting into current user sent table 
            $tempTable = $table."sent";
            $query = "INSERT INTO $tempTable(friend_id) VALUES($friendId)";
            //$query = "UPDATE $table SET response1 = 1 WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to accept invitation";
            }
        
        // inserting into friends table for showing it has recived a  request.
        
        $nquery = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn,$nquery);
            if($result){
                $iRow = mysqli_fetch_assoc($result);
                $fullName = $iRow['user_id'];

                $tempTable = $friendUserName."recived";
                $query = "INSERT INTO $tempTable(friend_id) VALUES($fullName)";
                $result = mysqli_query($conn, $query);
                    if(!$result){
                        echo"unalbe to accept invitation";
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

