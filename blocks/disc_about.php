<?php

if(isset($_REQUEST["new_comments"]))
                    {
                        $sql = "INSERT INTO `meet_comments` (`meet_comments_id`, `meetings_id`, `meet_comments_comment`, `meet_comments_datetime`, `users_id`) VALUES (NULL, '".$_REQUEST["id"]."', '".$_REQUEST["text_comment"]."', '".date("Y-m-d h:i:s")."', '".$_SESSION["ID"]."')";
                        $apps = mysqli_query($link,  $sql);
                    }
if(isset($_REQUEST["btn_agenda"]))
{
    $sql = "INSERT INTO `votes` (`votes_id`, `votes_data_id`, `users_id`, `votes_datetime`, `votes_weight`) VALUES (NULL, '".$_REQUEST["result_survey"]."', '".$_SESSION["ID"]."', '".date("Y-m-d h:i:s")."', '1');";
     $apps = mysqli_query($link,  $sql);
}
                    ?>
<section class="space" style="margin-top: 5em; padding-top: 0em !important; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em;">
        <div class="py-4 text-center form_bg" style="border-radius: 0em;">
            <?php
           
                $ID_vote = mysqli_query($link, "SELECT * FROM `meetings` WHERE `meetings_id`='" . $_REQUEST['id'] . "'");
                $vote = mysqli_fetch_array($ID_vote, MYSQLI_ASSOC); ?>
                <h3><?php echo $vote['meetings_title']; ?></h3>
                <hr class="my-4">
                <h4><?php echo $vote['meetings_text']; ?></h4>
                <hr class="my-4">
                <h2>Голосование</h2>
                <hr class="my-4">
                
                
                
                <?php
            if ($_SESSION["roles_id"] == 1 && !isset($_REQUEST["btn_agenda"])) {
                $sql = "SELECT * FROM `agenda` WHERE `meetings_id` = " . $_REQUEST['id'];
                $agenda = mysqli_query($link,  $sql);
                $quest = mysqli_fetch_array($agenda, MYSQLI_ASSOC); 
     
                ?>
                <h4><?php echo $quest['agenda_text']; ?></h4>
                <hr class="my-4">
                <form method="post" action="" class="form_bg">
            <?php 
                $sql = "SELECT * FROM `votes_data` WHERE `agenda_id` =  " . $quest['agenda_id'];
                
                $options = mysqli_query($link,  $sql);
                
                
                 for ($i = 0; $i < mysqli_num_rows($options); $i++) {
                                $option = mysqli_fetch_array($options, MYSQLI_ASSOC); 
                                ?>
                                <div class="form-check form-check-inline">
                                    <input id="credit<?= $option["votes_data_id"] ?>" name="result_survey"
                                           value="<?= $option["votes_data_id"] ?>" type="radio"
                                           class="form-check-input">
                                    <label class="form-check-label"
                                           for="credit<?= $option["votes_data_id"] ?>"><?= $option["votes_data_option"] ?></label>
                                </div>
                            <?php } ?>
                            <div class="row">
                                <div class="col text-center">
                                    <hr class="w-90">
                                    <input name="btn_agenda" type="submit" class="btn bg-button p-2 mt-2 mx-auto"
                                           value="Проголосовать">
                                </div>
                            </div>
                            </form>
                            <?php
            }
if ($_SESSION["roles_id"] == 2 || ($_SESSION["roles_id"] == 1 && isset($_REQUEST["btn_agenda"]))) {
    $sql = "SELECT sum(v.votes_weight) as sum_l FROM votes_data vd, votes v, agenda a WHERE a.agenda_id = vd.agenda_id and vd.votes_data_id = v.votes_data_id and a.meetings_id = ".$_REQUEST["id"]." GROUP by a.meetings_id order by sum_l desc";
                    
                            $result = mysqli_query($link, $sql);
                            $res = mysqli_fetch_array($result, MYSQLI_ASSOC);
                            $all_count = $res["sum_l"];
                            
                            $sql = "select v.votes_data_id,vd.votes_data_option, sum(v.votes_weight) as sum_1 from votes_data vd, votes v, agenda a where a.agenda_id = vd.agenda_id and v.votes_data_id = vd.votes_data_id and a.meetings_id = ".$_REQUEST["id"]." GROUP BY v.votes_data_id, vd.votes_data_option ORDER by sum_1";
                             
                            $result = mysqli_query($link, $sql);
                            for ($i = 0; $i < mysqli_num_rows($result); $i++) {
                                $surv_row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                                ?>

                                        <h4 class=" d-inline-block"><?= $surv_row["votes_data_option"] ?>
                                            - <?= floor($surv_row["sum_1"] / $all_count * 100) ?>% (<?= $surv_row["sum_1"] ?>)</h4><br>

                                <?php
                            }
                            ?>
                            <h4 class=" d-inline-block">Всего проголосовало - <?= $all_count ?></h4><br>
                            <?php
                        }
            ?>
            
            
            
            
            
            
            
            
            
            
            
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