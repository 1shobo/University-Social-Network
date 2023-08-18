<?php
    session_start();
    if(isset($_SESSION['studentID'])){
        include_once '../../settings/dbconnect.php';
        $outgoing_id = $_POST['outgoing_id'];
        $incoming_id = $_POST['incoming_id'];
        $message = $_POST['message'];
        if(!empty($message)){
            $stmt = mysqli_query($connect, "INSERT INTO chatmessages (incoming_msg_id, outgoing_msg_id, msg) VALUES ('{$incoming_id}', '{$outgoing_id}', '{$message}')") or die("Something went wrong");
        }else{
            echo "empty";
        }
    }else{
        header("location:index.php");  
    }
?>