<?php
  $errormsg = 'error while connecting';

  $mysql_host = 'localhost';
  $mysql_name = 'root';
  $mysql_pass = '';

 $db = new PDO('mysql:host=localhost;dbname=chatapp;charset=utf8', 'root', '') or die($errormsg);

 




?>
