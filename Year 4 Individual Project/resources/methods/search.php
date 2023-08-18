<?php
    session_start();
    include_once '../../settings/dbconnect.php';
    $outgoing_id = $_SESSION['studentID'];
    $searchTerm = mysqli_real_escape_string($connect, $_POST['searchTerm']);
    $output = "";

    $sql = mysqli_query($connect, "SELECT * FROM studentlogin WHERE NOT studentID = '{$outgoing_id}' AND (Name LIKE '%{$searchTerm}%')");
    if(mysqli_num_rows($sql) > 0){
        include "data.php";
    }else{
        $output .= "No user found under that name";
    }
    echo $output;
?>