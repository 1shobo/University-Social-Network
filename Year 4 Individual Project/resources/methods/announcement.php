<?php

function annouToDB($connect){
    if (isset($_POST['annouSubmit'])){
        $announcement = $_POST['announcement'];
        $date = $_POST['dateA'];
        $query = mysqli_query($connect, "INSERT INTO announcements (accouncement, date) VALUES ('{$announcement}', '{$date}')");
    }
}

function showAnnou($connect){
    $query = "SELECT * FROM announcements";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result)){
        $items[] = $row;
    }
        $items = array_reverse($items ,true);
    foreach($items as $item){
        
        echo "<ol class='list-unstyled mb-0'>";
            echo "<li class='annouDate'><b>";
                echo $item['date'];
            echo "</b></li>";
            
            echo "<li class='annouMsg'>";
                echo $item['accouncement'];
            echo "</li>";
        echo "</ol>";
        
    }
}
