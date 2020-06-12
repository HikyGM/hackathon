<?php
include_once ('connect_bd.php');
if ( isset( $_GET['code'] ) ) {
    $clientId     = '7507638'; // ID приложения
    $clientSecret = '5eQWWHWzc8rb8Xfe8jj4'; // Защищённый ключ
    $redirectUri  = 'https://lavkabonapart.ru/disc/function/VK_json.php'; // Адрес, на который будет переадресован пользователь после прохождения авторизации

    $params = array(
        'client_id'     => $clientId,
        'client_secret' => $clientSecret,
        'code'          => $_GET['code'],
        'redirect_uri'  => $redirectUri
    );
    if (!$content = @file_get_contents('https://oauth.vk.com/access_token?' . http_build_query($params))) {
        $error = error_get_last();
    }

    $response = json_decode($content);

    // Если при получении токена произошла ошибка
    if (isset($response->error)) {
        throw new Exception('При получении токена произошла ошибка. Error: ' . $response->error . '. Error description: ' . $response->error_description);
    }

    $token = $response->access_token; // Токен
    $expiresIn = $response->expires_in; // Время жизни токена
    $userId = $response->user_id; // ID авторизовавшегося пользователя

    $sql = "SELECT ID_user, ID_house FROM users WHERE ID_vk='" . $userId . "' LIMIT 1";
    $query = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($query);

    // Сохраняем токен в сессии
   // $_SESSION['ID'] = $userId;
    $_SESSION['token'] = $token;
    $_SESSION['ID'] = $data['ID_user'];
    $_SESSION['ID_house'] = $data['ID_house'];
    header("Location: ../index.php");


} elseif ( isset( $_GET['error'] ) ) { // Если при авторизации произошла ошибка

    throw new Exception( 'При авторизации произошла ошибка. Error: ' . $_GET['error']
        . '. Error reason: ' . $_GET['error_reason']
        . '. Error description: ' . $_GET['error_description'] );
}

