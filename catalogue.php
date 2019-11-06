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

    $sql = "SELECT * FROM movies ORDER BY cat_id ASC";
    $queryPagi = connectTo($sql);
    $sql = 'SELECT * FROM  movies ORDER BY cat_id ASC LIMIT 4';
    $query = connectTo($sql);
    ?>
    <div class="listOfProd">
        <?php
        while ($row = mysqli_fetch_assoc($query)) {
            echo $row['name'] . '<br>';
        } ?>
    </div>


    <div>
        <?php
        for ($i = 1; $i <= ceil($queryPagi->num_rows / 4); $i++) {
            if ($i == 1) {
                echo '<a class="pagination" id="P' . $i . '" href="#">' . $i . '</a>';
            } else {
                echo '<a class="pagination" id="P' . $i . '" href="#">' . $i . '</a>';
            }
        }
        ?>

    </div>












    <?php bodyLink(); ?>
    <script>
        allPagination = document.querySelectorAll('.pagination');
        for (const pagination of allPagination) {
            pagination.addEventListener('click', function(e) {
                e.preventDefault();
                let pagination1 = pagination.id;
                let xhttp = new XMLHttpRequest();
                xhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.querySelector('.listOfProd').innerHTML = this.responseText;
                        for (let i = 0; i < allClickMe.length; i++) {

                            allClickMe[i].addEventListener('click', function() {
                                sendTo(i, allClickMe[i].id);

                            })
                        }
                    }
                };
                xhttp.open("POST", "pagination.php", true);
                xhttp.setRequestHeader(
                    "Content-type",
                    "application/x-www-form-urlencoded"
                );

                xhttp.send(
                    `pagination=${pagination1}`
                );
            })
        }
    </script>
</body>

</html>