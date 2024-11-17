<?php
    $login = $_POST['login'];
    $captcha = $_POST['captcha'];
    $path = "../../users/".$login."/config.json";
    $data = json_decode(file_get_contents($path), true);

    if ($captcha == $data['captcha']) {
        echo "Success";
    } else {
        echo "Unsuccess";
    }