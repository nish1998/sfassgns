<?php
include 'header.php';
include 'core.inc.php';
include 'server.php';

?>
<script type="text/javascript">
 
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

	</script>
<style type="text/css">
	
	#chatarea{

		min-height: 500px;
		max-height: 500px;
	}
	#msgarea{
        
		min-height: 400px;
		max-height: 400px;
	}

</style>
<div class="ui container">
<div class="ui grid stackable" >
<br>
<div class="six wide column ui segment" id="usersarea">
  <div class="ui search">
  <div class="ui icon input">
    <input type="text" placeholder="Search by Name..." onkeyup="find()" autocomplete="off" id="keyword" >
    <i class="search icon"></i>
  </div>
  <div id="results" class="ui segment" style="position:absolute; z-index:2; background-color: white; width:100%"></div>
</div>
<hr>

<?php 
$name=getnotes($db);
echo $name; 
?>
</div>

<div class="ten wide column ui raised segment" id="chatarea">
<div class="ten wide column ui segment" id="msgarea"></div>
<form action="<?php echo $current_file; ?>" method="POST">
  
 

<div class="ui form">

      <div class="field">
        <div class="ui action input big">
          <input type="text" class="form-control" id="usr" name="name" placeholder="message...">
          <button type="submit" class="ui blue submit button inverted"><i class="send icon"></i></button></div>
      </div>
      
      
</div>
    



</form>
</div>
</div>
