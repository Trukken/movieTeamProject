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
    if (strpos($_POST['email'], '@') and $_POST['password']) {
        echo 'user recognised';
        $query = 'SELECT *
                FROM users
                WHERE (user_email = "' . $_POST['email'] . '") and
                (user_password = "' . $_POST['password'] . '")';
        connectTo($query);
        var_dump($query);
    } else
        echo 'user not registered';
}
?>