<?php


function commentsToDB($connect){
    if (isset($_POST['discussionSubmit'])){
        $studentID = $_POST['studentID'];
        $date = $_POST['date'];
        $message = $_POST['message'];
        $profilePicture = $_POST['profilePicture'];
        $name = $_POST['name'];
        
        $query = mysqli_query($connect, "INSERT INTO discussionfeed (studentID, date, message, profilePicture, Name) 
                            VALUES ('{$studentID}', '{$date}', '{$message}', '{$profilePicture}', '{$name}')");
    }
}

function showComments($connect){
    $query = "SELECT * FROM discussionfeed";
    $result = mysqli_query($connect, $query);
    while($row = mysqli_fetch_assoc($result)){
        $items[] = $row;
    }
    
        $items = array_reverse($items ,true);
    foreach($items as $item){
        echo "<div class='discussion-section'><p>";
            echo "<div class='disc-info'>";
                echo "<img style='' src='images/";
                echo $item['profilePicture'];
                echo "' alt=''>";
            echo "<div class='disc-infot'>";
                echo "<p class='disc-name'>";
                    echo $item['Name'];
                echo "</p>";
                echo "<p class='disc-date'>";
                    echo $item['date'];
                echo "</p>";
            echo "</div>";
            echo "</div>";
            echo "<div class='disc-msg'>";
                echo nl2br($item['message']);
            echo "</div>";
        echo "</p>
        <form class='delt-form' method='POST' action='".deltComment($connect)."'>
        <div class='text-right'>
            <input type='hidden' name='id' value='".$item['id']."'>
            <button class='dltbtn' name='deleteButton'>Delete</button>
        </div>
        </form>
        </div>";
    }
}


function deltComment($connect){
    if(isset($_POST['deleteButton'])){
        $id = $_POST['id'];
        $query = "DELETE FROM discussionfeed WHERE id='$id'";
        $result = mysqli_query($connect, $query);
    }
}