<?php

require_once './connect-to.php';

$search = filter_var($_POST['search'], FILTER_SANITIZE_STRING);

$sql = "SELECT * FROM movies WHERE name LIKE '$search%'";
$query = connectTo($sql);
$row = mysqli_fetch_assoc($query);

echo $row['name'];
