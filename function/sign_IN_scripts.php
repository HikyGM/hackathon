<?php
include('connect_bd.php');
if (isset($_POST['btn_login'])) {

    // Вытаскиваем из БД запись, у которой логин ровняется введенному
    $sql = "SELECT u.users_id, u.roles_id, r.buildings_id, u.users_password FROM users u, registration r WHERE r.users_id = u.users_id and u.users_login='" . mysqli_real_escape_string($link, $_POST['login']) . "' LIMIT 1";
    $query = mysqli_query($link, $sql);

    $data = mysqli_fetch_assoc($query);
    // Сравниваем пароли

  //  if ($data['password'] === md5(md5($_POST['password']))) {
	if ($data['users_password'] === $_POST['password']) {
        if (isset($_POST['not_attach_ip'])) {
            // Если пользователя выбрал привязку к IP
            // Переводим IP в строку
           // $insip = "user_ip=INET_ATON('" . $_SERVER['REMOTE_ADDR'] . "')";

        }
        // Записываем в БД новый IP
        //mysqli_query($link, "UPDATE users SET " . $insip . " WHERE ID_user='" . $data['ID_user'] . "'");
        //Присваиваем сессии ID пользователя
        $_SESSION['ID'] = $data['users_id'];
        $_SESSION['ID_house'] = $data['buildings_id'];
		$_SESSION['roles_id'] = $data['roles_id'];

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