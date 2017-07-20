

<?php 

require 'core.inc.php';
require 'server.php';
if (isset($_GET['notes'])&& !empty($_GET['notes'])) {
  	$notes=$_GET['notes'];
  	$name=getuserfield('username', $db);
  	$stmt= $db->prepare("INSERT into $name (notes) VALUES(:note)");
                    $stmt->bindValue(':note', $notes);
                    $stmt->execute();

              }

$name=getnotes($db);
echo $name; 
            
?>
