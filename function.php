<?php include "connection.php";


function confirm_query($result_set) {
		if (!$result_set) {
			die("Database query failed: " . mysql_error());
		}
	}

function showAllData(){
    global $conn;
    $query = "SELECT * FROM user";
    $result = mysqli_query($conn,$query);

    if(!$result){
        die("query Failed".mysqli_error());
    }
    
    while($row = mysqli_fetch_assoc($result)){
        $id = $row['id'];
        echo  "<option value = '$id'> $id</option>";
    }
}

function updateTable(){
    global $conn;
    $user = $_POST['u1'];
       $pass = $_POST['p1'];
       $id = $_POST['id'];
     $user = mysqli_real_escape_string($conn, $user);
    $pass = mysqli_real_escape_string($conn, $pass);
    $id = mysqli_real_escape_string($conn, $id);
    
    $query = "UPDATE user SET username = '$user', password = '$pass' WHERE id = '$id' ;";

    $result = mysqli_query($conn, $query);
    
    if(!$result){
        die("QUERY FAILED");
    }
}


function deleteRows(){
    global $conn;
    $id = $_POST['id'];
    
    $query = "DELETE FROM user WHERE id = '$id' ;";

    $result = mysqli_query($conn, $query);
    
    if(!$result){
        die("QUERY FAILED");
    }
}

function logOut(){
    //session_start();
    if(isset($_SESSION['userid'])){
        session_destroy();
        echo "<script> location.href = 'index.php'</script>";
    }
    else{
        echo "<script> location.href = 'index.php'</script>";
    }
}

?>