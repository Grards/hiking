<?php require "./partials/header.php" ?>

    <h2 class="text-center text-2xl mt-10 mb-10">Create a new hiking</h2>

    <form class="flex flex-col w-96 mx-auto p-4 bg-rose-500 text-rose-50 rounded-lg" method="POST" action="../backend/add.php">
        <label for="name">name :</label>
        <input type="text" name="name" id="name" class="p-2 text-neutral-950">

        <label for="difficulty">difficulty :</label>
        <input type="text" name="difficulty" id="difficulty" class="p-2 text-neutral-950">

        <label for="distance">distance :</label>
        <input type="number" name="distance" id="distance" min="0" class="p-2 text-neutral-950">

        <label for="duration">duration :</label>
        <input type="time" name="duration" id="duration" class="p-2 pl-10 text-neutral-950 text-center">

        <label for="height_difference">height difference :</label>
        <input type="number" name="height_difference" id="height_difference" class="p-2 text-neutral-950">

        <label for="available">available :</label>
        <input type="checkbox" name="available" id="available" class="text-neutral-950 self-start" checked>

        <input type="submit" value="Submit" class="mt-10">
    </form>
    
<?php require "./partials/footer.php" ?>