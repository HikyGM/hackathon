<?php
include_once('connect_bd.php');
$client_id = '512000589639'; // Application ID
$public_key = 'CIEQPNJGDIHBABABA'; // Публичный ключ приложения
$client_secret = '13271509620C3FCFDE4E0D41'; // Секретный ключ приложения
$redirect_uri = 'https://lavkabonapart.ru/disc/function/OK_json.php'; // Ссылка на приложение

$url = 'https://connect.ok.ru/oauth/authorize';
$params = array(
    'client_id' => $client_id,
    'response_type' => 'code',
    'redirect_uri' => $redirect_uri
);

if (isset($_GET['code'])) {
    $result = false;

    $params = array(
        'code' => $_GET['code'],
        'client_id' => $client_id,
        'client_secret' => $client_secret,
        'redirect_uri' => $redirect_uri,
        'grant_type' => 'authorization_code'

    );

    $url = 'https://api.ok.ru/oauth/token.do';

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, $url);
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, urldecode(http_build_query($params)));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    $result = curl_exec($curl);
    curl_close($curl);

    $tokenInfo = json_decode($result, true);


    if (isset($tokenInfo['access_token']) && isset($public_key)) {
        $sign = md5("application_key={$public_key}format=jsonmethod=users.getCurrentUser" . md5("{$tokenInfo['access_token']}{$client_secret}"));

        $params = array(
            'method' => 'users.getCurrentUser',
            'access_token' => $tokenInfo['access_token'],
            'application_key' => $public_key,
            'format' => 'json',
            'sig' => $sign
        );

        $userInfo = json_decode(file_get_contents('http://api.odnoklassniki.ru/fb.do' . '?' . urldecode(http_build_query($params))), true);

        if (isset($userInfo['uid'])) {
            $result = true;
            $sql = "SELECT ID_user, ID_house FROM users WHERE ID_ok='" . $userInfo['uid'] . "' LIMIT 1";
            $query = mysqli_query($link, $sql);
            $data = mysqli_fetch_assoc($query);
            $_SESSION['ID'] = $userInfo['uid'];
            $_SESSION['ID_house'] = $data['ID_house'];
            header("Location: ../index.php");
        }


    }
}