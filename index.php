<?php 
    require "./views/partials/header.php";
    require "./backend/connection.php"; 
    $datas = connection(); 
?>

    <h1 class="text-center mt-10 mb-10 text-3xl">See the bests hikings of the world !</h1>
    
<?php
    $hikingAdded = null;
    $hikingUpdated = null;
    if(isset($_GET["add"])){
        $hikingAdded = filter_var($_GET[htmlentities("add")]);
        echo '<section class="fading bg-emerald-500 text-center p-2 mt-10 mb-5 w-96 mx-auto"><p>New hiking added successfully !</p></section>';
    }
    if(isset($_GET["up"])){
        $hikingUpdated = filter_var($_GET[htmlentities("up")]);
        echo '<section class="fading bg-amber-400 text-center p-2 mt-10 mb-5 w-96 mx-auto"><p>Hiking updated successfully !</p></section>';
    }
?>
    <article class="hikings flex flex-wrap gap-5 w-full justify-center">
        <?php 
            include "./backend/render.php";
            renderHikings($datas, $hikingAdded, $hikingUpdated);
        ?>
    </article>
    
<?php require "./views/partials/footer.php"; ?>