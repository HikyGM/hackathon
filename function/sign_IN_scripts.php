<?php
include('connect_bd.php');
if (isset($_POST['btn_login'])) {

    // Вытаскиваем из БД запись, у которой логин ровняется введенному
    $sql = "SELECT ID_user, password, ID_house FROM users WHERE login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1";
    $query = mysqli_query($link, $sql);
    $data = mysqli_fetch_assoc($query);
    // Сравниваем пароли

    if ($data['password'] === md5(md5($_POST['password']))) {
        if (isset($_POST['not_attach_ip'])) {
            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
           // $insip = "user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";

        }
        // Записываем в БД новый IP
        //mysqli_query($link, "UPDATE users SET " . $insip . " WHERE ID_user='" . $data['ID_user'] . "'");
        //Присваиваем сессии ID пользователя
        $_SESSION['ID'] = $data['ID_user'];
        $_SESSION['ID_house'] = $data['ID_house'];

        // Переадресовываем браузер на страницу проверки нашего скрипта
       header("Location: ../index.php");
       exit();
      //  echo 'qwe';
    } else {
       header("Location: ../index.php");
       exit();
       // echo '123';
    }
}

?>