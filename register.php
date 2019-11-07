<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<?php require_once './looks.php';
	headerLink(); ?>
	<title>Document</title>
</head>

<body>

	<?php navBar(); ?>

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

	$name = '';
	$password = '';
	$email = '';

	if (isset($_POST['submitButton'])) {
		if ((empty($_POST['name']) or (!strpos($_POST['email'], '@')) or (strlen($_POST['password']) < 8) or ($_POST['password']) != ($_POST['checkPassword'])))

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

	<?php bodyLink(); ?>
</body>

</html>