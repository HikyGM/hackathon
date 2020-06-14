<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <!-- заголовок страницы -->
    <div class="container" style="padding-top: 1em">
        <div class="row m-0 p-0">
            <div class="col text-center">
                <h2>Опросы</h2>
            </div>
        </div>
    </div>
    <!-- конец заголовка -->
        <?php
    if ($_SESSION['roles_id'] == 2) { ?>
        <div class="add_but">
            <a class="btn bg-button m-2" href="?page=blocks/survey_add">Создать новый опрос</a>
        </div>
    <?php } ?>
    <table class="table table-hover">
        <thead class="thead-dark">
        <tr>
            <th scope="col-1">Дата окончания</th>
            <th scope="col-4">Тема</th>
            <th scope="col-2">Количество проголосовавших</th>
        </tr>
        </thead>
        <tbody>
        <?php
        
        if ($_SESSION["roles_id"] == 1)
            $sql = "SELECT s.survey_id, s.survey_text, s.survey_datetime_stop, sum(sd.survey_data_count) as sum_1 FROM survey s, survey_data sd where s.survey_id = sd.survey_id and s.buildings_id = ".$_SESSION["ID_house"]." GROUP by sd.survey_id ORDER BY s.survey_id DESC";
        else
            $sql = "SELECT s.survey_id, s.survey_text, s.survey_datetime_stop, sum(sd.survey_data_count) as sum_1 FROM survey s, survey_data sd where s.survey_id = sd.survey_id GROUP by sd.survey_id ORDER BY s.survey_id DESC";
        $apps = mysqli_query($link, $sql);
        for ($i = 0; $i < mysqli_num_rows($apps); $i++) {
            $app = mysqli_fetch_array($apps, MYSQLI_ASSOC);
            ?>
            <tr>
                <td><?= $app["survey_datetime_stop"] ?></td>
                <td><a
                            href="?page=blocks/survey&id=<?= $app["survey_id"] ?>"><?= $app["survey_text"] ?></a></td>
                <td><?= $app["sum_1"] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</section>
