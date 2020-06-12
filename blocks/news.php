<!--<div class="container py-2">
    <div class="add_but">
        <a class="btn bg-button m-2" href="?page=blocks/news_add">
            Создать объявление
        </a>
    </div>-->
<section class="space" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <div class="container">
        <div class="row m-0 p-0">
            <?php
            if ($_SESSION['roles_id'] != 1) {
            print_r('<div class="col text-center">
                <h2><a class="m-2" href="?page=blocks/news_add">
                        Создать объявление
                    </a></h2>
            </div>');}
            ?>
        </div>
        <!-- enf of section title row -->
        <div class="row">
    <?php
    $news = mysqli_query($link, "SELECT * FROM `ads` WHERE `buildings_id`='" . $_SESSION['ID_house'] . "' ORDER BY `ads_id` DESC");
    for ($i = 0; $i < mysqli_num_rows($news); $i++) {
        $ID_news = mysqli_fetch_array($news, MYSQLI_ASSOC);
        print_r('<div class="col-12 col-sm-6 col-md-4 col-xl-3">
                <div class="card box-shadow--3 card-hover--3d border--none mb-3 max-w--320 mx-auto">
                    <a href="#"><img src="img/news-1.jpg" class="card-img-top" alt="news"></a>
                    <div class="card-body d-flex flex-column px-2">
                        <span class="font-size--14 text-color--400 mb-1">');
        echo $ID_news['ads_datetime'];
        print_r('</span>
                        <a href="#" class="card-title h6-font font-w--500 text-color--700 mb-0">');
        echo $ID_news['ads_text'];
        print_r('</a>
                    </div>
                </div>
                <!-- end of card -->
            </div>');

    }
    ?>
        </div>
    </div>
</section>