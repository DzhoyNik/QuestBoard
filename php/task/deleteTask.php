<?php
    require "../user/info.php";

    $id = $_POST['id'];
    $path = "../../users/".$userLogin."/tasks/";
    $config = file_get_contents($path."config.json");
    $dir = $path."task_".$id;

    $data = json_decode($config, true);
    $countFiles = $data['countFiles'] - 1;

    $newData = [
        'AI' => $data['AI'],
        'countFiles' => $countFiles
    ];

    file_put_contents($path."config.json", json_encode($newData, JSON_PRETTY_PRINT));
    unlink($dir."/info.json");
    unlink($dir."/config.json");
    rmdir($dir);
?>