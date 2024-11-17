<?php
    require "connect.php";

    $login = $_POST['login'];
    $email = $_POST['email'];
    $firstName = $_POST['firstName'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    
    $query = "INSERT INTO `users`(`login`, `email`, `first_name`, `password`) VALUES ('$login', '$email', '$firstName', '$password')";
    $result = mysqli_query($connect, $query);

    $path = "../../users/";
    $pathUser = "../../users/".$login."/";
    $pathUserTasks = $pathUser."tasks/";

    $json = [
        "AI" => 0,
        "countFiles" => 0
    ];

    if ($result && mkdir($pathUser."tasks", 0777, true) && file_put_contents($pathUserTasks."config.json", json_encode($json, JSON_PRETTY_PRINT))) {
        session_start();
        $userId = mysqli_fetch_assoc(mysqli_query($connect, "SELECT `id` FROM `users` WHERE `login` = '$login'"));
        $_SESSION['id'] = $userId['id'];
        echo "200";
    } else {
        echo "500";
    }