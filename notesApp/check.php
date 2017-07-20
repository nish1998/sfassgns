<?php


if(isset($_POST["email"]) && !empty($_POST["email"])){
$email = ($_POST["email"]);
if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo $emailErr = "Invalid email format"; 
}
}
?>


<form method="POST" action="check.php">
	<input type="text" name="email">
</form>