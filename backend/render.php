<?php
    function renderHikings($pdo, $hikingAdded = null, $hikingUpdated = null){
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
                // echo    $data->id == $hikingAdded ? '<section class="border-solid border-4 border-emerald-500 bg-slate-300 rounded-lg relative w-auto relative"> <p class="absolute bottom-0 w-full text-center bg-emerald-500">New hiking !</p>' : '<section class="bg-slate-300 rounded-lg relative w-auto">';
                if($data->available == 'yes'){
                    if($data->id == $hikingAdded){
                        echo '<section class="border-solid border-4 border-emerald-500 bg-slate-300 rounded-lg relative w-auto relative"> <p class="absolute bottom-0 w-full text-center bg-emerald-500">New hiking !</p>';
                    }elseif($data->id == $hikingUpdated){
                        echo '<section class="border-solid border-4 border-amber-400 bg-slate-300 rounded-lg relative w-auto relative"> <p class="absolute bottom-0 w-full text-center bg-amber-400">Hiking updated !</p>';
                    }
                    else{
                        echo '<section class="bg-slate-300 rounded-lg relative w-auto">';
                    } 
                }else{
                    if($data->id == $hikingAdded){
                        echo '<section class="opacity-60 border-solid border-4 border-emerald-500 bg-slate-300 rounded-lg relative w-auto relative"> <p class="absolute bottom-0 w-full text-center bg-emerald-500">New hiking !</p>';
                    }elseif($data->id == $hikingUpdated){
                        echo '<section class="opacity-60 border-solid border-4 border-amber-400 bg-slate-300 rounded-lg relative w-auto relative"> <p class="absolute bottom-0 w-full text-center bg-amber-400">Hiking updated !</p>';
                    }
                    
                    else{
                        echo '<section class="opacity-60 bg-slate-300 rounded-lg relative w-auto">';
                    } 
                }

                echo        '<h2 class="text-center text-lg font-medium">' . htmlentities($data->name) . '</h2>' .
                            '<img class="w-96" src="/hiking/assets/img/hiking-default.JPG" alt="Picture of the ' . htmlentities($data->name) . ' hiking">' .
                            '<ul class="mb-5 p-4">' . 
                                '<li> Difficulty : ' . htmlentities($data->difficulty) . '</li>' . 
                                '<li> Distance : ' . htmlentities($data->distance) . ' m</li>' . 
                                '<li> Duration : ' . htmlentities($data->duration) . ' m</li>' . 
                                '<li> Height difference : ' . htmlentities($data->height_difference) . ' m</li>' .
                                '<li> Available : ' . $data->available . '</li>' .
                            '</ul>' .
                            '<form method="POST" action="/hiking/views/update.php?id=' . htmlentities($data->id) . '" class="flex flex-row">' .
                                '<input type="hidden" name="id" value="' . htmlentities($data->id) . '">' . 
                                '<input class="absolute right-20 bottom-9 border border-solid border-gray-700 pl-2 pr-2 hover:cursor-pointer hover:bg-amber-500" type="submit" value="Modify">' .
                            '</form>' .
                            '<form method="POST" action="/hiking/backend/delete.php" class="flex flex-row">' .
                                '<input type="hidden" name="id" value="' . htmlentities($data->id) . '">' . 
                                '<input class="absolute right-2 bottom-9 border border-solid border-gray-700 pl-2 pr-2 hover:cursor-pointer hover:bg-red-500" type="submit" value="Delete">' .
                            '</form>' .
                        '</section>';
            }
        }
    }

    function renderHikingTOUpdate(){
        require "connection.php"; 
        $pdo = connection();
        
        $error = null;
        try{
            $sql = "SELECT * FROM hiking WHERE id = :id";
            $query= $pdo->prepare($sql);
            $query->execute([
                'id' => intval($_GET['id'])
            ]);
        } catch(PDOException $e){
            $error = $e->getMessage();
        }

        if($error){
            echo '<p class="error">' . $error . '</p>';
        }else{
            foreach($query as $data) {
            ?>
                <form class="flex flex-col w-96 mx-auto p-4 mt-10 bg-rose-500 text-rose-50 rounded-lg" method="POST" action="../backend/modify.php">
                    <input type="hidden" name="id" value="<?php echo htmlentities($data->id); ?>" required>

                    <label for="name">name :</label>
                    <input type="text" name="name" id="name" class="p-2 text-neutral-950" value="<?php echo htmlentities($data->name); ?>"  required>

                    <label for="difficulty">difficulty :</label>
                    <input type="text" name="difficulty" id="difficulty" class="p-2 text-neutral-950" value="<?php echo htmlentities($data->difficulty); ?>" required>

                    <label for="distance">distance :</label>
                    <input type="number" name="distance" id="distance" min="0" class="p-2 text-neutral-950" value="<?php echo htmlentities($data->distance); ?>" required>

                    <label for="duration">duration :</label>
                    <input type="time" name="duration" id="duration" class="p-2 pl-10 text-neutral-950 text-center" value="<?php echo htmlentities(substr($data->duration, 0, 5)); ?>" required>

                    <label for="height_difference">height difference :</label>
                    <input type="number" name="height_difference" id="height_difference" class="p-2 text-neutral-950" value="<?php echo htmlentities($data->height_difference); ?>" required>

                    <label for="available">available :</label>
                    <input type="checkbox" name="available" id="available" class="text-neutral-950 self-start hover:cursor-pointer" <?php echo htmlentities($data->available) == "yes" ? "checked" : ""?>>

                    <input type="submit" value="Submit" class="mt-10 hover:cursor-pointer">
                </form>

            <?php
            }
        }
    }
?>