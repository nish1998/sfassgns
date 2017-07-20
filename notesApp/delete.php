

<?php
require 'core.inc.php';
require 'server.php';
$id= $_GET['id'];

delete($id,$db);

echo getnotes($db);



?>