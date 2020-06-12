<?php
include('connect_bd.php');
// Страница разавторизации
//закрытие сессии при выходе из аккаунта
session_start();
session_unset();
session_destroy();
// Переадресовываем браузер на страницу проверки нашего скрипта
header("Location: ../index.php");
exit;
?>