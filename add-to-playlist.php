<?php
session_start();
require_once './connect-to.php';
$movie_id = +($_POST['movie_id']);
var_dump($movie_id);


$time = date("Y/m/d", time());

var_dump($_SESSION);
if (isset($_SESSION['loggedUser'])) {
    $userId = $_SESSION['loggedUser'];

    $sql = "SELECT user_id FROM users";
    $query = connectTo($sql);
    $array = [];
    while ($row = mysqli_fetch_assoc($query)) {
        var_dump($row['user_id']);
        array_push($array, $row['user_id']);
    }

    for ($i = 0; $i < count($array); $i++) {
        if ($array[$i] == $userId) {
            $sqlInsert = 'INSERT INTO playlist (playlist_name, playlist_creation_time, user_id)  VALUES ("defaultPlayList","' . $time . '","' . $userId . '")';
        }
    }

    //  JOIN playlist_movies pm ON p.playlist_id=pm.playlist_id JOIN movies m ON pm.movie_id=m.movie_id
    $sql = "SELECT * FROM playlist p WHERE user_id=$userId";
    var_dump($sql);
    $query = connectTo($sql);
    $row = mysqli_fetch_assoc($query);
    $playlistId = $row['playlist_id'];
    var_dump($query);
    if ($query->num_rows > 0) {
        $sqlInsert = "INSERT INTO playlist_movies VALUES ($playlistId, $movie_id)";
        var_dump($sqlInsert);
        connectTo($sqlInsert);
    } else {
        connectTo($sqlInsert);
    }
}


// Can not continue as the sessions were not properli initialized at login
