<?php
include_once('function/connect_bd.php');
$id_page = mysqli_query($link, "SELECT * FROM `pages`");
if ($_SESSION['ID'] != 0) {
    $id_user = mysqli_query($link, "SELECT * FROM `users` WHERE users_id='" . $_SESSION['ID'] . "'");
    $user_link = mysqli_fetch_array($id_user, MYSQLI_ASSOC);
    include('header.php');
    if (isset($_REQUEST["page"])){include($_REQUEST["page"] . ".php");}
    else{
        if ($_SESSION['ID']==1){
            include_once("blocks/disc_list.php");
        }
        if ($_SESSION['ID']==3){
            include_once("blocks/disc_list_tsg.php");
        }
        if ($_SESSION['ID']==4){
            include_once("blocks/disc_list.php");
        }

    }
    include_once ('footer.php');
} else {
    include('blocks/sign_IN.php');
}
/*echo "<pre>";
print_r($_SESSION);
echo "</pre>";*/