<?php
    require "./php/user/connect.php";
    if (!empty($_SESSION['id'])) {
        header("Location: main.php");
    }
?>
<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Авторизация | QuestBoard</title>
        <link rel="stylesheet" href="./css/style.css">
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200&" />
        <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    </head>
    <body>
        <div class="modal">
            <div class="modal-body">
                <div class="modal-verify">
                    <h1>Подтверждение</h1>
                    <p>Чтобы продолжить регистрацию, введите код, отправленный на почту</p>
                    <div class="modal-inputs">
                        <input type="text" placeholder="0" autocomplete="off">
                        <input type="text" placeholder="0" autocomplete="off">
                        <input type="text" placeholder="0" autocomplete="off">
                        <input type="text" placeholder="0" autocomplete="off">
                        <input type="text" placeholder="0" autocomplete="off">
                        <input type="text" placeholder="0" autocomplete="off">
                    </div>
                </div>
            </div>
        </div>
        <div class="wrapper">
            <div class="wrapper-body">
                <div class="auth-form">
                    <div class="auth-body">
                        <form action="" id="sign-in">
                            <h1>Авторизация</h1>
                            <input type="text" placeholder="Введите логин">
                            <input type="password" placeholder="Введите пароль">
                            <button type="button">Войти</button>
                            <button type="button">Создать аккаунт</button>
                        </form>
                        <form action="" id="sign-up">
                            <h1>Регистрация</h1>
                            <input type="text" placeholder="Введите логин" autocomplete="off">
                            <input type="email" placeholder="Введите почту" autocomplete="off">
                            <input type="text" placeholder="Введите имя" autocomplete="off">
                            <input type="password" placeholder="Введите пароль" autocomplete="off">
                            <button type="button">Создать аккаунт</button>
                            <button type="button"><span class="material-symbols-outlined">close</span></button>
                        </form>
                    </div>
                </div>
                <div class="image">
                    <img src="./img/calendar.png" alt="">
                </div>
            </div>
        </div>
        <script type="module" src="./js/index.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.3.js" integrity="sha256-nQLuAZGRRcILA+6dMBOvcRh5Pe310sBpanc6+QBmyVM=" crossorigin="anonymous"></script>
    </body>
</html>
