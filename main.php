<?php
    require "./php/user/info.php";
    if (empty($_SESSION['id'])) {
        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Планировщик | QuestBoard</title>
        <link rel="stylesheet" href="/css/style.css">
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
                        <div class="form-add">
                            <div class="form-title">
                                <input type="text" placeholder="Введите название">
                            </div>
                            <div class="form-text">
                                <textarea name="" id="" placeholder="Введите текст"></textarea>
                            </div>
                            <div class="form-date">
                                <input type="date" placeholder="Выберите дату">
                            </div>
                            <button type="button">Создать</button>
                        </div>
                        <div class="form-delete">
                            <div class="select-body"></div>
                            <button type="button">Удалить</button>
                        </div>
                        <div class="form-setting">
                            <div class="form-login">
                                <input type="text" placeholder="Введите новый логин">
                            </div>
                            <div class="form-email">
                                <input type="email" placeholder="Введите новую почту">
                            </div>
                            <div class="form-password">
                                <input type="password" placeholder="Введите новый пароль">
                                <input type="password" placeholder="Повторите новый пароль">
                            </div>
                            <button type="button" id="saveSettings">Сохранить</button>
                        </div>
                        <div class="form-success">
                            <div class="form-body">
                                <div class="form-icon">
                                    <span class="material-symbols-outlined">check</span>
                                </div>
                                <div class="form-text">
                                    <p>Данные изменены</p>
                                </div>
                            </div>
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
                            <div class="section" id="add">
                                <span class="material-symbols-outlined">add_circle</span>
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
                                <button type="button" id="setting"><span class="material-symbols-outlined">settings</span></button>
                                <button type="button" onclick="logoutAccount()"><span class="material-symbols-outlined">logout</span></button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="sidebar">
                    <div class="sidebar-body">
                        <div class="section active">
                            <a href="main.php"><span class="material-symbols-outlined">task</span>Задачи</a>
                        </div>
                    </div>
                </div>
                <div class="tasks">
                    <div class="tasks-body"></div>
                </div>
            </div>
        </div>
    </body>
    <script>
        function openTask(e) {
            location.replace("../task?id=" + e);
        }
        function logoutAccount() {
            $.ajax({
                url: '../php/user/logout.php',
                method: "post",
                success: () => {
                    location.replace("../");
                }
            })
        }
    </script>
    <script type="module" src="/js/main.js"></script>
    <script type="text/javascript" src="/js/getTime.js"></script>
    <script src="/js/actionTask/newTask.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
</html>