<<<<<<< Updated upstream
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
    <div class="log">
        <h2>Login page</h2>
    </div>
    <form class="nice" action="" method="POST">
        Insert your e-mail please: <br>
        <input type="email" name="email" placeholder="Your email"><br><br>
        Insert your password please: <br>
        <input type="password" name="password" placeholder="Your password"><br><br>
        <input type="submit" name="login" value="Login">
        <!--<a href="<?php //echo 'registration.php'; 
                        ?>">Register</a>-->
        <a href="<?php echo 'forgotpassword.php'; ?>">Forgotten password</a>
    </form>

    <?php
    require_once './connect-to.php';

    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        if (strpos($_POST['email'], '@') and $_POST['password']) {
            echo 'user recognised';
            $query = 'SELECT *
=======
<form action="" method="POST">
    <input type="email" name="email" placeholder="Your email">
    <input type="password" name="password" placeholder="Your password">
    <input type="submit" name="login" value="Login">
    <a href="<?php echo 'registration.php'; ?>">Register</a>
    <a href="<?php echo 'forgotpassword.php'; ?>">Forgotten password</a>
</form>

<?php
require_once './connect-to.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
	$password = $_POST['password'];
	$sanitizeMail = filter_var($mail, FILTER_SANITIZE_EMAIL);
    $sanitizeMail = filter_var($mail, FILTER_VALIDATE_EMAIL);
    if (strpos($_POST['email'], '@') and $_POST['password']) {
        echo 'user recognised';
        $query = 'SELECT *
>>>>>>> Stashed changes
                FROM users
                WHERE (user_email = "' . $_POST['email'] . '") and
                (user_password = "' . $_POST['password'] . '")';
            connectTo($query);
        } else
            echo 'user not registered';
    }
    ?>

    <?php bodyLink(); ?>
</body>

</html>