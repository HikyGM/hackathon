<?php
if (isset($_REQUEST["btn_add_vote"]))
{
    $sql = "INSERT INTO `meetings` (`meetings_id`, `buildings_id`, `meetings_title`, `meetings_datetime_start`, `meetings_text`, `meetings_datetime_stop`) VALUES (NULL, '".$_REQUEST["house"]."', '".$_REQUEST["vote_header"]."', '".$_REQUEST["vote_date_begin"]."', '".$_REQUEST["vote_text"]."', '".$_REQUEST["vote_date_over"]."');";
    $meeting = mysqli_query($link, $sql);
    $meeting_id = mysqli_insert_id($link);

    $sql = "INSERT INTO `agenda` (`agenda_id`, `meetings_id`, `agenda_text`) VALUES (NULL, '".$meeting_id."', '".$_REQUEST["vote_question"]."');";
    $agenda = mysqli_query($link, $sql);
    $agenda_id = mysqli_insert_id($link);
    $i = 1;
    while(isset($_REQUEST["inputAdd".$i]))
    {
        $sql = "INSERT INTO `votes_data` (`votes_data_id`, `agenda_id`, `votes_data_option`) VALUES (NULL, '".$agenda_id."', '".$_REQUEST["inputAdd".$i]."');";

        $survey = mysqli_query($link, $sql);
        $i++;
    }
    
}
?>
<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em;">
        <form method="post" action="" class="form_bg">
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Заголовок собрания
                    </label>
                    <input name="vote_header" class="form-control" placeholder="Введите заголовок" type="text"
                           required/>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="form-datetime-local">
                        Начало
                    </label>
                    <input name="vote_date_begin" class="datetime-local form-control" id="date_1" type="datetime-local"
                           required/>
                </div>
                <div class="col">
                    <label for="form-datetime-local">
                        Окончание
                    </label>
                    <input name="vote_date_over" class="datetime-local form-control" id="date_2" type="datetime-local"
                           required/>
                </div>
            </div>
            <div class="row mb-2">
                            <div class="col">
                                <label for="exampleFormControlTextarea1">
                                    Выберите дом
                                </label>
                                <select style="padding: 6px 12px;" name="house" class="form-control" required>
                                    <?php
                                    $sql = "SELECT * FROM `buildings` WHERE `buildings_id` > 0 ORDER BY `buildings`.`buildings_address` ASC";
                                    $builds = mysqli_query($link, $sql);

                                    for ($i = 0; $i < mysqli_num_rows($builds); $i++) {
                                        $build = mysqli_fetch_array($builds, MYSQLI_ASSOC);
                                    ?>
                                    
                                    <option value='<?= $build['buildings_id'] ?>'>
                                        <?= $build['buildings_address'] ?>
                                    </option>
                                    <?php
                                    }
                                    ?>

                                </select>
                            </div>
                        </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Содержание обсуждения
                    </label>
                    <textarea name="vote_text" class="form-control" id="exampleFormControlTextarea1" rows="3"
                              required></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Вопрос для голосования
                    </label>
                    <textarea name="vote_question" class="form-control" id="exampleFormControlTextarea1" rows="3"
                              required></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Варианты ответа
                        <script>
                            var count_quest = 3;
                            function addInputClick() {
                                        var new_inp = '<div class="input-group mb-2">\n' +
                                        '                            <div class="input-group-prepend">\n' +
                                        '                                <div class="input-group-text del_inp">\n' +
                                        '                                    <a href="#">\n' +
                                        '                                        X\n' +
                                        '                                    </a>\n' +
                                        '                                </div>\n' +
                                        '                            </div>\n' +
                                        '                            <input class="form-control" name="inputAdd' +
                                        count_quest +
                                        '\"placeholder="Введите вариант ответа" type="text" required/></div>';
                                    count_quest++;
                                    $("#inp_1").append(new_inp);
                                    $("#removeInput").bind("click", btn_rem_qu);
                                
                            }
                            $('#addInput').bind('click', addInputClick);
                        </script>
                        <button class="btn bg-button my-2 my-sm-0 p-2" type="button" id="addInput"
                                onclick="addInputClick()">
                            Добавить
                        </button>
                    </label>
                    <div id="inp_1">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text del_inp">
                                    <a href="#">
                                        X
                                    </a>
                                </div>
                            </div>
                            <input class="form-control" name="inputAdd1"
                                   placeholder="Введите вариант ответа" type="text" required/>
                        </div>
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text del_inp">
                                    <a href="#">
                                        X
                                    </a>
                                </div>
                            </div>
                            <input class="form-control" name="inputAdd2"
                                   placeholder="Введите вариант ответа" type="text" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col text-center">
                    <button class="btn bg-button my-2 my-sm-0" type="submit" name="btn_add_vote">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>