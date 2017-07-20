

<?php
require 'core.inc.php';
require 'server.php';
$id= $_GET['id'];

done($id,$db);

echo getnotes($db);



?>