<!DOCTYPE doctype html>
<html lang="ru">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Bootstrap CSS -->
    <link crossorigin="anonymous" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" rel="stylesheet">
    <link href="style.css" rel="stylesheet" type="text/css">

    <title>
        Активный гражданин Оренбургской области!
    </title>
</head>
<body>
<!-- NavBar -->
<nav class="navbar navbar-expand-lg navbar-light bg-navbar">
    <button aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation"
            class="navbar-toggler" data-target="#navbarTogglerDemo03" data-toggle="collapse" type="button">
                <span class="navbar-toggler-icon">
                </span>
    </button>
    <a class="navbar-brand" href="#">
        <img src="img/favicon.ico" alt="" class="img-fluid">
    </a>
    <div class="collapse navbar-collapse" id="navbarTogglerDemo03">
        <ul class="navbar-nav m-auto mt-2 mt-lg-0">

            <?php
            for ($i = 0; $i < mysqli_num_rows($id_page); $i++) {
                $menu_link = mysqli_fetch_array($id_page, MYSQLI_ASSOC);
                echo '<li class="nav-item active">';
                echo ' <a class="nav-link" href="?page=';
                echo $menu_link['path_page'];
                echo '">';
                echo $menu_link["name_page"];
                echo '</a>';
                echo '</li>';
            }
            ?>







        </ul>
        <button class="btn bg-button mr-1" type="button">
            <img src="img/bell-2-240.png" alt="" class="bell">
            <span class="badge badge-danger">
                        4
                    </span>
        </button>
        <a href="function/logout.php" class="btn bg-button my-2 my-sm-0">
            Выход
        </a>
    </div>
</nav>