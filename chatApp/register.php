<?php
  require 'core.inc.php';
  include 'header.php';

?>
<script type="text/javascript">$('body').hide();
$('body')
  .transition({
    animation : 'fade right',
    duration  : 800
  })
;</script>

<script type="text/javascript">
  
$(document).ready(function(){
  $('.ui.radio.checkbox')
  .checkbox()
;

$('form')
  .form({
    on: 'blur',
    fields: {
      name: {
        identifier: 'name',
        rules: [
          {
            type   : 'regExp[/^[0-9,a-z,A-Z$_]+$/]',
            
            prompt : 'Please enter username without whitespace and special characters'
          }
        ]
      },
      
      
      
      password: {
        identifier: 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a password'
          },
          {
            type   : 'minLength[6]',
            prompt : 'Your password must be at least {ruleValue} characters'
          }
        ]
      },
      cpassword: {
        identifier: 'cpassword',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'passwords do not match'
          }
        ]
      },
      fname: {
        identifier: 'fname',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a firstname'
          }
        ]
      },
      email: {
        identifier  : 'email',
        rules: [
          {
            type   : 'email',
            prompt : 'Please enter a valid e-mail'
          }
        ]
      },
      gender: {
        identifier: 'gender',
        rules: [
          {
            type   : 'checked',
            prompt : 'You must choose your gender'
          }
        ]
      }
    }
  })
;
});
</script>
<?php

  
  require 'server.php';
  if(!loggedin()){
        
        if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['fname']) && isset($_POST['email'])&& isset($_POST['gender'])) 
        {
        	$name= $_POST['name'];
        	$password= $_POST['password'];
        	$cpassword= $_POST['cpassword'];
        	$fname= $_POST['fname'];
        	$email=$_POST['email'];
          $gender=$_POST['gender'];

            if (!empty($name) && !empty($password) && !empty($cpassword) && !empty($fname) && !empty($email) && !empty($gender)) {
                   
                   if ((strlen($name))>30 || (strlen($password))>30|| (strlen($cpassword))>30|| (strlen($fname))>40|| (strlen($email))>40) {
                   	echo "<h4 class='text-danger text-center'>Maxlength of fields exceeded</h4>";
                   }
                   else{


             	if ($password!=$cpassword) {
             		echo "<h4 class='text-danger text-center'>Passwords do not Match!</h4>";
             	}
             	else{
                    $query= "SELECT `id` FROM `users` where `username`= :name";
  	  	  
           $stmt = $db->prepare($query);
           $stmt->bindParam(':name', $name);
                                                        

           $stmt->execute();
           
           $row_count = $stmt->rowCount();

           if ($row_count==1) {
           	   echo "username exists";
           }
           else
           {
           
                    $stmt= $db->prepare("INSERT into users (username, password, fullname, email, gender) VALUES(:name, :password, :fname,:email, :gen)");
                    $stmt->bindValue(':name', $name);
                    $stmt->bindValue(':password', $password);
                    $stmt->bindValue(':fname', $fname);
                    $stmt->bindValue(':email', $email);
                    $stmt->bindValue(':gen', $gender);

                    $stmt->execute();
                    if($stmt){
                        header("Location: success.php");
                    }
                      


             	}
             } 
}}
             else{
             	echo "<h4 class='text-danger text-center'>All fields required!</h4>";
             }




        }
    


  ?>
<style>
  .segment{
    background-color: #8ff0e6 !important;
  }
</style>
<div class="container">
<div class="row">
<div class='col-md-3'></div>
<div class="col-md-6 ui segment raised">
  <div class="ui form">
  <form action="register.php" method="POST" class="ui form">
    
      <div class="field">
        <label>Username</label>
        <div class="ui left icon input">
          <input type="text" class="form-control" id="usr" name="name" maxlength="30" value="<?php if(isset($name)){echo $name;}  ?>" placeholder="Username">
          <i class="user icon"></i>
        </div>
      </div>
      <div class="field">
        <label>Password</label>
        <div class="ui left icon input">
          <input type="password" class="form-control" id="pwd" name="password" maxlength="30">
          <i class="lock icon"></i>
        </div>
      </div>

      <div class="field">
        <label>Confirm Password</label>
        <div class="ui left icon input">
         <input type="password" class="form-control" id="pwd" name="cpassword" maxlength="30" >
          <i class="lock icon"></i>
        </div>
      </div>

      <div class="field">
        <label>FullName</label>
        <div class="ui left icon input">
          <input type="text" class="form-control" id="usr" name="fname" maxlength="40" value="<?php if(isset($fname)){echo $fname;}  ?>" placeholder="FullName">
          <i class="user icon"></i>
        </div>
      </div>

      <div class="field">
        <label>Email</label>
        <div class="ui left icon input">
          <input type="text" class="form-control" id="usr" name="email" maxlength="40" value="<?php if(isset($email)){echo $email;}  ?>" placeholder="email">
          <i class="user icon"></i>
        </div>
      </div>

      <div class="inline fields">
    <label for="fruit">Gender</label>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="gender" value="M" class="text-default" class="hidden">
        <label>Male</label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="gender" value="F" class="text-default" class="hidden">
        <label>Female</label>
      </div>
    </div>
    <div class="field">
      <div class="ui radio checkbox">
        <input type="radio" name="gender" value="O" class="text-default" class="hidden">
        <label>Other</label>
      </div>
    </div></div>

      <button type="submit" class="ui purple button">Register</button> 
    <div class="ui error message"></div>
    </form>
   </div> 
</div></div>
<div class='col-md-3'></div>
</div>



</form>
<hr>

<h4 class="text-center text-primary">Already Registered? <a href="index.php" class="text-success">Login Here</a></h4>
<br>

<?php  

}
  elseif(loggedin()){
  	
           }


?>