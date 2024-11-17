<?php
    $user = 'root';
    $password = 'root';
    $db = 'worknest';
    $host = 'localhost';
    
    $connect = mysqli_connect($host, $user, $password, $db);
    session_start();