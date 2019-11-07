<?php
session_start();
require_once './connect-to.php';
$movie_id = +($_POST['movie_id']);
var_dump($movie_id);


$time = date("Y/m/d",time());

var_dump($_SESSION);

$userId = $_SESSION['loggedUser'];

$sql = "SELECT user_id FROM users";
$query = connectTo($sql);
$array = [];
while($row = mysqli_fetch_assoc($query)){
    var_dump($row['user_id']);
    array_push($array,$row['user_id']);
}

for ($i=0; $i < count($array); $i++) { 
    if($array[$i] == $userId){
        $sql = 'INSERT INTO playlist (playlist_name, playlist_creation_time, user_id)  VALUES ("defaultPlayList","'.$time.'","' . $userId . '")';
    }
}

var_dump($sql);

// Can not continue as the sessions were not properli initialized at login

