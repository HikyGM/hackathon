<?php
// Авторизация ВК
 // Токен будем хранить в сессии
// Параметры приложения
$clientId     = '7507638'; // ID приложения
$clientSecret = '5eQWWHWzc8rb8Xfe8jj4'; // Защищённый ключ
$redirectUri  = 'https://lavkabonapart.ru/disc/function/VK_json.php'; // Адрес, на который будет переадресован пользователь после прохождения авторизации
// Формируем ссылку для авторизации
$params = array(
    'client_id'     => $clientId,
    'redirect_uri'  => $redirectUri,
    'response_type' => 'code',
    'v'             => '5.74', // (обязательный параметр) версия API, которую Вы используете https://vk.com/dev/versions
    // Права доступа приложения https://vk.com/dev/permissions
    // Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
    // Если не указать "offline", то полученный токен будет жить 12 часов.
    'scope'         => 'photos,offline',
);

// Авторизация ОК
$client_id = '512000589639'; // Application ID
$public_key = 'CIEQPNJGDIHBABABA'; // Публичный ключ приложения
$client_secret = '13271509620C3FCFDE4E0D41'; // Секретный ключ приложения
$redirect_uri = 'https://lavkabonapart.ru/disc/function/OK_json.php'; // Ссылка на приложение

$url = 'https://connect.ok.ru/oauth/authorize';
$params2 = array(
    'client_id'     => $client_id,
    'response_type' => 'code',
    'redirect_uri'  => $redirect_uri
);

?>
<?php
// Авторизация ВК
// Токен будем хранить в сессии
// Параметры приложения
$clientId     = '7507638'; // ID приложения
$clientSecret = '5eQWWHWzc8rb8Xfe8jj4'; // Защищённый ключ
$redirectUri  = 'https://lavkabonapart.ru/disc/function/VK_json.php'; // Адрес, на который будет переадресован пользователь после прохождения авторизации
// Формируем ссылку для авторизации
$params = array(
    'client_id'     => $clientId,
    'redirect_uri'  => $redirectUri,
    'response_type' => 'code',
    'v'             => '5.74', // (обязательный параметр) версия API, которую Вы используете https://vk.com/dev/versions
    // Права доступа приложения https://vk.com/dev/permissions
    // Если указать "offline", полученный access_token будет "вечным" (токен умрёт, если пользователь сменит свой пароль или удалит приложение).
    // Если не указать "offline", то полученный токен будет жить 12 часов.
    'scope'         => 'photos,offline',
);

// Авторизация ОК
$client_id = '512000589639'; // Application ID
$public_key = 'CIEQPNJGDIHBABABA'; // Публичный ключ приложения
$client_secret = '13271509620C3FCFDE4E0D41'; // Секретный ключ приложения
$redirect_uri = 'https://lavkabonapart.ru/disc/function/OK_json.php'; // Ссылка на приложение

$url = 'https://connect.ok.ru/oauth/authorize';
$params2 = array(
    'client_id'     => $client_id,
    'response_type' => 'code',
    'redirect_uri'  => $redirect_uri
);

?>
<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Активный Гражданин</title>
    <!-- favicon CSS -->
    <link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
    <!-- fonts -->
    <link href="fonts/sfuidisplay.css" rel="stylesheet">
    <!-- Icon fonts -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
    <!-- Plugins CSS -->
    <link rel="stylesheet" href="css/plugins.min.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/app.css">
    <!-- Your CSS -->
    <link rel="stylesheet" href="css/custom.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">

</head>

<body class="theme-royal-blue" data-spy="scroll" data-target="#navbar-nav" data-appearance="light" data-animation="false" data-appearance="light">

<!-- =========== Start of Loader ============ -->
<!--<div class="preloader">
    <div class="wrapper">
        <div class="blobs">
            <div class="blob-center"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
            <div class="blob"></div>
        </div>
        <div>
            <div class="loader-canvas canvas-left"></div>
            <div class="loader-canvas canvas-right"></div>
        </div>
    </div>
</div>-->
<!-- =========== End of Loader ============ -->

