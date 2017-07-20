
<?php
  include 'core.inc.php';
  include 'server.php';
  include 'style.php';
  
  ?><script type="text/javascript">updateScroll();</script><?php 
  if (isset($_GET['user2'])&& isset($_GET['user1'])&& isset($_GET['msg']) ) {
        	 $user1= $_GET['user1'];
           $user2= $_GET['user2'];
           $name=getuserfieldbyid('username',$db, $user2);
   	       $mess= $_GET['msg'];
   	       $username= getuserfield('username',$db);
           
       if(!empty($mess)){
   	    $query1= "INSERT into msgs (user1id,user2id,msg,`timestamp`) values(:user1, :user2, :msg, NOW())";
  	  	  

           $stmt1 = $db->prepare($query1);
           $stmt1->bindValue(':user1', $user1);
          $stmt1->bindValue(':user2', $user2);
          $stmt1->bindValue(':msg', $mess);

           $stmt1->execute();
           $query2= "SELECT user1id,user2id,msg,`timestamp` FROM msgs WHERE (user1id=$user1 and user2id=$user2) or (user1id=$user2 and user2id=$user1)";
           $stmt2 = $db->prepare($query2);
           $stmt2->execute();

           while ($row= $stmt2->fetch(PDO::FETCH_ASSOC)) {
           
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
                 ?>
                 <script>updateScroll();</script>
                 <?php
                 
        }else{
          
               

          ?>

                 <script>alert('Please Select the user you want to Chat!');
                 updateScroll();</script>
                 <?php
        }}
      
?>
<script>
setTimeout(function(){ updateScroll(); }, 3000);
</script>