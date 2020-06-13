<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ie=edge" http-equiv="X-UA-Compatible">
    <title>
        Управление МКД
    </title>
    <!-- favicon CSS -->
    <link href="favicon.png" rel="icon" sizes="32x32" type="image/png">
    <!-- fonts -->
    <!--<link href="fonts/sfuidisplay.css" rel="stylesheet">-->
    <!-- Icon fonts -->
    <link href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" rel="stylesheet">
    <!-- Plugins CSS -->
    <!--<link href="css/plugins.min.css" rel="stylesheet">-->
    <!-- Style CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
          integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="css/app.css" rel="stylesheet">
    <!-- Your CSS -->
    <link href="css/custom.css" rel="stylesheet">
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="theme-fern" data-animation="false" data-appearance="light" data-spy="scroll" data-target="#navbar-nav">
<main class="main">
    <!-- =========== Start of Navigation (main menu) ============ -->
    <header class="navbar navbar-sticky navbar-expand-lg navbar-light">
        <div class="container position-relative">
            <a class="navbar-brand" href="index.php">
                <img alt="brand-logo" class="navbar-brand__regular" src="img/brand-logo-black.png">
                <img alt="sticky brand-logo" class="navbar-brand__sticky" src="img/brand-logo-black.png">
            </a>
            <!--  End of brand logo -->
            <button aria-label="Toggle navigation" class="navbar-toggler d-lg-none" data-toggle="navbarToggler"
                    type="button">
                        <span class="navbar-toggler-icon">
                        </span>
            </button>
            <!-- end of Nav toggler -->
            <div class="navbar-inner">
                <!--  Nav close button inside off-canvas/ mobile menu -->
                <button aria-label="Toggle navigation" class="navbar-toggler d-lg-none" data-toggle="navbarToggler"
                        type="button">
                            <span class="navbar-toggler-icon">
                            </span>
                </button>
                <!-- end of Nav Toggoler -->
                <?php include("blocks/menu" . $_SESSION["roles_id"] . ".php"); ?>
            </div>
            <?php
            $sql = "SELECT users_fio FROM users where users_id = '" . $_SESSION["ID"] . "'";
            $apps = mysqli_query($link, $sql);
            $app = mysqli_fetch_array($apps, MYSQLI_ASSOC);
            ?>
            <div class="d-flex align-items-center ml-lg-1 ml-xl-2 mr-4 mr-sm-6 m-lg-0">
                <ul class="nav navbar-nav">
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" style="color: #52B570; text-decoration: none; display: inline-block; font-weight: 600;"><?= $app["users_fio"] ?><b class="caret"></b></a>
                        <ul class="dropdown-menu text-center li_drop py-0">
                            <li class="p-2"><a href="#">Профиль</a></li>
                            <li class="p-2"><a href="#">Уведомления</a></li>
                            <li class="p-2"><a href="#">Настройки</a></li>
                            <hr class="w-90 my-0">
                            <li class="p-2"><a href="function/logout.php">Выход</a></li>
                        </ul>
                    </li>
                </ul>







            </div>
        </div>
        <!-- end of container -->
    </header>
