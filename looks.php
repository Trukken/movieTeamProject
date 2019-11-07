<?php
function navBar()
{
    if (isset($_SESSION['loggedUser'])) {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-nav">
            <a class="nav-item nav-link" href="index.php">Home</a>
            <a class="nav-item nav-link" href="shop.php">Shop</a>
            <a class="nav-item nav-link" href="cart.php">Cart</a>
            <a class="nav-item nav-link" href="myaccount.php">My account</a>
            <a class="nav-item nav-link" href="logout.php">Log out</a>
        </div>
        </div>
    </nav>';
    } else {
        echo '<nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="index.php">Home</a>
            <a class="nav-item nav-link" href="register.php">Register</a>
            <a class="nav-item nav-link" href="login.php">Login</a>
            <a class="nav-item nav-link" href="catalogue.php">Catalogue</a>
        </div>
        </div>
    </nav>';
    }
}

function headerLink()
{
    echo '<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">';
    
}

function bodyLink()
{
    echo '<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>';
}
