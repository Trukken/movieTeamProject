<?php session_start(); ?>
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
    <?php navBar();

    require_once './connect-to.php';

    $sql = "SELECT * FROM movies m JOIN category c ON c.cat_id=m.cat_id ORDER BY c.cat_name ASC";
    $queryPagi = connectTo($sql);
    $sql = 'SELECT * FROM  movies m JOIN category c ON c.cat_id=m.cat_id ORDER BY c.cat_name ASC LIMIT 4';
    $query = connectTo($sql);
    ?>

    <button class="orderBy">Order By:Asc/Desc</button>
    <div class="listOfProd">
        <?php
        while ($row = mysqli_fetch_assoc($query)) {
            echo '<li>' . $row['name'] . ' ' . $row['movie_id'] . ' ' . $row['cat_name'] . '<img src="' . $row['post_path'] . '"/>' . $row['release_year'] . $row['short_synopsis'] .  ' <a href="details.php?details=' . $row['movie_id'] . '">Click here for more detail</a>' .  ' ||||  <a href="edit.php?details=' . $row['movie_id'] . '">Edit the movie</a>'  .  ' ||||  <button class="movie" id="M' . $row['movie_id'] . '">Add to favourites</button>' .  '</li><br>';
        } ?>
    </div>


    <div>
        <a href="#" class="paginationPrev" style="display:none;">Previous</a>
        <?php

        for ($i = 1; $i <= ceil($queryPagi->num_rows / 4); $i++) {
            if ($i == 1) {
                echo '<a class="pagination" id="P' . ($i - 1) . '" href="#">' . $i . '</a>';
            } else {
                echo '<a class="pagination" id="P' . ($i - 1) . '" href="#">' . $i . '</a>';
            }
        }



        ?>
        <a href="#" class="paginationNext" style="display:none;">Next</a>
    </div>












    <?php bodyLink(); ?>
    <script>
        let pageOn;
        let clearedPage;
        let reverse = true;
        allPagination = document.querySelectorAll('.pagination');

        for (const pagination of allPagination) {
            pagination.addEventListener('click', function(e) {
                pageOn = this.id;
                e.preventDefault();
                let pagination1 = pagination.id;
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.querySelector('.listOfProd').innerHTML = this.responseText;
                    }
                };
                xhttp.open("POST", "pagination.php", true);
                xhttp.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );

                xhttp.send(
                    `pagination=${pagination1}&reverse=${reverse}`
                );

                checkPage();
            })
        }




        document.querySelector('.orderBy').addEventListener('click', function(e) {
            e.preventDefault();
            reverse = !reverse;
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector('.listOfProd').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "pagination.php", true);
            xhttp.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded"
            );

            xhttp.send(
                `pagination=0&reverse=${reverse}`
            );
            checkPage();
        })

        document.querySelector('.paginationPrev').addEventListener("click", function(e) {
            e.preventDefault();
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector('.listOfProd').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "pagination.php", true);
            xhttp.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded"
            );
            xhttp.send(
                `pagination=${+clearedPage-1}`
            );
            clearedPage -= 1;
            console.log(clearedPage);
            checkPage();
        })
        document.querySelector('.paginationNext').addEventListener("click", function(e) {
            e.preventDefault();
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector('.listOfProd').innerHTML = this.responseText;
                }
            };
            xhttp.open("POST", "pagination.php", true);
            xhttp.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded"
            );
            xhttp.send(
                `pagination=${+clearedPage+1}`
            );
            clearedPage += 1;
            checkPage();
        })

        allMovies = document.querySelectorAll('.movie')
        for (const movie of allMovies) {
            movie.addEventListener('click', function(e) {
                movieId = movie.id.replace(/[^0-9]/, '');
                console.log(movieId);
                e.preventDefault();
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {}
                };
                xhttp.open("POST", "add-to-playlist.php", true);
                xhttp.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );
                xhttp.send(
                    `movie_id=${movieId}`
                );
            });
        }

        function checkPage() {

            clearedPage = pageOn.replace(/[^0-9]/, '');
            if (clearedPage > 0) {
                document.querySelector('.paginationPrev').style.display = 'block';
            } else {

                document.querySelector('.paginationPrev').style.display = 'none';
            }
            if (clearedPage < 2) {
                document.querySelector('.paginationNext').style.display = 'block';
            } else {

                document.querySelector('.paginationNext').style.display = 'none';
            }
        }
    </script>
</body>

</html>