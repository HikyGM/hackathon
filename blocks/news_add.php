<section class="space" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <div class="container">
    <form method="post" action="function/news_add_script.php">
        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlTextarea1">
                    Заголовок объявления
                </label>
                <input name="news_header" class="form-control" placeholder="Введите заголовок"type="text" required/>
            </div>
            <div class="col">
                <label for="form-datetime-local">
                    Начало
                </label>
                <input name="news_date" class="datetime-local form-control" id="date_1" type="datetime-local" required/>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlTextarea1">
                    Содержание объявления
                </label>
                <textarea name="news_text" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlTextarea1">
                    Добавьте изображение
                </label>
                <div class="input-group mb-3">

                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01">
                        <label class="custom-file-label" for="inputGroupFile01">Выбирите файл</label>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_add_news">
                    Сохранить
                </button>
            </div>
        </div>
    </form>
</div>
</section>