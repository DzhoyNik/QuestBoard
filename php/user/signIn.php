<?php
    require "connect.php";

    $login = $_POST['login'];
    $password = $_POST['password'];

    $query = "SELECT * FROM `users` WHERE `login` = '$login' OR `email` = '$login'";
    $result = mysqli_query($connect, $query);
    $tempUser = mysqli_fetch_assoc($result);

    if (password_verify($password, $tempUser['password'])) {
        session_start();
        $_SESSION['id'] = $tempUser['id'];
        echo "Success";
    }