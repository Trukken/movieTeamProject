<?php require_once './looks.php';
headerLink(); ?>
<?php navBar(); ?>
<?php
require_once './connect-to.php';

if (isset($_GET['details']))
    //echo $_GET['details'];
    $movie = $_GET['details'];
$sql = 'SELECT * FROM movies m
           JOIN movie_actors ma ON m.movie_id= ma.movie_id
           JOIN actors a ON a.actor_id= ma.actor_id
           WHERE m.movie_id=' . $movie;
var_dump($sql);
$query = connectTo($sql);

$db_record = mysqli_fetch_assoc($query);
echo '<hr>';
echo $db_record['name'] . '<br>';
?>
<image src="<?php echo $db_record['post_path']; ?>" alt=""><br>
    <?php
    echo $db_record['long_synopsis'] . '<br>';
    echo $db_record['actor_name'] . '<br>';
    while ($db_record = mysqli_fetch_assoc($query)) {
        echo $db_record['actor_name'] . '<br>';
    }
    ?>

    <?php bodyLink(); ?>