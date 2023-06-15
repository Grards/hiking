<?php 
    require "connection.php"; 
    $pdo = connection();
    
    // $id = intval(filter_var($_POST[htmlentities('id')], FILTER_SANITIZE_NUMBER_INT));
    $sql = "DELETE FROM hiking WHERE id = :id";
    $query= $pdo->prepare($sql);
    $query->execute([
        'id' => intval($_POST['id'])
    ]);

    $lastid = filter_var(htmlentities($pdo->lastInsertId()), FILTER_SANITIZE_NUMBER_INT);
    header('Location: /hiking/index.php?del='.$id);
?>