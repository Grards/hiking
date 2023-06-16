<?php 
    require "connection.php"; 
    $pdo = connection();

    $name = $_POST[htmlentities('name')];
    $difficulty = $_POST[htmlentities('difficulty')];
    $distance = filter_var($_POST[htmlentities('distance')], FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION);
    $duration = $_POST[htmlentities('duration')];
    $height_difference = intval(filter_var($_POST[htmlentities('height_difference')], FILTER_SANITIZE_NUMBER_INT));

    if(isset($_POST[htmlentities('available')])){
        $available = 'yes';
    }else{
        $available = 'no';
    }

    $sql = "INSERT IGNORE INTO hiking (name, difficulty, distance, duration, height_difference, available) VALUES (?,?,?,?,?,?)";
    $query= $pdo->prepare($sql);
    $query->execute([$name, $difficulty, $distance, $duration, $height_difference, $available]);

    $lastid = filter_var(htmlentities($pdo->lastInsertId()), FILTER_SANITIZE_NUMBER_INT);
    header('Location: /hiking/index.php?add='.$lastid);
?>