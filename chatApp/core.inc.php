
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.js"></script>
<?php
   
   require 'server.php';
   ob_start();
   session_start();
   ?>

   <style type="text/css"></style>
   <script type="text/javascript">
    
    function chk(id){
        //var x= $id.toString();

        var str= "#"+id;
        var name = $(id).val();
        var dataString= 'user2='+name;
        $.ajax({
            
            type:'post',
            url:'testpost.php',
            data:dataString,
            cache:false,

            success: function(html){
                $('#chatarea').html(html);

            }
        });
        return false;
    }

    function updateScroll(){
    var element = document.getElementById("style-11");
    setTimeout(function(){ element.scrollTop = element.scrollHeight; }, 500);
    
}
/*function getuser(){
        

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

                           xmlhttp.open('GET', 'loginform.php?user2='+ document.getElementById('user2').value, true);
                           xmlhttp.send();
                          
         }  */

     function msgs($user1, $user2){
                       
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

                xmlhttp.open('GET', 'chatcontent.php?user2='+$user2+'&user1='+$user1, true);
                           xmlhttp.send();
                    
                    window.inter=setInterval(function(){
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

                xmlhttp.open('GET', 'chatcontent.php?user2='+$user2+'&user1='+$user1, true);
                           xmlhttp.send();

                         }, 5000);
                    updateScroll();
                    
                           
         }

         function msgadd($user1, $user2){
                  updateScroll();
                    
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

                xmlhttp.open('GET', 'addmsg.php?user2='+$user2+'&user1='+$user1+'&msg='+document.getElementById('usr').value, true);
                           xmlhttp.send();
                           msgs($user1, $user2);
                           document.getElementById("usr").value ="";
                           updateScroll();
                           
         }
   </script>
<?php
   
   $current_file = $_SERVER['SCRIPT_NAME'];
   
   if(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER'])){
   $http_referer = $_SERVER['HTTP_REFERER'];
   }


   function loggedin(){
   	if (isset($_SESSION['userid']) && !empty($_SESSION['userid'])){
   		return true;
   	}
   	else{
   		return false;
   	}
   }
   function create($userid,$username){
     
     
     msgs($_SESSION['userid'], $userid, $username );
      $currentchat=  $userid;        
   }

  
   function getuserfield($field,$database){

        $query= "SELECT `$field` FROM `users` where `id`= '".$_SESSION['userid']."' ";
           
           if ($query_run= $database->query($query)) {

           	  foreach ($database->query("SELECT `$field` FROM `users` where `id`= '".$_SESSION['userid']."' ") as $row) {

   	            return $row[$field];
           }
       }

   }

   function getuserfieldbyid($field,$database,$id){

        $query= "SELECT `$field` FROM `users` where `id`= $id ";
           
           if ($query_run= $database->query($query)) {

              foreach ($database->query("SELECT `$field` FROM `users` where `id`= $id") as $row) {

                return $row[$field];
           }
       }

   }

  function printmsg($table){

        $query= "SELECT msg FROM $table";
           
           $stmt = $database->prepare($query);
           $stmt->execute();
           

           
                     while($book = $stmt->fetch(PDO::FETCH_ASSOC)){

  
echo "<table class='table table-hover' ><tr><td>".$book['msg']."</td>"."</tr></table>";
          

  }}

  

   function getnotes($database,$myname){
            

           $query= "SELECT username,id,fullname FROM users";
           
           $stmt = $database->prepare($query);
           $stmt->execute();
           
          $count=1;
           ?><table class='table table-hover' style='font-family: "Comfortaa", cursive;'><?php
                     while($book = $stmt->fetch(PDO::FETCH_ASSOC)){
             
  if($myname==$book['username']){

  }
  else{
    $userid= $book['username'];

echo "<tr><td><strong>".$book['username']."</strong><br><h6>".$book['fullname']."</h6></td><td><form>
     <input type='hidden' id='".$userid."'  name='user2' value='".$book['id']."'>
     <a href='#msgarea'><input type='submit' id='submitbutton' value='Chat' class='log ui button green inverted sbmt' style='float: right' onclick='return chk(".$userid.");' /></a>
</form></td>"."</tr>";
?>



<?php  
   
  $count=$count+1;
}


}?></table><?php
}

?>