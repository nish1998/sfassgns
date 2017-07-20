<?php include 'header.php' ?>







<script type="text/javascript">
  
  $(document).ready(function(){
           $('.column').hide();
           $('.column').fadeIn(1000);
  });
</script>

<?php

  require 'core.inc.php';
  require 'server.php';
  if(!loggedin()){
        
        if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['cpassword']) && isset($_POST['fname']) && isset($_POST['lname']) && isset($_POST['gender'])) 
        {
        	$name= $_POST['name'];
        	$password= $_POST['password'];
        	$cpassword= $_POST['cpassword'];
        	$fname= $_POST['fname'];
        	$lname=$_POST['lname'];
          $gender=$_POST['gender'];

            if (!empty($name) && !empty($password) && !empty($cpassword) && !empty($fname) && !empty($lname) && !empty($gender)) {

              if (preg_match('/[^A-Z]/i', $name))
{
                            echo "<h4 class='text-danger text-center'>special characters & whitespaces not allowed in username </h4>";
}else{
                   
                   if ((strlen($name))>30 || (strlen($password))>30|| (strlen($cpassword))>30|| (strlen($fname))>40|| (strlen($lname))>40) {
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
           	   echo "<h4 class='text-danger text-center'>Username exists!</h4>";
           }
           else
           {
           
                    $stmt= $db->prepare("INSERT into users (username, password, firstname,lastname,gender) VALUES(:name, :password, :fname,:lname,:gen)");
                    $stmt->bindValue(':name', $name);
                    $stmt->bindValue(':password', $password);
                    $stmt->bindValue(':fname', $fname);
                    $stmt->bindValue(':lname', $lname);
                    $stmt->bindValue(':gen', $gender);
                    $ct=$db->prepare("CREATE TABLE $name( id int AUTO_INCREMENT,notes varchar(300) , task varchar(10) NOT NULL, PRIMARY KEY(id) )");
                    $ct->execute();
                    $stmt->execute();
                    if($stmt){
                        header("Location: success.php");
                    }
                      


             	}
             } 
}}}
             else{
             	echo "All fields required!";
             }




        }
  


  ?>

<div class="ui container">
<div class="ui two column middle aligned very relaxed stackable grid">
<br><br>
<div class="column ">
<div class="ui raised segment">
  <?php include 'test.php' ?></div>
<hr>
<h4 class="text-center text-primary">Already Registered? <a href="index.php" class="text-success">Login Here</a></h4>
</div>
<div class="center aligned column">
<img src="notoj.png" style="width:80%; height:auto; float:right" class="img-responsive"/>



</div></div>
<br><br><hr>
<h5 class="text-center text-default" ><i class="fa fa-copyright"></i><a target="_blank" href="https://github.com/nish1998" style="color:grey;">Nishant Thakur</a></h5>

<br>

<?php  

}
  elseif(loggedin()){
  	
           }


?>