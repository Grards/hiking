<?php require "./partials/header.php" ?>

    <h2>Create a new hiking</h2>

    <form method="POST" action="../../backend/add_hiking.php">
        <label for="name">name :</label>
        <input type="text" name="name" id="name">

        <label for="difficulty">difficulty :</label>
        <input type="text" name="difficulty" id="difficulty">

        <label for="distance">distance :</label>
        <input type="number" name="distance" id="distance" min="0">

        <label for="duration">duration :</label>
        <input type="time" name="duration" id="duration">

        <label for="height_difference">height difference :</label>
        <input type="number" name="height_difference" id="height_difference">

        <input type="submit" value="Submit">
    </form>
    
<?php require "./partials/footer.php" ?>