

<section class="pb-10 pt-0 blog-articles bg-color--primary-light--1" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em">


        <div class="row row-cols-1 row-cols-md-3">



                    <?php
                    if(isset($_REQUEST["btn_change_status"]))
                    {
                        $sql = "UPDATE `applications` SET `application_status` = '".$_REQUEST["app_status"]."' WHERE `applications`.`application_id` = ".$_REQUEST["id"];
                        $apps = mysqli_query($link,  $sql);
                    }
                    if(isset($_REQUEST["new_comments"]))
                    {
                        $sql = "INSERT INTO `app_comments` (`app_comments_id`, `application_id`, `app_comments_comments`, `users_id`, `app_comments_datetime`) VALUES (NULL, '".$_REQUEST["id"]."', '".$_REQUEST["text_comment"]."', '".$_SESSION["ID"]."', '".date("Y-m-d h:i:s")."')";
                        $apps = mysqli_query($link,  $sql);
                    }
                    
                     $sql = "SELECT a.application_id, u.users_id, a.application_question, u.users_fio, a.application_status, a.application_datetime FROM `applications` a, users u where a.users_id = u.users_id and a.application_id = '".$_REQUEST['id']."'";
                    
                    $apps = mysqli_query($link,  $sql);
                    $app = mysqli_fetch_array($apps, MYSQLI_ASSOC);

                    $sql = "SELECT b.buildings_address, r.registration_entrance, r.registration_flat FROM registration r, buildings b WHERE r.buildings_id = b.buildings_id and r.users_id = '".$app["users_id"]."'";
                    $adds = mysqli_query($link,  $sql);
                    $add = mysqli_fetch_array($adds, MYSQLI_ASSOC);
                    $address = $add["buildings_address"].", подъезд ". $add["registration_entrance"].", квартира ".$add["registration_flat"];
                    ?>
<div class="container">
    <form method="post" action="">
        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlTextarea1">
                    Номер заявки
                </label>
                <input name="app_header" class="form-control" value="<?= $app["application_id"] ?>" type="text" readonly required />
            </div>
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="form-datetime-local">
                    Дата заявки
                </label>
                <input name="app_date" class="form-control" value="<?= $app["application_datetime"] ?>" type="text" readonly required />
            </div>            
        </div>
         <div class="row mb-2">
            <div class="col">
                <label for="form-datetime-local">
                    ФИО заявителя
                </label>
                <input name="app_date" class="form-control" value="<?= $app["users_fio"] ?>" type="text" readonly required />
            </div>            
        </div>
                 <div class="row mb-2">
            <div class="col">
                <label for="form-datetime-local">
                    Адрес
                </label>
                <textarea readonly name="app_question" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?= $address ?></textarea>
            </div>            
        </div>
        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlTextarea1">
                    Содержание
                </label>
                <textarea readonly name="app_question" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?= $app["application_question"] ?></textarea>
            </div>
        </div>
        <?php
        if ($_SESSION['roles_id'] == 2) {
                        ?>
        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlTextarea1">
                    Статус
                </label>
                <select style="padding: 6px 12px;" name="app_status" class="form-control"  required><?= $app["application_question"] ?>
                <option value = 'Принят' <? if ($app["application_status"] == "Принят") echo "selected";?>>Принят</option>
                <option value = 'В работе' <? if ($app["application_status"] == "В работе") echo "selected";?>>В работе</option>
                <option value = 'Выполнен' <? if ($app["application_status"] == "Выполнен") echo "selected";?>>Выполнен</option>
                </select>
            </div>
        </div> 
                <div class="row">
            <div class="col">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_change_status">
                    Сохранить
                </button>
                <a href="page=block/new_task"><button style="padding: 18px;" class="btn btn-outline-dark my-2 my-sm-0"  name="btn_new_task">
                    Создать задачу
                </button>
                </a>
            </div>
        </div>
<?php 
            
}
else
{
?>
         <div class="row mb-2">
            <div class="col">
                <label for="form-datetime-local">
                    Статус
                </label>
                <input name="app_date" class="form-control" value="<?= $app["application_status"] ?>" type="text" readonly required />
            </div>            
        </div>
<?php
}
?>

           

        <!-- чат -->
        
    </form>
  
</div>
                </div>

                <!-- end of pagination row -->
       
  
        <!-- end of row -->
         
    </div>
    <!-- end of container -->
    
</section>



<section class="space" style="margin-top: 0; padding-top: 0em !important; background: #E3E3E3;">
    <!-- заголовок страницы -->
    <div class="container" style="padding-top: 1em">
        <div class="row m-0 p-0">
            <div class="col text-center">
                <h2>Обсуждение</h2>
            </div>
        </div>
    </div>
    <!-- конец заголовка -->
    <div class="container" style="padding-top: 1em;">
        
        <!-- Обсуждения -->
        <div class="card rare-wind-gradient chat-room">
            <div class="card-body">
                <div class="row px-lg-2 mx-0">
                    <div class="col-md-12 px-lg-auto px-0">
                        <div class="chat-message">
                            <ul class="list-unstyled chat-1 scrollbar-light-blue">
                                <?php
                                    $sql = "SELECT u.users_fio, ac.app_comments_datetime, ac.app_comments_comments FROM app_comments ac, users u WHERE ac.users_id = u.users_id and ac.application_id = ".$_REQUEST["id"]." ORDER BY ac.app_comments_datetime DESC";
    
                        $comments = mysqli_query($link,  $sql);
                        
                        for ($i = 0; $i < mysqli_num_rows($comments); $i++) {
                            $comment = mysqli_fetch_array($comments, MYSQLI_ASSOC);
                                    ?>
                                
                                <!-- Сообщение -->
                                <li class="d-flex justify-content-between mb-4">
                                    <div class="chat-body white ml-2 z-depth-1">
                                        <div class="header">
                                            <strong class="primary-font"><?= $comment["users_fio"] ?></strong>
                                            <small class="pull-right text-muted"><i class="far fa-clock"></i> <?= $comment["app_comments_datetime"] ?></small>
                                        </div>
                                        <hr class="w-100">
                                        <p class="mb-0">
                                            <?= $comment["app_comments_comments"] ?>
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