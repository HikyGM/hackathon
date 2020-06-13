<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em;">
        <form method="post" action="function/vote_add.php" class="form_bg" id="survey_create">
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Заголовок опроса
                    </label>
                    <input name="vote_header" class="form-control" placeholder="Введите заголовок" type="text"
                           required/>
                </div>
            </div>
            <!--<div class="row mb-2">
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
            </div>-->
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Содержание опроса
                    </label>
                    <textarea name="vote_text" class="form-control" id="exampleFormControlTextarea1" rows="3"
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
                                $('#addInput').bind('click', function () {
                                    var new_inp = '<div class="input-group mb-2">\n' +
                                        '                            <div class="input-group-prepend">\n' +
                                        '                                <div class="input-group-text del_inp">\n' +
                                        '                                    <a href="#">\n' +
                                        '                                        X\n' +
                                        '                                    </a>\n' +
                                        '                                </div>\n' +
                                        '                            </div>\n' +
                                        '                            <input class="form-control" id="inputAdd' +
                                        count_quest +
                                        '\"placeholder="Введите вариант ответа" type="text" required/></div>';
                                    count_quest++;
                                    $("#inp_1").append(new_inp);
                                    $("#removeInput").bind("click", btn_rem_qu);
                                });
                            }
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
                            <input class="form-control" id="inputAdd1"
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
                            <input class="form-control" id="inputAdd2"
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