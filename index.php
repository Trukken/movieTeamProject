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





    <?php bodyLink(); ?>
    <script>
        let movies = [];
        document.querySelector("#search").addEventListener('keyup', function(e) {
            search = document.querySelector("#search").value;
            let xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    document.querySelector('#results').innerHTML = this.responseText;
                    document.querySelector('#results').style.display = "block";
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