<?php

require_once './connect-to.php';


$search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM movies WHERE name LIKE '%$search%'";
$query = connectTo($sql);
$array = [];
echo '<ul id="movies-list">';
while ($res = mysqli_fetch_assoc($query)) {
    echo '<li onClick="selectMovie(\'' . $res['name'] . '\')">' . $res['name'] . '</li>';
}
echo '</ul>';
