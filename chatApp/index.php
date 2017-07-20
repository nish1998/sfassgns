<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">


<div class="container">
<?php 
require 'core.inc.php';
require 'server.php';
require 'header.php';
if(isset($_POST['user2'])&&!empty($_POST['user2'])){$user2name= getuserfieldbyid('fullname',$db,$_POST['user2']);
?>
	<script>msgs(<?php echo $_SESSION['userid']; ?>, <?php echo $_POST['user2']; ?> );</script>

<?php }
if (loggedin()) {
	echo '<div style="font-family: \'Comfortaa\', cursive; ">Hola, Welcome to oZi <strong>'.getuserfield('fullname', $db).'</strong><a href="logout.php" style="float:right;" title="logout"><i class="sign out icon orange big"></i></a></div>';
	
	
	?>
<script type="text/javascript">
$(document).ready(function(){
$('#results').hide();
});
         function appear(){
         	
         	 if(document.getElementById('keyword').value==''){
                   $('#results').hide();
         	 }
         	else{
         	  $('#results').show();	
         	} 
         }
         function find(){
         	console.log(document.getElementById('keyword').value);

                    if (window.XMLHttpRequest) {
    
                    xmlhttp = new XMLHttpRequest();
                    } 

                    else {
   
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                           }

                           xmlhttp.onreadystatechange = function() {
                       if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                             document.getElementById("results").innerHTML = xmlhttp.responseText;
                                                   }

          }

                           xmlhttp.open('GET', 'auto.inc.php?keyword='+ document.getElementById('keyword').value, true);
                           xmlhttp.send();
                           document.getElementById("results").hide;
         }

        /* function chatcontent(){
         	console.log(document.getElementById('keyword').value);

                    if (window.XMLHttpRequest) {
    
                    xmlhttp = new XMLHttpRequest();
                    } 

                    else {
   
                     xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
                           }

                           xmlhttp.onreadystatechange = function() {
                       if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                             document.getElementById("msgarea").innerHTML = xmlhttp.responseText;
                                                   }

          }

                           xmlhttp.open('GET', 'auto.inc.php?keyword='+ , true);
                           xmlhttp.send();
                           document.getElementById("results").hide;
         }
*/



	</script>

<style type="text/css">
#style-11::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
	border-radius: 10px;
}
#style-12::-webkit-scrollbar-track
{
	-webkit-box-shadow: inset 0 0 6px rgba(0,0,0,0.3);
	background-color: #F5F5F5;
	border-radius: 10px;
}
#style-11::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}
#style-12::-webkit-scrollbar
{
	width: 10px;
	background-color: #F5F5F5;
}

#style-11::-webkit-scrollbar-thumb
{
	background-color: #3366FF;
	border-radius: 10px;
	background-image: -webkit-linear-gradient(0deg,
	                                          rgba(255, 255, 255, 0.5) 25%,
											  transparent 25%,
											  transparent 50%,
											  rgba(255, 255, 255, 0.5) 50%,
											  rgba(255, 255, 255, 0.5) 75%,
											  transparent 75%,
											  transparent)
}
#style-12::-webkit-scrollbar-thumb
{
	background-color: #3366FF;
	border-radius: 10px;
	background-image: -webkit-linear-gradient(0deg,
	                                          rgba(255, 255, 255, 0.5) 25%,
											  transparent 25%,
											  transparent 50%,
											  rgba(255, 255, 255, 0.5) 50%,
											  rgba(255, 255, 255, 0.5) 75%,
											  transparent 75%,
											  transparent)
}
.scrollbar
{
	
	
	height: 350px;
	width: 100%;
	background: #F5F5F5;
	overflow-y: scroll;
	overflow-x: hidden;
	margin-bottom: 25px;
	margin-top: 5px;
	
}

	#chatarea, #usersarea{

		min-height: 500px;
		max-height: 500px;
		background-color: #F3FFE2;

		
	}
	#msgarea{
        
		min-height: 350px;
        background-color: #1BC6B4;

	}
	#userarea{

     top:-20px;
}

#downbtn{
	z-index: 2;

}	

</style>
<div class="ui container">
<div class="row" >
<br>

<div class="col-md-4 ui raised segment" id="usersarea">
  <div class="ui search">
  <div class="ui icon input">
    <input type="text" placeholder="Search by username. . ." onkeyup="find(); appear();" autocomplete="off" id="keyword" >
    <i class="search icon"></i>
  </div>
  <div id="results" class="ui segment" style="position:absolute; z-index:2; background-color: white; width:100%"></div>
</div><br>
<div class="scrollbar" id="style-12">

<?php 
$myname= getuserfield('username',$db);
$name=getnotes($db, $myname );
echo $name;
//echo $_GET['user2']; 
?></div>
</div>
<div class="col-md-1"></div>
<script>$(".sbmt").click(function(){$('#chatarea')
  .transition('pulse')
;  });
$('body').hide();
$('body')
  .transition({
    animation : 'fade right',
    duration  : 800
  })
;</script>

<div class="col-md-7 ui raised segment" id="chatarea">

      
</div>
    



</form>
</div>
</div>

	<?php
}
else{

?>
<style>
.segment{
   background-color: #8ff0e6 !important;
}

</style>
<div class="row "><div class="col-md-3"></div>
<div class="col-md-6 ui segment raised">
<?php 
include 'loginform.inc.php';
 ?>

<div class="ui horizontal divider">
    Or
  </div>




  <center><a href="register.php" >
  Not registered yet?<br><br>
    <div class="ui green labeled icon button " >

      <i class="signup icon"></i>
      Sign Up
    </div>
  </div><div class="col-md-3"></div>
</a></div></center>
<br><br><br><br>

 <div class="footer">
 <hr>
<h5 class="text-center text-default" ><i class="fa fa-copyright"></i><a target="_blank" href="https://github.com/nish1998" style="color:grey;" >Nishant Thakur</a></h5></div><br>
 <?php
}
?>
