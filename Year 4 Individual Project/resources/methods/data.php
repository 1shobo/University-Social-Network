<?php

while($row = mysqli_fetch_assoc($sql)){
    $sql2 = "SELECT * FROM chatmessages WHERE (incoming_msg_id = '{$row['studentID']}'
            OR outgoing_msg_id = '{$row['studentID']}') AND (outgoing_msg_id = '{$outgoing_id}'
            OR incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id DESC LIMIT 1";
    $query2 = mysqli_query($connect, $sql2);
    $row2 = mysqli_fetch_assoc($query2);
    if(mysqli_num_rows($query2) > 0){
        $result = $row2['msg'];
    }else{
        $result = "No message available";
    }
    
    // this trims the message if it is over 29 characters
    (strlen($result) > 28) ? $msg = substr($result, 0, 29).'...' : $msg = $result;
    
    // this adds the text 'You: ' in front of preview message if logged in user sent it
    ($outgoing_id == $row2['outgoing_msg_id']) ? $you = "You: " : $you = "";
    
    // Check if student is online or not
    ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";
    
    $output .= '<a style="text-decoration: none;" href="userChat.php?studentID='. $row['studentID'] .'">
        <div class="content">
        <img src="images/'. $row['profilePicture'] .'" alt="">
        <div class="details">
        <span>'. $row['Name'] .'</span>
        <p>'. $msg .'</p>
        </div>
        </div>
        <div class="status-dot '.$offline.'"><i class="ri-checkbox-blank-circle-fill"></i></div>
        </a>';
}

?>

