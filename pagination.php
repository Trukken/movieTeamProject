<?php


require_once './connect-to.php';
if (!empty($_POST['pagination'])) {
    $res = preg_replace("/[^0-9]/", "", $_POST['pagination']);
} else {
    $res = 0;
}

if (!empty($_POST['reverse'])) {
    $reverse = filter_var($_POST['reverse'], FILTER_SANITIZE_STRING);
    if ($reverse == 'true') {
        $reverse = true;
    } else if ($reverse == 'false') {
        $reverse = false;
    }
}
if (empty($_POST['reverse']) && !empty($reverse)) {
    $reverse = $reverse;
} else if (empty($_POST['reverse']) && empty($reverse)) {
    $reverse = false;
}





$limit = 4;
$pages = +$res;
if ($pages == 0) {
    $sql = 'SELECT * FROM movies m JOIN category c ON c.cat_id=m.cat_id ORDER BY c.cat_name';
    if ($reverse) {
        $sql .= ' ASC LIMIT ' . $limit;
    } else {
        $sql .= ' DESC LIMIT ' . $limit;
    }
} else {
    $limit = 4 * $pages;
    $sql = 'SELECT * FROM movies m JOIN category c ON c.cat_id=m.cat_id ORDER BY c.cat_name';
    if ($reverse) {
        $sql .= ' ASC LIMIT ' . $limit . ',4';
    } else {
        $sql .= ' DESC LIMIT ' . $limit . ',4';
    }
}
$query = connectTo($sql);
while ($row = mysqli_fetch_assoc($query)) {
    echo '<li>' . $row['name'] . ' ' . $row['cat_name'] . '<img src="' . $row['post_path'] . '"/>' . $row['release_year'] . $row['short_synopsis'] .  " " . '</li><br>';
}