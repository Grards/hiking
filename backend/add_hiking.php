<?php 
    require "connection.php"; 
    $pdo = connection();

    $name = $_POST['name'];
    $difficulty = $_POST['difficulty'];
    $distance = $_POST['distance'];
    $duration = $_POST['duration'];
    $height_difference = $_POST['height_difference'];

    $sql = "INSERT IGNORE INTO hiking (name, difficulty, distance, duration, height_difference) VALUES (?,?,?,?,?)";
    $stmt= $pdo->prepare($sql);
    $stmt->execute([$name, $difficulty, $distance, $duration, $height_difference]);

    header('Location: /hiking/index.php');
?>