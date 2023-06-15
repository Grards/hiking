<?php
    function renderHikings($datas){
        foreach($datas->query('SELECT * from hiking') as $row) {

            echo    '<article class="hikings">' .
                        '<h2>' . $row['name'] . '</h2>' .
                        '<img src="./assets/img/' . $row['name'] . '" alt="Picture of the ' . $row['name'] . ' hiking">' .
                        '<ul>' . 
                            '<li> Difficulty : ' . $row['difficulty'] . '</li>' . 
                            '<li> Distance : ' . $row['distance'] . ' m</li>' . 
                            '<li> Duration : ' . $row['duration'] . ' m</li>' . 
                            '<li> Height difference : ' . $row['height_difference'] . ' m</li>' . 
                        '</ul>' .
                    '</article>';
        }
    }
?>