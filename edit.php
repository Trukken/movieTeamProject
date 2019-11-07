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

    <form action="#" method="POST">
        <?php

        require_once './connect-to.php';

        $id = +filter_var($_GET['details'], FILTER_SANITIZE_NUMBER_INT);

        $sql = "SELECT * FROM movies WHERE movie_id=$id";

        $query = connectTo($sql);
        $row = mysqli_fetch_assoc($query);
        ?>
        <input type="text" name="name" placeholder="Movie name" value="<?php echo $row['name']; ?>">
        <input type="text" name="release" placeholder="Movie name" value="<?php echo $row['release_year']; ?>">
        <input type="submit" name="submit" value="Submit">
    </form>

    <?php
    if (isset($_POST['submit']) && !empty($_POST['release']) && !empty($_POST['name'])) {
        $name = $_POST['name'];
        $release = $_POST['release'];

        $sql = "UPDATE movies SET name='$name', release_year='$release' WHERE movie_id=$id";
        var_dump($sql);
        connectTo($sql);
        header("Refresh:0");
    }
    ?>

    <?php bodyLink(); ?>
</body>

</html>