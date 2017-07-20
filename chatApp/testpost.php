<script src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.10/semantic.min.js"></script>
<script type="text/javascript">clearInterval(inter);</script>

<?php
  include 'core.inc.php';
  require 'server.php';
  $user2name= getuserfieldbyid('fullname',$db,$_POST['user2']);

  ?>
    <div class="ui teal ribbon label"><?php echo '<h4>'.@$user2name.'</h4>';  ?></div><a  onclick="updateScroll();" style="position:relative; float:right;" id="downbtn" title="bottom"><i class="icon arrow circle down big"></i></a>
<div class="scrollbar" id="style-11"><div class="ten wide column ui segment" id="msgarea"></div>
	
</div>
<form>
  
<div class="ui form">

      <div class="field">
        <div class="ui action input big">
          <textarea type="text" class="form-control" id="usr" name="msg" maxlength='500' placeholder="message. . . " rows="1"></textarea>
          <script type="text/javascript">msgadd(<?php echo $_SESSION['userid']; ?>, <?php echo $_POST['user2'];  ?> ); setTimeout(function(){ updateScroll(); }, 500);</script>
          <button type="button" class="ui blue submit button inverted" onclick="msgadd(<?php echo $_SESSION['userid']; ?>, <?php echo $_POST['user2'];  ?> ); setTimeout(function(){ updateScroll(); }, 500); 
          "><i class="send icon"></i></button></div>
      </div>
      <script type="text/javascript">setTimeout(function(){ updateScroll();}, 1000);</script>

  <?php
?>