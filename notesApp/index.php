<?php 
require 'header.php';
?>
<script type="text/javascript">
  
  $(document).ready(function(){
           $('.row').hide();
           $('.row').fadeIn(1000);

           $("#mynotes").click(function() {
    $('html, body').animate({
        scrollTop: $("#noteswell").offset().top
    }, 800);
  });

        
});
</script>
<style type="text/css">
  

  .wrap{
    background: url('nt.png') no-repeat;
    background-size: cover;
    height:auto;
    min-height: 400px;
    width:100%;
}
.wrap textarea{
    margin-top: 130px ;
    
    width:100%;
    height:auto;
    min-height: 400px;
    background-color: transparent;
    resize: none;
    padding: 20px;
    font-size: 25px;
    overflow-y: scroll;
    font-family: 'Coming Soon', cursive;
}
#create{
  position: absolute;
  margin-top: 92px;
  margin-left: 5px;
}
.segment{
     background-color:#eafaf3 !important;
}

#noteswell{
  max-height: 500px;
  overflow-y: scroll;
}

</style>
<script type="text/javascript">
	
	$(document).ready(function(){
           $('.column').hide();
           $('.column').fadeIn(1000);
	});
</script>

<script type="text/javascript">
	
   function createnote(){

                    if (window.XMLHttpRequest) {
    
                    xmlhttp = new XMLHttpRequest();
                    } 

                    else {
   
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                           }

                           xmlhttp.onreadystatechange = function() {
                       if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                             document.getElementById("datatable").innerHTML = xmlhttp.responseText;
                                                   }

          }

                           xmlhttp.open('GET', 'newnote.php?notes='+ document.getElementById('notestext').value , true);
                           xmlhttp.send();
                           document.getElementById('notestext').value="";

         } 

</script>


<div class="container">
<?php 
require 'core.inc.php';
require 'server.php';


if (loggedin()) {
	echo '<h5 style="font-family: \'Comfortaa\', cursive; ">'.'Hola, <strong>'.getuserfield('firstname', $db).'</strong>. Welcome to notoj.'.'  <a href="logout.php" style="float:right;">Logout</a><br><hr>'.'</h5>';
	
	
	?>
 
<center><button class="ui big button blue inverted" id="mynotes">MY NOTES</button></center><br>
<div class="ui grid stackable" >
<div class="six wide column">
<form>
	<!--<input type="text" name="notes" ></input> -->
<input type="button" value="Create" class="ui button green big " id="create" onclick="createnote();">
<div class="wrap">

    <textarea type="text" name="notes" maxlength="300" placeholder="Write Here . . ." id="notestext"></textarea>
</div>
	<br>
	
</form>

</div>

<div class="ten wide column ui raised segment" style="margin-top: 52px" id="noteswell">
<div class="text-center" style="font-family:'Comfortaa', cursive; font-size:20px" >Your Notes</div><br>
<div id='datatable'>

<?php 
$name=getnotes($db);
echo $name; 
?>

</div>


</div>

</div><br>
<hr>
<h5 class="text-center text-default" ><i class="fa fa-copyright"></i><a target="_blank" href="https://github.com/nish1998" style="color:grey;">Nishant Thakur</a></h5><br>


	<?php

}
else{

?>


<div class="ui two column middle aligned very relaxed stackable grid">
<div class="column">
<?php 
include 'loginform.inc.php';
 ?>

</div>


  <div class="center aligned column">
  <a href="register.php">
  Not registered yet?<br><br>
    <div class="ui big green labeled icon button inverted" >

      <i class="signup icon"></i>
      Sign Up
    </div>
  </div>
</a></div>


 <div class="footer">
 <hr>
<h5 class="text-center text-default" ><i class="fa fa-copyright"></i><a target="_blank" href="https://github.com/nish1998" style="color:grey;" >Nishant Thakur</a></h5></div><br>
 <?php
}
?>
