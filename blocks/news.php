<div class="container py-2">
    <div class="add_but">
        <a class="btn bg-button m-2" href="?page=blocks/news_add">
            Создать объявление
        </a>
    </div>
    <?php
    $news = mysqli_query($link, "SELECT * FROM `ads` WHERE `ID_adress`='" . $_SESSION['ID_house'] . "' ORDER BY `ID` DESC");
    for ($i = 0; $i < mysqli_num_rows($news); $i++) {
        $ID_news = mysqli_fetch_array($news, MYSQLI_ASSOC);
        print_r('<div class="card mb-3">
        <div class="row no-gutters">
            <div class="col-md-4">
                <img src="img/paceholder_news.jpg" class="card-img" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">');
        echo $ID_news['header'];
        print_r('  <small class="text-muted">');
        echo $ID_news['date'];
        print_r('</small></h5>
                    <p class="card-text">');
        echo $ID_news['text'];
        print_r('</p>
                </div>
            </div>
        </div>
    </div>');
    }
    ?>
</div>