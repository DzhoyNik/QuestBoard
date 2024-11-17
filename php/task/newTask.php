<?php
    require "../user/info.php";

    $path = "../../users/".$userLogin."/tasks/";

    $config = file_get_contents($path."config.json");
    $data = json_decode($config, true);
    $pathTask = $path."task_".$data['AI'];

    mkdir($pathTask, 0777, true);

    $countFiles = count(glob($path."*", GLOB_ONLYDIR));

    $jsonConfig = [
        "AI" => ++$data['AI'],
        "countFiles" => $countFiles
    ];

    $jsonConfigTask = [
        "ID" => --$data['AI'],
        "isList" => false
    ];

    $jsonInfo = [
        "task_".$data['AI'] => [
            "title" => $_POST['taskTitle'],
            "text" => $_POST['taskText'],
            "deadline" => $_POST['taskDeadline']
        ]
    ];

    file_put_contents($path."config.json", json_encode($jsonConfig, JSON_PRETTY_PRINT));
    file_put_contents($pathTask."/config.json", json_encode($jsonConfigTask, JSON_PRETTY_PRINT));
    file_put_contents($pathTask."/info.json", json_encode($jsonInfo, JSON_PRETTY_PRINT));
?>