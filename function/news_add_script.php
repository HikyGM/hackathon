<?php
include_once ('connect_bd.php');
if (isset($_POST['btn_add_news'])) {
    $date = 'date';
    mysqli_query($link, "INSERT INTO ads SET ".$date."='" . $_POST['news_date'] . "', header='".$_POST['news_header']."', text='".$_POST['news_text']."', ID_adress='".$_SESSION['ID_house']."'");
    header("Location: ../index.php");
}
?>
