<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['RejectRequest'])){
        
            $friendId = $_POST['friendId'];
            $friendUserName = $_POST['friendUserName'];
        
        //section1 delete trivial data from username+recived table
        //section2 delete trivial data from friendUsername+sent table
        
        
            $tempTable = $table."recived";
            $query = "DELETE FROM $tempTable WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to DELETE 1 invitation";
            }
        
        
        $nquery = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn,$nquery);
            if($result){
                $iRow = mysqli_fetch_assoc($result);
                
        
                $fullName = $iRow['user_id'];
                $tempTable = $friendUserName."sent";
                $query = "DELETE FROM $tempTable WHERE friend_id = $fullName";
                $result = mysqli_query($conn, $query);
                    if(!$result){
                        echo"unalbe to DELETE 2 invitation";
                    }
                    else{
                        echo "<script> location.href = 'friends.php'</script>";
                    }
            }
                
    }else{
        echo "better luck next Time";
    }
?>

