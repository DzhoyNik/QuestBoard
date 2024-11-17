<?php
    require "../user/info.php";

    $taskId = $_POST['taskId'];
    $path = "../../users/".$userLogin."/tasks/"."task_".$taskId;
    $info = file_get_contents($path."/info.json");

    printf($info);