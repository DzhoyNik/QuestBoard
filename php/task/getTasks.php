<?php
    require "../user/info.php";

    $path = "../../users/".$userLogin."/tasks/";

    $config = file_get_contents($path."config.json");
    $data = json_decode($config, true);
    $countFiles = $data['countFiles']; 
    $files = array_diff(scandir($path, SCANDIR_SORT_DESCENDING), array(".", "..", "config.json"));
    $json = [];

    for ($i=0; $i < $countFiles; $i++) {
        $pathTask = $path.$files[$i];
        $configTask = file_get_contents($pathTask."/config.json");
        $dataTask = json_decode($configTask, true);
        $infoTask = file_get_contents($pathTask."/info.json");
        $dataInfo = json_decode($infoTask, true);
        
        $jsonTask = [
            'id' => $dataTask['ID'],
            'content' => $dataInfo[$files[$i]]
        ];

        array_push($json, $jsonTask);

    }

    $result = json_encode($json, JSON_PRETTY_PRINT); 
    printf($result);

?>