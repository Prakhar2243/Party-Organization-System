<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['cancelInvite'])){
        
            $friendId = $_POST['friendId'];
            $friendUserName = $_POST['friendUserName'];
        
// delete from current user table 
            $tempTable = $table;
            $query = "UPDATE $tempTable SET invitation1=0 WHERE friend_id= $friendId";
            //$query = "UPDATE $table SET response1 = 1 WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to UPDATE invitation status to not invited";
            }
        
        // inserting into friends table for showing it has recived a  request.
        
            $nquery = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn,$nquery);
        if($result){
                $iRow = mysqli_fetch_assoc($result);
                $currentLoginId = $iRow['user_id'];

                $tempTable = $friendUserName;
                $query = "UPDATE $tempTable SET event1 = NULL , response1 = NULL WHERE friend_id = $currentLoginId";
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


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
    
</body>
</html>
-->


