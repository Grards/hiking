<?php
    function renderHikings($datas){
        foreach($datas->query('SELECT * from hiking') as $row) {
            echo $row['name'] . "<br>";
        }
    }
?>