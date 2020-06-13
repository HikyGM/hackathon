
<section class="pb-10 pt-0 blog-articles bg-color--primary-light--1" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
<!-- заголовок страницы -->
    <div class="container" style="padding-top: 1em">
        <div class="row m-0 p-0">
            <div class="col text-center">
                <h2>Подать заявку</h2>
            </div>
        </div>
    </div>
    <!-- конец заголовка -->
    <?php
                    if(isset($_REQUEST["btn_add_app"]))
                    {
                       $sql = "INSERT INTO `applications` (`application_id`, `users_id`, `application_question`, `application_status`, `application_datetime`) VALUES (NULL, '".$_SESSION["ID"]."', '".$_REQUEST["app_question"]."', 'Подано', '".date("Y-m-d h:i:s")."');";
                        $apps = mysqli_query($link,  $sql);
                        ?>
                        <!-- заголовок страницы -->
    <div class="container" style="padding-top: 1em">
        <div class="row m-0 p-0">
            <div style="color: green" class="col text-center">
                <h3>Заявка принята</h3>
            </div>
        </div>
    </div>
    <!-- конец заголовка -->
                        <?php
                    }
                  
                    
                    ?>
    <div class="container" style="padding-top: 1em">


        <div class="row row-cols-1 row-cols-md-3">



                    
<div class="container">
    <form method="post" action="">

        <div class="row mb-2">
            <div class="col">
                <label for="exampleFormControlTextarea1">
                    Опишите вашу проблему
                </label>
                <textarea  name="app_question" class="form-control" id="exampleFormControlTextarea1" rows="3" required><?= $app["application_question"] ?></textarea>
            </div>
        </div>
       
        
        <div class="row">
            <div class="col">
                <button class="btn btn-outline-dark my-2 my-sm-0" type="submit" name="btn_add_app">
                    Отправить заявку
                </button>
                           </div>
        </div>

        
    </form>
  
</div>
                </div>

                <!-- end of pagination row -->
       
  
        <!-- end of row -->
         
    </div>
    <!-- end of container -->
    
</section>

