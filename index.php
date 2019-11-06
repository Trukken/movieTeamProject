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

    <?php navBar(); ?> <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Adipisci distinctio esse maxime a repudiandae? Provident eius laborum magnam quam maxime, quis perspiciatis adipisci error ex minima quod id eaque ut!!</h1>


    <form autocomplete="off" action="" method="POST">
        <div class="autocomplete" style="width:300px;">
            <input type="text" name="search" placeholder="Search for a movie" id="search">
        </div>
    </form>
    <div id="results"></div>

    <hr>
    <div>
        <ul>
            <?php
            require_once './connect-to.php';
            //SELECT COUNT(m.movie_id) AS count, c.cat_name FROM category c JOIN movies m ON m.cat_id=c.cat_id GROUP BY c.cat_id ORDER BY RAND() LIMIT 3
            $sql = "SELECT COUNT(m.movie_id) AS count, c.cat_name FROM category c JOIN movies m ON m.cat_id=c.cat_id GROUP BY c.cat_id ORDER BY RAND() LIMIT 3";
            //var_dump($sql);
            $query = connectTo($sql);
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<li>' . $row['cat_name'] . $row['count'] . '</li>';
            }
            ?>
        </ul>
    </div>
    <hr>
    <div>
        <ul>
            <?php
            $sql = "SELECT * FROM movies ORDER BY release_year DESC LIMIT 4";
            $query = connectTo($sql);
            while ($row = mysqli_fetch_assoc($query)) {
                echo '<li>' . $row['name'] . ' ' . $row['release_year'] . '</li>';
            }

            ?>
        </ul>
    </div>




    <?php bodyLink(); ?>
    <script>
        let movies = [];
        document.querySelector("#search").addEventListener('keyup', function(e) {
            search = document.querySelector("#search").value;
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    if (search != '') {
                        document.querySelector('#results').innerHTML = this.responseText;
                        document.querySelector('#results').style.display = "block";
                    } else {
                        document.querySelector('#results').style.display = "none";
                    }
                }
            };
            xhttp.open("POST", "search.php", true);
            xhttp.setRequestHeader(
                "Content-type",
                "application/x-www-form-urlencoded"
            );

            xhttp.send(
                `search=${search}`
            );
        })

        function selectMovie(val) {
            document.querySelector("#search").value = val;
            document.querySelector('#results').style.display = "none";
        }


        //This part is from https://www.w3schools.com/howto/howto_js_autocomplete.asp
    </script>
</body>

</html>