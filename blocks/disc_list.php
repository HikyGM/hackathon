<section class="pb-10 pt-0 blog-articles bg-color--primary-light--1" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em">
        <div class="row row-cols-1 row-cols-md-3">
            <?php
            if ($_SESSION['roles_id'] != 1) { ?>
                <div class="add_but">
                    <a class="btn bg-button m-2" href="?page=blocks/disc_add">
                        Создать обсуждение
                    </a>
                </div>
            <?php } ?>
            <?php
            $house = mysqli_query($link, "SELECT * FROM `meetings` WHERE `buildings_id`='" . $_SESSION['ID_house'] . "' ORDER BY `meetings_id` DESC");
            //  for ($i = 0; $i < mysqli_num_rows($house); $i++) {};
            for ($i = 0; $i < mysqli_num_rows($house); $i++) {
                $ID_house = mysqli_fetch_array($house, MYSQLI_ASSOC); ?>
                <div class="col mb-4">
                    <div class="card h-100" style="text-align: center;">
                        <img src="img/blog-page-img-3.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $ID_house['meetings_title']; ?></h5>
                            <p class="card-text"><?php echo $ID_house['meetings_text']; ?></p>
                        </div>
                        <div class="card-footer">
                            <form action="?page=blocks/disc_about&id=<?php echo $ID_house['meetings_id']; ?>"
                                  method="post">
                                <input type="hidden" name="id_vote" value="<?php echo $ID_house['meetings_id']; ?>">
                                <input name="btn_id_vote" type="submit" class="btn p-1 mt-2 mx-auto" value="Подробнее"
                                       style="background: #52B570">
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</section>





