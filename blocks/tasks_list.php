<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em;">
        <div class="row row-cols-1 row-cols-md-3">
            <?php
            if ($_SESSION['roles_id'] == 2) {
                $ID_tsg = mysqli_query($link, "SELECT tsg_id FROM tsg WHERE users_id='" . $_SESSION['ID'] . "'");
                $tsg = mysqli_fetch_array($ID_tsg, MYSQLI_ASSOC);
                $task = mysqli_query($link, "SELECT * FROM `tasks` WHERE tsg_id='".$tsg['tsg_id']."'");
                //  for ($i = 0; $i < mysqli_num_rows($house); $i++) {};
                for ($i = 0; $i < mysqli_num_rows($task); $i++) {
                    $ID_task = mysqli_fetch_array($task, MYSQLI_ASSOC);
                    $cont= mysqli_query($link, "SELECT contractors_name FROM contractors WHERE contractors_id='" .$ID_task['contractors_id'] . "'");
                    $ID_cont = mysqli_fetch_array($cont, MYSQLI_ASSOC);
                    ?>

                    <div class="col mb-4">
                        <div class="card h-100" style="text-align: center;">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $ID_task['tasks_status']; ?></h5>
                                <p class="card-text"><?php echo $ID_task['tasks_text']; ?></p>
                                <h5 class="card-title">Исполнитель</h5>
                                <p class="card-text"><?php echo $ID_cont['contractors_name']; ?></p>
                            </div>
                            <div class="card-footer">
                                <form action="?page=blocks/disc_about&id=<?php echo $ID_task['meetings_id']; ?>"
                                      method="post">
                                    <input type="hidden" name="id_vote" value="<?php echo $ID_task['meetings_id']; ?>">
                                    <input name="btn_id_vote" type="submit" class="btn bg-button p-1 mt-2 mx-auto"
                                           value="Перейти...">
                                </form>
                            </div>
                        </div>
                    </div>
                <?php }
            } ?>
        </div>
    </div>
</section>