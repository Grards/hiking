<?php
    function renderHikings($pdo, $hikingAdded = null){
        // Display an exception message if the query has a problem.
        $error = null;
        try{
            $query = $pdo->query('SELECT * from hiking');
            $datas = $query->fetchAll();
        } catch(PDOException $e){
            $error = $e->getMessage();
        }

        if($error){
            echo '<p class="error">' . $error . '</p>';
        }else{
            foreach($datas as $data) {
                echo    $data->id == $hikingAdded ? '<section class="border-solid border-4 border-emerald-500 bg-slate-300 rounded-lg relative w-auto"> <p class="absolute bottom-0 w-full text-center bg-emerald-500">New hiking !</p>' : '<section class="bg-slate-300 rounded-lg relative w-auto">';
                echo    '<h2 class="text-center text-lg font-medium">' . htmlentities($data->name) . '</h2>' .
                            '<img class="w-96" src="./assets/img/hiking-default.JPG" alt="Picture of the ' . htmlentities($data->name) . ' hiking">' .
                            '<ul class="mb-5 p-4">' . 
                                '<li> Difficulty : ' . htmlentities($data->difficulty) . '</li>' . 
                                '<li> Distance : ' . htmlentities($data->distance) . ' m</li>' . 
                                '<li> Duration : ' . htmlentities($data->duration) . ' m</li>' . 
                                '<li> Height difference : ' . htmlentities($data->height_difference) . ' m</li>' . 
                            '</ul>' .
                            '<form method="POST" action="delete.php" class="flex flex-row">' .
                                '<input type="hidden" name="' . $data->id . '">' . 
                                '<input type="submit" value="Delete">' .
                            '<form>' .
                        '</section>';
            }
        }
    }
?>