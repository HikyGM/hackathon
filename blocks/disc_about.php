<section class="space" style="margin-top: 5em; padding-top: 2em; background: #E3E3E3;">
    <s class="container">
    <div class="py-4 text-center">
        <?php

        if (isset($_REQUEST['id'])) {
            $ID_vote = mysqli_query($link, "SELECT * FROM `meetings` WHERE `meetings_id`='" . $_REQUEST['id'] . "'");
            $vote = mysqli_fetch_array($ID_vote, MYSQLI_ASSOC);
            echo '<h2>';
            echo $vote['meetings_title'];
            print_r('</h2>
        <hr class="my-4">
        <p>');
            echo $vote['meetings_text'];
            print_r('</p>
        <hr class="my-4">
        <h2>
            Голосование
        </h2>');
        }
        ?>

        <a href="#" class="btn bg-button mx-2">
            Вариант 1
        </a>
        <a href="#" class="btn bg-button mx-2">

            Вариант 2
        </a>
        <a href="#" class="btn bg-button mx-2">

            Вариант 3
        </a>
        <hr class="my-4">
        <h2>
            Обсуждение
        </h2>
    </div>


    <!-- Обсуждения -->

    <div class="card rare-wind-gradient chat-room">
        <div class="card-body">
            <div class="row px-lg-2 px-2 mx-0">
                <div class="col-md-12 px-lg-auto px-0">
                    <div class="chat-message">

                        <ul class="list-unstyled chat-1 scrollbar-light-blue">

                            <!-- Сообщение -->

                            <li class="d-flex justify-content-between mb-4">
                                <div class="chat-body white p-3 ml-2 z-depth-1">
                                    <div class="header">
                                        <strong class="primary-font">Brad Pitt</strong>
                                        <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </li>
                            <!-- Конец сообщения -->


                            <li class="d-flex justify-content-between mb-4">
                                <div class="chat-body white p-3 ml-2 z-depth-1">
                                    <div class="header">
                                        <strong class="primary-font">Brad Pitt</strong>
                                        <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </li>


                            <li class="d-flex justify-content-between mb-4">
                                <div class="chat-body white p-3 ml-2 z-depth-1">
                                    <div class="header">
                                        <strong class="primary-font">Brad Pitt</strong>
                                        <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </li>


                            <li class="d-flex justify-content-between mb-4">
                                <div class="chat-body white p-3 ml-2 z-depth-1">
                                    <div class="header">
                                        <strong class="primary-font">Brad Pitt</strong>
                                        <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </li>


                            <li class="d-flex justify-content-between mb-4">
                                <div class="chat-body white p-3 ml-2 z-depth-1">
                                    <div class="header">
                                        <strong class="primary-font">Brad Pitt</strong>
                                        <small class="pull-right text-muted"><i class="far fa-clock"></i> 12 mins
                                            ago</small>
                                    </div>
                                    <hr class="w-100">
                                    <p class="mb-0">
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
                                        incididunt ut
                                        labore et dolore magna aliqua.
                                    </p>
                                </div>
                            </li>


                        </ul>

                        <!-- Форма ввода сообщения -->
                        <div class="white">
                            <div class="form-group basic-textarea">
                                <textarea class="form-control pl-2 my-0" id="exampleFormControlTextarea2" rows="3"
                                          placeholder="Введите сообщение..."></textarea>
                            </div>
                        </div>
                        <!-- Кнопка отправки -->
                        <button type="button" class="btn bg-button float-right">Отправить</button>

                    </div>

                </div>

            </div>

        </div>
    </div>



</section>