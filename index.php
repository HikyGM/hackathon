<?php
include_once('function/connect_bd.php');

$id_page = mysqli_query($link, "SELECT * FROM `pages`");


if ($_SESSION['ID'] != 0) {
    $id_user = mysqli_query($link, "SELECT * FROM `users` WHERE users_id='" . $_SESSION['ID'] . "'");
    $user_link = mysqli_fetch_array($id_user, MYSQLI_ASSOC);
    include('header.php');
    /*    $file = basename($_SERVER['PHP_SELF'], ".php");
        echo $_SERVER['HTTP_HOST']."<br>".$_SERVER['REQUEST_URI']."<br>".$file;*/


    if (isset($_REQUEST["page"])){include($_REQUEST["page"] . ".php");}

    else{include_once("blocks/disc_list.php");}
    include_once ('footer.php');
} else {
    include('blocks/sign_IN.php');
}

echo "<pre>";
print_r($_SESSION);
echo "</pre>";