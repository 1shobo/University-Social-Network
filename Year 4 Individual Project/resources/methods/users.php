<?php 
    session_start();
    include_once '../../settings/dbconnect.php';
    $outgoing_id = $_SESSION['studentID'];
    $sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE NOT studentID = '{$outgoing_id}'");
    $output = "";

        if(mysqli_num_rows($sql) == 1){
            $output .= "No users are available to chat with";
        }elseif(mysqli_num_rows($sql) > 0){
            include "data.php";
        }
    echo $output;
?>