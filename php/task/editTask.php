<?php
    require "../user/info.php";

    $id = $_POST['id'];
    $newTitle = $_POST['newTitle'];
    $newText = $_POST['newText'];
    $deadline = $_POST['deadline'];
    $path = "../../users/".$userLogin."/tasks/task_".$id."/info.json";

    $json = [
        "task_".$id => [
            "title" => $newTitle,
            "text" => $newText,
            "deadline" => $deadline
        ]
    ];

    file_put_contents($path, json_encode($json, JSON_PRETTY_PRINT));
