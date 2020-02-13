<?php 
include "connection.php"; 
include "function.php";
session_start();


global $conn;

if(isset($_SESSION['userid'])){
    //header('Location:home.php');
    echo "<script> location.href = 'home.php'</script>";
    
}

else{
    


    if(isset($_POST['login'])){
        if($conn){
            $user = $_POST['userid'];
            $pass = $_POST['userpassword'];

    //        $user = mysqli_real_escape_string($conn, $user);    
    //        $pass = mysqli_real_escape_string($conn, $pass);  

            $query = "select username from user where username = '$user' and password  = '$pass';";
            //$query .= "VALUES('$user', '$pass')";

            $result = mysqli_query($conn, $query);
            //confirm_query($result);
            if(mysqli_num_rows($result)>0){
            //if($result) {
                $_SESSION['userid'] = $user;
                echo "<script> location.href = 'login.php'</script>";
                    
                //echo "SUCESS<br>";
                //header('Location:home.php');
            }
            else{
                echo "<script>alert('username or password were incorrect')</script>";
                echo "<script> location.href = 'index.php'</script>";
            }
//            {
//                echo "no data";//"<alert> re enter </alert>";
//                    //header('Location:index.php');
//            }
        }
        else
            echo "no connection";
        //    else{
        //        echo "youu";
        //    }
    }
}
?>