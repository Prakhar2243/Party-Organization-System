<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['sendInvite'])){
        
            $friendId = $_POST['friendId'];
            $friendUserName = $_POST['friendUserName'];
        
// delete from current user table 
            $tempTable = $table;
            $query = "UPDATE $tempTable SET invitation1=1 WHERE friend_id= $friendId";
            //$query = "UPDATE $table SET response1 = 1 WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to UPDATE invitation status to  invited";
            }
        
// retriving event id from above table

        $query = "SELECT * FROM $tempTable WHERE friend_id= $friendId";
        $result = mysqli_query($conn, $query);
        if(!$result){
            echo"unalbe to retrive event id";
        }
        $iRow = mysqli_fetch_assoc($result);
        $eventId = $iRow['createdevent1'];
// inserting into friends table for showing it has recived a  request.
        
            $nquery = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn,$nquery);
        if($result){
                $iRow = mysqli_fetch_assoc($result);
                $currentLoginId = $iRow['user_id'];

                $tempTable = $friendUserName;
                $query = "UPDATE $tempTable SET event1 = $eventId , response1 = 2 WHERE friend_id = $currentLoginId";
                $result = mysqli_query($conn, $query);
                    if(!$result){
                        echo"unalbe to DELETE afterward invitation";
                    }
                    else{
                        echo "<script> location.href = 'responseOfInvites.php'</script>";
                    }
                }
        else{
            echo "no record recived";
            }
    }else{
        echo "better luck next Time";
    }
?>

