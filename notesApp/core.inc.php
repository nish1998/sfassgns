<?php
   
   require 'server.php';
   ob_start();
   session_start();
   ?>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" type="text/css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/core.js"></script>
<style type="text/css">
  tr{
    font-family: 'Coming Soon', cursive;
    font-size: 20px;
  }
  .btn{
    transition-duration: 0.4s;
  }
  body{
    background-color: #e6ffe6;
  }
  
</style>
<script type="text/javascript">

         function find(id){

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

                           xmlhttp.open('GET', 'delete.php?id='+ id, true);
                           xmlhttp.send();

         } 

         function adone(id){

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

                           xmlhttp.open('GET', 'done.php?id='+ id, true);
                           xmlhttp.send();

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

   function getuserfield($field,$database){

        $query= "SELECT `$field` FROM `users` where `id`= '".$_SESSION['userid']."' ";
           
           if ($query_run= $database->query($query)) {

           	  foreach ($database->query("SELECT `$field` FROM `users` where `id`= '".$_SESSION['userid']."' ") as $row) {

   	            return $row[$field];
           }
       }

   }

   function done($id,$database){
                
                   $name=getuserfield('username', $database);
                   $query= "SELECT notes, id,task FROM $name where id= $id ";
           
                   $stmt = $database->prepare($query);
                   $stmt->execute();
                   

           
                     while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                            $present= $row['task'];
                            }
                            
                             
          if($present==NULL){ $query1= "UPDATE $name SET task='success' where id=$id";
           
           $stmt1 = $database->prepare($query1);
           $stmt1->execute();
           $present="success";
         }


           else{ 
            $query2= "UPDATE $name SET task='' where id=$id";
            $stmt2 = $database->prepare($query2);
            $stmt2->execute();
            $present=NULL;

            }
          

   }

   function getnotes($database){
            $name=getuserfield('username', $database);

           $query= "SELECT notes, id,task FROM $name ";
           
           $stmt = $database->prepare($query);
           $stmt->execute();
           

           
                     while($book = $stmt->fetch(PDO::FETCH_ASSOC)){

  if($book['task']=='success'){
    $val='fa fa-undo';
  }else{
    $val='fa fa-check';
  }
echo "<div><table class='table table-hover' ><tr class=".$book['task'].">"."<td><button name='don' onclick='adone(".$book['id'].")'  class='btn btn-success' style='width:50px'><i class='fa ".$val."' style='font-size:20px'></i></button></td>"."<td>".$book['notes']."</td>"."<td><button name='del' onclick='find(".$book['id'].")' type='button' class='btn btn-danger' style='float:right;'><i class='fa fa-trash-o ' style='font-size:20px'></i></button></td></tr></table></div>";
 //if you want to delete based on staff_id

}


                 

   }

   function delete($del,$database){

            $name=getuserfield('username', $database);
            
            $stmt= $database->prepare("DELETE FROM $name where id=$del ");
            $stmt->execute();

   }

?>