<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container px-0" style="padding-top: 1em;">
        <?php
        if (isset($_REQUEST["btn_change_status"])) {
            $sql = "UPDATE `applications` SET `application_status` = '" . $_REQUEST["app_status"] . "' WHERE `applications`.`application_id` = " . $_REQUEST["id"];
            $apps = mysqli_query($link, $sql);
        }
        if (isset($_REQUEST["new_comments"])) {
            $sql = "INSERT INTO `app_comments` (`app_comments_id`, `application_id`, `app_comments_comments`, `users_id`, `app_comments_datetime`) VALUES (NULL, '" . $_REQUEST["id"] . "', '" . $_REQUEST["text_comment"] . "', '" . $_SESSION["ID"] . "', '" . date("Y-m-d h:i:s") . "')";
            $apps = mysqli_query($link, $sql);
        }

        $sql = "SELECT a.application_id, u.users_id, a.application_question, u.users_fio, a.application_status, a.application_datetime FROM `applications` a, users u where a.users_id = u.users_id and a.application_id = '" . $_REQUEST['id'] . "'";

        $apps = mysqli_query($link, $sql);
        $app = mysqli_fetch_array($apps, MYSQLI_ASSOC);

        $sql = "SELECT b.buildings_address, r.registration_entrance, r.registration_flat FROM registration r, buildings b WHERE r.buildings_id = b.buildings_id and r.users_id = '" . $app["users_id"] . "'";
        $adds = mysqli_query($link, $sql);
        $add = mysqli_fetch_array($adds, MYSQLI_ASSOC);
        $address = $add["buildings_address"] . ", подъезд " . $add["registration_entrance"] . ", квартира " . $add["registration_flat"];
        ?>
        <form method="post" action="" class="form_bg">
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Номер заявки
                    </label>
                    <input name="app_header" class="form-control" value="<?= $app["application_id"] ?>"
                           type="text"  required/>
                </div>
                <div class="col">
                    <label for="form-datetime-local">
                        ФИО заявителя
                    </label>
                    <input name="app_date" class="form-control" value="<?= $app["users_fio"] ?>" type="text"
                            required/>
                </div>
                <div class="col">
                    <label for="form-datetime-local">
                        Дата заявки
                    </label>
                    <input name="app_date" class="form-control" value="<?= $app["application_datetime"] ?>"
                           type="text"  required/>
                </div>
            </div>
            <!--<div class="row mb-2">
                <div class="col">
                    <label for="form-datetime-local">
                        Адрес
                    </label>
                    <textarea  name="app_question" class="form-control" id="exampleFormControlTextarea1"
                              rows="1" required><?/*= $address */?></textarea>
                </div>
            </div>-->


            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Адрес
                    </label>
                    <select style="padding: 6px 12px;" name="app_status" class="form-control" required>
                        <option value='Принят' <?/* if ($app["application_status"] == "Принят") echo "selected"; */?>>
                            Ленина
                        </option>
                        <option value='В работе' <?/* if ($app["application_status"] == "В работе") echo "selected"; */?>>
                            Шевченко
                        </option>
                        <option value='Выполнен' <?/* if ($app["application_status"] == "Выполнен") echo "selected"; */?>>
                            Выполнен
                        </option>
                    </select>
                </div>
            </div>


            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Содержание
                    </label>
                    <textarea  name="app_question" class="form-control" id="exampleFormControlTextarea1"
                              rows="3" required><?= $app["application_question"] ?></textarea>
                </div>
            </div>
            <?php
            if ($_SESSION['roles_id'] == 2) {
                ?>
                <!--<div class="row mb-2">
                    <div class="col">
                        <label for="exampleFormControlTextarea1">
                            Статус
                        </label>
                        <select style="padding: 6px 12px;" name="app_status" class="form-control" required>
                            <option value='Принят' <?/* if ($app["application_status"] == "Принят") echo "selected"; */?>>
                                Принят
                            </option>
                            <option value='В работе' <?/* if ($app["application_status"] == "В работе") echo "selected"; */?>>
                                В работе
                            </option>
                            <option value='Выполнен' <?/* if ($app["application_status"] == "Выполнен") echo "selected"; */?>>
                                Выполнен
                            </option>
                        </select>
                    </div>
                </div>-->
                <div class="row">
                    <div class="col text-center">

                        <a href="page=block/new_task">
                            <button style="padding: 18px;" class="btn bg-button my-2 my-sm-0"
                                    name="btn_new_task">
                                Создать задачу
                            </button>
                        </a>
                    </div>
                </div>
                <?php

            } else {
                ?>
                <div class="row mb-2">
                    <div class="col">
                        <label for="form-datetime-local">
                            Статус
                        </label>
                        <input name="app_date" class="form-control" value="<?= $app["application_status"] ?>"
                               type="text" readonly required/>
                    </div>
                </div>
                <?php
            }
            ?>


            <!-- чат -->

        </form>


        <!-- end of pagination row -->


        <!-- end of row -->

    </div>
    <!-- end of container -->

</section>


