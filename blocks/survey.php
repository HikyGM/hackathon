<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container px-0" style="padding-top: 1em">


        <?php

        $sql = "SELECT survey_id, survey_text, survey_datetime_stop, buildings_id FROM survey where survey_id = " . $_REQUEST["id"];
        $survs = mysqli_query($link, $sql);
        $surv = mysqli_fetch_array($survs, MYSQLI_ASSOC);

        $sql = "SELECT buildings_address FROM buildings WHERE buildings_id = '" . $surv["buildings_id"] . "'";
        $adds = mysqli_query($link, $sql);
        $add = mysqli_fetch_array($adds, MYSQLI_ASSOC);
        $address = $add["buildings_address"];
        ?>
        <form method="post" action="" class="form_bg">
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Тема опроса
                    </label>
                    <input name="app_header" class="form-control" value="<?= $surv["survey_text"] ?>"
                           type="text" readonly required/>
                </div>

                <div class="col">
                    <label for="form-datetime-local">
                        Дата окончания голосования
                    </label>
                    <input name="app_date" class="form-control" value="<?= $surv["survey_datetime_stop"] ?>"
                           type="text" readonly required/>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="form-datetime-local">
                        Адрес
                    </label>
                    <textarea readonly name="app_question" class="form-control" id="exampleFormControlTextarea1"
                              rows="1" required><?= $address ?></textarea>
                </div>
            </div>


            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Варианты
                    </label>
                    <div class="d-block my-3 text-center">
                        <?php
                        $sql = "SELECT * FROM `survey_data` WHERE `survey_id` = " . $surv["survey_id"];
                        $surv_data = mysqli_query($link, $sql);
                        if ($_SESSION["roles_id"] == 1) {
                            for ($i = 0; $i < mysqli_num_rows($surv_data); $i++) {
                                $surv_row = mysqli_fetch_array($surv_data, MYSQLI_ASSOC);
                                ?>
                                <div class="form-check form-check-inline">
                                    <input id="credit<?= $surv_row["survey_data_id"] ?>" name="result_survey"
                                           value="<?= $surv_row["survey_data_id"] ?>" type="radio"
                                           class="form-check-input">
                                    <label class="form-check-label"
                                           for="credit<?= $surv_row["survey_data_id"] ?>"><?= $surv_row["survey_data_option"] ?></label>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col text-center">
                                    <hr class="w-90">
                                    <input name="btn_survey" type="submit" class="btn bg-button p-2 mt-2 mx-auto"
                                           value="Проголосовать">
                                </div>
                            </div>
                            <?php
                        }
                        if ($_SESSION["roles_id"] == 2) {
                            for ($i = 0; $i < mysqli_num_rows($surv_data); $i++) {
                                $surv_row = mysqli_fetch_array($surv_data, MYSQLI_ASSOC);
                                ?>

                                        <h4 class=" d-inline-block"><?= $surv_row["survey_data_option"] ?>
                                            - <?= $surv_row["survey_data_count"] ?></h4>

                                <?php
                            }
                        }
                        ?>


                    </div>
                </div>
            </div>


        </form>


        <!-- end of pagination row -->


        <!-- end of row -->

    </div>
    <!-- end of container -->

</section>

