<?php 
    require "./views/partials/header.php";
    require "./backend/connection.php"; 
    $datas = connection(); 
?>

    <h1 class="text-center mt-10 mb-10 text-3xl">See the bests hikings of the world !</h1>
    
<?php
    $hikingAdded = null;
    if(isset($_GET["add"])){
        $hikingAdded = filter_var($_GET[htmlentities("add")]);
        echo '<section class="bg-emerald-500 text-center p-2 mt-10 mb-5 w-96 mx-auto"><p>New hiking added successfully !</p></section>';
    }
?>
    <article class="hikings flex flex-wrap gap-5 w-full justify-center">
        <?php 
            include "./backend/render.php";
            renderHikings($datas, $hikingAdded);
        ?>
    </article>
    
<?php require "./views/partials/footer.php"; ?>