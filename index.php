<?php require "./assets/views/partials/header.php"; ?>
<?php require "./backend/connection.php"; ?>
<?php $datas = connection(); ?>

    <h1>Welcome to the bests hikings of the world !</h1>

<?php
    include "./backend/render.php";
    renderHikings($datas);
?>

    
<?php require "./assets/views/partials/footer.php"; ?>