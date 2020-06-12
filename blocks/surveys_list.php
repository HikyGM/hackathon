<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em;">
        <form method="post" action="function/vote_add.php">
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Заголовок обсуждения
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
                        Содержание обсуждения
                    </label>
                    <textarea name="vote_text" class="form-control" id="exampleFormControlTextarea1" rows="3"
                              required></textarea>
                </div>
            </div>
            <div class="row mb-2">
                <div class="col">
                    <label for="exampleFormControlTextarea1">
                        Варианты ответа
                        <button class="btn btn-outline-dark my-2 my-sm-0" type="button">
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
                            <input class="form-control" id="inlineFormInputGroupUsername"
                                   placeholder="Введите вариант ответа" type="text" required/>
                        </div>
                    </div>
                    <div id="inp_2">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text del_inp">
                                    <a href="#">
                                        X
                                    </a>
                                </div>
                            </div>
                            <input class="form-control" id="inlineFormInputGroupUsername"
                                   placeholder="Введите вариант ответа" type="text" required/>
                        </div>
                    </div>
                    <div id="inp_3">
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text del_inp">
                                    <a href="#">
                                        X
                                    </a>
                                </div>
                            </div>
                            <input class="form-control" id="inlineFormInputGroupUsername"
                                   placeholder="Введите вариант ответа" type="text" required/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_add_vote">
                        Сохранить
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>