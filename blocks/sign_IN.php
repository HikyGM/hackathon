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
<!doctype html>
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
            <?php echo '<a href="http://oauth.vk.com/authorize?' . http_build_query( $params ) . '"><img src="img/vk-3-240.png" alt=""></a>'; ?>
            <?php echo '<a href="' . $url . '?' . urldecode(http_build_query($params2)) . '"><img src="img/odnoklassniki.png" alt=""></a>'; ?>
            <a href="#"><img src="img/facebook-3-240.png" alt=""></a>
            <a href="#"><img src="img/google-plus-3-240.png" alt=""></a>
        </div>
    </div>

</div>


</body>
</html>