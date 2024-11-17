<?php
    $login = $_POST['login'];
    $firstName = $_POST['firstName'];
    $email = $_POST['email'];

    $subject = "Подтверждение почты";
    $captcha = rand(100000, 999999);
    $message = "
        <div style='width: 100%; height: 100%; display: flex; align-items: center; justify-content: center; background-color: #af3fff; padding: 1rem'>
            <div style='width: 75%; position: relative; background-color: #fff; border-radius: 50px; margin: 0 auto; padding: 1rem'>
                <div style='width: 100%; text-align: center;'>
                    <h1 style='font-family: '\Oswald'\'>Здравствуйте, ".$firstName."</h1>
                    <p style='font-size: 1.25rem; font-family: '\Roboto'\; margin-bottom: 5rem'>Ваш код доступа для подтверждения почты</p>
                    <h1 style='width: 15%; padding: 0.5rem 1rem; margin: 0 auto; letter-spacing: 3rem; font-size: 2.25rem; border: 5px dashed #af3fff; border-radius: 15px; margin-bottom: 5rem;'>".$captcha."</h1>
                    <p style='width: 50%; margin: 0 auto; font-size: 1.25rem; font-family: '\Roboto'\; margin-bottom: 5rem'>С помощью этого кода Вы сможете получить доступ к своему аккаунту и использовать все функции нашего сервиса.</p>
                    <p style='font-size: 1.25rem'>С уважением,</p>
                    <p style='font-size: 1.25rem; line-height: 0rem'>Команда QuestBoard!</p>
                </div>
            </div>
        </div>
    ";
    $headers = "From: info@questboard.ru\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";

    $pathUser = "../../users/".$login."/";
    $json = [
        "captcha" => $captcha
    ];

    if(mail($email, $subject, $message, $headers)) {
        mkdir($pathUser, 0777, true);
        file_put_contents($pathUser."config.json", json_encode($json, JSON_PRETTY_PRINT));
    } else {
        echo "Почта не найдена";
    };