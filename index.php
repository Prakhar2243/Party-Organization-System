<?php   include "connection.php";
        include "function.php";
?>
<?php 
    session_start();
    
    if(isset($_SESSION['userid'])){
        logOut();
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome|Party evite</title>
    
    <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="css/grid.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<link rel="stylesheet" href="css/general.css">
	
	
</head>
<body>
  
  
  <nav class="navbar navbar-light bg-light"  style="background-color: #e3f2fd;">
<!--      <a class="navbar-brand" href="#about">About Us</a>-->
      <a class="navbar-brand" href="#team" padding: 140px><img src="css/images/logo.PNG" height = "50px" width="70px"    alt="Evite"></a>
      <a class="navbar-brand" href="#team" padding: 140px>Evite</a>
     
      
      <p class="form-inline" > <button type="button" class="btn btn-dark" onclick="myFunction()">Log in/Sign Up</button></p>
        
<!--
        <p class="form-inline" > <a href="html/signup_login.html" >Log in/Sign Up
        </a></p>
-->
      
     
<!--
      <form class="form-inline">
        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
        
        <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
      </form>
-->
</nav>

  
  
    <div class="container">
      <div class="row">
        <div class="col">

            <div id = "about">
                <h1 >Party Invite</h1>
                
                        <h2>Catch</h2>
                        <p>Doesn't sending emails, cards, and calling indivisuals for just inviting to your party seen exhausting. Now we are providing you with a platform where you can register and get connect to all your relatives, friends & family and send them just more then greeting and venue to them. Send then Google location, events details, people invited, and much more
                    </p>
                
                        <h2>Invite</h2> 
                        <p>You can connect with our network and invite you friend & family to celebrate with you.</p>
                       
                   
                <h2>Get Invite</h2>
                        <p> Also get invited to parties. Know events occuring, venue details, other's invited all on same platform</p>
                   
                <h2>Family Tree</h2>
                       <p>find your distance connections with family tree visualization. </p>
                        
                   
                
            </div>
    
           
            </div>
        <div class="col" id="myDIV">
          
             
              <div id = "loginSection" >
                 <h1>Log in</h1>
    <form action="login.php" name= "f1" method = "post" onsubmit="return myFunction()">
                  
              
             
  <div class="form-row">
    
     <div class="form-group col-md-6">
      <label for="inputEmail4">User-Name</label>
      <input type="text" class="form-control" id="inputEmail4" placeholder="username" name = "userid">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="inputPassword4" placeholder="password" name = "userpassword">
    </div>
    </div>
    <input type="submit" class="btn btn-dark" name = "login" value="login" onclick = "checkValue2()">
</form>
      </div>        
              
              <div id = "signupSection" >
                 <h1>Sign Up</h1>
                
<!--                start of signup-->
<form action="signup.php" name= "f2" method = "post" onsubmit="return checkvalues()" >
 
  <div class="form-row">
    
     
    <div class="form-group col-md-6">
      <label for="inputPassword4">Name</label>
      <input type="text" class="form-control" id="" placeholder="Full Name" name = "username">
    </div>
     <div class="form-group col-md-6">
      <label for="inputPassword4">User_Name</label>
      <input type="text" class="form-control" id="" placeholder="User Id" name = "userid">
    </div>
    </div>
    
<div class="form-row">
     <div class="form-group col-md-6">
      <label for="inputEmail4">Email</label>
      <input type="email" class="form-control" id="" placeholder="Email" name="usermail">
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Password</label>
      <input type="password" class="form-control" id="" placeholder="Password" name = "userpassword">
    </div>
  </div>
  
  <div class="form-row">
     <div class="form-group col-md-6">
      <label for="">Gender</label>
      <select id="inputState" class="form-control" name="gender">
        <option value="F" selected>Female</option>
        <option value="M">Male</option>
        
      </select>
    </div>
    <div class="form-group col-md-6">
      <label for="inputPassword4">Age-Group</label>
      <select id="" class="form-control" name="Age">
            <option value="A"> 0 - 7 years</option>
            <option value="B"> 7 - 15 years</option>
            <option value="C"> 15 - 18 years</option>
            <option value="D"> 18 - 30 years</option>
            <option value="E" selected> Above...</option>
      </select>
    </div>
  </div>
  

  <div class="form-group">
    <label for="inputAddress2">Phone Number</label>
    <input type="text" class="form-control" id="" placeholder="Personal phone number" name = "userphone">
  </div>

  
  <div class="form-group">
    <div class="form-check">
      <input class="form-check-input" type="checkbox" id="gridCheck">
      <label class="form-check-label" for="gridCheck">
        Agree to terms and condition
      </label>
    </div>
  </div>
  <input type="submit" class="btn btn-dark" name = "SignUp" value="SignUp" onclick = "checkvalues()">
    
</form>


<!--                end  of singup -->
              </div>
        </div>
      </div>
      <br>
       <div id = "team">
               <h1 >Team</h1>
                
                   <table class="table ">
                       <tr>
                           <th scope="col"><img src="css/images/vg.jpg" height="270px" width="250px"></th>
                           <th scope="col"><img src="css/images/ps.jpeg" height="270px" width="250px"></th>
                       </tr>
                       <tr>
                           <td> Vaibhav Raj Goel</td>
                           <td>Prakhar Sharma</td>
                        </tr>
                   </table>
                   
                   
                   
            </div>
            <br>
    </div>
    <div class="footer">
    
  <nav class="navbar fixed-bottom navbar-light bg-light">
    <a class="navbar-brand" href="#">Email : vaibhavrajgoel2014@gmail.com</a>
  </nav>

    </div>
   
    <br>

    
    <script src = "js/indexScript.js">
//    form validation using js
    </script>
    
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>