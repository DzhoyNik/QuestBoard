<?php
    require "connect.php";

    $id = $_SESSION['id'];
    $query = "SELECT `first_name`, `login`, `email` FROM `users` WHERE `id` = '$id'";
    $result = mysqli_query($connect, $query);

    $data = mysqli_fetch_assoc($result);
    $userName = $data['first_name'];
    $userLogin = $data['login'];
    $userEmail = $data['email'];