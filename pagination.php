<?php


require_once './connect-to.php';
$res = preg_replace("/[^0-9]/", "", $_POST['pagination']);


$limit = 4;
$pages = +$res;
if ($pages == 1) {
    $sql = 'SELECT * FROM movies ORDER BY cat_id ASC LIMIT ' . $limit;
} else {
    $limit = 4 * $pages;
    $sql = 'SELECT * FROM movies ORDER BY cat_id ASC LIMIT ' . $limit . ',4';
}
var_dump($sql);
$query = connectTo($sql);
while ($row = mysqli_fetch_assoc($query)) {
    echo '<li>' . $row['name'] . " Price: " . $row['release_year'] . " " . '</li><br>';
}
