<?php   include "connection.php";
        include "function.php";
        global $conn;
?>
<?php
    session_start();
    $table = $_SESSION['userid'];
    
    if(isset($_POST['AcceptRequest'])){
        
        $friendId = $_POST['friendId'];
        $friendUserName = $_POST['friendUserName'];
        
        //section1 For adding request to friend list of current user
        //section2 for adding request to friend list of requesting user
        //section3 delete trivial data from username+recived table
        //section4 delete trivial data from friendUsername+sent table
        
        
        //section3
            $tempTable = $table."recived";
            $query = "DELETE FROM $tempTable WHERE friend_id = $friendId";
            $result = mysqli_query($conn, $query);
            if(!$result){
                echo"unalbe to DELETE 1 invitation";
            }
        
        //section4
        $nquery = "SELECT * FROM user WHERE username = '$table'";
            $result = mysqli_query($conn,$nquery);
                if(!$result){echo " BEtter luck Next Time 1";}
            
            $iRow = mysqli_fetch_assoc($result);
            $fullName = $iRow['user_id'];
            $tempTable = $friendUserName."sent";
            $query = "DELETE FROM $tempTable WHERE friend_id = $fullName";
            $result = mysqli_query($conn, $query);
                if(!$result){
                    echo"unalbe to DELETE 2 invitation";
                }
//                    else{
//                        echo "<script> location.href = 'friends.php'</script>";
//                    }

        //section1
        $query = "INSERT INTO $friendUserName(friend_id) VALUES($fullName)";
        $result = mysqli_query($conn, $query);
            if(!$result){echo " BEtter luck Next Time 1";}
        //section2
        $query = "INSERT INTO $table(friend_id) VALUES($friendId)";
        $result = mysqli_query($conn, $query);
            if(!$result){echo " BEtter luck Next Time 1";}
        echo "<script> location.href = 'friends.php'</script>";    
    }else{
        echo "better luck next Time2";
    }
?>

