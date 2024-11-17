<?php
    require "connect.php";

    $id = $_SESSION['id'];
    $login = $_POST['login'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    if ($login != "") {
        mysqli_query($connect, ("UPDATE `users` SET `login` = '$login' WHERE `id` = '$id'"));
    }

    if ($email != "") {
        mysqli_query($connect, ("UPDATE `users` SET `email` = '$email' WHERE `id` = '$id'"));
    }

    if ($password != "") {
        mysqli_query($connect, ("UPDATE `users` SET `password` = '$password' WHERE `id` = '$id'"));
    }