<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>

.splitTemp {
  height: 100%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}

.leftTemp {
  left: 0;
  background-color: none;
}

.rightTemp {
  right: 0;
  background-color:none;
}

.centeredTemp {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  text-align: center;
}

.centeredTemp img {
  width: 150px;
  border-radius: 50%;
}
</style>
</head>
<body>

<div class="splitTemp leftTemp">
  <div class="centeredTemp">
    <img src="Capture.png" alt="Enter correct image source">
    <h2>Name</h2>
    <p>Some text.</p>
  </div>
</div>

<div class="splitTemp rightTemp">
  <div class="centeredTemp">
    <input type="button" name="button 1" value="button 1"><br><br>
	<input type="button" name="button 2" value="button 2">
    
  </div>
</div>
     
</body>
</html>


// not working
<!--        <ul>-->
<!--
            <li>Photo</li>
            <li><?php echo "$fullName with user id $name";?></li>
-->
            
<!--
            <li><?php $UniquerInviteList = $name."invite";?> 
               <input type="radio" name="<?php echo $UniquerInviteList?>" value="Invite" > Invite<br>
                <input type="radio" name="<?php echo $UniquerInviteList?>" value="Skip" checked> Skip<br>
                
            </li>
-->
                <div class="splitTemp leftTemp">
                  <div class="centeredTemp">
                    <img src="css/images/female.png" alt="Enter correct image source" style="height:20px;width:20px;">
                    <h6><?php echo "$fullName";?></h6>
                    <p><?php echo "$name";?></p>
                  </div>
                </div>

                <div class="splitTemp rightTemp">
                  <div class="centeredTemp">
                    <?php $UniquerInviteList = $name."invite";?> 
               <input type="radio" name="<?php echo $UniquerInviteList?>" value="Invite" > Invite<br>
                <input type="radio" name="<?php echo $UniquerInviteList?>" value="Skip" checked> Skip<br>

                  </div>
</div>
<!--        </ul>-->




// working image tile

<div class="card mb-3" style="max-width: 540px;">
          <div class="row no-gutters">
            <div class="col-md-4">
              <img src="css/images/male.png" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
              <div class="card-body">
                <h5 class="card-title"><?php echo "$fullName";?></h5>
                <p class="card-text"><small class="text-muted"><?php echo "User id $name";?></small></p>
                <p class="card-text">
                      <?php $UniquerInviteList = $name."invite";?> 
                       <input type="radio" name="<?php echo $UniquerInviteList?>" value="Invite" > Invite<br>
                        <input type="radio" name="<?php echo $UniquerInviteList?>" value="Skip" checked> Skip<br>
                  </p>
                
              </div>
            </div>
          </div>
        </div>