<?php include "connection.php";
global $conn;
if(isset($_POST['SignUp'])){
    
    $name = $_POST['username'];
    $email = $_POST['usermail'];
    $username = $_POST['userid'];
    $phone = $_POST['userphone'];
    $Age_group = $_POST['Age'];
    $pass = $_POST['userpassword'];
    $gender = $_POST['gender'];
    
    $username = mysqli_real_escape_string($conn, $username); 
    $gender = mysqli_real_escape_string($conn, $gender); 
    
    $email = mysqli_real_escape_string($conn, $email); 
    
    $pass = mysqli_real_escape_string($conn, $pass);  
    
     $name= mysqli_real_escape_string($conn, $name);
    
     $phone= mysqli_real_escape_string($conn, $phone);
    
     $Age_group = mysqli_real_escape_string($conn,$Age_group );
    
     $pass = mysqli_real_escape_string($conn, $pass);

     
    $query = "select * from user where username = '$username'";
    $result = mysqli_query($conn,$query);
    
    if(mysqli_num_rows($result) == 1){
//        echo "<script> alert('username already exist'); </script>"
        //echo "hello";
        header('Location:index.php');
    }
    else{
        $query = "INSERT INTO user(username, name, email, phone, ageGroup, password, gender) VALUES('$username','$name','$email',$phone,'$Age_group','$pass', '$gender')";
        
        $result = mysqli_query($conn,$query);
        //if(mysqli_num_rows($result) == 1){
        if($result){  
        //echo "yes";
            //header('Location:home.php');
        
            
            // start of unique table creation at the time of sign up
            
            
                //$username = $_POST['u1'];
                $name = $username;
                
                $query = "CREATE TABLE  $name(friend_id int(100), event1 int(100), event2 int(100), createdevent1 int(100), createdevent2 int(100), response1 int(5), response2 int(5), invitation1 int(5), invitation2 int(5))";
                $result = mysqli_query($conn, $query);
//                if($result){
//                    echo "you did it<br>";
//                }
//                else{
//                    echo "no nothing<br>".mysqli_error();
//                }
                
                $name = $username;
                $name .= "recived";
                $query = "CREATE TABLE $name(friend_id int(100), response int(5), flag int(2))";
                $result = mysqli_query($conn, $query);
                
//             if($result){
//                    echo "you did it<br>";
//                }
//                else{
//                    echo "no nothing<br> ";
//                }
            
                $name = $username;
                $name .= "sent";
                $query = "CREATE TABLE $name(friend_id int(100), response int(5), flag int(2))";
                $result = mysqli_query($conn, $query);
                
//                 if($result){
//                    echo "you did it<br>";
//                }
//                else{
//                    echo "no nothing<br> ";
//                }
                $name = $username;
                $name .= "history";
                $query = "CREATE TABLE $name( event_id int(100), status int(5), rating int(5), head_count int(100)  )";
                $result = mysqli_query($conn, $query);
            
//             if($result){
//                    echo "you did it<br>";
//                }
//                else{
//                    echo "no nothing<br> ";
//                }
            
            
            // end of unique table creation;
                header('Location:home.php');
                
                
                
                
                
        }
        else{
            echo "else for this one";
//            header('Location:index.php');
        }
    
    //}
//    echo "we are connected to db<br>";
//        $query = "Select * FROM users";
//        $result = mysqli_query($conn, $query);
//        if($result){
//            while($row = mysqli_fetch_row($result)){
//                print_r($row);
//                echo "<br>";
//            }
      
    //echo "$user $pass";
//    if($user && $pass){
//        echo "$user $pass";
//    }
//    else{
//        echo "are you kidding me";
    }
}

?>
