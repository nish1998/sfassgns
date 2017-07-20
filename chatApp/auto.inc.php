
<?php
include 'core.inc.php';

  if (isset($_GET['keyword'])) {
        	 $keyword= $_GET['keyword'];

   	    }
  
   	    require 'server.php';
       if(!empty($keyword)){
   	    $query= "SELECT id,username,fullname,gender FROM users WHERE username LIKE ? ";
  	  	  $params = array("$keyword%");
           $stmt = $db->prepare($query);
           $stmt->execute($params);
           
          $row_count = $stmt->rowCount();
          if(!empty($row_count)){
           $count=1;
           ?><table class='table table-hover' style='font-family: "Comfortaa", cursive;'><?php
                     while($book = $stmt->fetch(PDO::FETCH_ASSOC)){
             $myname=getuserfield('username',$db);
  if($myname==$book['username']){
       
  }
  else{
    $userid= $book['username'];

echo "<tr><td><strong>".$book['username']."</strong><br><h6>".$book['fullname']."</h6></td><td><form>
     <input type='hidden' id='".$userid."'  name='user2' value='".$book['id']."'>
     <input type='submit' id='submitbutton' value='Chat' class='log ui button green inverted sbmt' style='float: right' onclick='return chk(".$userid.");' />
</form></td>"."</tr>";
?>



<?php  
   
  
}


}?></table><?php


  
                 }
                 else{
                  echo "no results found!";
                 }
        }
?>