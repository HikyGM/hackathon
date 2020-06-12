<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <!-- заголовок страницы -->
    <div class="container" style="padding-top: 1em">
        <div class="row m-0 p-0">
            <div class="col text-center">
                <h2>Список заявок</h2>
            </div>
        </div>
    </div>
    <!-- конец заголовка -->
    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col-1">Номер заявки</th>
            <th scope="col-1">Дата подачи</th>
            <th scope="col-4">ФИО заявителя</th>
            <th scope="col-2">Статус</th>
        </tr>
        </thead>
        <tbody>
        <?php
        $sql = "SELECT a.application_id, u.users_fio, a.application_status, a.application_datetime FROM `applications` a, users u where a.users_id = u.users_id ORDER BY a.`application_id` DESC";
        $apps = mysqli_query($link, $sql);
        for ($i = 0; $i < mysqli_num_rows($apps); $i++) {
            $app = mysqli_fetch_array($apps, MYSQLI_ASSOC);
            ?>
            <tr>
                <th scope="row"><a
                            href="?page=blocks/application&id=<?= $app["application_id"] ?>"><?= $app["application_id"] ?></a>
                </th>
                <td><?= $app["application_datetime"] ?></td>
                <td><?= $app["users_fio"] ?></td>
                <td><?= $app["application_status"] ?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>
</section>