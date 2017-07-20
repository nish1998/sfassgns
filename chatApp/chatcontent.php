<?php
  include 'core.inc.php';
  include 'style.php';

  if (isset($_GET['user2'])&& isset($_GET['user1'])) {
        	 $user1= $_GET['user1'];
           $user2= $_GET['user2'];
           $name=getuserfieldbyid('username',$db, $user2);
   	       $username= getuserfield('username',$db);
  
   	    require 'server.php';
       if(!empty($user2)){
   	    $query= "SELECT user1id,user2id,msg,`timestamp` FROM msgs WHERE (user1id=$user1 and user2id=$user2) or (user1id=$user2 and user2id=$user1)";
  	  	  
           $stmt = $db->prepare($query);
           $stmt->execute();
           
          
           while ($row= $stmt->fetch(PDO::FETCH_ASSOC)) {

            $timestamp = strtotime($row['timestamp']);
                $date = date('d-m-Y', $timestamp);
                $time = date('H:i', $timestamp);

               	if($row['user1id']==$user1){
                     $msg=  htmlentities($row['msg']);
                     
                      echo '<div class="row msg_container base_sent">
                        <div class="col-md-9 col-xs-9">
                            <div class="messages msg_sent"><h4 style="font-family: \'Arimo\', sans-serif; color:#444444 ">'.$msg.' <br><p style="float:right; font-size:12px; color:#666666">'.$time.'</p></h4></div></div></div>';
                      echo "";
                    }else{
                     $msg=  htmlentities($row['msg']);
                     
                      echo '<div class="row msg_container base_receive"><div class="col-md-9 col-xs-9">
                            <div class="messages2 msg_receive"><h4 style="font-family: \'Arimo\', sans-serif; color:#444444 ">'.$name.': '.$msg.'<br><p style="float:right; font-size:12px; color:#666666">'.$time.'</p><br></h4></div></div></div>';

                    }
                 }



        }

      }
?>