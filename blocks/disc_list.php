<section class="pb-10 pt-0 blog-articles bg-color--primary-light--1" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em">
        <div class="row">
            <!-- end of featured sticky post col -->
            <div class="col-12">
                <div class="row mb-5">



                    <?php
                    if ($_SESSION['roles_id'] != 1) {
                        print_r('<div class="add_but">
        <a class="btn bg-button m-2" href="?page=blocks/disc_add">
            Создать обсуждение
        </a>
    </div>');
                    }

                    $house = mysqli_query($link, "SELECT * FROM `meetings` WHERE `buildings_id`='" . $_SESSION['ID_house'] . "' ORDER BY `meetings_id` DESC");
                    //  for ($i = 0; $i < mysqli_num_rows($house); $i++) {};
                    for ($i = 0; $i < mysqli_num_rows($house); $i++) {
                        $ID_house = mysqli_fetch_array($house, MYSQLI_ASSOC);
                        //  echo '<pre>';
                        // echo $ID_house;
                        //  echo '</pre>';
                        print_r('<div class="col-12 col-sm-6 col-lg-4 mb-3">
                        <article class="article">
                            <div class="card">
                                <div class="article__thumbnail">
                                    <div class="article__thumbnail-image">
                                        <img alt="thumbnail" class="card-img-top background-image-holder" src="img/blog-page-img-3.jpg">
                                    </div>
                                </div>

                                <div class="card-body">
                                    <a class="article__title" href="#">
                                        <h2>');
                        echo $ID_house['meetings_title'];
                        print_r('</h2>
                                        <p>');
                        echo $ID_house['meetings_text'];
                        print_r('</p>
                <form action="?page=blocks/disc_about&id=');
                        echo $ID_house['meetings_id'];
                        print_r('" method="post">
                    <input type="hidden" name="id_vote" value="');
                        echo $ID_house['meetings_id'];
                        print_r('">
                    <input name="btn_id_vote" type="submit" class="btn p-1 mt-2 mx-auto" value="Подробнее" style="background: #52B570">
                </form>
            </a>
                                    <span class="article__date">');
                        echo $ID_house['meetings_date_stop'];
                        print_r('</span>
                                </div>
                            </div>
                        </article>
                    </div>');
                    }
                    ?>

                </div>

                <!-- end of pagination row -->
            </div>
            <!-- end of blog post body col -->
        </div>
        <!-- end of row -->
    </div>
    <!-- end of container -->
</section>





