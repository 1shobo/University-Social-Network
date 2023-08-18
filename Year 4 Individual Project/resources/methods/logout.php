<?php

    
    if(isset($_SESSION['studentID']) != 'UNadmin'){
        session_start();
        include_once '../../settings/dbconnect.php';
        $logout_id = mysqli_real_escape_string($connect, $_GET['logout_id']);
        if(isset($logout_id)){ // if the logout_id is set
            $status = "Offline now";
            $sql = mysqli_query($connect, "UPDATE studentlogin SET status = '{$status}' WHERE studentID = '{$logout_id}'");
            if($sql){
                session_unset();
                session_destroy();
                header("location: ../index.php");
            }
        }else{
            header("location: ../home2.php");
        }
    }elseif($_SESSION['studentID'] == 'UNadmin'){
        
    }else{
        header("location: ../index.php");
    }
?>