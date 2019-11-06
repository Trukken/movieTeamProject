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
                    `pagination=${pagination1}`
                );
                clearedPage = pageOn.replace(/[^0-9]/, '');
                console.log(clearedPage);

                checkPage();
            })
        }
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



        function checkPage() {
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