<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link href="https://fonts.googleapis.com/css?family=Coming+Soon|Gloria+Hallelujah|Rock+Salt" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Comfortaa|Maven+Pro" rel="stylesheet">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.js"></script>
<style type="text/css">
  
  body{
    background-color: #1BC6B4;
  }

  
</style>
<script type="text/javascript">$('body').hide();
$('body')
  .transition({
    animation : 'fade right',
    duration  : 800
  })
;</script>
<?php

  if (isset($_POST['name']) && isset($_POST['password'])) {
      
      $name = $_POST['name'];
      $password = $_POST['password'];
      
  	  if (!empty($name) && !empty($password)) {
           $query= "SELECT `id` FROM `users` where `username`= :name and `password`= :password ";
  	  	  
           $stmt = $db->prepare($query);
           $stmt->bindParam(':name', $name);
           $stmt->bindParam(':password', $password);                                             

           $stmt->execute();
           
           $row_count = $stmt->rowCount();  
 

             if($stmt){
  	  	       
               if ($row_count==0) {
               	echo "<h4 class='text-danger'>the username password combination do not match</h4>";
               	
               }
               else if($row_count==1){
               	
               	
               while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {
               	
                     $userid=  htmlentities($row['id']);

                 }

              $_SESSION['userid']= $userid;
              header('Location: index.php');
               }
}
  	  	  
  	  	  else{
  	  	  	echo "<h4 class='text-danger'>Please fill username and password</h4>";
  	  	  }
  	  }
  	else {
  		 
  		 echo "<h4 class='text-danger'>You must enter username and password</h4>";

  	}
  }

?>


<form action="<?php echo $current_file; ?>" method="POST">
  
  
    <div class="ui form">
      <div class="field">
        <label>Username</label>
        <div class="ui left icon input">
          <input type="text" class="form-control" id="usr" name="name" placeholder="Username">
          <i class="user icon"></i>
        </div>
      </div>
      <div class="field">
        <label>Password</label>
        <div class="ui left icon input">
          <input type="password" class="form-control" id="pwd" name="password">
          <i class="lock icon"></i>
        </div>
      </div>
    </div>
  <br>
<input type="submit" value="Login" class="ui secondary button">

</form>