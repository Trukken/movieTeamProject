

<form action="" method="POST">
	<input type="email" name="email" placeholder="Your email">
	<input type="password" name="password" placeholder="Your password">
    <input type="submit" name="submit" value="Login">
    <a href="<?php echo 'registration.php';?>">Register</a>
    <a href="<?php echo 'forgotpassword.php';?>">Forgotten password</a>
</form>

<?php
    require_once 'db.php';
    $query = 'SELECT *
            FROM users
            WHERE (user_email = ' . $_POST['email'].') and
             (user_password = '. $_POST['password'].')';
    var_dump($query);
	if(isset($_POST['submit'])) {
		if(strpos($_POST['email'], '@') and $_POST['checkPassword'])
			echo 'user recognised';
		else
			echo 'user not registered';
    }
    
/*


	// Basics validations
	if (empty($_POST['title'])) {
		$errors[] = 'Title is mandatory';
	}

	if (empty($_POST['year'])) {
		$errors[] = 'Year of release is mandatory';
	}

	if (count($errors) === 0) {

		// If no errors, insert into DB
		require_once 'database.php';
		// Open a connection to the DBMS
		$connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_NAME);

		$query = "INSERT INTO movies(title, release_year, director_id) 
		VALUES('" . $_POST['title'] . "', '" . $_POST['year'] . "')";

		// Send an SQL request to our DB
		$result_query = mysqli_query($connect, $query);

		if ($result_query) {
			echo 'Movie successfully addded !';
		} else {
			echo 'Error inserting into the DB';
		}
	} else {
		echo implode('<br>', $errors);
	}
}
*/



?>