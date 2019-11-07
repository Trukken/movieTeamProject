<<<<<<< Updated upstream
<?php

if (isset($_POST['submitButton'])) {
	var_dump($_POST);
	if (empty($_POST['firstName']) or empty($_POST['lastName']) or
	 (!(strpos($_POST['email'], '@') or (!strlen($_POST['password']) > 8) or
	  (!($_POST['password'] == $_POST['checkPassword'])))))
		echo 'All data should be filled properly';
	else {
		echo "Your name : " . $_POST['firstName'] . ' ' . $_POST['lastName'] . '<br>';
		echo "Your email : " . $_POST['email'] . '<br>';
	}
}
?>
<form action="" method="post">
	<input type="text" name="firstName" placeholder="First name"><br>
	<input type="text" name="lastName" placeholder="Last name"><br>
	<input type="text" name="email" placeholder="Email Adress"><br>
	<input type="password" name="password" placeholder="Password"><br>
	<input type="password" name="checkPassword" placeholder="Check password"><br>
	<input type="submit" name="submitButton" value="Submit">
</form>
=======
<form action="" method="POST">
	<input type="text" name="name" placeholder="Your Name"><br>
	<input type="text" name="email" placeholder="Email Adress"><br>
	<input type="password" name="password" placeholder="Password"><br>
	<input type="password" name="checkPassword" placeholder="Check password"><br>
	<input type="submit" name="submitButton" value="Register">
	<a href="<?php echo 'login.php'; ?>">Login</a>
</form>
<?php
require_once './connect-to.php';

$name= '';
$password= '';
$email= '';

if (isset($_POST['submitButton'])) {
	if ((empty($_POST['name']) or (!strpos($_POST['email'], '@')) or
	 (strlen($_POST['password']) < 8) or ($_POST['password']) != ($_POST['checkPassword'])))

		echo 'All data should be filled properly';
	else {
		echo "Your name : " . $_POST['name']  . '<br>';
		echo "Your email : " . $_POST['email'] . '<br>';
		
			$name = $_POST['name'];
			$password = $_POST['password'];
			$email = $_POST['email'];

		  $query = "INSERT INTO users(user_name, user_password,	user_email)
		  VALUES('$name', '$password','$email')";

		  connectTo($query);
	}
}
?>
>>>>>>> Stashed changes
