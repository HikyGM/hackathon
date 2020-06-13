<section class="pb-10 pt-0 blog-articles bg-color--primary-light--1"
         style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <!-- заголовок страницы -->
    <div class="container" style="padding-top: 1em">
        <div class="row m-0 p-0">
            <div class="col text-center">
                <h2>Подать заявку</h2>
            </div>
        </div>
    <!-- конец заголовка -->
    <?php
    if (isset($_REQUEST["btn_add_app"])) {
        $data_app = date("Y-m-d h:i:s");
        $sql = "INSERT INTO `applications` (`application_id`, `users_id`, `application_question`, `application_status`, `application_datetime`) VALUES (NULL, '" . $_SESSION["ID"] . "', '" . $_REQUEST["app_question"] . "', 'Подано', '" . $data_app . "');";
        $apps = mysqli_query($link, $sql);
        ?>
        <!-- заголовок страницы -->
            <div class="row m-0 p-0">
                <div class="col text-center">
                    <h3 style="color: #52B570">Заявка принята</h3>
                    <h3 style="color: #52B570">Номер заявки: <?= mysqli_insert_id($link) ?>. Дата: <?= $data_app ?></h3>
                </div>
            </div>
        <!-- конец заголовка -->
        <?php } 
        else
        {
        ?>
                <form method="post" action="">

                    <div class="row m-0 p-0">
                        <div class="col text-center">
                            <h4 for="exampleFormControlTextarea1">
                                Опишите вашу проблему
                            </h4>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col-sm-12 col-md-8 mx-auto">
                            <textarea name="app_question" class="form-control" id="exampleFormControlTextarea1" rows="6"
                                      required><?= $app["application_question"] ?></textarea>
                        </div>
                    </div>


                    <div class="row">
                        <div class="col-sm-12 col-md-8 mx-auto text-center">
                            <button class="btn bg-button my-2 my-sm-0" type="submit" name="btn_add_app">
                                Отправить заявку
                            </button>
                        </div>
                    </div>


                </form>
<?php
}
?>

        <!-- end of pagination row -->


        <!-- end of row -->

    </div>
    <!-- end of container -->

</section>

