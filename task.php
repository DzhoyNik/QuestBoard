<?php
    require "./php/user/info.php";
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title></title>
        <link rel="stylesheet" href="/css/style.css">
        <link rel="stylesheet" href="/css/task.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&" />
        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    </head>
    <body>
        <div class="wrapper">
            <div class="wrapper-body">
                <div class="modal">
                    <div class="modal-body">
                        <div class="modal-close">
                            <span class="material-symbols-outlined">close</span>
                        </div>
                        <form>
                            <div class="form-title">
                                <input type="text">
                            </div>
                            <div class="form-text">
                                <textarea type="text"></textarea>
                            </div>
                            <button type="button">Сохранить</button>
                        </form>
                        <div class="modal-msg">
                            <p>Новых изменений нет</p>
                        </div>
                    </div>
                </div>
                <div class="header">
                    <div class="header-body">
                        <div class="header-date">
                            <div class="header-time">
                                <h1></h1>
                                <h1></h1>
                                <h1></h1>
                            </div>
                            <div class="header-day">
                                <h1></h1>
                                <h1></h1>
                                <h1></h1>
                            </div>
                        </div>
                        <div class="header-buttons">
                            <div class="section" id="check">
                                <span class="material-symbols-outlined">check</span>
                            </div>
                            <div class="section" id="edit">
                                <span class="material-symbols-outlined">edit</span>
                            </div>
                            <div class="section" id="delete">
                                <span class="material-symbols-outlined">delete</span>
                            </div>
                        </div>
                        <div class="header-profile">
                            <div class="header-greating">
                                <h1>Привет, <?=$userName?>!</h1>
                            </div>
                            <div class="header-actions">
                                <button type="button"><span class="material-symbols-outlined">settings</span></button>
                                <button type="button" onclick="logoutAccount()"><span class="material-symbols-outlined">logout</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-body">
                        <div class="section active">
                            <a href="main.php"><span class="material-symbols-outlined">arrow_back_ios</span></a>
                        </div>
                        <div class="section">
                            <a href="main.php"><span class="material-symbols-outlined">task</span></a>
                        </div>
                    </div>
                </div>
                <div class="task">
                    <div class="task-body">
                        <div class="task-title">
                            <h1></h1>
                        </div>
                        <div class="task-text">
                            <p></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="module" src="/js/task.js"></script>
        <script type="module" src="/js/getTime.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    </body>
</html>