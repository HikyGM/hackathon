<section class="pb-10 pt-0 blog-articles bg-color--primary-light--1" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <div class="container" style="padding-top: 1em">


        <div class="row row-cols-1 row-cols-md-3">



                    <?php
                    if ($_SESSION['roles_id'] == 2) {
                        
                    }
                    print_r('<table border = 1>');
                    $sql = "SELECT a.application_id, u.users_fio, a.application_status, a.application_datetime FROM `applications` a, users u where a.users_id = u.users_id ORDER BY a.`application_id` DESC";
                    print($sql);
                    $apps = mysqli_query($link,  $sql);
                    for ($i = 0; $i < mysqli_num_rows($apps); $i++) {
                        $app = mysqli_fetch_array($apps, MYSQLI_ASSOC);
                        print_r('<tr>');
                        print_r('<td><a href="?page=blocks/application&id=');
                        echo $app["application_id"];
                        print_r('">');
                        echo $app["application_id"];
                        print_r('</a>');
                        print_r('</td>');
                        print_r('<td>');
                        echo $app["application_datetime"];
                        print_r('</td>');
                        print_r('<td>');
                        echo $app["users_fio"];
                        print_r('</td>');
                        print_r('<td>');
                        echo $app["application_status"];
                        print_r('</td>');

                        print_r('</tr>');
                
                    }
                    print_r('</table>');
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





