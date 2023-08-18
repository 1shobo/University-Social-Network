<?php
    session_start();
    if(isset($_SESSION['studentID'])){
        include_once '../../settings/dbconnect.php';
        $outgoing_id = mysqli_real_escape_string($connect, $_POST['outgoing_id']);
        $incoming_id = mysqli_real_escape_string($connect, $_POST['incoming_id']);
        $output = '';
       
        $sql = "SELECT * FROM chatmessages 
                LEFT JOIN studentlogin ON studentlogin.studentID = chatmessages.outgoing_msg_id
                WHERE (outgoing_msg_id = '{$outgoing_id}' AND incoming_msg_id = '{$incoming_id}')
                OR (outgoing_msg_id = '{$incoming_id}' AND incoming_msg_id = '{$outgoing_id}') ORDER BY msg_id";
        $query = mysqli_query($connect, $sql);
        
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['outgoing_msg_id'] === $outgoing_id){ // if the user is sending the message
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                <p>'. $row['msg'] .'</p>
                                </div> 
                                </div>';
                }else{ // if the user is the reciever
                    $output .= '<div class="chat incoming">
                                <img src="images/'. $row['profilePicture'] .'" alt="">
                                <div class="details">
                                <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }
            echo $output;
        }
    }else{
        header("location:index.php");  
    }
?>