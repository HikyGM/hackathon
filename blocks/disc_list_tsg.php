<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <?php
    if ($_SESSION['roles_id'] != 1) { ?>
        <div class="add_but">
            <a class="btn bg-button m-2" href="?page=blocks/disc_add">Создать обсуждение</a>
        </div>
    <?php } ?>
    <div class="table-responsive-sm">
        <table class="table table-hover">
            <thead class="thead-dark">
            <tr>
                <th scope="col">Адрес дома</th>
                <th scope="col">Статус</th>
                <th scope="col">Дата окончания</th>
                <th scope="col">Повестка дня</th>
                <th scope="col">Обсуждение</th>
                <th scope="col">Протокол</th>
            </tr>
            </thead>
            <tbody>
            <?php
            $house = mysqli_query($link, "SELECT m.meetings_id, b.buildings_address, m.meetings_datetime_stop, m.meetings_title  FROM `meetings` m, buildings b where m.buildings_id = b.buildings_id ORDER BY m.`meetings_datetime_stop` DESC");
            for ($i = 0; $i < mysqli_num_rows($house); $i++) {
            $ID_house = mysqli_fetch_array($house, MYSQLI_ASSOC); ?>
            <tr>
                <th scope="row"><?php echo $ID_house['buildings_address']; ?></th>
                <td><?php echo $ID_house['meetings_id']; ?></td>
                <td><?php echo $ID_house['meetings_datetime_stop']; ?></td>
                <td><?php echo $ID_house['meetings_title']; ?></td>
                <td>
                    <form action="?page=blocks/disc_about&id=<?php echo $ID_house['meetings_id']; ?>" method="post">
                        <input type="hidden" name="id_vote" value="<?php echo $ID_house['meetings_id']; ?>">
                        <input name="btn_id_vote" type="submit" class="btn p-1 mt-2 mx-auto" value="Перейти">
                    </form>
                </td>
                <td><?php echo $ID_house['meetings_id']; ?>
                </td>
                <?php } ?>
            </tbody>
        </table>
    </div>
</section>