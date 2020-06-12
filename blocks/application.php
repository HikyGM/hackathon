<section class="pb-10 pt-0 blog-articles bg-color--primary-light--1"
         style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em">
        <div class="row row-cols-1 row-cols-md-3">
            <?php
            if (isset($_REQUEST["btn_change_status"])) {
                $sql = "UPDATE `applications` SET `application_status` = '" . $_REQUEST["app_status"] . "' WHERE `applications`.`application_id` = " . $_REQUEST["id"];
                $apps = mysqli_query($link, $sql);
            }
            if ($_SESSION['roles_id'] == 2) {

            }
            $sql = "SELECT a.application_id, a.application_question, u.users_fio, a.application_status, a.application_datetime FROM `applications` a, users u where a.users_id = u.users_id and a.application_id = '" . $_REQUEST['id'] . "'";

            $apps = mysqli_query($link, $sql);
            $app = mysqli_fetch_array($apps, MYSQLI_ASSOC);
            ?>
            <div class="container">
                <form method="post" action="">
                    <div class="row mb-2">
                        <div class="col">
                            <label for="exampleFormControlTextarea1">
                                Номер заявки
                            </label>
                            <input name="app_header" class="form-control" value="<?= $app["application_id"] ?>"
                                   type="text" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="form-datetime-local">
                                Дата заявки
                            </label>
                            <input name="app_date" class="form-control" value="<?= $app["application_datetime"] ?>"
                                   type="text" readonly required/>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="exampleFormControlTextarea1">
                                Содержание
                            </label>
                            <textarea readonly name="app_question" class="form-control" id="exampleFormControlTextarea1"
                                      rows="3" required><?= $app["application_question"] ?></textarea>
                        </div>
                    </div>
                    <div class="row mb-2">
                        <div class="col">
                            <label for="exampleFormControlTextarea1">
                                Статус
                            </label>
                            <select style="padding: 6px 12px;" name="app_status" class="form-control"
                                    required><?= $app["application_question"] ?>
                                <option value='Принят' <? if ($app["application_status"] == "Принят") echo "selected"; ?>>
                                    Принят
                                </option>
                                <option value='В работе' <? if ($app["application_status"] == "В работе") echo "selected"; ?>>
                                    В работе
                                </option>
                                <option value='Выполнен' <? if ($app["application_status"] == "Выполнен") echo "selected"; ?>>
                                    Выполнен
                                </option>
                            </select>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_change_status">
                                Сохранить
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- end of pagination row -->
    </div>
    <!-- end of blog post body col -->
    </div>
    <!-- end of row -->
    </div>
    <!-- end of container -->
</section>