<main class="main hidden">


    <!-- =========== Start of Body ============ -->
    <section class="space bg-color--primary h-min-100vh d-flex align-items-center">
        <div class="svg-shape--top w-100 opacity--05">
            <img src="img/layout/wave-8.svg" alt="wave" class="svg fill--white">
        </div>
        <!-- end of whole area svg bg -->
        <div class="svg-shape--top opacity--10">
            <img src="img/layout/wave-9.svg" alt="wave" class="svg fill--white">
        </div>
        <!-- end of top right mini svg shape -->

        <div class="container">
            <div class="row ">
                <div class="col-12 mx-auto color--white text-center mb-4 mb-lg-5">
                    <h1 class="h2-font mb-1">Добро пожаловать</h1>
                    <p class="opacity--60 font-size--20">Введите свой логин и пароль</p>
                </div>
                <div class="col-12 col-sm-10 col-md-8 col-lg-7 col-xl-6 mx-auto">
                    <div class="form--v5 bg-color--primary-light--1 px-3 py-4 px-md-5 pt-md-6 rounded--10">





                        <form method="post" action="function/sign_IN_scripts.php" class="p-2">
                            <div class="form-group">
                                <label class="form__label text-uppercase font-size--15 font-w--500">Логин:</label>
                                <input name="login" type="text" id="inputText" class="form-control" placeholder="Email" required=""
                                       autofocus="">
                            </div>
                            <div class="form-group">
                                <div class="d-flex justify-content-between">
                                    <label for="password" class="form__label text-uppercase font-size--15 font-w--500">Пароль:</label>
                                    <small>
                                        <a href="recover-account.html" class="text-color--400">Забыли пароль?</a>
                                    </small>
                                </div>
                                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Пароль"
                                       required="">
                            </div>
                            <div class="d-flex align-items-center justify-content-between">
                                <div>
                                    <div class="custom-control custom-checkbox">
                                        <input type="checkbox" class="custom-control-input" id="exampleCheck1">
                                        <label class="custom-control-label text-color--400" for="customCheck1">Запомнить меня</label>
                                    </div>
                                </div>
                                <button name="btn_login" class="btn btn-bg--primary btn-size--md btn-hover--3d" type="submit"><span class="btn__text">Войти</span></button>
                            </div>
                        </form>
                        <div class="social_link text-center">
                            <?php echo '<a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '"><img src="img/vk-3-240.png" alt=""></a>'; ?>
                            <?php echo '<a href="' . $url . '?' . urldecode(http_build_query($params2)) . '"><img src="img/odnoklassniki.png" alt=""></a>'; ?>
                            <a href="#"><img src="img/facebook-3-240.png" alt=""></a>
                            <a href="#"><img src="img/google-plus-3-240.png" alt=""></a>
                        </div>

                    </div>
                    <!-- end of from area -->
                </div>
                <!-- end of col -->
            </div>
            <!-- end of row -->
        </div>
        <!-- end of container -->
    </section>
    <!-- =========== End of Body ============ -->
</main>

<script src="js/plugins.min.js"></script>
<script src="js/app.js"></script>


</body>

</html>








<!--<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css"
          integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<div class="row mx-0 justify-content-center">
    <div class="">
        <h2 class="text-center">Вход</h2>
        <form method="post" action="function/sign_IN_scripts.php" class="p-2">
            <div class="form-group">
                <label for="exampleInputEmail1">Логин</label>
                <input name="login" type="text" id="inputText" class="form-control" placeholder="Email" required=""
                       autofocus="">
                <small id="emailHelp" class="form-text text-muted">Мы никогда не передадим вашу электронную почту
                    кому-либо еще.</small>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Пароль</label>
                <input name="password" type="password" id="inputPassword" class="form-control" placeholder="Пароль"
                       required="">
            </div>
            <div class="form-group form-check">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" for="exampleCheck1">Запомнить меня</label>
            </div>
            <button type="submit" class="btn btn-primary" name="btn_login">Войти</button>
        </form>
        <h2 class="text-center">Войти через:</h2>
        <div class="social_link text-center">
            <?php /*echo '<a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '"><img src="img/vk-3-240.png" alt=""></a>'; */?>
            <?php /*echo '<a href="' . $url . '?' . urldecode(http_build_query($params2)) . '"><img src="img/odnoklassniki.png" alt=""></a>'; */?>
            <a href="#"><img src="img/facebook-3-240.png" alt=""></a>
            <a href="#"><img src="img/google-plus-3-240.png" alt=""></a>
        </div>
    </div>

</div>


</body>
</html>-->