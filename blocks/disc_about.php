<?php

if(isset($_REQUEST["new_comments"]))
                    {
                        $sql = "INSERT INTO `meet_comments` (`meet_comments_id`, `meetings_id`, `meet_comments_comment`, `meet_comments_datetime`, `users_id`) VALUES (NULL, '".$_REQUEST["id"]."', '".$_REQUEST["text_comment"]."', '".date("Y-m-d h:i:s")."', '".$_SESSION["ID"]."')";
                        $apps = mysqli_query($link,  $sql);
                    }
                    ?>
<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em;">
        <div class="py-4 text-center form_bg" style="border-radius: 0em;">
            <?php
            if (isset($_REQUEST['id'])) {
                $ID_vote = mysqli_query($link, "SELECT * FROM `meetings` WHERE `meetings_id`='" . $_REQUEST['id'] . "'");
                $vote = mysqli_fetch_array($ID_vote, MYSQLI_ASSOC); ?>
                <h3><?php echo $vote['meetings_title']; ?></h3>
                <hr class="my-4">
                <h4><?php echo $vote['meetings_text']; ?></h4>
                <hr class="my-4">
                <h2>Голосование</h2>
            <?php } ?>
            <a href="#" class="btn bg-button mx-2">Вариант 1</a>
            <a href="#" class="btn bg-button mx-2">Вариант 2</a>
            <a href="#" class="btn bg-button mx-2">Вариант 3</a>
            <hr class="my-4">
            <h2>Обсуждение</h2>
        </div>
        <!-- Обсуждения -->
        <div class="card rare-wind-gradient chat-room">
            <div class="card-body">
                <div class="row px-lg-2 mx-0">
                    <div class="col-md-12 px-lg-auto px-0">
                        <div class="chat-message">
                            <ul class="list-unstyled chat-1 scrollbar-light-blue">
                                <?php
                                    $sql = "SELECT u.users_fio, mc.meet_comments_datetime, mc.meet_comments_comment FROM meet_comments mc, users u WHERE mc.users_id = u.users_id and mc.meetings_id = ".$_REQUEST["id"]." ORDER BY mc.meet_comments_datetime DESC";
    
                        $comments = mysqli_query($link,  $sql);

                        for ($i = 0; $i < mysqli_num_rows($comments); $i++) {
                            $comment = mysqli_fetch_array($comments, MYSQLI_ASSOC);
                                    ?>
                                
                                <!-- Сообщение -->
                                <li class="d-flex justify-content-between mb-4">
                                    <div class="chat-body white ml-2 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font"><?= $comment["users_fio"] ?></strong>
                                            <small class="pull-right text-muted"><i class="far fa-clock"></i> <?= $comment["meet_comments_datetime"] ?></small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            <?= $comment["meet_comments_comment"] ?>
                                        </p>
                                    </div>
                                </li>
                                <!-- Конец сообщения -->
                                <?php } ?>

                            </ul>
                            <!-- Форма ввода сообщения -->
                            <form action="" method="post">
                            <div class="white">
                                <div class="form-group basic-textarea">
                                <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3"
                                          placeholder="Введите сообщение..." name="text_comment"></textarea>
                                </div>
                            </div>
                            <!-- Кнопка отправки -->
                            <button type="button0" name="new_comments" class="btn bg-button float-right" type="submit">Отправить</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>