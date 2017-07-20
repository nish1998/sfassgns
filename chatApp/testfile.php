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
    background-color: #e6ffe6;
   }
 </style>
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
      lname: {
        identifier: 'lname',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter a lastname'
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
        <label>First name</label>
        <div class="ui left icon input">
          <input type="text" class="form-control" id="usr" name="fname" maxlength="40" value="<?php if(isset($fname)){echo $fname;}  ?>" placeholder="Firstname">
          <i class="user icon"></i>
        </div>
      </div>

      <div class="field">
        <label>Last name</label>
        <div class="ui left icon input">
          <input type="text" class="form-control" id="usr" name="lname" maxlength="40" value="<?php if(isset($lname)){echo $lname;}  ?>" placeholder="Lastname">
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

      <button type="submit" class="ui purple button inverted">Register</button> 
    <div class="ui error message"></div>
    </form>
   </div> 
  
  


