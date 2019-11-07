<?php

function connectTo($sql)
{
    require_once './db.php';
    $connect = mysqli_connect(DB_SERVER, DB_USER, DB_PASSWORD, DB_TABLE);

    if (!$connect) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $query = mysqli_query($connect, $sql);
    mysqli_close($connect);

    return $query;
}
